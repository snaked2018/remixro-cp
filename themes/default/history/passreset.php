<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white">
                <?php echo htmlspecialchars(Flux::message('HistoryPassResetHeading')) ?>
            </h2>
        </div>

        <?php if ($resets): ?>
            <!-- Pagination Info -->
            <div class="mb-4 text-sm text-gray-400">
                <?php echo $paginator->infoText() ?>
            </div>

            <!-- Password Resets Table -->
            <div class="bg-gray-900 rounded-lg shadow-lg border border-gray-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead>
                            <tr class="bg-gray-800/50">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('request_date', Flux::message('HistoryPassResetRequestDate')) ?>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('request_ip', Flux::message('HistoryPassResetRequestIp')) ?>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('reset_date', Flux::message('HistoryPassResetResetDate')) ?>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('reset_ip', Flux::message('HistoryPassResetResetIp')) ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <?php foreach ($resets as $reset): ?>
                            <tr class="hover:bg-gray-800/50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <?php echo $this->formatDateTime($reset->request_date) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <?php if ($auth->actionAllowed('account', 'index')): ?>
                                        <a href="<?php echo $this->url('account', 'index', array('last_ip' => $reset->request_ip)) ?>"
                                           class="text-indigo-400 hover:text-indigo-300">
                                            <?php echo htmlspecialchars($reset->request_ip) ?>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-gray-300"><?php echo htmlspecialchars($reset->request_ip) ?></span>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <?php if ($reset->reset_date): ?>
                                        <span class="text-gray-300"><?php echo htmlspecialchars($reset->reset_date) ?></span>
                                    <?php else: ?>
                                        <span class="text-gray-500 italic">
                                            <?php echo htmlspecialchars(Flux::message('NeverLabel')) ?>
                                        </span>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <?php if ($reset->reset_ip): ?>
                                        <?php if ($auth->actionAllowed('account', 'index')): ?>
                                            <a href="<?php echo $this->url('account', 'index', array('last_ip' => $reset->reset_ip)) ?>"
                                               class="text-indigo-400 hover:text-indigo-300">
                                                <?php echo htmlspecialchars($reset->reset_ip) ?>
                                            </a>
                                        <?php else: ?>
                                            <span class="text-gray-300"><?php echo htmlspecialchars($reset->reset_ip) ?></span>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <span class="text-gray-500 italic">
                                            <?php echo htmlspecialchars(Flux::message('NoneLabel')) ?>
                                        </span>
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
            <!-- No Resets Message -->
            <div class="text-center py-8 bg-gray-900/50 rounded-lg border border-gray-700">
                <p class="text-gray-400 mb-4">
                    <?php echo htmlspecialchars(Flux::message('HistoryNoPassResets')) ?>
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