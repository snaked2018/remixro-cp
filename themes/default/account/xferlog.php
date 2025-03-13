<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Main Header -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white">
                <?php echo htmlspecialchars(Flux::message('XferLogHeading')) ?>
            </h2>
        </div>

        <!-- Received Transfers Section -->
        <div class="mb-8">
            <h3 class="text-xl font-medium text-white mb-4">
                <?php echo htmlspecialchars(Flux::message('XferLogReceivedSubHead')) ?>
            </h3>
            
            <?php if ($incomingXfers): ?>
                <div class="bg-gray-900 rounded-lg shadow-lg border border-gray-700 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead>
                                <tr class="bg-gray-800/50">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        <?php echo htmlspecialchars(Flux::message('XferLogCreditsLabel')) ?>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        <?php echo htmlspecialchars(Flux::message('XferLogFromLabel')) ?>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        <?php echo htmlspecialchars(Flux::message('XferLogDateLabel')) ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                <?php foreach ($incomingXfers as $xfer): ?>
                                <tr class="hover:bg-gray-800/50">
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-indigo-400 font-medium">
                                        <?php echo number_format($xfer->amount) ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                        <?php echo htmlspecialchars($xfer->from_email) ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                        <?php echo $this->formatDateTime($xfer->transfer_date) ?>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-8 bg-gray-900/50 rounded-lg border border-gray-700">
                    <p class="text-gray-400">
                        <?php echo htmlspecialchars(Flux::message('XferLogNotReceived')) ?>
                    </p>
                </div>
            <?php endif ?>
        </div>

        <!-- Sent Transfers Section -->
        <div class="mb-8">
            <h3 class="text-xl font-medium text-white mb-4">
                <?php echo htmlspecialchars(Flux::message('XferLogSentSubHead')) ?>
            </h3>
            
            <?php if ($outgoingXfers): ?>
                <div class="bg-gray-900 rounded-lg shadow-lg border border-gray-700 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead>
                                <tr class="bg-gray-800/50">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        <?php echo htmlspecialchars(Flux::message('XferLogCreditsLabel')) ?>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        <?php echo htmlspecialchars(Flux::message('XferLogCharNameLabel')) ?>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        <?php echo htmlspecialchars(Flux::message('XferLogDateLabel')) ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                <?php foreach ($outgoingXfers as $xfer): ?>
                                <tr class="hover:bg-gray-800/50">
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-indigo-400 font-medium">
                                        <?php echo number_format($xfer->amount) ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                        <?php if ($xfer->target_char_name): ?>
                                            <?php if ($auth->actionAllowed('character', 'view') && $auth->allowedToViewCharacter): ?>
                                                <a href="<?php echo $this->url('character', 'view', array('id' => $xfer->target_char_id)) ?>"
                                                   class="text-indigo-400 hover:text-indigo-300">
                                                    <?php echo htmlspecialchars($xfer->target_char_name) ?>
                                                </a>
                                            <?php else: ?>
                                                <?php echo htmlspecialchars($xfer->target_char_name) ?>
                                            <?php endif ?>
                                        <?php else: ?>
                                            <span class="text-gray-500 italic">
                                                <?php echo htmlspecialchars($xfer->target_char_id) ?>
                                            </span>
                                        <?php endif ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                        <?php echo $this->formatDateTime($xfer->transfer_date) ?>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-8 bg-gray-900/50 rounded-lg border border-gray-700">
                    <p class="text-gray-400">
                        <?php echo htmlspecialchars(Flux::message('XferLogNotSent')) ?>
                    </p>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>