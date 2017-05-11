<style>
#user_info
{
height:80%;
width:100%;
margin-bottom:0%;
}

#nm1
{
margin-top:6%;
text-align:center;
font-size:50px;
font-family:Raleway;
}

#em
{
text-align:center;
font-size:20px;
font-family:Raleway;
}

#pn
{
text-align:center;
font-size:20px;
font-family:Raleway;
}

#dis
{
text-align:center;
font-size:20px;
font-family:Raleway;
}

#dis1
{
text-align:center;
font-size:22px;
font-family:Helvetica;
}

#dis2
{
margin-top:5%;
text-align:center;
font-size:24px;
font-family: Colonna MT;
}

#dis3
{
text-align:center;
font-size:20px;
font-family:Raleway;
}

</style>

<body style="margin:0 0 0 0;">

<?php
include_once('Database_Connect.php');
session_start();
echo "<div id='user_info'>";
if(isset($_SESSION['name']))
{
$un = $_SESSION['name'];
$q = "select * from user where name='".$un."'";
$sql = mysql_query($q);

$q1 = "select * from topics where topic_last_user='".$un."'";
$sql1 = mysql_query($q1);
$abc = 0;
$q2 = "select * from topics where topic_last_user='".$un."'";
$sql2 = mysql_query($q2);
while ($row = mysql_fetch_assoc($sql))
						{ 

						$x = $row['name'];
						$y = $row['phone'];
						$z = $row['email'];
						
						echo "<p id='nm1'>$x</p>";
						echo "<p id='em'>Email : $z</p>";
						echo "<p id='pn'>Phone : $y</p>";
						
						}
						while($row1 = mysql_fetch_assoc($sql1))
						$abc = $abc + 1;
						
						
						if($abc > 0)
						{echo "<p id='dis1'>Ever Participated in Discussions : Yes</p>";
						$w = 1;
						echo "<p id='dis2'> Discussion Topics : </p>";
						while($row2 = mysql_fetch_assoc($sql2))
						{
						$qwe = $row2['topic_title'];
						echo "<p id='dis3'>$w. $qwe</p>";
						$w = $w + 1;
						}
						
						}
						else
						{echo "<p id='dis'>Ever Participated in Discussions : No</p>";
						}
						
						
						
}
else
{
echo "Login to Display information";
}
echo "</div>";
?>

</body>