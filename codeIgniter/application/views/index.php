<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start(); 
include_once 'Database_Connect.php';
?>
<head>
<link rel="stylesheet" href="CSS/main.css">
<script src="JS/jquery.min.js"></script>
<script src="JS/main.js" ></script>
<script src="JS/i2.js" ></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script language="javascript" src="jquery.timers-1.0.0.js"></script>
<script src="JS/ajax.js" ></script>

<script>
$(document).ready(function(){
    $("#content").load("exphome.php");
});
</script>

</head>
<body>

<div id="div1">
<div id="divv">
<div id="part1">
<h1 id="youthwork">
<?php $d = mysql_query("SELECT * FROM web_data WHERE m_id=1");
	$data = mysql_fetch_array($d);
		echo ($data['name']);?>
</h1><br>
</div>
<div id="part2">
    <?php
		echo '<input id="but1" type="image" src="new_images/top_button.png" height="35px" width="55px" />';
	?>
</div>
</div>
<div id="all_stuff">
<?php include_once('topbar.php'); ?>			
<?php include_once('sidebar.php'); ?>
	</div>
</div>
</body>
</html>
