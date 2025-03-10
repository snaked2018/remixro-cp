<?php
if (!defined('FLUX_ROOT')) exit;

$id = $params->get('id');
$title = 'View News';

if (!$id) {
    $this->redirect($this->url('news'));
}

$newsTable = Flux::config('FluxTables.CMSNewsTable');
// Get current news item
$sql = "SELECT * FROM {$server->loginDatabase}.$newsTable WHERE id = ?";
$sth = $server->connection->getStatement($sql);
$sth->execute(array($id));
$currentNews = $sth->fetch();

if (!$currentNews) {
    $this->redirect($this->url('news'));
}

// Get all news for slider
$sql = "SELECT * FROM {$server->loginDatabase}.$newsTable ORDER BY created DESC";
$sth = $server->connection->getStatement($sql);
$sth->execute();
$allNews = $sth->fetchAll();