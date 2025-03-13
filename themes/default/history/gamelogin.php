<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white">
                <?php echo htmlspecialchars(Flux::message('HistoryGameLoginHeading')) ?>
            </h2>
        </div>

        <?php if ($logins): ?>
            <!-- Pagination Info -->
            <div class="mb-4 text-sm text-gray-400">
                <?php echo $paginator->infoText() ?>
            </div>

            <!-- Login History Table -->
            <div class="bg-gray-900 rounded-lg shadow-lg border border-gray-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead>
                            <tr class="bg-gray-800/50">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('time', Flux::message('HistoryLoginDateLabel')) ?>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('ip', Flux::message('HistoryIpAddrLabel')) ?>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('rcode', Flux::message('HistoryRepsCodeLabel')) ?>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    <?php echo $paginator->sortableColumn('log', Flux::message('HistoryLogMessageLabel')) ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <?php foreach ($logins as $login): ?>
                            <tr class="hover:bg-gray-800/50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <?php echo $this->formatDateTime($login->time) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <?php if ($auth->actionAllowed('account', 'index')): ?>
                                        <a href="<?php echo $this->url('account', 'index', array('last_ip' => $login->ip)) ?>" 
                                           class="text-indigo-400 hover:text-indigo-300">
                                            <?php echo htmlspecialchars($login->ip) ?>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-gray-300"><?php echo htmlspecialchars($login->ip) ?></span>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <?php echo $login->rcode ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-300">
                                    <?php echo htmlspecialchars($login->log) ?>
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
            <!-- No Logins Message -->
            <div class="text-center py-8 bg-gray-900/50 rounded-lg border border-gray-700">
                <p class="text-gray-400 mb-4">
                    <?php echo htmlspecialchars(Flux::message('HistoryNoGameLogins')) ?>
                </p>
                <a href="javascript:history.go(-1)" 
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium 
                          rounded-md text-white bg-indigo-600 hover:bg-indigo-700 
                          focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 
                          transition-colors duration-200">
                    <?php echo htmlspecialchars(Flux::message('GoBackLabel')) ?>
                </a>
            </div>
        <?php endif ?>
    </div>
</div>