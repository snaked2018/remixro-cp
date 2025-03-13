<?php
if (!defined('FLUX_ROOT')) exit;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check for token expiration for any session with a token
if (isset($_SESSION['token_expiry']) && time() > $_SESSION['token_expiry']) {
    $_SESSION['expiration_count'] = isset($_SESSION['expiration_count']) ? $_SESSION['expiration_count'] + 1 : 1;
    
    error_log(sprintf(
        "Session expired for IP: %s at %s (Expiration count: %d)",
        $_SERVER['REMOTE_ADDR'],
        date('Y-m-d H:i:s'),
        $_SESSION['expiration_count']
    ));
    
    session_destroy();
    
    // Set meta refresh parameters
    $metaRefresh = array(
        'seconds' => 5,
        'location' => '?module=account&action=login'
    );
    
    // Redirect to session expired page with meta refresh
    header('Location: ?module=account&action=session_expired&redirect=true');
    exit;
}
