<?php 
if (!defined('FLUX_ROOT')) exit;

// Calculate total Agit Prize (10% of total castle economy)
$agitPrize = 0;
$sql = "SELECT SUM(economy) as total_economy FROM {$server->charMapDatabase}.guild_castle";
$sth = $server->connection->getStatement($sql);
$sth->execute();
$result = $sth->fetch();
$agitPrize = $result ? intval($result->total_economy * 0.10) : 0;

// Get donation prize pool
$donationPrize = Flux::config('WoeDonationPrize') ?? 0;
$prizePortion = $donationPrize * 0.10; // 10% of donation pool
?>

<div class="bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-4">
                <?php echo htmlspecialchars(Flux::message('WoeHeading')) ?>
            </h2>
            
            <!-- Prize Pool Card -->
            <div class="max-w-md mx-auto mb-6">
                <div class="bg-gray-900/50 border border-gray-700 rounded-lg px-6 py-4 hover:border-green-500 transition-colors duration-300">
                    <div class="flex items-center justify-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <div class="text-left">
                            <p class="text-sm text-gray-400">Cash Prize Pool (10%)</p>
                            <p class="text-xl font-bold text-green-400">
                                <?php echo number_format($prizePortion) ?> PHP
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($woeTimes): ?>
                <p class="text-gray-400 mb-2">
                    <?php echo htmlspecialchars(sprintf(Flux::message('WoeInfo'), $session->loginAthenaGroup->serverName)) ?>
                </p>
                <p class="text-gray-400">
                    <?php echo htmlspecialchars(Flux::message('WoeServerTimeInfo')) ?>
                    <strong class="text-purple-400">
                        <?php echo $server->getServerTime('Y-m-d H:i:s (l)') ?>
                    </strong>
                </p>
            <?php endif ?>
        </div>

        <?php if ($woeTimes): ?>
            <!-- Schedule Grid -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <?php foreach ($woeTimes as $serverName => $times): ?>
                    <div class="bg-gray-900/50 border border-gray-700 rounded-lg overflow-hidden">
                        <!-- Server Header -->
                        <div class="px-6 py-4 bg-gray-800/50 border-b border-gray-700">
                            <h3 class="text-lg font-medium text-white">
                                <?php echo htmlspecialchars($serverName) ?>
                            </h3>
                        </div>

                        <!-- Schedule List -->
                        <div class="divide-y divide-gray-700">
                            <?php foreach ($times as $time): ?>
                                <div class="p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                    <!-- Start Time -->
                                    <div class="flex items-center gap-3">
                                        <svg class="h-10 w-10 text-purple-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-gray-300">
                                            <?php echo htmlspecialchars($time['startingDay']) ?>
                                            <span class="text-purple-400 ml-2">
                                                @ <?php echo htmlspecialchars($time['startingHour']) ?>
                                            </span>
                                        </span>
                                    </div>

                                    <!-- Separator -->
                                    <div class="hidden sm:block text-gray-500">→</div>

                                    <!-- End Time -->
                                    <div class="flex items-center gap-3">
                                        <svg class="h-10 w-10 text-purple-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-gray-300">
                                            <?php echo htmlspecialchars($time['endingDay']) ?>
                                            <span class="text-purple-400 ml-2">
                                                @ <?php echo htmlspecialchars($time['endingHour']) ?>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <!-- No Schedule Message -->
            <div class="bg-gray-900/50 border border-gray-700 rounded-lg p-6 text-center">
                <p class="text-gray-400">
                    <?php echo htmlspecialchars(Flux::message('WoeNotScheduledInfo')) ?>
                </p>
            </div>
        <?php endif ?>

        <!-- Prize Info Box -->
        <div class="mt-8 bg-gray-900/50 border border-gray-700 rounded-lg p-6">
            <div class="flex items-start space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h4 class="text-sm font-medium text-white mb-2">Prize Pool Information</h4>
                    <div class="text-sm text-gray-400 space-y-2">
                        <p>• 10% of the total donation pool will be given to the winning guild</p>
                        <p>• Prize is distributed after WoE concludes</p>
                        <p>• Prize pool updates in real-time</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>