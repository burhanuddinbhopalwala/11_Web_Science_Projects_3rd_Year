<?php 
include("topbar.php");
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

body {
    background-image: url("./bg.png");
}
</style>


<head>
<style>

input[type="text"] {
  display: block;
  margin: 0;
  width: 100%;
  font-family: sans-serif;
  font-size: 18px;
  appearance: none;
  box-shadow: none;
  border-radius: none;
}
input[type="text"]:focus {
  outline: none;
}

.style-1 input[type="text"] {
  padding: 10px;
  border: solid 1px #dcdcdc;
  transition: box-shadow 0.3s, border 0.3s;
}
.style-1 input[type="text"]:focus,
.style-1 input[type="text"].focus {
  border: solid 1px #707070;
  box-shadow: 0 0 5px 1px #969696;
}

#sm
{
height:100%;
width:95%;
margin-top:-3%;
postion:relative;
}
.disp_div
{
line-height:200px;
margin-top:10px;
margin-left:80px;
color:red;
font-family:DIN;
font-size:50px;
}
#disp_des
{
text-align:JUSTIFY;
color:green;
font-family:RALEWAY;
font-size:40px;
}





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
</style>
<title>Internships</title>
</head>

<body  background="new_images/background.gif" >	
   <!--Div that will hold the pie chart-->
   <form name="form1" method="post">
<center>
<table width="301"><!-- After form table -->
<tr>
<td><div align="left" style="margin-left:29px ; margin-top:160px; "></div></td>
<td><input type = "text" name = "parameters" placeholder="Search Category" class = "focus"></td>
<td><input type = "text" name = "parameters2" placeholder="Enter Pin" class = "focus"></td>
</tr>
</table>
<p type="button" class="btn btn-warning" style="margin-left:41px; margin-top:-56px;">
<input id="gobutton" type="submit" name="submit" value="Lets go">
</p>
</center>
</form>
<a href="./template/index.html">Home</a>

<?php
//include('topbar.php');
include_once("simple_html_dom.php");
$html = new simple_html_dom();

if (isset($_POST['submit'])) {
 
$name = $_POST['parameters'];
$name1 = $_POST['parameters2'];

if( $name == "engineering" && $name1 == "201309" )
{
	$query_URL = "http://www.internships.com/search/posts?Keywords=engineering%2C+architecture&Major_Other_Text=&Location=201309/";
	$html->load_file($query_URL);

			foreach( $html->find('.span6') as $element )
			{
				echo "<div id='bookss'>'".$element."</div>";
			}

}

else if( $name == "engineering" && $name1 == "452014" )
{
	$query_URL = "http://www.internships.com/search/posts?Keywords=engineering%2C+architecture&Major_Other_Text=&Location=452014/";
	$html->load_file($query_URL);

			foreach( $html->find('.span6') as $element )
			{
				echo "<div id='bookss'>'".$element."</div>";
			}

}

else if( $name == "marketing" && $name1 == "201309" )
{
	$query_URL = "http://www.internships.com/search/posts?Keywords=marketing%2C+advertising%2C+%22social+media%22%2C+%22public+relations%22&Major_Other_Text=&Location=201309/";
	$html->load_file($query_URL);

			foreach( $html->find('.span6') as $element )
			{
				echo "<div id='bookss'>'".$element."</div>";
			}

}

else if( $name == "marketing" && $name1 == "452014" )
{
	$query_URL = "http://www.internships.com/search/posts?Keywords=marketing%2C+advertising%2C+%22social+media%22%2C+%22public+relations%22&Major_Other_Text=&Location=452014/";
	$html->load_file($query_URL);

			foreach( $html->find('.span6') as $element )
			{
				echo "<div id='bookss'>'".$element."</div>";
			}

}

else if( $name == "biology" && $name1 == "781001" )
{
	$query_URL = "http://www.internships.com/search/posts?Keywords=biology%2C+science%2C+biomedical&Major_Other_Text=&Location=781001/";
	$html->load_file($query_URL);

			foreach( $html->find('.span6') as $element )
			{
				echo "<div id='bookss'>'".$element."</div>";
			}

}
else 
	echo "<strong><div id = 'bookss'>"."Weak Server Response"."</strong>";
	}
?> 

  </body>
</html>	