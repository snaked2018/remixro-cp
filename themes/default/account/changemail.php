<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white">
                <?php echo htmlspecialchars(Flux::message('EmailChangeHeading')) ?>
            </h2>
        </div>

        <!-- Error Message -->
        <?php if (!empty($errorMessage)): ?>
            <div class="mb-4 p-4 bg-red-900/50 border border-red-700 rounded-lg">
                <p class="text-red-400 text-sm">
                    <?php echo htmlspecialchars($errorMessage) ?>
                </p>
            </div>
        <?php endif ?>

        <!-- Info Messages -->
        <div class="space-y-4 mb-8">
            <p class="text-gray-400 text-sm">
                <?php echo htmlspecialchars(Flux::message('EmailChangeInfo')) ?>
            </p>
            <?php if (Flux::config('RequireChangeConfirm')): ?>
                <p class="text-gray-400 text-sm">
                    <?php echo htmlspecialchars(Flux::message('EmailChangeInfo2')) ?>
                </p>
            <?php endif ?>
        </div>

        <!-- Email Change Form -->
        <div class="bg-gray-900 rounded-lg shadow-lg border border-gray-700 p-6">
            <form action="<?php echo $this->urlWithQs ?>" method="post">
                <div class="space-y-6">
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                            <?php echo htmlspecialchars(Flux::message('EmailChangeLabel')) ?>
                        </label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email" 
                                   class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                          focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500
                                          placeholder-gray-500" 
                                   placeholder="Enter your new email address" />
                        </div>
                        <p class="mt-2 text-sm text-gray-400">
                            <?php echo htmlspecialchars(Flux::message('EmailChangeInputNote')) ?>
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium 
                                       rounded-md branding-green-button 
                                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <?php echo htmlspecialchars(Flux::message('EmailChangeButton')) ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>