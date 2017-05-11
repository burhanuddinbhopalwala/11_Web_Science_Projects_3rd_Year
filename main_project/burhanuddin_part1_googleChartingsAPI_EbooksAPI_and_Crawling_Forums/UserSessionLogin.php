<html>

<head>
<link rel="stylesheet" href="CSS/UserSessionLogin.css">
<script src="JS/jquery.min.js"></script>
<script>

$(document).ready(function(){
    $("#nav-but1").click(function(){
		$("#index-left-side-nav").animate({"left":"-256px"}, "slow",function(){
			$("#index-left-side-nav-show").animate({"left":"0px"},"fast");	
		});
    });
});


$(document).ready(function(){
    $("#nav-but2").click(function(){
		 $("#index-left-side-nav-show").animate({"left":"-70px"},"slow",function(){
		$("#index-left-side-nav").animate({"left":"7px"},"slow");});
    });
});

</script>

</head>

<body bgcolor="#ebe9e2">

<!-- Top Bar -->
<div id="topbar" >
			<div style="display:inline">
                <a href="" style="text-decoration:none" ><span id="darken">INDIAN</span><span id="darken1">HISTORY&nbsp</span></a>
			</div>
			<div class="navigation" style="display:inline">
				<!--<input id="nav1" type="image" src="images/q1.png" title="About" height="20px" width="20px" onmouseover="this.src='images/q2.png'" onmouseout="this.src='images/q1.png'">
				<input id="nav1" type="image" src="images/s1.png" title="Search" height="20px" width="20px" onmouseover="this.src='images/s2.png'" onmouseout="this.src='images/s1.png'">
				<input id="nav13" type="image" src="images/a1.png" title="Scroll to Top" height="20px" width="20px" onmouseover="this.src='images/a3.png'" onmouseout="this.src='images/a1.png'">-->
			
				<!--<a id="a1" href=""><img src="images/q1.png" title="About" height="20px" width="20px" onmouseover="this.src='images/q2.png'" onmouseout="this.src='images/q1.png'"></img></a>
				<a id="a2" href=""><img src="images/s1.png" title="Search" height="20px" width="20px" onmouseover="this.src='images/s2.png'" onmouseout="this.src='images/s1.png'"></img></a>
				<a id="a3" ><img src="images/a1.png" title="Scroll to Top" height="20px" width="25px" onmouseover="this.src='images/a3.png'" onmouseout="this.src='images/a1.png'"></img></a>-->
            </div>
			<div id="LogOut_Menu" >
				<ul id="LogOut">
					<li>
						<a href="#"><span id="cooki"><?php echo $_COOKIE['username']; ?></span></a>
							<ul>
							<li><a href="#">XXXXX</a></li>
							<li><a href="#">YYYYY</a></li>
							<li><a href="#">LogOut</a></li>
							</ul>
					</li>
				</ul>
		</div>

</div>


<!--Side Bar -->
<div id="index-left-side-nav">
			<div id="index-left-side-nav-header">
				<a id="image" href=""><img src="images/hist.png" width="120px" height="120px"/></a>
			</div>



<div id="navcontainer">
<ul id="navlist">

	<li><a title="Scroll to Top" id="home_but" href="main.php" style="cursor: pointer;" >HOME</a></li>
	<li id="active"><a href="#" id="current">Gallery</a> 
		<ul id="subnavlist">
			<li id="subactive"><a href="javascript:ajaxpage('ImageSlider.php','content');" id="subcurrent">Images</a></li>
			<li><a href="#">Videos</a></li>
		</ul>
	</li>


	<li id="active"><a href="#" id="current" title="Post Papers">Papers</a> 
		
	</li>


	<li><a href="#">Discussions</a></li>
	
	

</ul>
</div>
<div id="index-left-side-nav-hide">
				<a id="nav-but1"><img src="images/leftarrow1.png" title="About" height="20px" width="20px" onmouseover="this.src='images/leftarrow2.png'" onmouseout="this.src='images/leftarrow1.png'"></img></a>
			</div>


</div>
<div id="index-left-side-nav-show">
	<a id="nav-but2"><img src="images/rightarrow1.png" title="About" height="25px" width="25px" onmouseover="this.src='images/rightarrow2.png'" onmouseout="this.src='images/rightarrow1.png'"></img></a>
</div>

<div>

</div>


</body>
</html>