<?php
require_once('dbEditor.php');
$db = new dbEditor();
$sqlSet = array(
    'DROP TABLE IF EXISTS `paste`',
    'DROP TABLE IF EXISTS `id`',
    'CREATE TABLE IF NOT EXISTS `id` (`id` int PRIMARY KEY)',
    'INSERT INTO `id` VALUES (100)',
    'CREATE TABLE IF NOT EXISTS `paste` (
      `id` int PRIMARY KEY,
	  `text` text,
	  `type` varchar(107),
	  `password` varchar(37))'
);
foreach ($sqlSet as $sql) if (!$db->query($sql)) die('Error');
echo 'Success';
?>
