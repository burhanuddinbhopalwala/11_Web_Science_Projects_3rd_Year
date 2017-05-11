<?php
include_once 'Database_Connect.php';
?>

<link rel="stylesheet" href="CSS/main.css">
<script src="JS/jquery.min.js"></script>
<script src="JS/main.js" ></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script language="javascript" src="jquery.timers-1.0.0.js"></script>
<script src="JS/ajax.js" ></script>
<style>
body
{
height:100%;
width:100%;
margin:0 0 0 0;
background-color:#ebe9e2;
}
</style>
<body>

<div id="index-left-side-nav">
			<div id="index-left-side-nav-header">
				<a id="image" href="#"><img src="./new_images/sidebar/sidebar_logo.png" width="120px" height="120px"/></a>
			</div>
			
<div id="navcontainer">
<ul id="navlist">

    <li><a href = "../template/index.php" style="cursor: pointer;">Home</a></li>
    <li><a id="today_but" href="#" style="cursor: pointer;"><?php $d = mysql_query("SELECT * FROM web_data WHERE m_id=33");$data = mysql_fetch_array($d);echo ($data['name']);?></a></li>
	<li><a id="histtv_but" href="#" style="cursor: pointer;"><?php $d = mysql_query("SELECT * FROM web_data WHERE m_id=35");$data = mysql_fetch_array($d);echo ($data['name']);?></a></li>
	<li id="active"><a href="#" id="oth_web"><?php $d = mysql_query("SELECT * FROM web_data WHERE m_id=12");$data = mysql_fetch_array($d);echo ($data['name']);?></a> 
	<li><a  href="ebooks.php" style="cursor: pointer;">Find EBooks</a></li>
    <li><a id="discus_but" href="#" style="cursor: pointer;"><?php $d = mysql_query("SELECT * FROM web_data WHERE m_id=17");$data = mysql_fetch_array($d);echo ($data['name']);?></a></li>
   	<li><a href="#" style="cursor: pointer;"><?php $d = mysql_query("SELECT * FROM web_data WHERE m_id=34");$data = mysql_fetch_array($d);echo ($data['name']);?></a></li>
    
</ul>
</div>

<div id="index-left-side-nav-hide">
				<a id="nav-but1"><img src="./new_images/sidebar/sidebar_leftarrow1.png" title="About" height="20px" width="20px" 
				onMouseOver="this.src='./new_images/sidebar/sidebar_leftarrow2.png' onMouseOut="this.src='./new_images/sidebar/sidebar_leftarrow1.png'></img></a>
			</div>
</div>

<div id="index-left-side-nav-show">
	<a id="nav-but2"><img src= "./new_images/sidebar/sidebar_rightarrow1.png" title="About" height="25px" width="25px"
	onMouseOver="this.src='new_images\sidebar\sidebar_rightarrow2.png' onMouseOut="this.src='./new_images/sidebar/sidebar_rightarrow1.png'></img></a>
</div>

<div id="content"></div>
</body>