<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-sm w-full rounded-lg shadow-xl p-6 text-center">
        <!-- Success Icon -->
        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
            <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <!-- Heading -->
        <h2 class="text-2xl font-semibold text-white mb-4">
            <?php echo htmlspecialchars(Flux::message('LogoutHeading')) ?>
        </h2>

        <!-- Message -->
        <div class="space-y-4 text-gray-300">
            <p class="font-medium">
                <?php echo htmlspecialchars(Flux::message('LogoutInfo')) ?>
            </p>
            <p class="text-sm">
                <?php printf(Flux::message('LogoutInfo2'), $metaRefresh['location']) ?>
            </p>
        </div>

        <!-- Loading Animation -->
        <div class="mt-6 flex justify-center">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-white"></div>
        </div>
    </div>
</div>
