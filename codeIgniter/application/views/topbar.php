<style>
#Login-mess
{
font-family:Bevan;
font-size:25px;
color:#FFFFFF;
margin-right:100px;
}
</style>
<?php
include_once 'Database_Connect.php';
?>

<link rel="stylesheet" href="CSS/main.css">
<script src="JS/jquery.min.js"></script>
<script src="JS/main.js" ></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script language="javascript" src="jquery.timers-1.0.0.js"></script>
<script src="JS/ajax.js" ></script>
<title>PlacementAssurred</title>

<div id="topbar" class="refresh" style="position:fixed";>

			<div style="display:inline">
                <a href="#" id = "home_but" style="text-decoration:none" ><span id="darken"><?php $d = mysql_query("SELECT * FROM web_data WHERE m_id=2");
				$data = mysql_fetch_array($d);echo ($data['name']);?></span><span id="darken1"><?php $d = mysql_query("SELECT * FROM web_data WHERE m_id=3");
				$data = mysql_fetch_array($d);echo ($data['name']);?>&nbsp</span></a>
			</div>
            
			<div class="navigation" style="display:inline">
				<a id="a3" href=""><img src="./new_images/topbar/topbar_downbutton2.png" title="Scroll to Top" height="20px" width="25px" onmouseover="this.src='
				./new_images/topbar_downbutton2.png'" onmouseout="this.src='./new_images/topbar/topbar_downbutton1.png'"></img></a>
				<a id="map_but" href="#"><img src="./new_images/topbar/topbar_locationimage.png" title="Map To Destination" height="30px" width="30px"></img></a>
			</div>
			
			
			<div id="in-ou">
				<p  style = "margin-top : -30px ; margin-left:960px ;"id="Login-mess" style="text-decoration:none">Welcome <?php /*$d = mysql_query("SELECT * FROM web_data WHERE m_id=36");
							$data = mysql_fetch_array($d);echo ($data['name']);*/?></a>			</div>
	
			<div id="in_out_menu">
				<ul id="out_out">
					<li><a href="#" id="logggg" class="out_out_href1">Welcome <?php $d = mysql_query("SELECT * FROM web_data WHERE m_id=36");
							$data = mysql_fetch_array($d);echo ($data['name']);?></a>
						<ul id="out_inside">
							<li><a id="po_but" href="" class="out_out_href2"><?php $d = mysql_query("SELECT * FROM web_data WHERE m_id=31");
							$data = mysql_fetch_array($d);echo ($data['name']);?></a></li>
							<li><a id="edit_but" href="" class="out_out_href2"><?php $d = mysql_query("SELECT * FROM web_data WHERE m_id=32");
							$data = mysql_fetch_array($d);echo ($data['name']);?></a></li>
							<li><a id="lo_but" href="" class="out_out_href2"><?php $d = mysql_query("SELECT * FROM web_data WHERE m_id=6");
							$data = mysql_fetch_array($d);echo ($data['name']);?></a></li>
						</ul>
					</li>
				</ul>
			</div>
</div>

<div id="fade_div"></div>
<div id="map_div"><img id="x_img3" src="./new_images/cross.png"><?php include('google_map.php'); ?></div>
<div id="login_div"><img id="x_img" src="./new_images/cross.png"><?php include_once('Loginform.php'); ?></div>			
<div id="regis_div"><img id="x_img1" src="./new_images/cross.png"><?php include_once('Registerform.php'); ?></div>	
<div id="forgot_div"><img id="x_img2" src="./new_images/cross.png"><?php include_once('Forgot_form.php'); ?></div>	
