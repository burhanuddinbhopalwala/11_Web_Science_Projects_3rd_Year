<style>
#bookss
{
display:block;
margin-left:24%;
width:60%;
height:auto;
overflow:hidden;
}
</style>

<script>
</script>

<body bgcolor="#f2f0ea">
<div style="margin-top:5%">

<?php 
include_once("simple_html_dom.php");

ini_set('max_execution_time', 3000);
$html = new simple_html_dom();
$query_URL = "http://www.freejobalert.com/latest-notifications/";
$html->load_file($query_URL);


		$date = date("d/m/Y");
		$heading = $html->find('.PostHeaderIcon-wrapper');
		echo "<div id='bookss'>";
		echo "<h4><img src = 'new_images/sidebar/calender.png'/>";
		echo " ";
		echo $date;
		echo "</h4>";

        echo "<center><div style='background-color:#CED7E7;padding:3px;color:#525252;font-size:13px;font-family:Arial,Helvetica,Sans-Serif;width:98%'>
			$heading[0]</div></br>";

/*--------------------------------------------------------------------------------Filtered Crawling -----------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	foreach($html->find('.post') as $element) 
	{
			for( $x = 0 ; $x <= 3 ; $x++ )
			{
						$element_heading  = $element->find('p',$x);
						$element_heading_data = $element_heading->innertext;
						echo "$element_heading_data";
						$element_heading_data_table = $element->find('table',$x);
						echo $element_heading_data_table;
						echo "</br>";
			}
			// For Raliways
			$x = $x + 1 ;
			$element_heading  = $element->find('p',$x);
			$element_heading_data = $element_heading->innertext;
			echo "$element_heading_data";
			$element_heading_data_table = $element->find('table',$x);
			echo $element_heading_data_table;
			echo "</br>";
			
			// For Medical and Hospital Jobs
			$x = 52 ;
			$element_heading  = $element->find('p',52);
			$element_heading_data = $element_heading->innertext;
			echo "$element_heading_data";
			$element_heading_data_table = $element->find('table',52);
			echo $element_heading_data_table;
			echo "</br>";

			echo "</center></div>";
	}
/*--------------------------------------------------------------------------------Filtered Crawling -----------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
?>
</div>
</body>