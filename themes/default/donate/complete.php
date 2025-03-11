<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="min-h-[60vh] flex items-center justify-center">
    <div class="max-w-2xl w-full mx-auto p-6">
        <!-- Success Card -->
        <div class="bg-gray-800/50 border border-green-500/20 rounded-lg shadow-xl backdrop-blur-sm overflow-hidden">
            <!-- Header -->
            <div class="border-b border-gray-700 p-6">
                <div class="flex items-center justify-center">
                    <div class="rounded-full bg-green-500/10 p-3">
                        <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <h2 class="mt-4 text-center text-2xl font-semibold text-white">Donation Complete</h2>
            </div>

            <!-- Content -->
            <div class="p-6 space-y-6">
                <div class="text-center">
                    <p class="text-green-400">Your transaction has been processed successfully!</p>
                    <p class="mt-2 text-sm text-gray-400">Credits will be added to your account shortly.</p>
                </div>

                <?php $hoursHeld = +(int)Flux::config('HoldUntrustedAccount'); ?>
                <?php if ($hoursHeld): ?>
                    <!-- Hold Notice -->
                    <div class="rounded-lg bg-yellow-500/10 border border-yellow-500/20 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-400">
                                    First-time donation hold period: <?php echo number_format($hoursHeld) ?> hours
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <!-- Additional Information -->
                <div class="space-y-4 text-sm text-gray-400">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <p>A confirmation email has been sent to your registered email address.</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <p>You can view your transaction details in your PayPal account history.</p>
                    </div>
                </div>

                <!-- Thank You Message -->
                <div class="mt-8 text-center">
                    <p class="text-lg font-medium text-white">Thank you for your generous donation!</p>
                    <p class="mt-2 text-sm text-gray-400">&mdash; <?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?></p>
                </div>

                <!-- Return Button -->
                <div class="mt-6 text-center">
                    <a href="<?php echo $this->url('donate', 'index') ?>" 
                       class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Return to Donations
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>