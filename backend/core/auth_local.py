from django.contrib.auth import get_user_model
from django.contrib.auth.backends import ModelBackend
from rest_framework_simplejwt.authentication import JWTAuthentication
from rest_framework.exceptions import AuthenticationFailed
from .models import UserProfile
import logging

logger = logging.getLogger(__name__)

User = get_user_model()

class CustomJWTAuthentication(JWTAuthentication):
    """
    Custom JWT Authentication that works with our UserProfile model
    """
    
    def get_user(self, validated_token):
        """
        Get user from token and ensure UserProfile exists
        """
        try:
            user = super().get_user(validated_token)
            
            # Ensure UserProfile exists
            if not hasattr(user, 'userprofile'):
                # Create UserProfile if it doesn't exist
                UserProfile.objects.get_or_create(
                    user=user,
                    defaults={
                        'arabic_first_name': user.first_name or user.username,
                        'arabic_last_name': user.last_name or '',
                        'national_id': f'temp_{user.id}',
                        'phone': '',
                        'address': '',
                        'date_of_birth': '2000-01-01',
                        'gender': 'male',
                        'role': 'student'
                    }
                )
            
            return user
            
        except Exception as e:
            logger.error(f"Error getting user from token: {str(e)}")
            raise AuthenticationFailed('Invalid token')

class LocalAuthBackend(ModelBackend):
    """
    Local authentication backend that works with email or username
    """
    
    def authenticate(self, request, username=None, password=None, **kwargs):
        if username is None or password is None:
            return None
            
        try:
            # Try to get user by username first
            try:
                user = User.objects.get(username=username)
            except User.DoesNotExist:
                # If not found, try by email
                try:
                    user = User.objects.get(email=username)
                except User.DoesNotExist:
                    return None
            
            # Check password
            if user.check_password(password) and self.user_can_authenticate(user):
                # Ensure UserProfile exists
                if not hasattr(user, 'userprofile'):
                    UserProfile.objects.get_or_create(
                        user=user,
                        defaults={
                            'arabic_first_name': user.first_name or user.username,
                            'arabic_last_name': user.last_name or '',
                            'national_id': f'temp_{user.id}',
                            'phone': '',
                            'address': '',
                            'date_of_birth': '2000-01-01',
                            'gender': 'male',
                            'role': 'admin' if user.is_superuser else 'student'
                        }
                    )
                return user
                
        except Exception as e:
            logger.error(f"Authentication error: {str(e)}")
            return None
            
        return None
