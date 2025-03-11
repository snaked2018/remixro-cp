<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="min-h-[60vh] flex items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <!-- Error Icon -->
        <div class="flex justify-center">
            <div class="rounded-full bg-red-500/10 p-3">
                <svg class="h-16 w-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
        </div>

        <!-- Error Message -->
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-bold tracking-tight text-red-500">
                <?php echo htmlspecialchars(Flux::message('UnauthorizedHeading')) ?>
            </h2>
            <p class="mt-4 text-lg text-gray-300">
                <?php printf(Flux::message('UnauthorizedInfo'), $metaRefresh['location']) ?>
            </p>
        </div>

        <!-- Additional Information -->
        <div class="mt-8 bg-gray-800/50 border border-red-500/20 rounded-lg p-6">
            <div class="text-sm text-gray-400 space-y-4">
                <div class="flex items-center space-x-3">
                    <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p>You don't have the required permissions to access this page.</p>
                </div>
                <div class="flex items-center space-x-3">
                    <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p>You will be redirected automatically in a few seconds.</p>
                </div>
            </div>
        </div>

        <!-- Return Button -->
        <div class="mt-6 text-center">
            <a href="<?php echo $metaRefresh['location'] ?>" 
               class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Return to Safety
            </a>
        </div>
    </div>
</div>