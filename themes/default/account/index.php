<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-white text-center">
                <?php echo htmlspecialchars(Flux::message('AccountIndexHeading')) ?>
            </h2>
        </div>

        <!-- Search Toggle -->
        <div class="mb-6">
            <button type="button" onclick="toggleSearchForm()" 
                    class="inline-flex items-center text-sm text-gray-400 hover:text-white transition-colors">
                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <?php echo htmlspecialchars(Flux::message('SearchLabel')) ?>
            </button>
        </div>

        <!-- Search Form -->
        <form action="<?php echo $this->url ?>" method="get" class="search-form">
            <?php echo $this->moduleActionFormInputs($params->get('module')) ?>
            <div class="bg-gray-900 rounded-lg shadow-lg border border-gray-700 p-6 space-y-6">
                <!-- Basic Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Account ID -->
                    <div>
                        <label for="account_id" class="block text-sm font-medium text-gray-400 mb-1">
                            <?php echo htmlspecialchars(Flux::message('AccountIdLabel')) ?>
                        </label>
                        <input type="text" name="account_id" id="account_id" 
                               value="<?php echo htmlspecialchars($params->get('account_id') ?: '') ?>"
                               class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                      focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>

                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-400 mb-1">
                            <?php echo htmlspecialchars(Flux::message('UsernameLabel')) ?>
                        </label>
                        <input type="text" name="username" id="username" 
                               value="<?php echo htmlspecialchars($params->get('username') ?: '') ?>"
                               class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                      focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>

                    <!-- Gender -->
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-400 mb-1">
                            <?php echo htmlspecialchars(Flux::message('GenderLabel')) ?>
                        </label>
                        <select name="gender" id="gender"
                                class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                       focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value=""<?php if (!in_array($gender=$params->get('gender'), array('M', 'F'))) echo ' selected="selected"' ?>>
                                <?php echo htmlspecialchars(Flux::message('AllLabel')) ?>
                            </option>
                            <option value="M"<?php if ($gender == 'M') echo ' selected="selected"' ?>>
                                <?php echo $this->genderText('M') ?>
                            </option>
                            <option value="F"<?php if ($gender == 'F') echo ' selected="selected"' ?>>
                                <?php echo $this->genderText('F') ?>
                            </option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Account State -->
                    <div>
                        <label for="account_state" class="block text-sm font-medium text-gray-400 mb-1">
                            <?php echo htmlspecialchars(Flux::message('AccountStateLabel')) ?>
                        </label>
                        <select name="account_state" id="account_state"
                                class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                       focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value=""<?php if (!($account_state=$params->get('account_state'))) echo ' selected="selected"' ?>>
                                <?php echo htmlspecialchars(Flux::message('AllLabel')) ?>
                            </option>
                            <option value="normal"<?php if ($account_state == 'normal') echo ' selected="selected"' ?>>
                                <?php echo htmlspecialchars(Flux::message('AccountStateNormal')) ?>
                            </option>
                            <option value="pending"<?php if ($account_state == 'pending') echo ' selected="selected"' ?>>
                                <?php echo htmlspecialchars(Flux::message('AccountStatePending')) ?>
                            </option>
                            <option value="banned"<?php if ($account_state == 'banned') echo ' selected="selected"' ?>>
                                <?php echo htmlspecialchars(Flux::message('AccountStateTempBanLbl')) ?>
                            </option>
                            <option value="permabanned"<?php if ($account_state == 'permabanned') echo ' selected="selected"' ?>>
                                <?php echo htmlspecialchars(Flux::message('AccountStatePermBanned')) ?>
                            </option>
                        </select>
                    </div>

                    <!-- Account Group ID -->
                    <div>
                        <label for="account_group_id" class="block text-sm font-medium text-gray-400 mb-1">
                            <?php echo htmlspecialchars(Flux::message('AccountGroupIDLabel')) ?>
                        </label>
                        <div class="flex space-x-2">
                            <select name="account_group_id_op"
                                    class="w-1/3 bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                           focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="eq"<?php if (($account_group_id_op=$params->get('account_group_id_op')) == 'eq') echo ' selected="selected"' ?>>
                                    <?php echo htmlspecialchars(Flux::message('IsEqualToLabel')) ?>
                                </option>
                                <option value="gt"<?php if ($account_group_id_op == 'gt') echo ' selected="selected"' ?>>
                                    <?php echo htmlspecialchars(Flux::message('IsGreaterThanLabel')) ?>
                                </option>
                                <option value="lt"<?php if ($account_group_id_op == 'lt') echo ' selected="selected"' ?>>
                                    <?php echo htmlspecialchars(Flux::message('IsLessThanLabel')) ?>
                                </option>
                            </select>
                            <input type="text" name="account_group_id" id="account_group_id" 
                                   value="<?php echo htmlspecialchars($params->get('account_group_id') ?: '') ?>"
                                   class="w-2/3 bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                          focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <!-- Balance -->
                    <div>
                        <label for="balance" class="block text-sm font-medium text-gray-400 mb-1">
                            <?php echo htmlspecialchars(Flux::message('CreditBalanceLabel')) ?>
                        </label>
                        <div class="flex space-x-2">
                            <select name="balance_op"
                                    class="w-1/3 bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                           focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="eq"<?php if (($balance_op=$params->get('balance_op')) == 'eq') echo ' selected="selected"' ?>>
                                    <?php echo htmlspecialchars(Flux::message('IsEqualToLabel')) ?>
                                </option>
                                <option value="gt"<?php if ($balance_op == 'gt') echo ' selected="selected"' ?>>
                                    <?php echo htmlspecialchars(Flux::message('IsGreaterThanLabel')) ?>
                                </option>
                                <option value="lt"<?php if ($balance_op == 'lt') echo ' selected="selected"' ?>>
                                    <?php echo htmlspecialchars(Flux::message('IsLessThanLabel')) ?>
                                </option>
                            </select>
                            <input type="text" name="balance" id="balance" 
                                   value="<?php echo htmlspecialchars($params->get('balance') ?: '') ?>"
                                   class="w-2/3 bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                          focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Login Count -->
                    <div>
                        <label for="logincount" class="block text-sm font-medium text-gray-400 mb-1">
                            <?php echo htmlspecialchars(Flux::message('LoginCountLabel')) ?>
                        </label>
                        <div class="flex space-x-2">
                            <select name="logincount_op"
                                    class="w-1/3 bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                           focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="eq"<?php if (($logincount_op=$params->get('logincount_op')) == 'eq') echo ' selected="selected"' ?>>
                                    <?php echo htmlspecialchars(Flux::message('IsEqualToLabel')) ?>
                                </option>
                                <option value="gt"<?php if ($logincount_op == 'gt') echo ' selected="selected"' ?>>
                                    <?php echo htmlspecialchars(Flux::message('IsGreaterThanLabel')) ?>
                                </option>
                                <option value="lt"<?php if ($logincount_op == 'lt') echo ' selected="selected"' ?>>
                                    <?php echo htmlspecialchars(Flux::message('IsLessThanLabel')) ?>
                                </option>
                            </select>
                            <input type="text" name="logincount" id="logincount" 
                                   value="<?php echo htmlspecialchars($params->get('logincount') ?: '') ?>"
                                   class="w-2/3 bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
                                          focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <!-- Last Login Date Range -->
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-300 mb-3">
                            <?php echo htmlspecialchars(Flux::message('LoginBetweenLabel')) ?>
                        </label>

                        <!-- From Date -->
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <div class="flex items-center">
                                <input type="checkbox" name="use_last_login_after" id="use_last_login_after"
                                       class="w-4 h-4 rounded border-gray-600 bg-gray-700 text-indigo-500 
                                              focus:ring-indigo-500 focus:ring-offset-0 focus:ring-offset-gray-800"
                                       <?php if ($params->get('use_last_login_after')) echo ' checked="checked"' ?> />
                                <label for="use_last_login_after" class="ml-2 text-sm text-gray-400">From</label>
                            </div>
                            <div class="flex-1 min-w-[200px]">
                                <div class="relative">
                                    <select name="last_login_after_year" 
                                            class="appearance-none w-full bg-gray-700 border border-gray-600 text-white py-2 pl-3 pr-8 rounded-md text-sm
                                                   focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                        <?php for($i = date('Y'); $i >= 2000; $i--): ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <div class="relative flex-1">
                                        <select name="last_login_after_month" 
                                                class="appearance-none w-full bg-gray-700 border border-gray-600 text-white py-2 pl-3 pr-8 rounded-md text-sm
                                                       focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                            <?php for($i = 1; $i <= 12; $i++): ?>
                                                <option value="<?php echo sprintf('%02d', $i) ?>"><?php echo sprintf('%02d', $i) ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="relative flex-1">
                                        <select name="last_login_after_day" 
                                                class="appearance-none w-full bg-gray-700 border border-gray-600 text-white py-2 pl-3 pr-8 rounded-md text-sm
                                                       focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                            <?php for($i = 1; $i <= 31; $i++): ?>
                                                <option value="<?php echo sprintf('%02d', $i) ?>"><?php echo sprintf('%02d', $i) ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- To Date -->
                        <div class="flex flex-wrap items-center gap-3">
                            <div class="flex items-center">
                                <input type="checkbox" name="use_last_login_before" id="use_last_login_before"
                                       class="w-4 h-4 rounded border-gray-600 bg-gray-700 text-indigo-500 
                                              focus:ring-indigo-500 focus:ring-offset-0 focus:ring-offset-gray-800"
                                       <?php if ($params->get('use_last_login_before')) echo ' checked="checked"' ?> />
                                <label for="use_last_login_before" class="ml-2 text-sm text-gray-400">To</label>
                            </div>
                            <div class="flex-1 min-w-[200px]">
                                <div class="relative">
                                    <select name="last_login_before_year" 
                                            class="appearance-none w-full bg-gray-700 border border-gray-600 text-white py-2 pl-3 pr-8 rounded-md text-sm
                                                   focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                        <?php for($i = date('Y'); $i >= 2000; $i--): ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <div class="relative flex-1">
                                        <select name="last_login_before_month" 
                                                class="appearance-none w-full bg-gray-700 border border-gray-600 text-white py-2 pl-3 pr-8 rounded-md text-sm
                                                       focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                            <?php for($i = 1; $i <= 12; $i++): ?>
                                                <option value="<?php echo sprintf('%02d', $i) ?>"><?php echo sprintf('%02d', $i) ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="relative flex-1">
                                        <select name="last_login_before_day" 
                                                class="appearance-none w-full bg-gray-700 border border-gray-600 text-white py-2 pl-3 pr-8 rounded-md text-sm
                                                       focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                            <?php for($i = 1; $i <= 31; $i++): ?>
                                                <option value="<?php echo sprintf('%02d', $i) ?>"><?php echo sprintf('%02d', $i) ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end space-x-4">
                    <input type="submit" value="<?php echo htmlspecialchars(Flux::message('SearchButton')) ?>"
                           class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md
                                  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" />
                    <input type="button" value="<?php echo htmlspecialchars(Flux::message('ResetButton')) ?>" 
                           onclick="reload()"
                           class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md
                                  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" />
                </div>
            </div>
        </form>

        <!-- Accounts Table -->
        <?php if ($accounts): ?>
        <div class="mt-8">
            <?php echo $paginator->infoText() ?>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-gray-900 text-white rounded-lg shadow-lg">
                    <thead>
                        <tr>
                            <th class="px-4 py-2"><?php echo $paginator->sortableColumn('login.account_id', Flux::message('AccountIdLabel')) ?></th>
                            <th class="px-4 py-2"><?php echo $paginator->sortableColumn('login.userid', Flux::message('UsernameLabel')) ?></th>
                            <?php if ($showPassword): ?><th class="px-4 py-2"><?php echo $paginator->sortableColumn('login.user_pass', Flux::message('PasswordLabel')) ?></th><?php endif ?>
                            <th class="px-4 py-2"><?php echo $paginator->sortableColumn('login.sex', Flux::message('GenderLabel')) ?></th>
                            <th class="px-4 py-2"><?php echo $paginator->sortableColumn('group_id', Flux::message('AccountGroupIDLabel')) ?></th>
                            <th class="px-4 py-2"><?php echo $paginator->sortableColumn('state', Flux::message('AccountStateLabel')) ?></th>
                            <th class="px-4 py-2"><?php echo $paginator->sortableColumn('balance', Flux::message('CreditBalanceLabel')) ?></th>
                            <th class="px-4 py-2"><?php echo $paginator->sortableColumn('login.email', Flux::message('EmailAddressLabel')) ?></th>
                            <th class="px-4 py-2"><?php echo $paginator->sortableColumn('logincount', Flux::message('LoginCountLabel')) ?></th>
                            <th class="px-4 py-2"><?php echo $paginator->sortableColumn('birthdate', Flux::message('AccountBirthdateLabel')) ?></th>
                            <th class="px-4 py-2"><?php echo $paginator->sortableColumn('lastlogin', Flux::message('LastLoginDateLabel')) ?></th>
                            <th class="px-4 py-2"><?php echo $paginator->sortableColumn('last_ip', Flux::message('LastUsedIpLabel')) ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($accounts as $account): ?>
                        <tr class="border-t border-gray-700">
                            <td class="px-4 py-2 text-right">
                                <?php if ($auth->actionAllowed('account', 'view') && $auth->allowedToViewAccount): ?>
                                    <?php echo $this->linkToAccount($account->account_id, $account->account_id) ?>
                                <?php else: ?>
                                    <?php echo htmlspecialchars($account->account_id) ?>
                                <?php endif ?>
                            </td>
                            <td class="px-4 py-2"><?php echo htmlspecialchars($account->userid) ?></td>
                            <?php if ($showPassword): ?><td class="px-4 py-2"><?php echo htmlspecialchars($account->user_pass) ?></td><?php endif ?>
                            <td class="px-4 py-2">
                                <?php if ($gender = $this->genderText($account->sex)): ?>
                                    <?php echo htmlspecialchars($gender) ?>
                                <?php else: ?>
                                    <span class="not-applicable"><?php echo htmlspecialchars(Flux::message('UnknownLabel')) ?></span>
                                <?php endif ?>
                            </td>
                            <td class="px-4 py-2"><?php echo (int)$account->group_id ?></td>
                            <td class="px-4 py-2">
                                <?php if (!$account->confirmed && $account->confirm_code): ?>
                                    <span class="account-state state-pending">
                                        <?php echo htmlspecialchars(Flux::message('AccountStatePending')) ?>
                                    </span>
                                <?php elseif (($state = $this->accountStateText($account->state)) && !$account->unban_time): ?>
                                    <?php echo $state ?>
                                <?php elseif ($account->unban_time): ?>
                                    <span class="account-state state-banned">
                                        <?php echo htmlspecialchars(sprintf(Flux::message('AccountStateTempBanned'), date(Flux::config('DateTimeFormat'), $account->unban_time))) ?>
                                    </span>
                                <?php else: ?>
                                    <span class="account-state state-unknown"><?php echo htmlspecialchars(Flux::message('UnknownLabel')) ?></span>
                                <?php endif ?>
                            </td>
                            <td class="px-4 py-2"><?php echo number_format((int)$account->balance) ?></td>
                            <td class="px-4 py-2">
                                <?php if ($account->email): ?>
                                    <?php echo $this->linkToAccountSearch(array('email' => $account->email), $account->email) ?>
                                <?php else: ?>
                                    <span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
                                <?php endif ?>
                            </td>
                            <td class="px-4 py-2"><?php echo number_format((int)$account->logincount) ?></td>
                            <td class="px-4 py-2"><?php echo $account->birthdate ?></td>
                            <td class="px-4 py-2">
                                <?php if (!$account->lastlogin || $account->lastlogin <= '1000-01-01 00:00:00'): ?>
                                    <span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NeverLabel')) ?></span>
                                <?php else: ?>
                                    <?php echo $this->formatDateTime($account->lastlogin) ?>
                                <?php endif ?>
                            </td>
                            <td class="px-4 py-2">
                                <?php if ($account->last_ip): ?>
                                    <?php echo $this->linkToAccountSearch(array('last_ip' => $account->last_ip), $account->last_ip) ?>
                                <?php else: ?>
                                    <span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
                                <?php endif ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php echo $paginator->getHTML() ?>
        </div>
        <?php else: ?>
        <p class="mt-8 text-center text-gray-400">
            <?php echo htmlspecialchars(Flux::message('AccountIndexNotFound')) ?>
            <a href="javascript:history.go(-1)" class="text-indigo-500 hover:underline"><?php echo htmlspecialchars(Flux::message('GoBackLabel')) ?></a>
        </p>
        <?php endif ?>
    </div>
</div>
