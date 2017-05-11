<html>

<script>
</script>

<style>
body
{
margin: 0 0 0 0;
margin-top:13%;
}


#content1
{
position:relative;
height:100%;
width:100%;
background-color:#ebe9e2;
}

#main_div
	{		
			position:absolute;
			margin-top:7%;
			width:80%;
			margin-left:10%;
	}
	
	#title
	{
		font-size:23px;
	}
	
	#link
	{
		text-decoration:none;
		color:green;
	}
	
	#des
	{
		
	}
	
	
</style>
<?php 
include_once('topbar.php'); 
?>

<body>
<div id='content1'>
<?php 
$link = mysql_connect('localhost','root','');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db('minor', $link);
if (!$db_selected) {
    die ('Can\'t use Minor : ' . mysql_error());
}

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 5; 
$query = "select * from other_websites ORDER BY ID LIMIT $start_from,5";
$rs_result = mysql_query ($query); 

echo "<div id='main_div'>";

while ($row = mysql_fetch_assoc($rs_result)) { 

						$x = $row['ID'];
						$y = $row['title'];
						$z = $row['link'];
						$w = $row['des'];
						
						echo "<div id='title'>$y</div>";
						echo "<a id='link' href=$z onclick='window.open(this.href);return false;'>$z</a><br>";							
						echo "<div id='des'>$w</div><br>";

}; 

$sql = "SELECT COUNT(*) FROM other_websites"; 
$rs_result = mysql_query($sql); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0]; 
$total_pages = ceil($total_records / 5); 
  
for ($i=1; $i<=$total_pages; $i++) { 
//$x = "javascript:ajaxpage('other_websites.php?page='".$i."','content1')";
  //      echo "<a href='$x'>".$i."</a> "; 
		 echo "<a href='other_websites.php?page=".$i."'>".$i."</a> "; 
}; 
echo "</div>"
?>
</div>
<?php include_once('footer.php'); ?>
</body>
</html>