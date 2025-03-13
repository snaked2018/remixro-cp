<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
                <?php echo htmlspecialchars(Flux::message('LoginHeading')) ?>
            </h2>
            
            <?php if (isset($errorMessage)): ?>
            <div class="mt-2 rounded-md bg-red-500 bg-opacity-10 p-4">
                <p class="text-sm text-red-400"><?php echo htmlspecialchars($errorMessage) ?></p>
            </div>
            <?php endif ?>

            <?php if ($auth->actionAllowed('account', 'create')): ?>
            <p class="mt-2 text-center text-sm text-gray-400">
                <?php printf(Flux::message('LoginPageMakeAccount'), $this->url('account', 'create')); ?>
            </p>
            <?php endif ?>
        </div>

        <!-- Form -->
        <form class="mt-8 space-y-6" action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="post">
            <?php if (isset($_SESSION['csrf_token'])): ?>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <?php endif; ?>
            
            <?php if (count($serverNames) === 1): ?>
            <input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
            <?php endif ?>

            <div class="rounded-md shadow-sm -space-y-px flex flex-col gap-1">
                <!-- Username -->
                <div>
                    <label for="login_username" class="sr-only"><?php echo htmlspecialchars(Flux::message('AccountUsernameLabel')) ?></label>
                    <input type="text" name="username" id="login_username" 
                           value="<?php echo htmlspecialchars($params->get('username') ?: '') ?>"
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-700 placeholder-gray-500 bg-gray-800 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Username">
                </div>

                <!-- Password -->
                <div>
                    <label for="login_password" class="sr-only"><?php echo htmlspecialchars(Flux::message('AccountPasswordLabel')) ?></label>
                    <input type="password" name="password" id="login_password"
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-700 placeholder-gray-500 bg-gray-800 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Password">
                </div>
            </div>

            <?php if (count($serverNames) > 1): ?>
            <!-- Server Selection -->
            <div>
                <select name="server" id="login_server" 
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md text-white bg-gray-800">
                    <?php foreach ($serverNames as $serverName): ?>
                    <option value="<?php echo htmlspecialchars($serverName) ?>"><?php echo htmlspecialchars($serverName) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <?php endif ?>

            <?php if (Flux::config('UseLoginCaptcha')): ?>
            <!-- Captcha -->
            <div class="rounded-md bg-gray-800 p-4">
                <?php if (Flux::config('EnableReCaptcha')): ?>
                <div class="g-recaptcha" data-theme="dark" data-sitekey="<?php echo $recaptcha ?>"></div>
                <?php else: ?>
                <div class="space-y-4">
                    <div class="security-code bg-gray-700 p-2 rounded">
                        <img src="<?php echo $this->url('captcha') ?>" class="mx-auto" />
                    </div>
                    <input type="text" name="security_code" id="register_security_code"
                           class="appearance-none relative block w-full px-3 py-2 border border-gray-700 placeholder-gray-500 text-white bg-gray-800 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Security Code">
                    <div class="text-sm">
                        <a href="javascript:refreshSecurityCode('.security-code img')" 
                           class="font-medium text-indigo-400 hover:text-indigo-300">
                            <?php echo htmlspecialchars(Flux::message('RefreshSecurityCode')) ?>
                        </a>
                    </div>
                </div>
                <?php endif ?>
            </div>
            <?php endif ?>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md branding-green-button focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <?php echo htmlspecialchars(Flux::message('LoginButton')) ?>
                </button>
            </div>
        </form>
    </div>
</div>
