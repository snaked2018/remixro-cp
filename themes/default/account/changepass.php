<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white">
                <?php echo htmlspecialchars(Flux::message('PasswordChangeHeading')) ?>
            </h2>
        </div>

        <!-- Error Message -->
        <?php if (!empty($errorMessage)): ?>
            <div class="mb-6 p-4 bg-red-900/50 border border-red-700 rounded-lg">
                <p class="text-red-400 text-sm">
                    <?php echo htmlspecialchars($errorMessage) ?>
                </p>
            </div>
        <?php else: ?>
            <div class="mb-6">
                <p class="text-gray-400 text-sm">
                    <?php echo htmlspecialchars(Flux::message('PasswordChangeInfo')) ?>
                </p>
            </div>
        <?php endif ?>

        <!-- Password Change Form -->
        <div class="bg-gray-900 rounded-lg shadow-lg border border-gray-700 p-6">
            <form action="<?php echo $this->urlWithQs ?>" method="post">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Password Fields -->
                    <div class="md:col-span-2 space-y-6">
                        <!-- Current Password -->
                        <div>
                            <label for="currentpass" class="block text-sm font-medium text-gray-300 mb-2">
                                <?php echo htmlspecialchars(Flux::message('CurrentPasswordLabel')) ?>
                            </label>
                            <input type="password" name="currentpass" id="currentpass"
                                   class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                          focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <!-- New Password -->
                        <div>
                            <label for="newpass" class="block text-sm font-medium text-gray-300 mb-2">
                                <?php echo htmlspecialchars(Flux::message('NewPasswordLabel')) ?>
                            </label>
                            <input type="password" name="newpass" id="newpass"
                                   class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                          focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <!-- Confirm New Password -->
                        <div>
                            <label for="confirmnewpass" class="block text-sm font-medium text-gray-300 mb-2">
                                <?php echo htmlspecialchars(Flux::message('NewPasswordConfirmLabel')) ?>
                            </label>
                            <input type="password" name="confirmnewpass" id="confirmnewpass"
                                   class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                          focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <!-- Notes Section -->
                    <div class="md:col-span-1">
                        <div class="bg-gray-800/50 rounded-lg p-4 space-y-4">
                            <p class="text-gray-300 text-sm">
                                <?php echo htmlspecialchars(Flux::message('PasswordChangeNote')) ?>
                            </p>
                            <p class="text-yellow-400 text-sm font-medium">
                                <?php echo htmlspecialchars(Flux::message('PasswordChangeNote2')) ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end mt-6">
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm
                                   rounded-md branding-green-button
                                   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 
                                   transition-colors duration-200">
                        <?php echo htmlspecialchars(Flux::message('PasswordChangeButton')) ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>