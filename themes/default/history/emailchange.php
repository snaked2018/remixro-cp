<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white">
                <?php echo htmlspecialchars(Flux::message('HistoryEmailHeading')) ?>
            </h2>
        </div>

        <?php if ($changes): ?>
            <!-- Pagination Info -->
            <div class="mb-4 text-sm text-gray-400">
                <?php echo $paginator->infoText() ?>
            </div>

            <!-- Email Changes Table -->
            <div class="bg-gray-900 rounded-lg shadow-lg border border-gray-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead>
                            <tr class="bg-gray-800/50">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('request_date', Flux::message('HistoryEmailRequestDate')) ?>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('request_ip', Flux::message('HistoryEmailRequestIp')) ?>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('old_email', Flux::message('HistoryEmailOldAddress')) ?>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('new_email', Flux::message('HistoryEmailNewAddress')) ?>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('change_date', Flux::message('HistoryEmailChangeDate')) ?>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('change_ip', Flux::message('HistoryEmailChangeIp')) ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <?php foreach ($changes as $change): ?>
                            <tr class="hover:bg-gray-800/50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <?php echo $this->formatDateTime($change->request_date) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <?php if ($auth->actionAllowed('account', 'index')): ?>
                                        <a href="<?php echo $this->url('account', 'index', array('last_ip' => $change->request_ip)) ?>"
                                           class="text-indigo-400 hover:text-indigo-300">
                                            <?php echo htmlspecialchars($change->request_ip) ?>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-gray-300"><?php echo htmlspecialchars($change->request_ip) ?></span>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <?php if ($auth->actionAllowed('account', 'index')): ?>
                                        <a href="<?php echo $this->url('account', 'index', array('email' => $change->old_email)) ?>"
                                           class="text-indigo-400 hover:text-indigo-300">
                                            <?php echo htmlspecialchars($change->old_email) ?>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-gray-300"><?php echo htmlspecialchars($change->old_email) ?></span>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <?php if ($auth->actionAllowed('account', 'index')): ?>
                                        <a href="<?php echo $this->url('account', 'index', array('email' => $change->new_email)) ?>"
                                           class="text-indigo-400 hover:text-indigo-300">
                                            <?php echo htmlspecialchars($change->new_email) ?>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-gray-300"><?php echo htmlspecialchars($change->new_email) ?></span>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <?php if ($change->change_date): ?>
                                        <span class="text-gray-300"><?php echo htmlspecialchars($change->change_date) ?></span>
                                    <?php else: ?>
                                        <span class="text-gray-500 italic"><?php echo htmlspecialchars(Flux::message('NeverLabel')) ?></span>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <?php if ($change->change_ip): ?>
                                        <?php if ($auth->actionAllowed('account', 'index')): ?>
                                            <a href="<?php echo $this->url('account', 'index', array('last_ip' => $change->change_ip)) ?>"
                                               class="text-indigo-400 hover:text-indigo-300">
                                                <?php echo htmlspecialchars($change->change_ip) ?>
                                            </a>
                                        <?php else: ?>
                                            <span class="text-gray-300"><?php echo htmlspecialchars($change->change_ip) ?></span>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <span class="text-gray-500 italic"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                <?php echo $paginator->getHTML() ?>
            </div>
        <?php else: ?>
            <!-- No Changes Message -->
            <div class="text-center py-8 bg-gray-900/50 rounded-lg border border-gray-700">
                <p class="text-gray-400 mb-4">
                    <?php echo htmlspecialchars(Flux::message('HistoryNoEmailChanges')) ?>
                </p>
                <a href="javascript:history.go(-1)" 
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium 
                          rounded-md branding-green-button 
                          focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 
                          transition-colors duration-200">
                    <?php echo htmlspecialchars(Flux::message('GoBackLabel')) ?>
                </a>
            </div>
        <?php endif ?>
    </div>
</div>