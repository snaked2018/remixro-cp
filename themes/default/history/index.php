<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="h-[120] bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white mb-4">
                <?php echo htmlspecialchars(Flux::message('HistoryIndexHeading')) ?>
            </h2>
            <div class="space-y-4 text-gray-400">
                <p class="text-sm">
                    <?php echo htmlspecialchars(Flux::message('HistoryIndexInfo')) ?>
                </p>
                <p class="text-sm">
                    <?php echo htmlspecialchars(Flux::message('HistoryIndexInfo2')) ?>
                </p>
            </div>
        </div>
    </div>
</div>