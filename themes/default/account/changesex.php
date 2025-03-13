<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white">
                <?php echo htmlspecialchars(Flux::message('GenderChangeHeading')) ?>
            </h2>
        </div>

        <!-- Cost Information -->
        <?php if ($cost): ?>
            <div class="bg-gray-900/50 rounded-lg p-4 mb-6 border border-gray-700">
                <div class="space-y-2">
                    <p class="text-gray-300">
                        <?php printf(
                            Flux::message('GenderChangeCost'), 
                            '<span class="text-green-400 font-medium">'.number_format((int)$cost).'</span>'
                        ) ?>
                    </p>
                    <p class="text-gray-300">
                        <?php printf(
                            Flux::message('GenderChangeBalance'), 
                            '<span class="text-green-400 font-medium">'.number_format((int)$session->account->balance).'</span>'
                        ) ?>
                    </p>
                </div>

                <?php if (!$hasNecessaryFunds): ?>
                    <div class="mt-4 p-3 bg-red-900/50 border border-red-700 rounded-md">
                        <p class="text-red-400 text-sm">
                            <?php echo htmlspecialchars(Flux::message('GenderChangeNoFunds')) ?>
                        </p>
                    </div>
                <?php elseif ($auth->allowedToAvoidSexChangeCost): ?>
                    <div class="mt-4 p-3 bg-green-900/50 border border-green-700 rounded-md">
                        <p class="text-green-400 text-sm">
                            <?php echo htmlspecialchars(Flux::message('GenderChangeNoCost')) ?>
                        </p>
                    </div>
                <?php endif ?>
            </div>
        <?php endif ?>

        <?php if ($hasNecessaryFunds): ?>
            <!-- Error Message -->
            <?php if (!empty($errorMessage)): ?>
                <div class="mb-6 p-4 bg-red-900/50 border border-red-700 rounded-lg">
                    <p class="text-red-400 text-sm">
                        <?php echo htmlspecialchars($errorMessage) ?>
                    </p>
                </div>
            <?php else: ?>
                <!-- Note -->
                <div class="mb-6 p-4 bg-gray-800/50 rounded-lg border border-gray-700">
                    <p class="text-sm text-gray-300">
                        <span class="font-medium text-gray-200">
                            <?php echo htmlspecialchars(Flux::message('NoteLabel')) ?>:
                        </span>
                        <?php printf(
                            Flux::message('GenderChangeCharInfo'), 
                            '<span class="text-green-400">'.implode(', ', array_values($badJobs)).'</span>'
                        ) ?>.
                    </p>
                </div>

                <!-- Form -->
                <div class="bg-gray-900 rounded-lg shadow-lg border border-gray-700 p-6">
                    <h3 class="text-xl font-medium text-white mb-4">
                        <?php echo htmlspecialchars(Flux::message('GenderChangeSubHeading')) ?>
                    </h3>

                    <form action="<?php echo $this->urlWithQs ?>" method="post">
                        <input type="hidden" name="changegender" value="1" />
                        
                        <div class="space-y-6">
                            <!-- Confirmation Text -->
                            <div class="p-4 bg-gray-800/50 rounded-md border border-gray-700">
                                <p class="text-gray-300">
                                    <?php printf(
                                        Flux::message('GenderChangeFormText'), 
                                        '<strong class="text-green-400">'.strtolower($this->genderText($session->account->sex == 'M' ? 'F' : 'M')).'</strong>'
                                    ) ?>
                                </p>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit" 
                                        onclick="return confirm('<?php echo str_replace("\'", "\\'", Flux::message('GenderChangeConfirm')) ?>')"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm 
                                               rounded-md branding-green-button
                                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 
                                               transition-colors duration-200">
                                    <?php echo htmlspecialchars(Flux::message('GenderChangeButton')) ?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif ?>
        <?php endif ?>
    </div>
</div>