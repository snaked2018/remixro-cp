<?php
if (!defined('FLUX_ROOT')) exit;

$title = Flux::message('LogoutTitle');

// Log the logout event
error_log(sprintf(
    "User logout - IP: %s, Last CSRF Token: %s at %s",
    $_SERVER['REMOTE_ADDR'],
    $_SESSION['csrf_token'] ?? 'none',
    date('Y-m-d H:i:s')
));

// Clear CSRF token and expiry
unset($_SESSION['csrf_token']);
unset($_SESSION['token_expiry']);
unset($_SESSION['expiration_count']);

// Perform logout
$session->logout();

// Set refresh parameters for redirect
$metaRefresh = array('seconds' => 2, 'location' => $this->basePath);
?>
