.php
<?php
if (!defined('FLUX_ROOT')) exit;

$title = 'Castles';

$castleNames = Flux::config('CastleNames')->toArray();
$ids = implode(',', array_fill(0, count($castleNames), '?'));

$sql  = "SELECT castles.castle_id, castles.guild_id, castles.economy, guild.name AS guild_name, guild.emblem_id as emblem ";
$sql .= "FROM {$server->charMapDatabase}.guild_castle AS castles ";
$sql .= "LEFT JOIN guild ON guild.guild_id = castles.guild_id ";
$sql .= "WHERE castles.castle_id IN ($ids)";
$sql .= "ORDER BY castles.castle_id ASC";
$sth  = $server->connection->getStatement($sql);
$sth->execute(array_keys($castleNames));

$castles = $sth->fetchAll();
?>

<div class="bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">

        <div class="text-center my-12">
            <h2 class="text-3xl font-bold text-white">Castle Ownership</h2>
            <p class="mt-4 text-gray-400">Current status of all castles in the realm</p>
        </div>

        <!-- Castle Grid -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($castles as $castle): ?>
                <div class="bg-gray-900/50 border border-gray-700 rounded-lg overflow-hidden hover:border-purple-500 transition-colors duration-300">
                    <div class="p-6">
                        <!-- Castle Name and Status -->
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-medium text-white">
                                <?php echo htmlspecialchars($castleNames[$castle->castle_id]) ?>
                            </h3>
                            <span class="px-2 py-1 text-xs rounded-full <?php echo $castle->guild_id ? 'bg-green-900/50 text-green-400' : 'bg-red-900/50 text-red-400' ?>">
                                <?php echo $castle->guild_id ? 'Occupied' : 'Vacant' ?>
                            </span>
                        </div>

                        <!-- Guild Info -->
                        <?php if ($castle->guild_id): ?>
                            <div class="flex items-center space-x-3 mb-4">
                                <?php if ($castle->emblem): ?>
                                    <img src="<?php echo $this->emblem($castle->guild_id) ?>" 
                                         alt="Guild Emblem" 
                                         class="w-8 h-8 bg-gray-800 rounded-full">
                                <?php endif ?>
                                <span class="text-gray-300"><?php echo htmlspecialchars($castle->guild_name) ?></span>
                            </div>
                        <?php else: ?>
                            <p class="text-gray-500 mb-4">No guild currently owns this castle</p>
                        <?php endif ?>

                        <!-- Economy Status -->
                        <div class="mt-4 pt-4 border-t border-gray-700">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-400">Economy</span>
                                <span class="text-sm font-medium text-purple-400">
                                    <?php echo number_format($castle->economy) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <!-- Legend -->
        <div class="mt-12 bg-gray-900/50 border border-gray-700 rounded-lg p-6">
            <h4 class="text-sm font-medium text-white mb-4">Castle Status Legend</h4>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div class="flex items-center space-x-2">
                    <span class="w-3 h-3 rounded-full bg-green-900/50"></span>
                    <span class="text-gray-400">Occupied - Currently owned by a guild</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="w-3 h-3 rounded-full bg-red-900/50"></span>
                    <span class="text-gray-400">Vacant - Available for conquest</span>
                </div>
            </div>
        </div>
    </div>
</div>