<?php
if (!defined('FLUX_ROOT')) exit;

// Log session expiration event with timestamp and IP
error_log(sprintf(
    "Session expired for IP: %s at %s",
    $_SERVER['REMOTE_ADDR'],
    date('Y-m-d H:i:s')
));

$title = Flux::message('SessionExpiredTitle');

// Get expiration count from session if it exists
$expirationCount = isset($_SESSION['expiration_count']) ? $_SESSION['expiration_count'] : 0;
$expirationCount++;

// Store the count in a session variable
$_SESSION['expiration_count'] = $expirationCount;

// Log the expiration count
error_log(sprintf(
    "Total session expirations for IP %s: %d",
    $_SERVER['REMOTE_ADDR'],
    $expirationCount
));
?>

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Warning Icon -->
        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100">
            <svg class="h-6 w-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>
        
        <!-- Content -->
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-extrabold text-white">
                Session Expired
            </h2>
            <p class="mt-2 text-sm text-gray-400">
                Your session has expired.
            </p>
            <p class="mt-2 text-sm text-gray-400">
                You will be redirected to the login page in 5 seconds...
            </p>
        </div>

        <!-- Login Button -->
        <div class="mt-5">
            <a href="?module=account&action=login" 
               class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md branding-green-button focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Return to Login
            </a>
        </div>

        <!-- Loading Animation -->
        <div class="flex justify-center mt-4">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-white"></div>
        </div>
    </div>
</div>