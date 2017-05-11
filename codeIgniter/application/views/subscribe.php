
<?php
include_once('Database_Connect.php');
$a = $_POST['emailsubscriber'];

$q1 = "select * from subscription where email='".$a."'";
$sql1 = mysql_query($q1) or die(mysql_error());

if(mysql_num_rows($sql1) == 1)
{
echo '1';
}
else
{
$q = "insert into subscription(email) values('".$a."')";
$sql = mysql_query($q) or die(mysql_error());
}

?>