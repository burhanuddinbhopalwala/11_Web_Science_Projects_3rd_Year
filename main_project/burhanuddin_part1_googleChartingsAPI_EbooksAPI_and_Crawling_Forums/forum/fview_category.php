
<?php
session_start();?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="fstyle.css" />
</head>
<body>
<?php
include_once('topbar.php');?>;
<div id="wrapper">


<?php


if(!isset($_SESSION['name']))
{
	echo "Log In To Continue";
}
else
echo "<p> You are logged in as ".$_SESSION['name']."";

?>
<hr />
<div id="content">
<?php
include_once("Database_Connect.php");
$cid = $_GET['cid'];

if(isset($_SESSION['name']))
{
	$logged = " | <a href='fcreate_topic.php?cid=".$cid."'>Click Here to create A topic</a>";
}
else
{
	$logged = " | Please log in to create topics in this form.";
}

$sql = "select id from forum_categories where id='".$cid."'LIMIT 1";
$res = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($res) == 1)
{
	$sql2 = "select * from topics where category_id='".$cid."'ORDER BY topic_reply_date DESC";
	$res2 = mysql_query($sql2) or die(mysql_error());
	$topics = "";
	if(mysql_num_rows($res2) > 0)
	{
		$topics .= "<table width='100%' style='border-collapse:collapse;'>";
		$topics .= "<tr><td colspan='3'><a href='findex.php'>Return To forum</a>".$logged."<hr /></td></tr>";
		$topics .= "<tr style='background-color:#dddddd;'><td>Topic Title</td><td width='65' align='center'>Replies</td><td width='65' align='center'>Views</td></tr>";
		$topics .= "<tr><td colspan='3'><hr /></td><tr>";
		
		while($row = mysql_fetch_assoc($res2))
		{
			$tid = $row['id'];
			$title = $row['topic_title'];
			$views = $row['topic_views'];
			$creator = $row['topic_creator'];
			$date = $row['topic_date'];
			$topics .= "<tr><td><a href='fview_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a></td><td align='center'>0</td><td align='center'>".$views."</td></tr><hr /><tr><td><span class='post_info'>Posted By: ".$creator." on ".$date."</span></td></tr>";
			$topics .= "<tr><td colspan='3'><hr /></td></tr>";
		}
		$topics.="</table>";
		echo $topics;
	}
	else
	{
	echo "<a href='findex.php'>Return To Forum</a><hr />";
	echo "<p>There are no topics in this category yet ".$logged."</p>";
	}
	
}
else
{
	echo "<a href='findex.php'>Return To Forum</a><hr />";
	echo "<p> You are trying to view Category that doesnt exist yet.</p>";
}

?>
</div>
</div>
</body>
</html>
