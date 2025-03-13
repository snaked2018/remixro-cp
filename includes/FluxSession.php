<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Define session timeout from config
define('SESSION_TIMEOUT', Flux::config('SecuritySettings.TokenExpiry'));

// Only check token expiration if user is logged in
if (isset($_SESSION['account_id'])) {
    if (isset($_SESSION['token_expiry']) && time() > $_SESSION['token_expiry']) {
        $_SESSION['expiration_count'] = isset($_SESSION['expiration_count']) ? $_SESSION['expiration_count'] + 1 : 1;
        
        error_log(sprintf(
            "Session expired for IP: %s at %s (Expiration count: %d)",
            $_SERVER['REMOTE_ADDR'],
            date('Y-m-d H:i:s'),
            $_SESSION['expiration_count']
        ));
        
        session_destroy();
        header('Location: ?module=account&action=session_expired');
        exit;
    }
}

function validateCSRFToken($token) {
    // Generate token if logging in
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_SESSION['account_id'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $_SESSION['token_expiry'] = time() + SESSION_TIMEOUT;
        error_log(sprintf(
            "Initial CSRF token generated for login - IP: %s at %s",
            $_SERVER['REMOTE_ADDR'],
            date('Y-m-d H:i:s')
        ));
        return true;
    }

    if (!isset($_SESSION['csrf_token']) || !isset($token)) {
        error_log(sprintf(
            "Token validation failed - Missing tokens for IP: %s",
            $_SERVER['REMOTE_ADDR']
        ));
        return false;
    }
    
    // Reset expiry time on successful validation
    $_SESSION['token_expiry'] = time() + SESSION_TIMEOUT;
    
    return hash_equals($_SESSION['csrf_token'], $token);
}

function regenerateCSRFToken() {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    $_SESSION['token_expiry'] = time() + SESSION_TIMEOUT;
    error_log(sprintf(
        "CSRF token regenerated for IP: %s at %s, Expires at: %s",
        $_SERVER['REMOTE_ADDR'],
        date('Y-m-d H:i:s'),
        date('Y-m-d H:i:s', $_SESSION['token_expiry'])
    ));
    return $_SESSION['csrf_token'];
}
?>
