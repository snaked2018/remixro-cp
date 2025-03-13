<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white">
                <?php echo htmlspecialchars(Flux::message('TransferHeading')) ?>
            </h2>
        </div>

        <?php if (!empty($errorMessage)): ?>
            <div class="mb-6 p-4 bg-red-900/50 border border-red-700 rounded-lg">
                <p class="text-red-400 text-sm">
                    <?php echo htmlspecialchars($errorMessage) ?>
                </p>
            </div>
        <?php endif ?>

        <?php if ($session->account->balance): ?>
            <!-- Transfer Form Card -->
            <div class="bg-gray-900 rounded-lg shadow-lg border border-gray-700 p-6">
                <!-- Server Info -->
                <div class="mb-6">
                    <h3 class="text-xl font-medium text-white mb-4">
                        <?php printf(htmlspecialchars(Flux::message('TransferSubHeading')), $server->serverName) ?>
                    </h3>
                    <div class="space-y-2">
                        <p class="text-gray-300">
                            <?php printf(
                                Flux::message('TransferInfo'), 
                                '<span class="text-green-400 font-medium">'.number_format($session->account->balance).'</span>'
                            ) ?>
                        </p>
                        <p class="text-gray-400 text-sm">
                            <?php echo htmlspecialchars(Flux::message('TransferInfo2')) ?>
                        </p>
                    </div>
                </div>

                <!-- Transfer Form -->
                <form action="<?php echo $this->url ?>" method="post">
                    <?php echo $this->moduleActionFormInputs('account', 'transfer') ?>
                    <div class="space-y-6">
                        <!-- Amount -->
                        <div>
                            <label for="credits" class="block text-sm font-medium text-gray-300 mb-2">
                                <?php echo htmlspecialchars(Flux::message('TransferAmountLabel')) ?>
                            </label>
                            <div class="mt-1">
                                <input type="text" name="credits" id="credits" 
                                       value="<?php echo htmlspecialchars($params->get('credits') ?: '') ?>"
                                       class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                              focus:ring-1 focus:ring-green-500 focus:border-green-500" />
                            </div>
                            <p class="mt-2 text-sm text-gray-400">
                                <?php echo htmlspecialchars(Flux::message('TransferAmountInfo')) ?>
                            </p>
                        </div>

                        <!-- Character Name -->
                        <div>
                            <label for="char_name" class="block text-sm font-medium text-gray-300 mb-2">
                                <?php echo htmlspecialchars(Flux::message('TransferCharNameLabel')) ?>
                            </label>
                            <div class="mt-1">
                                <input type="text" name="char_name" id="char_name" 
                                       value="<?php echo htmlspecialchars($params->get('char_name') ?: '') ?>"
                                       class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                              focus:ring-1 focus:ring-green-500 focus:border-green-500" />
                            </div>
                            <p class="mt-2 text-sm text-gray-400">
                                <?php echo htmlspecialchars(Flux::message('TransferCharNameInfo')) ?>
                            </p>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end pt-4">
                            <button type="submit" 
                                    onclick="return confirm('<?php echo htmlspecialchars(str_replace("'", "\\'", Flux::message('TransferConfirm'))) ?>')"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm
                                           rounded-md branding-green-button
                                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 
                                           transition-colors duration-200">
                                <?php echo htmlspecialchars(Flux::message('TransferButton')) ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <!-- No Credits Message -->
            <div class="text-center py-8">
                <p class="text-gray-400">
                    <?php echo htmlspecialchars(Flux::message('TransferNoCredits')) ?>
                </p>
            </div>
        <?php endif ?>
    </div>
</div>