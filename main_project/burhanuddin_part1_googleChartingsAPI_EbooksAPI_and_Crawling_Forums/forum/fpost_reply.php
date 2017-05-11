
<?php session_start();?>

<?php
if((!isset($_SESSION['name'])) || ($_GET['cid']) == "")
	{
	header("Location:findex.php");
	exit();
	}

$cid = $_GET['cid'];	
$tid = $_GET['tid'];
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="fstyle.css" />
</head>
<body>
<div style="margin-top:-70px;position:fixed">
<?php include_once('topbar.php');?></div>
<div id="wrapper">


<?php
echo "<p> You are logged in as ".$_SESSION['name']."";
?>
<hr />
<div id="content">
<form method="POST" action="fpost_reply_parse.php">
<p> Reply Content </p>
<textarea name="reply_content" rows="5" cols="75"></textarea>
<br /><br />
<input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
<input type="hidden" name="tid" value="<?php echo $tid; ?>"/>
<input type="submit" name="reply_submit" value="Post Your Reply" />
</form>
</div>
</div>
</body>
</html>