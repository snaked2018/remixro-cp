<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="min-h-screen bg-black py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-white text-center">
                <?php echo htmlspecialchars(Flux::message('AccountViewHeading')) ?>
            </h2>
        </div>

        <?php if (!empty($errorMessage)): ?>
            <div class="bg-red-900/50 border border-red-500/50 text-red-200 px-4 py-3 rounded-lg mb-6">
                <?php echo htmlspecialchars($errorMessage) ?>
            </div>
        <?php endif ?>

        <?php if ($account): ?>
            <?php if (Flux::config('PincodeEnabled') && $session->account->pincode == NULL): ?>
                <div class="bg-yellow-900/50 border border-yellow-500/50 text-yellow-200 px-4 py-3 rounded-lg mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm">There is no pincode set! Please login via the game client now to secure your account.</p>
                        </div>
                    </div>
                </div>
            <?php endif ?>

            <!-- Account Information -->
            <div class="bg-gray-900 rounded-lg shadow-xl border border-gray-700 overflow-hidden">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-700">
                    <h3 class="text-lg font-medium text-white">Account Details</h3>
                    <p class="mt-1 text-sm text-gray-400">Personal information and account settings.</p>
                </div>
                
                <div class="divide-y divide-gray-700">
                    <!-- Username & Account ID -->
                    <div class="px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 hover:bg-gray-800/50">
                        <div class="text-sm font-medium text-gray-400">
                            <?php echo htmlspecialchars(Flux::message('UsernameLabel')) ?>
                        </div>
                        <div class="mt-1 text-sm text-white sm:col-span-2 sm:mt-0">
                            <?php echo htmlspecialchars($account->userid) ?>
                        </div>
                        <div class="mt-1 text-sm text-gray-400 sm:mt-0">
                            ID: <?php if ($auth->allowedToSeeAccountID): ?>
                                <span class="text-white"><?php echo $account->account_id ?></span>
                            <?php else: ?>
                                <span class="text-gray-500"><?php echo htmlspecialchars(Flux::message('NotApplicableLabel')) ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- Email & Account Group ID -->
                    <div class="px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 hover:bg-gray-800/50">
                        <div class="text-sm font-medium text-gray-400">
                            <?php echo htmlspecialchars(Flux::message('EmailAddressLabel')) ?>
                        </div>
                        <div class="mt-1 text-sm text-white sm:col-span-2 sm:mt-0">
                            <?php if ($account->email): ?>
                                <?php if ($auth->actionAllowed('account', 'index')): ?>
                                    <?php echo $this->linkToAccountSearch(array('email' => $account->email), $account->email) ?>
                                <?php else: ?>
                                    <?php echo htmlspecialchars($account->email) ?>
                                <?php endif ?>
                            <?php else: ?>
                                <span class="text-gray-500"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
                            <?php endif ?>
                        </div>
                        <div class="mt-1 text-sm text-gray-400 sm:mt-0">
                            <?php echo htmlspecialchars(Flux::message('AccountGroupIDLabel')) ?>
                            <span class="text-white"><?php echo (int)$account->group_id ?></span>
                        </div>
                    </div>
                    <!-- Gender & Account State -->
                    <div class="px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 hover:bg-gray-800/50">
                        <div class="text-sm font-medium text-gray-400">
                            <?php echo htmlspecialchars(Flux::message('GenderLabel')) ?>
                        </div>
                        <div class="mt-1 text-sm text-white sm:col-span-2 sm:mt-0">
                            <?php if ($gender = $this->genderText($account->sex)): ?>
                                <?php echo $gender ?>
                            <?php else: ?>
                                <span class="text-gray-500"><?php echo htmlspecialchars(Flux::message('UnknownLabel')) ?></span>
                            <?php endif ?>
                        </div>
                        <div class="mt-1 text-sm text-gray-400 sm:mt-0">
                            <?php echo htmlspecialchars(Flux::message('AccountStateLabel')) ?>
                            <?php if (!$account->confirmed && $account->confirm_code): ?>
                                <span class="text-yellow-400"><?php echo htmlspecialchars(Flux::message('AccountStatePending')) ?></span>
                            <?php elseif (($state = $this->accountStateText($account->state)) && !$account->unban_time): ?>
                                <span class="text-white"><?php echo $state ?></span>
                            <?php elseif ($account->unban_time): ?>
                                <span class="text-red-400"><?php printf(htmlspecialchars(Flux::message('AccountStateTempBanned')), date(Flux::config('DateTimeFormat'), $account->unban_time)) ?></span>
                            <?php else: ?>
                                <span class="text-gray-500"><?php echo htmlspecialchars(Flux::message('UnknownLabel')) ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- Login Count & Credit Balance -->
                    <div class="px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 hover:bg-gray-800/50">
                        <div class="text-sm font-medium text-gray-400">
                            <?php echo htmlspecialchars(Flux::message('LoginCountLabel')) ?>
                        </div>
                        <div class="mt-1 text-sm text-white sm:col-span-2 sm:mt-0">
                            <?php echo number_format((int)$account->logincount) ?>
                        </div>
                        <div class="mt-1 text-sm text-gray-400 sm:mt-0">
                            <?php echo htmlspecialchars(Flux::message('CreditBalanceLabel')) ?>
                            <span class="text-white"><?php echo number_format((int)$account->balance) ?></span>
                            <?php if ($auth->allowedToDonate && $isMine): ?>
                                <a href="<?php echo $this->url('donate') ?>" class="text-blue-400 hover:underline"><?php echo htmlspecialchars(Flux::message('AccountViewDonateLink')) ?></a>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- Birthdate & VIP State -->
                    <div class="px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 hover:bg-gray-800/50">
                        <div class="text-sm font-medium text-gray-400">
                            <?php echo htmlspecialchars(Flux::message('AccountBirthdateLabel')) ?>
                        </div>
                        <div class="mt-1 text-sm text-white sm:col-span-2 sm:mt-0">
                            <?php echo $account->birthdate ?>
                        </div>
                        <div class="mt-1 text-sm text-gray-400 sm:mt-0">
                            <?php echo htmlspecialchars(Flux::message('VIPStateLabel')) ?>
                            <span class="text-white"><?php echo $vipexpires ?></span>
                        </div>
                    </div>
                    <!-- Last Login Date -->
                    <div class="px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 hover:bg-gray-800/50">
                        <div class="text-sm font-medium text-gray-400">
                            <?php echo htmlspecialchars(Flux::message('LastLoginDateLabel')) ?>
                        </div>
                        <div class="mt-1 text-sm text-white sm:col-span-3 sm:mt-0">
                            <?php if (!$account->lastlogin || $account->lastlogin <= '1000-01-01 00:00:00'): ?>
                                <span class="text-gray-500"><?php echo htmlspecialchars(Flux::message('NeverLabel')) ?></span>
                            <?php else: ?>
                                <?php echo $this->formatDateTime($account->lastlogin) ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- Last Used IP -->
                    <div class="px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 hover:bg-gray-800/50">
                        <div class="text-sm font-medium text-gray-400">
                            <?php echo htmlspecialchars(Flux::message('LastUsedIpLabel')) ?>
                        </div>
                        <div class="mt-1 text-sm text-white sm:col-span-3 sm:mt-0">
                            <?php if ($account->last_ip): ?>
                                <?php if ($auth->actionAllowed('account', 'index')): ?>
                                    <?php echo $this->linkToAccountSearch(array('last_ip' => $account->last_ip), $account->last_ip) ?>
                                <?php else: ?>
                                    <?php echo htmlspecialchars($account->last_ip) ?>
                                <?php endif ?>
                            <?php else: ?>
                                <span class="text-gray-500"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- Temporary Ban -->
                    <?php $banconfirm=htmlspecialchars(str_replace("'", "\\'", Flux::message('AccountBanConfirm'))) ?>
                    <?php if ($showTempBan): ?>
                        <div class="px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 hover:bg-gray-800/50">
                            <div class="text-sm font-medium text-gray-400">
                                <?php echo htmlspecialchars(Flux::message('AccountViewTempBanLabel')) ?>
                            </div>
                            <div class="mt-1 text-sm text-white sm:col-span-3 sm:mt-0">
                                <form action="<?php echo $this->urlWithQs ?>" method="post">
                                    <input type="hidden" name="tempban" value="1" />
                                    <label><?php echo htmlspecialchars(Flux::message('AccountBanReasonLabel')) ?><br /><textarea name="reason" class="block reason"></textarea></label>
                                    <label><?php echo htmlspecialchars(Flux::message('AccountBanUntilLabel')) ?></label>
                                    <?php echo $this->dateTimeField('tempban', date('H:i:s')); ?>
                                    <input type="submit" value="<?php echo htmlspecialchars(Flux::message('AccountTempBanButton')) ?>"
                                        onclick="return confirm('<?php echo $banconfirm ?>')" />
                                </form>
                            </div>
                        </div>
                    <?php endif ?>
                    <!-- Permanent Ban -->
                    <?php if ($showPermBan): ?>
                        <div class="px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 hover:bg-gray-800/50">
                            <div class="text-sm font-medium text-gray-400">
                                <?php echo htmlspecialchars(Flux::message('AccountViewPermBanLabel')) ?>
                            </div>
                            <div class="mt-1 text-sm text-white sm:col-span-3 sm:mt-0">
                                <form action="<?php echo $this->urlWithQs ?>" method="post">
                                    <input type="hidden" name="permban" value="1" />
                                    <label><?php echo htmlspecialchars(Flux::message('AccountBanReasonLabel')) ?><br /><textarea name="reason" class="block reason"></textarea></label>
                                    <input type="submit" value="<?php echo htmlspecialchars(Flux::message('AccountPermBanButton')) ?>"
                                        onclick="return confirm('<?php echo $banconfirm ?>')" />
                                </form>
                            </div>
                        </div>
                    <?php endif ?>
                    <!-- Unban -->
                    <?php if ($showUnban): ?>
                        <div class="px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6 hover:bg-gray-800/50">
                            <div class="text-sm font-medium text-gray-400">
                                <?php echo htmlspecialchars(Flux::message('AccountViewUnbanLabel')) ?>
                            </div>
                            <div class="mt-1 text-sm text-white sm:col-span-3 sm:mt-0">
                                <form action="<?php echo $this->urlWithQs ?>" method="post">
                                    <input type="hidden" name="unban" value="1" />
                                    <?php if ($tempBanned && $auth->allowedToTempUnbanAccount): ?>
                                        <label><?php echo htmlspecialchars(Flux::message('AccountBanReasonLabel')) ?><br /><textarea name="reason" class="block reason"></textarea></label>
                                        <input type="submit" value="<?php echo htmlspecialchars(Flux::message('AccountTempUnbanButton')) ?>" />
                                    <?php elseif ($permBanned && $auth->allowedToPermUnbanAccount): ?>
                                        <label><?php echo htmlspecialchars(Flux::message('AccountBanReasonLabel')) ?><br /><textarea name="reason" class="block reason"></textarea></label>
                                        <input type="submit" value="<?php echo htmlspecialchars(Flux::message('AccountPermUnbanButton')) ?>" />
                                    <?php endif ?>
                                </form>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        <?php endif ?>

        <?php if ($auth->allowedToViewAccountBanLog && $banInfo): ?>
            <h3 class="text-lg font-medium text-white mt-8"><?php echo htmlspecialchars(sprintf(Flux::message('AccountBanLogSubHeading'), $account->userid)) ?></h3>
            <div class="bg-gray-900 rounded-lg shadow-xl border border-gray-700 overflow-hidden mt-4">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('BanLogBanTypeLabel')) ?></th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('BanLogBanDateLabel')) ?></th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('BanLogBanReasonLabel')) ?></th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('BanLogBannedByLabel')) ?></th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900 divide-y divide-gray-700">
                        <?php foreach ($banInfo as $ban): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><?php echo htmlspecialchars($this->banTypeText($ban->ban_type)) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><?php echo htmlspecialchars($this->formatDateTime($ban->ban_date)) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><?php echo nl2br(htmlspecialchars($ban->ban_reason)) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                    <?php if ($ban->userid): ?>
                                        <?php if ($auth->allowedToViewAccount): ?>
                                            <?php echo $this->linkToAccount($ban->banned_by, $ban->userid) ?>
                                        <?php else: ?>
                                            <?php echo htmlspecialchars($ban->userid) ?>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <strong><?php echo htmlspecialchars(Flux::message('BanLogBannedByCP')) ?></strong>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <?php endif ?>

        <?php foreach ($characters as $serverName => $chars): $zeny = 0; ?>
            <h3 class="text-lg font-medium text-white mt-8"><?php echo htmlspecialchars(sprintf(Flux::message('AccountViewCharSubHead'), $serverName)) ?></h3>
            <?php if ($chars): ?>
                <div class="bg-gray-900 rounded-lg shadow-xl border border-gray-700 overflow-hidden mt-4">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('AccountViewSlotLabel')) ?></th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('AccountViewCharLabel')) ?></th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('AccountViewClassLabel')) ?></th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('AccountViewLvlLabel')) ?></th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('AccountViewJlvlLabel')) ?></th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('AccountViewZenyLabel')) ?></th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider" colspan="2"><?php echo htmlspecialchars(Flux::message('AccountViewGuildLabel')) ?></th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('AccountViewStatusLabel')) ?></th>
                                <?php if (($isMine || $auth->allowedToModifyCharPrefs) && $auth->actionAllowed('character', 'prefs')): ?>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('AccountViewPrefsLabel')) ?></th>
                                <?php endif ?>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('ResetLook')) ?></th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('ResetMap')) ?></th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-900 divide-y divide-gray-700">
                            <?php foreach ($chars as $char): $zeny += $char->zeny; ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><?php echo $char->char_num+1 ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        <?php if ($auth->actionAllowed('character', 'view') && ($isMine || (!$isMine && $auth->allowedToViewCharacter))): ?>
                                            <?php echo $this->linkToCharacter($char->char_id, $char->name, $serverName) ?>
                                        <?php else: ?>
                                            <?php echo htmlspecialchars($char->name) ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><?php echo htmlspecialchars($this->jobClassText($char->class)) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><?php echo (int)$char->base_level ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><?php echo (int)$char->job_level ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><?php echo number_format((int)$char->zeny) ?></td>
                                    <?php if ($char->guild_name): ?>
                                        <?php if ($char->emblem): ?>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><img src="<?php echo $this->emblem($char->guild_id) ?>" /></td>
                                        <?php endif ?>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"<?php if (!$char->emblem) echo ' colspan="2"' ?>>
                                            <?php if ($auth->actionAllowed('guild', 'view')): ?>
                                                <?php echo $this->linkToGuild($char->guild_id, $char->guild_name) ?>
                                            <?php else: ?>
                                                <?php echo htmlspecialchars($char->guild_name) ?>
                                            <?php endif ?>
                                        </td>
                                    <?php else: ?>    
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400" colspan="2" align="center"><span class="text-gray-500"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span></td>
                                    <?php endif ?>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        <?php if ($char->online): ?>
                                            <span class="text-green-400"><?php echo htmlspecialchars(Flux::message('OnlineLabel')) ?></span>
                                        <?php else: ?>
                                            <span class="text-red-400"><?php echo htmlspecialchars(Flux::message('OfflineLabel')) ?></span>
                                        <?php endif ?>
                                    </td>
                                    <?php if (($isMine || $auth->allowedToModifyCharPrefs) && $auth->actionAllowed('character', 'prefs')): ?>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                            <a href="<?php echo $this->url('character', 'prefs', array('id' => $char->char_id)) ?>" class="text-blue-400 hover:underline">
                                                <?php echo htmlspecialchars(Flux::message('CharModifyPrefsLink')) ?>
                                            </a>
                                        </td>
                                    <?php endif ?>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        <a href="<?php echo $this->url('character', 'resetlook', array('id' => $char->char_id)) ?>" class="text-blue-400 hover:underline">
                                            <?php echo htmlspecialchars(Flux::message('Reset Look')) ?>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        <a href="<?php echo $this->url('character', 'resetpos', array('id' => $char->char_id)) ?>" class="text-blue-400 hover:underline">
                                            <?php echo htmlspecialchars(Flux::message('Reset Position')) ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="px-4 py-4 sm:px-6">
                        <p class="text-sm text-gray-400">Total Zeny: <strong class="text-white"><?php echo number_format($zeny) ?></strong></p>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-sm text-gray-400 mt-4"><?php echo htmlspecialchars(sprintf(Flux::message('AccountViewNoChars'), $serverName)) ?></p>
            <?php endif ?>
        <?php endforeach ?>

        <h3 class="text-lg font-medium text-white mt-8"><?php echo htmlspecialchars(sprintf(Flux::message('AccountViewStorage'), $account->userid)) ?></h3>
        <?php if ($items): ?>
            <p class="text-sm text-gray-400 mt-4"><?php echo htmlspecialchars(sprintf(Flux::message('AccountViewStorageCount'), $account->userid, count($items))) ?></p>
            <div class="bg-gray-900 rounded-lg shadow-xl border border-gray-700 overflow-hidden mt-4">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('ItemIdLabel')) ?></th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider" colspan="2"><?php echo htmlspecialchars(Flux::message('ItemNameLabel')) ?></th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('ItemAmountLabel')) ?></th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('ItemIdentifyLabel')) ?></th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('ItemBrokenLabel')) ?></th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('ItemCard0Label')) ?></th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('ItemCard1Label')) ?></th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('ItemCard2Label')) ?></th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('ItemCard3Label')) ?></th>
                            <?php if($server->isRenewal): ?>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo htmlspecialchars(Flux::message('ItemRandOptionsLabel')) ?></th>
                            <?php endif ?>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Extra</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900 divide-y divide-gray-700">
                        <?php foreach ($items AS $item): ?>
                            <?php $icon = $this->iconImage($item->nameid) ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                    <?php if ($auth->actionAllowed('item', 'view')): ?>
                                        <?php echo $this->linkToItem($item->nameid, $item->nameid) ?>
                                    <?php else: ?>
                                        <?php echo htmlspecialchars($item->nameid) ?>
                                    <?php endif ?>
                                </td>
                                <?php if ($icon): ?>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><img src="<?php echo htmlspecialchars($icon) ?>" /></td>
                                <?php endif ?>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"<?php if (!$icon) echo ' colspan="2"' ?><?php if ($item->cardsOver) echo ' class="overslotted' . $item->cardsOver . '"'; else echo ' class="normalslotted"' ?>>
                                    <?php if ($item->refine > 0): ?>
                                        +<?php echo htmlspecialchars($item->refine) ?>
                                    <?php endif ?>
                                    <?php if ($item->card0 == 255 && intval($item->card1/1280) > 0): ?>
                                        <?php $itemcard1 = intval($item->card1/1280); ?>
                                        <?php for ($i = 0; $i < $itemcard1; $i++): ?>
                                            Very
                                        <?php endfor ?>
                                        Strong
                                    <?php endif ?>
                                    <?php if ($item->card0 == 254 || $item->card0 == 255): ?>
                                        <?php if ($item->char_name): ?>
                                            <?php if ($auth->actionAllowed('character', 'view') && ($isMine || (!$isMine && $auth->allowedToViewCharacter))): ?>
                                                <?php echo $this->linkToCharacter($item->char_id, $item->char_name, $session->serverName) . "'s" ?>
                                            <?php else: ?>
                                                <?php echo htmlspecialchars($item->char_name . "'s") ?>
                                            <?php endif ?>
                                        <?php else: ?>
                                            <span class="text-gray-500"><?php echo htmlspecialchars(Flux::message('UnknownLabel')) ?></span>'s
                                        <?php endif ?>
                                    <?php endif ?>
                                    <?php if ($item->card0 == 255 && array_key_exists($item->card1%1280, $itemAttributes)): ?>
                                        <?php echo htmlspecialchars($itemAttributes[$item->card1%1280]) ?>
                                    <?php endif ?>
                                    <?php if ($item->name_english): ?>
                                        <span class="item_name"><?php echo htmlspecialchars($item->name_english) ?></span>
                                    <?php else: ?>
                                        <span class="text-gray-500"><?php echo htmlspecialchars(Flux::message('UnknownLabel')) ?></span>
                                    <?php endif ?>
                                    <?php if ($item->slots): ?>
                                        <?php echo htmlspecialchars(' [' . $item->slots . ']') ?>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400"><?php echo number_format($item->amount) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                    <?php if ($item->identify): ?>
                                        <span class="text-green-400"><?php echo htmlspecialchars(Flux::message('YesLabel')) ?></span>
                                    <?php else: ?>
                                        <span class="text-red-400"><?php echo htmlspecialchars(Flux::message('NoLabel')) ?></span>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                    <?php if ($item->attribute): ?>
                                        <span class="text-green-400"><?php echo htmlspecialchars(Flux::message('YesLabel')) ?></span>
                                    <?php else: ?>
                                        <span class="text-red-400"><?php echo htmlspecialchars(Flux::message('NoLabel')) ?></span>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                    <?php if($item->card0 && ($item->type == $type_list['armor'] || $item->type == $type_list['weapon']) && $item->card0 != 254 && $item->card0 != 255 && $item->card0 != -256): ?>
                                        <?php if (!empty($cards[$item->card0])): ?>
                                            <?php if ($auth->actionAllowed('item', 'view')): ?>
                                                <?php echo $this->linkToItem($item->card0, $cards[$item->card0]) ?>
                                            <?php else: ?>
                                                <?php echo htmlspecialchars($cards[$item->card0]) ?>
                                            <?php endif ?>
                                        <?php else: ?>
                                            <?php if ($auth->actionAllowed('item', 'view')): ?>
                                                <?php echo $this->linkToItem($item->card0, $item->card0) ?>
                                            <?php else: ?>
                                                <?php echo htmlspecialchars($item->card0) ?>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <span class="text-gray-500"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                    <?php if($item->card1 && ($item->type == $type_list['armor'] || $item->type == $type_list['weapon']) && $item->card0 != 255 && $item->card0 != -256): ?>
                                        <?php if (!empty($cards[$item->card1])): ?>
                                            <?php if ($auth->actionAllowed('item', 'view')): ?>
                                                <?php echo $this->linkToItem($item->card1, $cards[$item->card1]) ?>
                                            <?php else: ?>
                                                <?php echo htmlspecialchars($cards[$item->card1]) ?>
                                            <?php endif ?>
                                        <?php else: ?>
                                            <?php if ($auth->actionAllowed('item', 'view')): ?>
                                                <?php echo $this->linkToItem($item->card1, $item->card1) ?>
                                            <?php else: ?>
                                                <?php echo htmlspecialchars($item->card1) ?>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <span class="text-gray-500"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                    <?php if($item->card2 && ($item->type == $type_list['armor'] || $item->type == $type_list['weapon']) && $item->card0 != 254 && $item->card0 != 255 && $item->card0 != -256): ?>
                                        <?php if (!empty($cards[$item->card2])): ?>
                                            <?php if ($auth->actionAllowed('item', 'view')): ?>
                                                <?php echo $this->linkToItem($item->card2, $cards[$item->card2]) ?>
                                            <?php else: ?>
                                                <?php echo htmlspecialchars($cards[$item->card2]) ?>
                                            <?php endif ?>
                                        <?php else: ?>
                                            <?php if ($auth->actionAllowed('item', 'view')): ?>
                                                <?php echo $this->linkToItem($item->card2, $item->card2) ?>
                                            <?php else: ?>
                                                <?php echo htmlspecialchars($item->card2) ?>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <span class="text-gray-500"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                    <?php if($item->card3 && ($item->type == $type_list['armor'] || $item->type == $type_list['weapon']) && $item->card0 != 254 && $item->card0 != 255 && $item->card0 != -256): ?>
                                        <?php if (!empty($cards[$item->card3])): ?>
                                            <?php if ($auth->actionAllowed('item', 'view')): ?>
                                                <?php echo $this->linkToItem($item->card3, $cards[$item->card3]) ?>
                                            <?php else: ?>
                                                <?php echo htmlspecialchars($cards[$item->card3]) ?>
                                            <?php endif ?>
                                        <?php else: ?>
                                            <?php if ($auth->actionAllowed('item', 'view')): ?>
                                                <?php echo $this->linkToItem($item->card3, $item->card3) ?>
                                            <?php else: ?>
                                                <?php echo htmlspecialchars($item->card3) ?>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <span class="text-gray-500"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
                                    <?php endif ?>
                                </td>
                                <?php if($server->isRenewal): ?>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        <?php if($item->rndopt): ?>
                                            <ul>
                                                <?php foreach($item->rndopt as $rndopt) echo "<li>".$this->itemRandOption($rndopt[0], $rndopt[1])."</li>"; ?>
                                            </ul>
                                        <?php else: ?>
                                            <span class="text-gray-500">None</span>
                                        <?php endif ?>
                                    </td>
                                <?php endif ?>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                    <?php if($item->bound == 1):?>
                                        Account Bound
                                    <?php elseif($item->bound == 2):?>
                                        Guild Bound
                                    <?php elseif($item->bound == 3):?>
                                        Party Bound
                                    <?php elseif($item->bound == 4):?>
                                        Character Bound
                                    <?php else:?>
                                        <span class="text-gray-500">None</span>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-sm text-gray-400 mt-4"><?php echo htmlspecialchars(Flux::message('AccountViewNoStorage')) ?></p>
        <?php endif ?>

    </div>
</div>

<?php if (!$account): ?>
<p>
    <?php echo htmlspecialchars(Flux::message('AccountViewNotFound')) ?>
    <a href="javascript:history.go(-1)" class="text-blue-400 hover:underline"><?php echo htmlspecialchars(Flux::message('GoBackLabel')) ?></a>
</p>
<?php endif ?>
