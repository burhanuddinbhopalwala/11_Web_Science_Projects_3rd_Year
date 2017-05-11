<?php
require("Database_Connect.php");
?>
<style>
#bookss
{
display:block;
margin-left:24%;
width:50%;
height:auto;
overflow:hidden;
}

#read_more2
{
overflow:hidden;
display:none; 
}

</style>

<script>
$(document).ready(function(){
  $("#read_more_but").click(function(e)
  {
				$("#read_more").css({"display":"none"});
				$("#read_more_but").css({"display":"none"});
                $("#read_more2").css({"display":"inline-block"});
  });
});
</script>

<body bgcolor="#f2f0ea">
<div style="margin-top:5%">

<?php
/*
$con=mysql_connect('localhost' , 'root','') or   die('connection Error');
         if($con)
             mysql_select_db('minor') or die('Could not Select Database');
*/ 	
include_once("simple_html_dom.php");
ini_set('max_execution_time', 3000);
$html = new simple_html_dom();
$site_link = "http://indiatoday.intoday.in/story/placements-at-top-engineering-colleges-pick-up-steam/1/331622.html/";
$html->load_file($site_link);

		echo "<div id='bookss'>";
		
		foreach( $html->find('.strleft') as $element )
		{
			$element_heading = $element->find('h1');
			$element_heading_data = $element_heading[0]->innertext;
	
			$element_para1_class = $element->find('.strtitlealias');
			$element_para1_class_h2 = $element->find('h2');
			$element_para1 = $element_para1_class_h2[0]->innertext;
	
			$element_image = $element->find('.mediumcontent');
			$element_image_data = $element_image[0]->find('img');
			$element_image_path = $element_image_data[0]->src;
			//echo $element_image_path;
		
			$element_para2_class  = $element->find('.right-story-container'); 
			$element_para2 = $element_para2_class[0]->innertext;

/*-----------------------------------------------------------------------Storing in SQL code----------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
					$date = date('Y-m-d H:i:s');
					$rs=mysql_query("select * from  latest_placements where title1='$element_heading_data'");
					if (mysql_num_rows($rs)>0);
					else
					{
						$query = "insert into latest_placements(dates,title1,title2,href,image_path) values('$date','$element_heading_data','$element_para1',
						'$site_link','$element_image_path')";
						mysql_query($query,$link) or die(mysql_error());
					}

					$q3 = "select * from latest_placements order by id desc";
					$my = mysql_query($q3);
					$row = mysql_fetch_assoc($my);

/*-----------------------------------------------------------------------Storing in SQL code----------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
	
					$date = date("d/m/Y");
					echo "<br><h4><img src = 'new_images/sidebar/calender.png'/>";
					echo " ";
					echo $date;
					echo "</h4>";
			
					echo " <h1>";
					echo $row['title1'];
					echo" </h1> ";
		
					echo " <h3>";
					echo $row['title2'];
					echo" </h3> ";
					echo "<br>";
			
					echo " <h3>";
					echo $element_image_data[0];
					echo" </h3> ";
					echo "<br>";
		
					echo "<a href='".$row['href']."' onclick='window.open(this.href);return false;' style='text-decoration:none;'>Click to view in browser</a>";
					echo "<br>";
					echo "<div id='read_more'>";
					echo "</div>";
					echo "<br>";
					echo "<div id='read_more_but'><a href='#' style='text-decoration:none;'>Read More</a></div>";
					echo "<br>";
		
					echo "<div id='read_more2'>$element_para2</div>";
					echo "</div>";
			}
							
?>
</div>
</body>