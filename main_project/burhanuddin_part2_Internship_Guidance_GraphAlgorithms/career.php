<?php 
include("topbar.php");
?>
<head>
<style>
#bookss
{
display:block;
margin-left:24%;
width:50%;
height:auto;
overflow:hidden;
}

body {
    background-image: url("./bg.png");
}

<style>
	.formStyle2{
	color: #993300;
	font-weight: bold;
}

input#gobutton{
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
padding:5px 25px; /*add some padding to the inside of the button*/
background:#35b128; /*the colour of the button*/
border:1px solid #33842a; /*required or the default border for the browser will appear*/
/*give the button curved corners, alter the size as required*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
/*give the button a drop shadow*/
-webkit-box-shadow: 0 0 4px rgba(0,0,0, .75);
-moz-box-shadow: 0 0 4px rgba(0,0,0, .75);
box-shadow: 0 0 4px rgba(0,0,0, .75);
/*style the text*/
color:#f3f3f3;
font-size:1.1em;
}
/***NOW STYLE THE BUTTON'S HOVER AND FOCUS STATES***/
input#gobutton:hover, input#gobutton:focus{
background-color :#399630; /*make the background a little darker*/
/*reduce the drop shadow size to give a pushed button effect*/
-webkit-box-shadow: 0 0 1px rgba(0,0,0, .75);
-moz-box-shadow: 0 0 1px rgba(0,0,0, .75);
box-shadow: 0 0 1px rgba(0,0,0, .75);
}


.dropdown {
  display: inline-block;
  position: relative;
  overflow: hidden;
  height: 32px;
  width: 275px;
  background: #f2f2f2;
  border: 1px solid;
  border-color: white #f7f7f7 #f5f5f5;
  border-radius: 3px;
  background-image: -webkit-linear-gradient(top, transparent, rgba(0, 0, 0, 0.06));
  background-image: -moz-linear-gradient(top, transparent, rgba(0, 0, 0, 0.06));
  background-image: -o-linear-gradient(top, transparent, rgba(0, 0, 0, 0.06));
  background-image: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.06));
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
}

</style>

<title>Guidance</title>
</head>

<body  background="new_images/background.gif" >	
   <!--Div that will hold the pie chart-->
   <form name="form1" method="post" >
<center>
<table width="301"><!-- After form table -->
<tr>
<td><div align="left" style="margin-left:29px ; margin-top:160px; "></div></td>
<td><select class="dropdown" name="parameters">
<option selected="" value="Default">Select Category for Guidance</option>
<option value="programming">Programming</option>
<option value="education">Eduaction Plans</option>
<option value="health">Health</option>
<option value="fundings">Fundings/Scholarships</option>
</select>
</td>
</tr>
</table>
<p type="button" class="btn btn-warning" style="margin-left:41px; margin-top:-56px;">
<input id="gobutton" type="submit" name="submit" value="Go">
</p>
</center>
</form>
<a href="./template/index.html">Home</a>

<?php
include_once("simple_html_dom.php");
$html = new simple_html_dom();

if (isset($_POST['submit'])) {
// Updating the click status 
$name = $_POST['parameters'];

if( $name == "programming")
{
	$query_URL = "http://www.edu.gov.mb.ca/k12/specedu/programming/index.html";
	$html->load_file($query_URL);
	
			echo "<img src = 'guidance.png' style = 'width:64% ; height : 77%; margin-top:-62px ; margin-left : 203px;'/>";
			foreach( $html->find('.body') as $element )
			{
				echo "<div id='bookss'>'".$element."</div>";
			}

}

else if( $name == "education")
{
	$query_URL = "http://www.edu.gov.mb.ca/k12/specedu/programming/iep.html";
	$html->load_file($query_URL);

			echo "<img src = 'guidance.png' style = 'width:64% ; height : 77%; margin-top:-62px ; margin-left : 203px;'/>";
			foreach( $html->find('.body') as $element )
			{
				echo "<div id='bookss'>'".$element."</div>";
			}

}

else if( $name == "health")
{

	echo "<img src = 'guidance.png' style = 'width:64% ; height : 77%; margin-top:-62px ; margin-left : 203px;'/>";
	$query_URL = "http://www.edu.gov.mb.ca/k12/specedu/smh/index.html";
	$html->load_file($query_URL);

			foreach( $html->find('.body') as $element )
			{
				echo "<div id='bookss'>'".$element."</div>";
			}

}

else if( $name == "fundings")
{

	echo "<img src = 'guidance.png' style = 'width:64% ; height : 77%; margin-top:-62px ; margin-left : 203px;'/>";
	$query_URL = "http://www.edu.gov.mb.ca/k12/specedu/funding/index.html";
	$html->load_file($query_URL);

			foreach( $html->find('.body') as $element )
			{
				echo "<div id='bookss'>'".$element."</div>";
			}

}
	}
?> 

  </body>
</html>	