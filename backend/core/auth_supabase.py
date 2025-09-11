import requests
import json
from django.contrib.auth import get_user_model
from django.contrib.auth.backends import BaseBackend
from rest_framework.authentication import BaseAuthentication
from rest_framework.exceptions import AuthenticationFailed
from .models import UserProfile
import logging

logger = logging.getLogger(__name__)

User = get_user_model()

class SupabaseAuthentication(BaseAuthentication):
    """
    Supabase JWT Token Authentication for DRF
    """
    
    def authenticate(self, request):
        # Get the authorization header
        auth_header = request.META.get('HTTP_AUTHORIZATION')
        if not auth_header or not auth_header.startswith('Bearer '):
            return None
            
        token = auth_header.split(' ')[1]
        
        # Verify token with Supabase
        try:
            # Use the new Supabase URL
            supabase_url = "https://eumefkgawzelqdjyreer.supabase.co"
            headers = {
                'Authorization': f'Bearer {token}',
                'apikey': 'sb_publishable_wZ2A63XDpjRBlkVjhcn1uw_wncZfV--'
            }
            
            response = requests.get(f'{supabase_url}/auth/v1/user', headers=headers)
            
            if response.status_code != 200:
                logger.warning(f"Supabase auth failed: {response.status_code} - {response.text}")
                raise AuthenticationFailed('Invalid token')
                
            user_data = response.json()
            supabase_user_id = user_data.get('id')
            email = user_data.get('email')
            user_metadata = user_data.get('user_metadata', {})
            
            if not supabase_user_id or not email:
                raise AuthenticationFailed('Invalid user data from Supabase')
            
            # Try to find existing user profile
            try:
                user_profile = UserProfile.objects.select_related('user').get(
                    supabase_user_id=supabase_user_id
                )
                user = user_profile.user
                
            except UserProfile.DoesNotExist:
                # Create new user and profile
                try:
                    # Check if user exists by email
                    user = User.objects.get(email=email)
                except User.DoesNotExist:
                    # Create new user
                    username = email.split('@')[0]  # Use email prefix as username
                    user = User.objects.create_user(
                        username=username,
                        email=email,
                        first_name=user_metadata.get('first_name', ''),
                        last_name=user_metadata.get('last_name', '')
                    )
                
                # Create user profile
                user_profile = UserProfile.objects.create(
                    user=user,
                    supabase_user_id=supabase_user_id,
                    arabic_first_name=user_metadata.get('arabic_first_name', user.first_name),
                    arabic_last_name=user_metadata.get('arabic_last_name', user.last_name),
                    role=user_metadata.get('role', 'student'),
                    national_id=user_metadata.get('national_id', ''),
                    phone=user_metadata.get('phone', ''),
                    address=user_metadata.get('address', ''),
                    date_of_birth=user_metadata.get('date_of_birth', '2000-01-01'),
                    gender=user_metadata.get('gender', 'male')
                )
            
            # Update user activity
            user_profile.is_active = True
            user_profile.save()
            
            return (user, token)
            
        except requests.RequestException as e:
            logger.error(f"Supabase request failed: {str(e)}")
            raise AuthenticationFailed('Authentication service unavailable')
        except json.JSONDecodeError:
            logger.error("Invalid JSON response from Supabase")
            raise AuthenticationFailed('Invalid response from authentication service')
        except Exception as e:
            logger.error(f"Authentication error: {str(e)}")
            raise AuthenticationFailed('Authentication failed')

class SupabaseBackend(BaseBackend):
    """
    Django authentication backend for Supabase
    """
    
    def authenticate(self, request, supabase_user_id=None, **kwargs):
        if supabase_user_id:
            try:
                user_profile = UserProfile.objects.select_related('user').get(
                    supabase_user_id=supabase_user_id
                )
                return user_profile.user
            except UserProfile.DoesNotExist:
                return None
        return None
    
    def get_user(self, user_id):
        try:
            return User.objects.get(pk=user_id)
        except User.DoesNotExist:
            return None