<?php if (!defined('FLUX_ROOT'))
	exit; ?>

<div class="bg-black py-8 px-4 sm:px-6 lg:px-8">
	<div class="max-w-4xl mx-auto">
		<!-- Header -->
		<h2 class="text-2xl font-bold text-white text-center mb-6">
			<?php echo htmlspecialchars(Flux::message('AccountEditHeading')) ?>
		</h2>

		<?php if ($account): ?>
			<?php if (!empty($errorMessage)): ?>
				<div class="bg-red-900/50 border border-red-500/50 text-red-200 px-4 py-2 rounded mb-4 text-sm">
					<?php echo htmlspecialchars($errorMessage) ?>
				</div>
			<?php endif ?>

			<form action="<?php echo $this->urlWithQs ?>" method="post">
				<div class="bg-gray-900 rounded-lg shadow-lg border border-gray-700">
					<form action="<?php echo $this->urlWithQs ?>" method="post">
						<div class="bg-gray-900 rounded-lg shadow-xl overflow-hidden p-4">
							<!-- Basic Information -->
							<div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-1">
								<!-- Username & Account ID -->
								<div>
									<div class="flex justify-between items-center">
										<span class="text-gray-400 text-sm">
											<?php echo htmlspecialchars(Flux::message('UsernameLabel')) ?>
										</span>
										<span class="text-white">
											<?php echo htmlspecialchars($account->userid) ?>
										</span>
									</div>
									<div class="flex justify-between items-center">
										<span class="text-gray-400 text-sm">
											<?php echo htmlspecialchars(Flux::message('AccountIdLabel')) ?>
										</span>
										<span class="text-white">
											<?php echo htmlspecialchars($account->account_id) ?>
										</span>
									</div>
								</div>

								<!-- Email & Group ID -->
								<div>
									<div class="flex flex-col">
										<label for="email" class="text-sm font-medium text-gray-400 mb-1">
											<?php echo htmlspecialchars(Flux::message('EmailAddressLabel')) ?>
										</label>
										<input type="email" name="email" id="email"
											value="<?php echo htmlspecialchars($account->email) ?>" class="bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
										   focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
									</div>

									<?php if ($auth->allowedToEditAccountGroupID && !$isMine): ?>
										<div class="flex flex-col">
											<label for="group_id" class="text-sm font-medium text-gray-400 mb-1">
												<?php echo htmlspecialchars(Flux::message('AccountGroupIDLabel')) ?>
											</label>
											<input type="number" name="group_id" id="group_id"
												value="<?php echo (int) $account->group_id ?>" class="bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
											   focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
										</div>
									<?php else: ?>
										<div class="flex justify-between items-center">
											<span class="text-gray-400 text-sm">
												<?php echo htmlspecialchars(Flux::message('AccountGroupIDLabel')) ?>
											</span>
											<span class="text-white">
												<input type="hidden" name="group_id"
													value="<?php echo (int) $account->group_id ?>" />
												<?php echo number_format((int) $account->group_id) ?>
											</span>
										</div>
									<?php endif ?>
								</div>
							</div>

							<!-- Gender & Account State -->
							<div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-1">
								<div>
									<div class="flex flex-col">
										<label for="gender" class="text-sm font-medium text-gray-400 mb-1">
											<?php echo htmlspecialchars(Flux::message('GenderLabel')) ?>
										</label>
										<select name="gender" id="gender" class="bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
										   focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
											<option value="M" <?php if ($account->sex == 'M')
												echo ' selected="selected"' ?>>
												<?php echo $this->genderText('M') ?>
											</option>
											<option value="F" <?php if ($account->sex == 'F')
												echo ' selected="selected"' ?>>
												<?php echo $this->genderText('F') ?>
											</option>
										</select>
									</div>
								</div>
								<div>
									<div class="flex flex-col">
										<span class="text-gray-400 text-sm">
											<?php echo htmlspecialchars(Flux::message('AccountStateLabel')) ?>
										</span>
										<span class="text-white">
											<?php if (($state = $this->accountStateText($account->state)) && !$account->unban_time): ?>
												<?php echo $state ?>
											<?php elseif ($account->unban_time): ?>
												<span class="account-state state-banned">
													Banned Until
													<?php echo htmlspecialchars(date(Flux::config('DateTimeFormat'), $account->unban_time)) ?>
												</span>
											<?php else: ?>
												<span
													class="account-state state-unknown"><?php echo htmlspecialchars(Flux::message('UnknownLabel')) ?></span>
											<?php endif ?>
										</span>
									</div>
								</div>
							</div>

							<!-- Login Count & Balance -->
							<div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-1">
								<div>
									<div class="flex flex-col">
										<label for="logincount" class="text-sm font-medium text-gray-400 mb-1">
											<?php echo htmlspecialchars(Flux::message('LoginCountLabel')) ?>
										</label>
										<input type="number" name="logincount" id="logincount"
											value="<?php echo (int) $account->logincount ?>" class="bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
										   focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
									</div>
								</div>
								<div>
									<?php if ($auth->allowedToEditAccountBalance): ?>
										<div class="flex flex-col">
											<label for="balance" class="text-sm font-medium text-gray-400 mb-1">
												<?php echo htmlspecialchars(Flux::message('CreditBalanceLabel')) ?>
											</label>
											<input type="number" name="balance" id="balance"
												value="<?php echo (int) $account->balance ?>" class="bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
											   focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
										</div>
									<?php else: ?>
										<div class="flex justify-between items-center">
											<span class="text-gray-400 text-sm">
												<?php echo htmlspecialchars(Flux::message('CreditBalanceLabel')) ?>
											</span>
											<span class="text-white">
												<?php echo number_format((int) $account->balance) ?>
											</span>
										</div>
									<?php endif ?>
								</div>
							</div>

							<!-- Birthdate -->
							<div class="p-4 ">
								<div class="flex items-center justify-between mb-2">
									<div class="flex items-center space-x-2">
										<input type="checkbox" name="use_birthdate" id="use_birthdate" class="w-4 h-4 rounded border-gray-600 bg-gray-700 text-indigo-500 
					   focus:ring-indigo-500 focus:ring-offset-0 focus:ring-offset-gray-800" />
										<label for="use_birthdate" class="text-sm font-medium text-gray-300">
											<?php echo htmlspecialchars(Flux::message('AccountBirthdateLabel')) ?>
										</label>
									</div>
									<div class="flex items-center space-x-2">
										<?php
										$birthdate = $account->birthdate ? date('Y-m-d', strtotime($account->birthdate)) : date('Y-m-d');
										$birthdate_parts = explode('-', $birthdate);
										?>
										<!-- Year -->
										<div class="relative">
											<select name="birthdate_year" class="appearance-none bg-gray-800 border border-gray-700 text-white py-1 pl-3 pr-8 rounded-md text-sm
												   focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
												<?php for ($i = date('Y'); $i >= 1950; $i--): ?>
													<option value="<?php echo $i ?>" <?php if ((int) $birthdate_parts[0] === $i)
														   echo ' selected' ?>><?php echo $i ?></option>
												<?php endfor ?>
											</select>
											<div
												class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
												<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
														d="M19 9l-7 7-7-7" />
												</svg>
											</div>
										</div>
										<!-- Month -->
										<div class="relative">
											<select name="birthdate_month" class="appearance-none bg-gray-800 border border-gray-700 text-white py-1 pl-3 pr-8 rounded-md text-sm
													focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
												<?php for ($i = 1; $i <= 12; $i++): ?>
													<option value="<?php echo sprintf('%02d', $i) ?>" <?php if ((int) $birthdate_parts[1] === $i)
															echo ' selected' ?>>
														<?php echo sprintf('%02d', $i) ?>
													</option>
												<?php endfor ?>
											</select>
											<div
												class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
												<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
														d="M19 9l-7 7-7-7" />
												</svg>
											</div>
										</div>
										<!-- Day -->
										<div class="relative">
											<select name="birthdate_day" class="appearance-none bg-gray-800 border border-gray-700 text-white py-1 pl-3 pr-8 rounded-md text-sm
												  focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
												<?php for ($i = 1; $i <= 31; $i++): ?>
													<option value="<?php echo sprintf('%02d', $i) ?>" <?php if ((int) $birthdate_parts[2] === $i)
															echo ' selected' ?>>
														<?php echo sprintf('%02d', $i) ?>
													</option>
												<?php endfor ?>
											</select>
											<div
												class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
												<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
														d="M19 9l-7 7-7-7" />
												</svg>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Additional Account Details -->
							<!-- Last Login -->
							<div class="bg-gray-800/50 rounded-lg p-4">
								<div class="flex items-center justify-between mb-2">
									<div class="flex items-center space-x-2">
										<input type="checkbox" name="use_lastlogin" id="use_lastlogin" class="w-4 h-4 rounded border-gray-600 bg-gray-700 text-indigo-500 
					   focus:ring-indigo-500 focus:ring-offset-0 focus:ring-offset-gray-800" />
										<label for="use_lastlogin" class="text-sm font-medium text-gray-300">
											<?php echo htmlspecialchars(Flux::message('LastLoginDateLabel')) ?>
										</label>
									</div>
									<div class="flex flex-wrap items-center gap-2 sm:gap-3">
										<?php
										$lastLogin = $account->lastlogin ? date('Y-m-d H:i:s', strtotime($account->lastlogin)) : date('Y-m-d H:i:s');
										$lastLogin_parts = explode(' ', $lastLogin);
										$lastLogin_date = explode('-', $lastLogin_parts[0]);
										$lastLogin_time = explode(':', $lastLogin_parts[1]);
										?>
										
										<!-- Date Selectors -->
										<div class="relative flex-basis-[120px]">
											<select name="lastlogin_year" class="appearance-none bg-gray-800 border border-gray-700 text-white py-1 pl-3 pr-8 rounded-md text-sm
												   focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
												<?php for ($i = date('Y'); $i >= 2000; $i--): ?>
													<option value="<?php echo $i ?>" <?php if ((int) $lastLogin_date[0] === $i)
														   echo ' selected' ?>><?php echo $i ?></option>
												<?php endfor ?>
											</select>
											<div
												class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
												<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
														d="M19 9l-7 7-7-7" />
												</svg>
											</div>
										</div>
										<div class="relative flex-basis-[90px]">
											<select name="lastlogin_month" class="appearance-none bg-gray-800 border border-gray-700 text-white py-1 pl-3 pr-8 rounded-md text-sm
													focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
												<?php for ($i = 1; $i <= 12; $i++): ?>
													<option value="<?php echo sprintf('%02d', $i) ?>" <?php if ((int) $lastLogin_date[1] === $i)
															echo ' selected' ?>>
														<?php echo sprintf('%02d', $i) ?></option>
												<?php endfor ?>
											</select>
											<div
												class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
												<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
														d="M19 9l-7 7-7-7" />
												</svg>
											</div>
										</div>
										<div class="relative flex-basis-[90px]">
											<select name="lastlogin_day" class="appearance-none bg-gray-800 border border-gray-700 text-white py-1 pl-3 pr-8 rounded-md text-sm
												  focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
												<?php for ($i = 1; $i <= 31; $i++): ?>
													<option value="<?php echo sprintf('%02d', $i) ?>" <?php if ((int) $lastLogin_date[2] === $i)
															echo ' selected' ?>>
														<?php echo sprintf('%02d', $i) ?></option>
												<?php endfor ?>
											</select>
											<div
												class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
												<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
														d="M19 9l-7 7-7-7" />
												</svg>
											</div>
										</div>
										
										<!-- Time Selectors -->
										<div class="relative flex-basis-[90px]">
											<select name="lastlogin_hour" class="appearance-none bg-gray-800 border border-gray-700 text-white py-1 pl-3 pr-8 rounded-md text-sm
												   focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
												<?php for ($i = 0; $i <= 23; $i++): ?>
													<option value="<?php echo sprintf('%02d', $i) ?>" <?php if ((int) $lastLogin_time[0] === $i)
															echo ' selected' ?>>
														<?php echo sprintf('%02d', $i) ?></option>
												<?php endfor ?>
											</select>
											<div
												class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
												<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
														d="M19 9l-7 7-7-7" />
												</svg>
											</div>
										</div>
										<div class="relative flex-basis-[90px]">
											<select name="lastlogin_minute" class="appearance-none bg-gray-800 border border-gray-700 text-white py-1 pl-3 pr-8 rounded-md text-sm
													 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
												<?php for ($i = 0; $i <= 59; $i++): ?>
													<option value="<?php echo sprintf('%02d', $i) ?>" <?php if ((int) $lastLogin_time[1] === $i)
															echo ' selected' ?>>
														<?php echo sprintf('%02d', $i) ?></option>
												<?php endfor ?>
											</select>
											<div
												class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
												<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
														d="M19 9l-7 7-7-7" />
												</svg>
											</div>
										</div>
										<div class="relative flex-basis-[90px]">
											<select name="lastlogin_second" class="appearance-none bg-gray-800 border border-gray-700 text-white py-1 pl-3 pr-8 rounded-md text-sm
													 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
												<?php for ($i = 0; $i <= 59; $i++): ?>
													<option value="<?php echo sprintf('%02d', $i) ?>" <?php if ((int) $lastLogin_time[2] === $i)
															echo ' selected' ?>>
														<?php echo sprintf('%02d', $i) ?></option>
												<?php endfor ?>
											</select>
											<div
												class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
												<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
														d="M19 9l-7 7-7-7" />
												</svg>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- VIP Time -->
							<div class="bg-gray-800/50 rounded-lg p-4">
								<div class="flex items-center justify-between">
									<label class="text-sm font-medium text-gray-300">
										<?php echo htmlspecialchars(Flux::message('VIPTimeDateLabel')) ?>
									</label>
									<span class="text-sm text-yellow-400">
										Client login required
									</span>
								</div>
								<p class="mt-2 text-sm text-gray-400 italic">
									You will need to login via the game client to change the VIP time.
								</p>
							</div>

							<!-- Last IP -->
							<div class="bg-gray-800/50 rounded-lg p-4">
								<div class="flex flex-col">
									<label for="last_ip" class="text-sm font-medium text-gray-300 mb-2">
										<?php echo htmlspecialchars(Flux::message('LastUsedIpLabel')) ?>
									</label>
									<div class="relative">
										<input type="text" name="last_ip" id="last_ip"
											value="<?php echo htmlspecialchars($account->last_ip) ?>" class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-white text-sm
						   focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" />
										<div class="absolute inset-y-0 right-0 flex items-center pr-3">
											<svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor"
												viewBox="0 0 24 24">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
													d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9-3-9m-9 9a9 9 0 019-9" />
											</svg>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Submit Button -->
						<div class="grid grid-cols-1 gap-4">
							<div class="flex justify-end p-4">
								<input type="submit"
									value="<?php echo htmlspecialchars(Flux::message('AccountEditButton')) ?>" class="branding-green-button mt-2 py-2 px-4 rounded-md
									   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" />
							</div>
						</div>
				</div>
			</form>
		<?php else: ?>
			<div class="text-center">
				<p class="text-gray-400">
					<?php echo htmlspecialchars(Flux::message('AccountEditNotFound')) ?>
				</p>
				<a href="javascript:history.go(-1)" class="text-indigo-500 hover:text-indigo-700">
					<?php echo htmlspecialchars(Flux::message('GoBackLabel')) ?>
				</a>
			</div>
		<?php endif ?>
	</div>
</div>