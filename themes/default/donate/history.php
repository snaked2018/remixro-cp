<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="pt-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <h2 class="text-3xl font-semibold tracking-tight text-white">Donation History</h2>

        <!-- Completed Transactions -->
        <div class="mt-8">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-medium text-white">Completed Transactions</h3>
                <?php if ($completedTxn): ?>
                    <span class="bg-green-500/10 text-green-400 text-sm font-medium px-3 py-1 rounded-full border border-green-500/20">
                        <?php echo number_format($completedTotal) ?> transaction(s)
                    </span>
                <?php endif ?>
            </div>

            <?php if ($completedTxn): ?>
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-800/50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Transaction</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Payment Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">E-mail</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Amount</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Credits</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800/30 divide-y divide-gray-700">
                            <?php foreach ($completedTxn as $txn): ?>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-indigo-400 font-medium">
                                    <?php echo htmlspecialchars($txn->txn_id) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <?php echo $this->formatDateTime($txn->payment_date) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <?php echo htmlspecialchars($txn->payer_email) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="text-green-400"><?php echo htmlspecialchars($txn->mc_gross) ?></span>
                                    <span class="text-gray-400 ml-1"><?php echo htmlspecialchars($txn->mc_currency) ?></span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <?php echo number_format($txn->credits) ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="rounded-lg border border-gray-700 bg-gray-800/30 px-6 py-8 text-center">
                    <p class="text-gray-400">You have no completed transactions.</p>
                </div>
            <?php endif ?>
        </div>

        <!-- Held Transactions -->
        <div class="mt-12">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-medium text-white">Held Transactions</h3>
                <?php if ($heldTxn): ?>
                    <span class="bg-yellow-500/10 text-yellow-400 text-sm font-medium px-3 py-1 rounded-full border border-yellow-500/20">
                        <?php echo number_format($heldTotal) ?> transaction(s)
                    </span>
                <?php endif ?>
            </div>

            <?php if ($heldTxn): ?>
                <div class="mt-4 space-y-4">
                    <?php foreach ($heldTxn as $txn): ?>
                    <div class="rounded-lg bg-gray-800/30 border border-gray-700 overflow-hidden">
                        <div class="px-6 py-4 grid grid-cols-2 md:grid-cols-5 gap-4">
                            <div>
                                <span class="text-xs text-gray-400">Transaction</span>
                                <p class="mt-1 text-sm text-indigo-400 font-medium"><?php echo htmlspecialchars($txn->txn_id) ?></p>
                            </div>
                            <div>
                                <span class="text-xs text-gray-400">Payment Date</span>
                                <p class="mt-1 text-sm text-gray-300"><?php echo $this->formatDateTime($txn->payment_date) ?></p>
                            </div>
                            <div>
                                <span class="text-xs text-gray-400">E-mail</span>
                                <p class="mt-1 text-sm text-gray-300"><?php echo htmlspecialchars($txn->payer_email) ?></p>
                            </div>
                            <div>
                                <span class="text-xs text-gray-400">Amount</span>
                                <p class="mt-1 text-sm">
                                    <span class="text-green-400"><?php echo htmlspecialchars($txn->mc_gross) ?></span>
                                    <span class="text-gray-400"><?php echo htmlspecialchars($txn->mc_currency) ?></span>
                                </p>
                            </div>
                            <div>
                                <span class="text-xs text-gray-400">Credits</span>
                                <p class="mt-1 text-sm text-gray-300"><?php echo number_format($txn->credits) ?></p>
                            </div>
                        </div>
                        <div class="px-6 py-3 bg-yellow-500/5 border-t border-gray-700">
                            <div class="flex items-center space-x-2 text-sm">
                                <span class="text-gray-400">Hold Until:</span>
                                <span class="text-yellow-400 font-medium"><?php echo $this->formatDateTime($txn->hold_until) ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            <?php else: ?>
                <div class="rounded-lg border border-gray-700 bg-gray-800/30 px-6 py-8 text-center">
                    <p class="text-gray-400">You have no held transactions.</p>
                </div>
            <?php endif ?>
        </div>

        <!-- Failed Transactions -->
        <div class="mt-12 mb-12">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-medium text-white">Failed Transactions</h3>
                <?php if ($failedTxn): ?>
                    <span class="bg-red-500/10 text-red-400 text-sm font-medium px-3 py-1 rounded-full border border-red-500/20">
                        <?php echo number_format($failedTotal) ?> transaction(s)
                    </span>
                <?php endif ?>
            </div>

            <?php if ($failedTxn): ?>
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-800/50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Transaction</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Payment Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">E-mail</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Amount</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Credits</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800/30 divide-y divide-gray-700">
                            <?php foreach ($failedTxn as $txn): ?>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-400 font-medium">
                                    <?php echo htmlspecialchars($txn->txn_id) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <?php echo $this->formatDateTime($txn->payment_date) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <?php echo htmlspecialchars($txn->payer_email) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="text-red-400"><?php echo htmlspecialchars($txn->mc_gross) ?></span>
                                    <span class="text-gray-400 ml-1"><?php echo htmlspecialchars($txn->mc_currency) ?></span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <?php echo number_format($txn->credits) ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="rounded-lg border border-gray-700 bg-gray-800/30 px-6 py-8 text-center">
                    <p class="text-gray-400">You have no failed transactions.</p>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>