<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . $uri;

// Serve existing files directly
if ($uri !== '/' && file_exists($file) && is_file($file)) {
    return false; // let built-in server handle
}

// Route root to index-9.php
require __DIR__ . '/index-9.php';
return true;
?>

