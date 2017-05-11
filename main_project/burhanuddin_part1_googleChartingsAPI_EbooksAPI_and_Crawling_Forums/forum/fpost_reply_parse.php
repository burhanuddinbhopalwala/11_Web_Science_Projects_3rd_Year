<?php
session_start();
include_once("Database_Connect.php");?>
<?php
if($_SESSION['name'])
{
echo "<div style='margin-top:-70px;position:fixed'>";
include_once('topbar.php');
echo "</div>";
	if(isset($_POST['reply_submit']))
	{
		$creator = $_SESSION['name'];
		$cid = $_POST['cid'];
		$tid = $_POST['tid'];
		$reply_content = $_POST['reply_content'];
		$sql = "insert into posts (category_id,topic_id, post_creator,post_content,post_date) VALUES ('".$cid."','".$tid."','".$creator."','".$reply_content."',now())";
		$res = mysql_query($sql) or die(mysql_error());
		$sql2 = "update forum_categories SET last_post_date=now(),last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
		$res2 = mysql_query($sql2) or die(mysql_error());
		$sql3 = "update topics SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1";
		$res3 = mysql_query($sql3) or die(mysql_error());
				
		if(($res) && ($res2) && ($res3))
		{
			echo "<p> Your reply has been successfully posted. <a href='fview_topic.php?cid=".$cid."&tid=".$tid."'>Click Here to Return Back</a></p>";
			// header( 'fview_topic.php?cid=".$cid."&tid=".$tid."' ) ;
		}
		else
			echo "<p> There was a problem, Try again Later</p>";
		
	}
	else
	{
		exit();
	}
}

else
{
	exit();
}
?>