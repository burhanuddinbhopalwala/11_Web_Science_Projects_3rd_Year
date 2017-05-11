
<?php session_start();

?>

<?php
if((!isset($_SESSION['name'])) || ($_GET['cid']) == "")
	{
	header("Location:findex.php");
	exit();
	}

$cid = $_GET['cid'];	
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="fstyle.css" />
</head>
<body>
<?php
include_once('topbar.php');?>;
<div id="wrapper">


<?php
echo "<p> You are logged in as ".$_SESSION['name']."<br>";
echo "<a href='findex.php'>Return To Forum</a><hr />";
echo "<a href='fview_category.php?cid=$cid'>    Return To Change Topic</a><hr />";
?>
<hr />
<div id="content">

	<form action="fcreate_topic_parse.php" method="POST">
		<p> Topic Title </p>
		<input type="text" name="topic_title" size="98" maxlength="150" />
		<p> Topic Content </p>
		<textarea name="topic_content" rows="5" cols="75"></textarea>
		<br /><br />
		<input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
		<input type="submit" name="topic_submit" value="Create Your Topic" />
	</form>

</div>
</div>
</body>
</html>