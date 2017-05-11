<?php
$link = mysql_connect('localhost','root','');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db('minor', $link);
if (!$db_selected) {
    die ('Can\'t use Minor DB... : ' . mysql_error());
}
?>