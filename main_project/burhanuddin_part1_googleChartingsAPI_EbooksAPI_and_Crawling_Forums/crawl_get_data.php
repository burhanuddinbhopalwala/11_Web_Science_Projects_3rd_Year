<html>
	<head>
<!--		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> -->
		<style>
		
		body
		{
 		margin-top:5%;
		}
		
	#disp_main_link
	{
		text-decoration:none;
		color:green;
	}

	#displink
	{	
		text-decoration:none;
		
		font-size: 40px;
		white-space:nowrap;
		margin-left:90px;
		line-height:180%;
	}
	
			
			#SearchBox {
				
				float: left;
				height: 60px;
				width: 370px;
				
				-webkit-box-shadow: 0px 1px 5px #999;
				margin-left:10%;
				
			}
			
			#SearchButton {
				float: left;
				height: 60px;
				width: 70px;
			}
			
			#SearchInput {
				
				border: none;
				color: #999999;
				font-size: 16px;
				outline: none;
				margin: 20px;
				width: 330px;
				
			}
			
			#SearchResults {
				background: #000000;
				display: none;
				overflow: auto;
				position: absolute;
				width: 330px;
				z-index: 99;
				margin-left:10%;
			}
			
			#SearchResults a {
				color: #FFFFFF;
				display: block;
				padding: 5px 5px 5px 15px;
				text-decoration: none;
			}
			
			
			#SearchResults a:hover {
				color: #333333;
				background: #CCCCFF;
			}
			
			#bookss
		{
			display:block;
			margin-left:24%;
			width:60%;
			height:auto;
			overflow:hidden;
		}
	
		</style>
		<script type="text/javascript" src="JS/jquery-1.3.2.min.js"></script>
		<script type="text/javascript">
		
		
			$(document).ready(function() {
			
				$("#SearchInput").focus(function() {
					if($("#SearchInput").val() == "History Search") {
						$("#SearchInput").val("");
					}
					$("#SearchInput").css("color", "#000000");
				});
				
				$("#SearchInput").blur(function() {
					if($("#SearchInput").val() == "") {
						$("#SearchInput").val("History Search");
						$("#SearchInput").css("color", "#999999");
					}
					$("#SearchResults").slideUp();
				});
				
				$("#SearchInput").keydown(function(e) {
					if(e.which == 8) {
						SearchText = $("#SearchInput").val().substring(0, $("#SearchInput").val().length-1);
					}
					else {
						SearchText = $("#SearchInput").val() + String.fromCharCode(e.which);
					}
					$("#SearchResults").load("crawl_ajax.php", { SearchInput: SearchText });
					$("#SearchResults").slideDown();
				});
			
			});
		</script>
	</head>
	
<body>
<?php
echo "<div id = 'bookss'>";
?>
<form action="" method="post" action="index.php">

<table style="margin: auto; width: 975px;">
	<tr>
		<td width="380">
			<div id="SearchBox">
				<input type="text" id="SearchInput" name="SearchInput" placeholder="Search Vacancy Area Wise" style="background-color:#ebe9e2" autocomplete="off">
			</div>
			<div id="SearchButton">
				<input type="image" src="images/glass.png" height="65px" width="65px"/>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div style="position: relative; left: 20px; top: -20px;">
				<div id="SearchResults"></div>
			</div>
		</td>
	</tr>
</table>
</form>

</body>
</html>

<?php
include 'Database_Connect.php';
if (isset($_GET["page"])) { 
							$page  = $_GET["page"]; 
						} 
						else { $page=1; }; 
$start_from = ($page-1) * 5; 


		if(isset($_POST['SearchInput']))
		{
		$search = htmlentities($_POST['SearchInput']);
		echo "<script>  
			$(document).ready(function(){
				
			});
					
			</script>";
			
/*---------------------------------------------------------------Crawling Free Jobs Alert----------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
				
include_once("simple_html_dom.php");

ini_set('max_execution_time', 3000);
$html = new simple_html_dom();
$query_URL = "http://www.freejobalert.com/latest-notifications/";
$html->load_file($query_URL);


		$date = date("d/m/Y");
		$heading = $html->find('.PostHeaderIcon-wrapper');
		echo "<h4><img src = 'new_images/sidebar/calender.png'/>";
		echo " ";
		echo $date;
/*--------------------------------------------------------------------------------Filtered Crawling -----------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$Banks = 0 ; 
$Other_Govt_Financial_Institutes = 1 ;
$UPSC = 2 ;
$SSC = 3 ;
$Other_All_India_Exams = 4 ;
$Railways = 5;
$Andaman_Nikobar = 6 ;
$Andhra_Pradesh = 7 ;
$Arunachal_Pradesh = 8 ;
$Assam = 9 ;
$Bihar = 10 ;
$Chandigarh = 11 ;
$Chhattisgarh = 12 ;
$Dadra_Nagar_Haveli = 13 ;
$Daman_Diu = 14 ;
$Delhi = 15 ;
$Goa = 16 ;
$Gujarat = 17 ;
$Haryana = 18 ;
$Himachal_Pradesh = 19 ;
$Jammu_Kashmir = 20 ;
$Jharkhand = 21 ;
$Karnataka = 22 ;
$Kerela = 23 ;
$Lakshadweep = 24 ;
$Madhya_Pradesh = 25 ;
$Maharashtra = 26 ;
$Manipur = 27 ;
$Meghalaya = 28 ;
$Mizoram = 29 ;
$Nagaland = 30 ;
$Odisha_Orissa = 31 ;
$Puduchhery = 32 ;
$Punjab = 33 ;
$Rajasthan = 34 ;
$Sikkim = 35 ;
$Tamil_Nadu = 36 ;
$Telangana = 37 ;
$Tripura = 38 ;
$Uttarakhand = 39 ;
$Uttar_Pradesh = 40 ;
$West_Bengal = 41 ;
$Medical_Hospital_Jobs = 42 ;

	foreach($html->find('.post') as $element) 
	{
			for( $x = 0 ; $x <= 42 ; $x++ )
			{
							if( $x == $Banks  && $search == "Banks")	
							{
								$element_heading  = $element->find('p',$x);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
							}
			
							if( $x == $Other_Govt_Financial_Institutes  && $search == "Other Govt Financial Institutes")	
							{
								$element_heading  = $element->find('p',$x);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
							}
							
							else if( $x == $UPSC  && $search == "UPSC")	
							{
								$element_heading  = $element->find('p',$x);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
							else if( $x == $SSC  && $search == "SSC")	
							{
								$element_heading  = $element->find('p',$x);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
								
							}
							else if( $x == $Other_All_India_Exams && $search == "OtherAllIndiaExams")	
							{
								$element_heading  = $element->find('p',$x);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
								
								
							}
							else if( $x == $Railways  && $search == "Railways")	
							{
								$element_heading  = $element->find('p',$x);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
						}
											
							else if( $x == $Andhra_Pradesh  && $search == "Andhra Pradesh")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Arunachal_Pradesh  && $search == "Arunachal Pradesh")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
								
							}
											
							else if( $x == $Assam  && $search == "Assam")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Bihar  && $search == "Bihar")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Chandigarh  && $search == "Chandigarh")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Chhattisgarh  && $search == "Chhattisgarh")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Dadra_Nagar_Haveli   && $search == "Dadra & Nagar Haveli")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Daman_Diu  && $search == "Daman & Diu")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Delhi  && $search == "Delhi")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Goa  && $search == "Goa")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Gujarat  && $search == "Gujarat")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Haryana  && $search == "Haryana")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Himachal_Pradesh  && $search == "Himachal_Pradesh")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Jammu_Kashmir  && $search == "Jammu & Kashmir")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Jharkhand  && $search == "Jharkhand")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
								
							}
											
							else if( $x == $Karnataka  && $search == "Karnataka")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Kerela  && $search == "Kerela")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Lakshadweep  && $search == "Lakshadweep")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Madhya_Pradesh  && $search == "Madhya Pradesh")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Maharashtra  && $search == "Maharashtra")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Manipur  && $search == "Manipur")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Meghalaya  && $search == "Meghalaya")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Mizoram && $search == "Mizoram")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
								
							}
											
							else if( $x == $Nagaland  && $search == "Nagaland")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Odisha_Orissa  && $search == "Orrisa")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Puduchhery  && $search == "Puduchhery")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Punjab  && $search == "Punjab")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Rajasthan && $search == "Rajasthan")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Sikkim  && $search == "Sikkim")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Tamil_Nadu  && $search == "Tamil Nadu")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Telangana   && $search == "Telangana ")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Tripura  && $search == "Tripura")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Uttarakhand  && $search == "Uttarakhand")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Uttar_Pradesh  && $search == "Uttar Pradesh")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
							}
											
							else if( $x == $West_Bengal  && $search == "West_Bengal")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
								
							}
											
							else if( $x == $Medical_Hospital_Jobs  && $search == "Medical Hospital Jobs")	
							{
								$element_heading  = $element->find('p',$x+9);
								echo "<center>";
								echo $element_heading->innertext;
								echo "</center>";
								$element_heading_data_table = $element->find('table',$x);
								echo $element_heading_data_table;
								
										/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
								$element_heading_data_table_body = $element_heading_data_table->find('tbody');
								$element_heading_data_table_body_0row = $element_heading_data_table->find('tr',1);
								
								$element_heading_data_table_body_0td_postdate = $element_heading_data_table_body_0row->find('td',0);
								$element_heading_data_table_body_1td_recruitment_board = $element_heading_data_table_body_0row->find('td',1);
								$element_heading_data_table_body_2td_postname = $element_heading_data_table_body_0row->find('td',2);
								$element_heading_data_table_body_3td_eligiblity = $element_heading_data_table_body_0row->find('td',3);
								$element_heading_data_table_body_5td_lastdate = $element_heading_data_table_body_0row->find('td',5);
								
					
								
								$rs=mysql_query("select * from  free_jobs_alert where category = '$element_heading->plaintext' AND  
								title2_main='$element_heading_data_table_body_2td_postname->plaintext'");
								if (mysql_num_rows($rs)>0);
								else
								{
									$query = "insert into free_jobs_alert(category,postdate,title1,title2_main,eligiblity,last_date,href) values
									(
										'$element_heading->plaintext',
										'$element_heading_data_table_body_0td_postdate->plaintext',
										'$element_heading_data_table_body_1td_recruitment_board->plaintext',
										'$element_heading_data_table_body_2td_postname->plaintext',
										'$element_heading_data_table_body_3td_eligiblity->plaintext',
										'$element_heading_data_table_body_5td_lastdate->plaintext',
										'$query_URL'
									)";
									mysql_query($query,$link) or die(mysql_error());
								}
						/*-------------------------------------------------------------Storing in DB----------------------------------------------------*/		
				
							}
			}
	}
/*--------------------------------------------------------------------------------Filtered Crawling Ends -----------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------Mainlinks Crawling -----------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

		echo "</br>";
		$query = "select * from mainlinks where keywords like '%$search%' or link like '%$search%' ORDER BY counter DESC LIMIT $start_from,5";
		$result = mysql_query($query);

		if (!$result) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message .= 'Whole query: ' . $query;
				die($message);
					  }
					  
                      while ($row = mysql_fetch_assoc($result)) 
						{
							$x = $row['link'];
							$y = $row['des'];
							
							echo "</br>";
							echo "<a id='disp_main_link' href=$x target='_blank'>$x</a>";
							echo "<div id=''>$y</div><br><br>";
							
						}
						
						$sql = "SELECT COUNT(*) FROM mainlinks where keywords like '%$search%' or link like '%$search%'"; 
						$rs_result = mysql_query($sql); 
						$row = mysql_fetch_row($rs_result); 
						$total_records = $row[0]; 
						$total_pages = ceil($total_records / 5); 
  
						
					/*	for ($i=1; $i<=$total_pages; $i++) { 
							echo "<a href='crawl_get_data.php?page=".$i."'>".$i."</a> "; 
															}; 
					*/						
		}			  
?>
