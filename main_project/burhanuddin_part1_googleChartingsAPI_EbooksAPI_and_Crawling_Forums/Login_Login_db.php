<?php	
$link = mysql_connect('localhost','root','');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db('minor', $link);
if (!$db_selected) {
    die ('Can\'t use Minor : ' . mysql_error());
}
$x = $_POST['email'];
$y = $_POST['password'];


$new = strrev($y);
$password = hash("sha512", $new); 

$login = mysql_query("SELECT * FROM user WHERE email='$x' and password='$password'");
$x = mysql_fetch_assoc($login);
if (mysql_num_rows($login) == 1) 
{
session_start();
$_SESSION['name'] = $x['name'];
echo("1");
}
else {
	echo("2");
}
?>
