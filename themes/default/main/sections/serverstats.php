<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="pt-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0 flex flex-col justify-center md:justify-start">
            <h2 class="text-3xl font-semibold tracking-tight text-white sm:text-5xl">Server Statistics</h2>
            <p class="text-lg text-green-400 flex flex-col justify-center md:justify-start">Note: These rankings are currently unofficial and may not reflect final standings as the Administrator still on working progress..</p>
        </div>

        <!-- Bento Grid Layout -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Large Guild Agit Stats Card -->
            <div class="bg-gray-800 rounded-lg p-6 border border-indigo-500/20 md:col-span-2 relative h-full">
                <div class="absolute -top-3 -left-3">
                    <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium shadow-lg">Guild Rankings</span>
                </div>
                <h3 class="text-xl font-semibold text-white mb-4">Top Agit Guilds</h3>
                <div class="grid grid-cols-1 gap-4">
                    <?php
                    $guild_rankings = [
                        ['guild' => 'Game Master', 'points' => 99, 'castles' => 0, 'members' => 1, 'emblem' => 'default_emblem.bmp'],
                        ['guild' => 'Game Master', 'points' => 99, 'castles' => 0, 'members' => 1, 'emblem' => 'default_emblem.bmp'],
                        ['guild' => 'Game Master', 'points' => 99, 'castles' => 0, 'members' => 1, 'emblem' => 'default_emblem.bmp']
                    ];
                    foreach ($guild_rankings as $index => $guild): ?>
                    <div class="flex items-center justify-between p-4 md:p-4 bg-gray-900/50 rounded-lg">
                        <div class="flex items-center space-x-2 md:space-x-4">
                            <!-- Ranking Number and Emblem -->
                            <div class="flex items-center space-x-1 md:space-x-2">
                                <!-- Ranking Number -->
                                <div class="w-8 h-8 md:w-12 md:h-12 rounded-full bg-indigo-500/20 flex items-center justify-center">
                                    <span class="text-green-400 font-bold text-base md:text-xl">#<?php echo $index + 1; ?></span>
                                </div>
                                <!-- Guild Emblem -->
                                <div class="w-8 h-8 md:w-12 md:h-12 rounded-lg bg-gray-900/50 border border-indigo-500/20 flex items-center justify-center overflow-hidden">
                                    <?php if (!empty($guild['emblem'])): ?>
                                        <img 
                                            src="<?php echo $this->themePath('img/emblem/' . htmlspecialchars($guild['emblem'])) ?>" 
                                            alt="<?php echo htmlspecialchars($guild['guild']) ?> emblem"
                                            class="w-6 h-6 md:w-10 md:h-10 object-contain"
                                            onerror="this.onerror=null; this.src='<?php echo $this->themePath('img/emblem/default_emblem.bmp') ?>'"
                                        />
                                    <?php else: ?>
                                        <div class="text-green-400/50 text-base md:text-2xl">
                                            <?php echo substr($guild['guild'], 0, 1); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Guild Info -->
                            <div>
                                <p class="text-white font-medium text-sm md:text-lg truncate max-w-[120px] md:max-w-none">
                                    <?php echo htmlspecialchars($guild['guild']); ?>
                                </p>
                                <div class="flex flex-col md:flex-row md:space-x-4 text-xs md:text-sm text-gray-400">
                                    <span class="whitespace-nowrap"><?php echo $guild['castles']; ?> Castles</span>
                                    <span class="hidden md:inline">•</span>
                                    <span class="whitespace-nowrap"><?php echo $guild['members']; ?> Members</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Points -->
                        <div class="text-right flex flex-col justify-center">
                            <span class="text-green-400 font-semibold text-sm md:text-lg whitespace-nowrap">
                                <?php echo number_format($guild['points']); ?>
                            </span>
                            <p class="text-gray-400 text-xs md:text-sm">points</p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Agit Prize Pool -->
                <div class="mt-6 p-4 bg-gradient-to-r from-yellow-500/10 via-yellow-500/5 to-transparent rounded-lg border border-yellow-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-white font-medium text-yellow-400">Current Agit Prize Pool</h4>
                            <p class="text-gray-400 text-sm">10% of total server donations</p>
                        </div>
                        <?php
                        $total_donations = 0; // Replace with actual donation amount
                        $prize_pool = $total_donations * 0.10;
                        ?>
                        <div class="text-right">
                            <?php if ($total_donations > 0): ?>
                                <span class="text-yellow-400 font-bold text-xl"><?php echo number_format($prize_pool); ?> Zeny</span>
                            <?php else: ?>
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-400 text-sm">Calculating Donations</span>
                                    <div class="animate-pulse">
                                        <span class="text-yellow-400">...</span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Rankings Cards -->
            <div class="h-full flex flex-col">
                <div class="relative h-full">
                    <div class="absolute -top-3 -left-3">
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium shadow-lg">Server Leaders</span>
                    </div>
                    <div class="grid grid-cols-1 gap-3">
                        <?php
                        $rankings = [
                            ['title' => 'PvP Champion', 'player' => 'Player1', 'score' => '99 kills', 'icon' => '⚔️', 'bg' => 'bg-gradient-to-r from-red-500/10 to-transparent'],
                            ['title' => 'GvG Kills', 'player' => 'Player2', 'score' => '99 kills', 'icon' => '👑', 'bg' => 'bg-gradient-to-r from-yellow-500/10 to-transparent'],
                            ['title' => 'Top Miner', 'player' => 'Player4', 'score' => '99 ores', 'icon' => '⛏️', 'bg' => 'bg-gradient-to-r from-blue-500/10 to-transparent'],
                            ['title' => 'Richest Player', 'player' => 'Player5', 'score' => '99M Zeny', 'icon' => '💰', 'bg' => 'bg-gradient-to-r from-green-500/10 to-transparent'],
                            ['title' => '', 'player' => 'Player3', 'score' => '99 pts', 'icon' => '🎉', 'bg' => 'bg-gradient-to-r from-purple-500/10 to-transparent']
                        ];
                        foreach ($rankings as $rank): ?>
                        <div class="bg-gray-800 rounded-lg p-3 border border-indigo-500/20 transition-all duration-300 hover:border-indigo-500/50">
                            <div class="flex justify-between items-center <?php echo $rank['bg']; ?> rounded-lg p-2">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-full bg-indigo-500/20 flex items-center justify-center">
                                        <span class="text-lg"><?php echo $rank['icon']; ?></span>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-medium"><?php echo htmlspecialchars($rank['title']); ?></h4>
                                        <p class="text-gray-400 text-xs"><?php echo htmlspecialchars($rank['player']); ?></p>
                                    </div>
                                </div>
                                <span class="text-green-400 font-medium text-sm"><?php echo htmlspecialchars($rank['score']); ?></span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- WOE Castle Map -->
            <div class="bg-gray-800 rounded-lg p-6 border border-indigo-500/20 md:col-span-2 relative">
                <div class="absolute -top-3 -left-3">
                    <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium shadow-lg">War of Emperium</span>
                </div>
                
                <!-- WoE Schedule Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column: Next WoE Info -->
                    <div>
                        <h3 class="text-xl font-semibold text-white mb-4">Next WOE - Prontera Castle</h3>
                        <div class="relative">
                            <img src="<?php echo $this->themePath('img/castle/prt_gld.bmp') ?>" alt="Prontera Castle Map" class="rounded-lg w-full">
                            <div class="absolute top-4 right-4 bg-black/75 rounded-lg px-2 py-1 bg-gray-900">
                                <p class="text-white">Starts in: <span class="text-green-500">99d 15h 30m</span></p>
                            </div>
                        </div>
                        
                        <!-- Longest Defense Record -->
                        <div class="mt-4 p-4 bg-gradient-to-r from-indigo-500/10 via-indigo-500/5 to-transparent rounded-lg border border-indigo-500/20">
                            <h4 class="text-white font-medium mb-2">Longest Defense Record</h4>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-green-400 font-bold"><?php echo htmlspecialchars('Guild Empire'); ?></p>
                                    <p class="text-gray-400 text-sm">Prontera Castle 1</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-green-400 font-bold">345 Minutes</span>
                                    <p class="text-gray-400 text-sm">99 Points</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Column: WoE Schedules -->
                    <div>
                        <h3 class="text-xl font-semibold text-white mb-4">WoE Schedule</h3>
                        
                        <!-- Regular WoE -->
                        <div class="mb-4 p-4 bg-gray-900/50 rounded-lg">
                            <h4 class="text-white font-medium mb-2">Regular WoE</h4>
                            <div class="space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Sunday</span>
                                    <span class="text-green-400">May 2025</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Thursday</span>
                                    <span class="text-green-400">May 2025</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- WoE:SE -->
                        <div class="mb-4 p-4 bg-gray-900/50 rounded-lg">
                            <h4 class="text-white font-medium mb-2">WoE: Second Edition</h4>
                            <div class="space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Saturday</span>
                                    <span class="text-green-400">May 2025</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- KoE -->
                        <div class="p-4 py-7 bg-gradient-to-r from-yellow-500/10 via-yellow-500/5 to-transparent rounded-lg border border-yellow-500/20">
                            <h4 class="text-white font-medium mb-2">King of Emperium</h4>
                            <div class="space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Wednesday</span>
                                    <span class="text-yellow-400">April 12</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Saturday</span>
                                    <span class="text-yellow-400">April 15</span>
                                </div>
                            </div>
                        </div>
                        <!-- Battleground -->
                        <div class="p-4 mt-4 bg-gradient-to-r from-yellow-500/10 via-yellow-500/5 to-transparent rounded-lg border border-yellow-500/20">
                            <h4 class="text-white font-medium mb-2">Battlegrounds</h4>
                            <div class="space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">-</span>
                                    <span class="text-yellow-400">Not yet implemented</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">-</span>
                                    <span class="text-yellow-400">Not yet implemented</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event List -->
            <div class="bg-gray-800 rounded-lg p-6 border border-indigo-500/20 relative">
                <div class="absolute -top-3 -left-3">
                    <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium shadow-lg">Server Events</span>
                </div>
                <h3 class="text-xl text-center font-semibold text-white mb-4">Major Events</h3>
                <div class="space-y-4">
                    <?php
                    $events = [
                        [
                            'name' => 'Bossnia Event', 
                            'active' => false, 
                            'starts' => '1d 12h',
                            'start_date' => '2025-03-11 20:00',
                            'end_date' => '2026-03-11 22:00'
                        ],
                        [
                            'name' => 'Colosseum', 
                            'active' => false, 
                            'starts' => '1d 12h',
                            'start_date' => '2025-03-12 21:00',
                            'end_date' => '2025-03-12 23:00'
                        ],
                        [
                            'name' => 'Emperium Challenge', 
                            'active' => false, 
                            'starts' => '1d 12h',
                            'start_date' => '2025-03-11 19:00',
                            'end_date' => '2025-03-11 21:00'
                        ],
                        [
                            'name' => '[Instance] Monster Hunt', 
                            'active' => false, 
                            'starts' => '1d 12h',
                            'start_date' => '2025-03-11 19:00',
                            'end_date' => '2025-03-11 21:00'
                        ]
                    ];
                    foreach ($events as $event): ?>
                    <div class="flex items-center justify-between bg-gray-900/50 rounded-lg hover:bg-gray-900/70 transition-colors">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 rounded-full <?php echo $event['active'] ? 'bg-green-500' : 'bg-gray-500'; ?>"></div>
                            <div>
                                <span class="text-white"><?php echo htmlspecialchars($event['name']); ?></span>
                                <p class="text-xs text-gray-400">
                                    <?php 
                                    echo date('M d, H:i', strtotime($event['start_date'])); 
                                    echo ' - ';
                                    echo date('H:i', strtotime($event['end_date']));
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-sm <?php echo $event['active'] ? 'text-green-400' : 'text-gray-400'; ?>">
                                <?php echo $event['active'] ? 'Ends in: ' . $event['ends'] : 'Starts in: ' . $event['starts']; ?>
                            </span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Repeat similar structure for Hosted Events and Streamer Events with their respective dates -->
                <h3 class="text-xl mt-6 text-center font-semibold text-white mb-4">Hosted Events</h3>
                <div class="space-y-4">
                    <?php
                    $hosted_events = [
                        [
                            'name' => 'Run for your life', 
                            'active' => true, 
                            'ends' => '1h 30m',
                            'start_date' => '2024-03-11 20:00',
                            'end_date' => '2024-03-11 22:00',
                            'host' => ''
                        ],
                        [
                            'name' => 'Hide & Seek', 
                            'active' => false, 
                            'starts' => '2d 12h',
                            'start_date' => '2024-03-13 19:00',
                            'end_date' => '2024-03-13 20:00',
                            'host' => ''
                        ],
                        [
                            'name' => 'Fabre Punch', 
                            'active' => false, 
                            'starts' => '2d 12h',
                            'start_date' => '2024-03-13 19:00',
                            'end_date' => '2024-03-13 20:00',
                            'host' => ''
                        ],
                        [
                            'name' => 'Dice Event', 
                            'active' => false, 
                            'starts' => '2d 12h',
                            'start_date' => '2024-03-13 19:00',
                            'end_date' => '2024-03-13 20:00',
                            'host' => ''
                        ]
                    ];
                    foreach ($hosted_events as $event): ?>
                    <div class="flex items-center justify-between bg-gray-900/50 rounded-lg hover:bg-gray-900/70 transition-colors">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 rounded-full <?php echo $event['active'] ? 'bg-green-500' : 'bg-gray-500'; ?>"></div>
                            <div>
                                <span class="text-white"><?php echo htmlspecialchars($event['name']); ?></span>
                                <div class="flex items-center space-x-2 text-xs">
                                    <span class="text-gray-400">
                                        <?php 
                                        echo date('M d, H:i', strtotime($event['start_date'])); 
                                        echo ' - ';
                                        echo date('H:i', strtotime($event['end_date']));
                                        ?>
                                    </span>
                                    <span class="text-green-400"><?php echo htmlspecialchars($event['host']); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-sm <?php echo $event['active'] ? 'text-green-400' : 'text-gray-400'; ?>">
                                <?php echo $event['active'] ? 'Ends in: ' . $event['ends'] : 'Starts in: ' . $event['starts']; ?>
                            </span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Refresh Timer -->
        <div class="mt-8 text-center text-sm text-gray-400">
            Statistics update every hour. Last updated: <?php echo date('Y-m-d H:i:s'); ?>
        </div>
    </div>
</div>