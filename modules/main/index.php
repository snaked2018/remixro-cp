<?php
if (!defined('FLUX_ROOT')) exit;

$title = null;
$newslimit = (int)Flux::config('CMSNewsLimit');
$newstype = (int)Flux::config('CMSNewsType');
if($newstype == '1'){
	$news = Flux::config('FluxTables.CMSNewsTable'); 
	$sql = "SELECT title, body, link, author, created, modified FROM {$server->loginDatabase}.$news ORDER BY id DESC LIMIT $newslimit";
	$sth = $server->connection->getStatement($sql);
	$sth->execute();
	$news = $sth->fetchAll();
} elseif($newstype == '2'){
	$content = file_get_contents(Flux::config('CMSNewsRSS'));
	if($content) {
		$i = 0;
		$xml = new SimpleXmlElement($content);
	}
}

// Server status with caching
$cache = FLUX_DATA_DIR.'/tmp/ServerStatus.cache';
$tbl = Flux::config('FluxTables.OnlinePeakTable');

if (file_exists($cache) && (time() - filemtime($cache)) < (Flux::config('ServerStatusCache') * 60)) {
    $serverStatus = unserialize(file_get_contents($cache));
} else {
    $serverStatus = array();
    foreach (Flux::$loginAthenaGroupRegistry as $groupName => $loginAthenaGroup) {
        if (!array_key_exists($groupName, $serverStatus)) {
            $serverStatus[$groupName] = array();
        }

        $loginServerUp = $loginAthenaGroup->loginServer->isUp();

        foreach ($loginAthenaGroup->athenaServers as $athenaServer) {
            $serverName = $athenaServer->serverName;
            
            $sql = "SELECT COUNT(char_id) AS players_online FROM {$athenaServer->charMapDatabase}.char WHERE `online` > '0'";
            $sth = $loginAthenaGroup->connection->getStatement($sql);
            $sth->execute();
            $res = $sth->fetch();

            $serverStatus[$groupName][$serverName] = array(
                'loginServerUp' => $loginServerUp,
                'charServerUp' => $athenaServer->charServer->isUp(),
                'mapServerUp' => $athenaServer->mapServer->isUp(),
                'playersOnline' => intval($res ? $res->players_online : 0)
            );
        }
    }

    // Cache the results
    $fp = fopen($cache, 'w');
    if (is_resource($fp)) {
        fwrite($fp, serialize($serverStatus));
        fclose($fp);
    }
}

// Get first server status for display
$gameServer = array();
if (!empty($serverStatus)) {
    $firstGroup = reset($serverStatus);
    if (!empty($firstGroup)) {
        $gameServer = reset($firstGroup);
    }
}

return array(
    'title' => $title,
    'news' => $news,
    'newstype' => $newstype,
    'serverStatus' => $serverStatus,
    'gameServer' => $gameServer
);
?>
