<?php if (!defined('FLUX_ROOT'))
    exit; ?>
<?php 
if (!defined('FLUX_ROOT')) exit;

require_once FLUX_ROOT . '/includes/FluxSession.php';

// Generate CSRF token if user just logged in
if ($session->isLoggedIn()) {
    regenerateCSRFToken();
}
?>
<div class="bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold mb-4">
                <?php echo htmlspecialchars(Flux::message('AccountCreateHeading')) ?>
            </h2>
            <p class="text-gray-400 text-sm">
                <?php printf(
                    htmlspecialchars(Flux::message('AccountCreateInfo')),
                    '<a href="' . $this->url('service', 'tos') . '" class="text-green-400 hover:text-green-300">' .
                    Flux::message('AccountCreateTerms') . '</a>'
                ) ?>
            </p>
        </div>

        <!-- Requirements Notes -->
        <div class="bg-gray-900/50 rounded-lg p-4 mb-6 border border-gray-700 space-y-2">
            <?php if (Flux::config('RequireEmailConfirm')): ?>
                <p class="text-yellow-400 text-sm">
                    <strong>Note:</strong> You will need to provide a working e-mail address to confirm your account.
                </p>
            <?php endif ?>

            <p class="text-gray-300 text-sm">
                <strong>Password Requirements:</strong>
            </p>
            <ul class="list-disc list-inside text-sm text-gray-400 space-y-1">
                <li><?php echo sprintf(
                    "Length: %d-%d characters",
                    Flux::config('MinPasswordLength'),
                    Flux::config('MaxPasswordLength')
                ) ?></li>
                <?php if (Flux::config('PasswordMinUpper') > 0): ?>
                    <li><?php echo sprintf(
                        Flux::message('PasswordNeedUpper'),
                        Flux::config('PasswordMinUpper')
                    ) ?></li>
                <?php endif ?>
                <?php if (Flux::config('PasswordMinLower') > 0): ?>
                    <li><?php echo sprintf(
                        Flux::message('PasswordNeedLower'),
                        Flux::config('PasswordMinLower')
                    ) ?></li>
                <?php endif ?>
                <?php if (Flux::config('PasswordMinNumber') > 0): ?>
                    <li><?php echo sprintf(
                        Flux::message('PasswordNeedNumber'),
                        Flux::config('PasswordMinNumber')
                    ) ?></li>
                <?php endif ?>
                <?php if (Flux::config('PasswordMinSymbol') > 0): ?>
                    <li><?php echo sprintf(
                        Flux::message('PasswordNeedSymbol'),
                        Flux::config('PasswordMinSymbol')
                    ) ?></li>
                <?php endif ?>
            </ul>
        </div>

        <!-- Error Message -->
        <?php if (isset($errorMessage)): ?>
            <div class="mb-6 p-4 bg-red-900/50 border border-red-700 rounded-lg">
                <p class="text-red-400 text-sm">
                    <?php echo htmlspecialchars($errorMessage) ?>
                </p>
            </div>
        <?php endif ?>

        <!-- Form -->
        <form action="<?php echo $this->url ?>" method="post"
            class="space-y-6 bg-gray-900 p-6 rounded-lg border border-gray-700">
            <!-- Add CSRF Token field -->
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? '') ?>">
            
            <!-- Server Selection -->
            <?php if (count($serverNames) === 1): ?>
                <input type="hidden" name="server"
                    value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
            <?php elseif (count($serverNames) > 1): ?>
                <div class="space-y-2">
                    <label for="register_server" class="block text-sm font-medium text-gray-200">
                        <?php echo htmlspecialchars(Flux::message('AccountServerLabel')) ?>
                    </label>
                    <select name="server" id="register_server" class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-sm
                                          focus:ring-1 focus:ring-green-500 focus:border-green-500">
                        <?php foreach ($serverNames as $serverName): ?>
                            <option value="<?php echo htmlspecialchars($serverName) ?>" <?php if ($params->get('server') == $serverName)
                                   echo ' selected="selected"' ?>>
                                <?php echo htmlspecialchars($serverName) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            <?php endif ?>

            <!-- Username -->
            <div class="space-y-2">
                <label for="register_username" class="block text-sm font-medium text-gray-200">
                    <?php echo htmlspecialchars(Flux::message('AccountUsernameLabel')) ?>
                </label>
                <input type="text" name="username" id="register_username"
                    value="<?php echo htmlspecialchars($params->get('username') ?: '') ?>"
                    class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-sm focus:ring-1 focus:ring-green-500 focus:border-green-500">
            </div>

            <!-- Password Fields -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="space-y-2">
                    <label for="register_password" class="block text-sm font-medium text-gray-200">
                        <?php echo htmlspecialchars(Flux::message('AccountPasswordLabel')) ?>
                    </label>
                    <input type="password" name="password" id="register_password" class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-sm
                                          focus:ring-1 focus:ring-green-500 focus:border-green-500">
                </div>
                <div class="space-y-2">
                    <label for="register_confirm_password" class="block text-sm font-medium text-gray-200">
                        <?php echo htmlspecialchars(Flux::message('AccountPassConfirmLabel')) ?>
                    </label>
                    <input type="password" name="confirm_password" id="register_confirm_password" class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-sm
                                          focus:ring-1 focus:ring-green-500 focus:border-green-500">
                </div>
            </div>

            <!-- Email Fields -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="space-y-2">
                    <label for="register_email_address" class="block text-sm font-medium text-gray-200">
                        <?php echo htmlspecialchars(Flux::message('AccountEmailLabel')) ?>
                    </label>
                    <input type="email" name="email_address" id="register_email_address"
                        value="<?php echo htmlspecialchars($params->get('email_address') ?: '') ?>" class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-sm
                                          focus:ring-1 focus:ring-green-500 focus:border-green-500">
                </div>
                <div class="space-y-2">
                    <label for="register_email_address2" class="block text-sm font-medium text-gray-200">
                        <?php echo htmlspecialchars(Flux::message('AccountEmailLabel2')) ?>
                    </label>
                    <input type="email" name="email_address2" id="register_email_address2"
                        value="<?php echo htmlspecialchars($params->get('email_address2') ?: '') ?>" class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-sm
                                          focus:ring-1 focus:ring-green-500 focus:border-green-500">
                </div>
            </div>

            <!-- Gender and Birthdate -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-200">
                        <?php echo htmlspecialchars(Flux::message('AccountGenderLabel')) ?>
                    </label>
                    <div class="flex gap-4 items-center">
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" id="register_gender_m" value="M" <?php if ($params->get('gender') === 'M')
                                echo ' checked="checked"' ?>
                                    class="h-4 w-4 border-gray-700 bg-gray-800 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-200"><?php echo $this->genderText('M') ?></span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" id="register_gender_f" value="F" <?php if ($params->get('gender') === 'F')
                                echo ' checked="checked"' ?>
                                    class="h-4 w-4 border-gray-700 bg-gray-800 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-200"><?php echo $this->genderText('F') ?></span>
                        </label>
                        <span class="text-gray-400 cursor-help"
                            title="<?php echo htmlspecialchars(Flux::message('AccountCreateGenderInfo')) ?>">?</span>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-200">
                        <?php echo htmlspecialchars(Flux::message('AccountBirthdateLabel')) ?>
                    </label>
                    <div class="mt-1">
                        <?php echo $this->dateField('birthdate', null, 0) ?>
                    </div>
                </div>
            </div>

            <!-- Security Code -->
            <?php if (Flux::config('UseCaptcha')): ?>
                <div class="bg-gray-800/50 p-4 rounded-lg">
                    <?php if (Flux::config('ReCaptchaPublicKey') === '...' || Flux::config('ReCaptchaPrivateKey') === '...'): ?>
                        <div class="text-red-400"><?php echo htmlspecialchars(Flux::message('AccountRecaptchaKey')) ?></div>
                    <?php else: ?>
                        <?php if (Flux::config('EnableReCaptcha')): ?>
                            <div class="g-recaptcha" data-theme="dark" data-sitekey="<?php echo $recaptcha ?>"></div>
                        <?php else: ?>
                            <div class="flex gap-4 items-center flex lg:flex-row flex-col">
                                <div class="flex-shrink-0">
                                    <div class="security-code bg-gray-900/75 p-3 rounded-lg border border-gray-700 shadow-sm w-full lg:w-auto">
                                        <img src="<?php echo $this->url('captcha') ?>" alt="Security Code" class="h-20 w-full lg:w-auto" />
                                    </div>
                                </div>
                                <div class="flex-grow space-y-2 w-full lg:w-auto">
                                    <div class="relative">
                                        <input type="text" name="security_code" id="register_security_code"
                                            placeholder="Enter security code" class="w-full bg-gray-900/75 border border-gray-700 rounded-md pl-3 pr-10 py-2 text-sm text-gray-200
                                   placeholder-gray-500 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
                                            <a href="javascript:refreshSecurityCode('.security-code img')"
                                                class="text-gray-400 hover:text-indigo-400 transition-colors p-1"
                                                title="Refresh Code">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-400">Enter the code shown in the image above</p>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <!-- Submit Button -->
            <div class="pt-4">
                <div class="text-sm text-gray-400 mb-4">
                    <?php printf(
                        htmlspecialchars(Flux::message('AccountCreateInfo2')),
                        '<a href="' . $this->url('service', 'tos') . '" class="text-green-400 hover:text-green-300">' .
                        Flux::message('AccountCreateTerms') . '</a>'
                    ) ?>
                </div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm branding-green-button focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <?php echo htmlspecialchars(Flux::message('AccountCreateButton')) ?>
                </button>
            </div>
        </form>
    </div>
</div>