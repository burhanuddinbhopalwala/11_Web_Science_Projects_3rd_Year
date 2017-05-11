<html>
<head>
<style type="text/css">
body
{
margin:0 0 0 0;
}

#secondpagehome
{
height:100%;
}
.divvs
{
-webkit-border-radius:100%;
-moz-border-radius:100%;
-o-border-radius:100%;
border-radius:100%;

position:absolute;
background-color:#1d1711;
height:28%;
width:15%;
}

.divvvs
{
-webkit-border-radius:100%;
-moz-border-radius:100%;
-o-border-radius:100%;
border-radius:100%;
position:absolute;
height:100%;
width:100%;
margin-top:2%;
}


.divvs_dat
{
margin-left:30%;margin-top:20%;
color: #f2f0ea;
font-size:230%;

}


.fr
{
background-color:#ebe9e2;
height:100%;
width:100%;
display:none;
}

.fr1
{
background-color:#ebe9e2;
height:100%;
width:100%;

}

#timeline
{
margin-top:-10px;
}

#textt
{
margin-left:auto;
margin-right:auto;
width:80%;
text-align:center;
font-family: Raleway;
font-color:1d1711;
font-size:40px;
}

#textt1
{
margin-top:-2%;
margin-left:auto;
margin-right:auto;
width:80%;
text-align:right;
font-family:Din;
font-color:1d1711;
font-size:27px;
}

#textt2
{
margin-left:auto;
margin-right:auto;
width:95%;
text-align:center;
font-family: Colonna MT;
font-color:1d1711;
font-size:50px;
}
</style>

<script>

$(document).ready(function(){
  $("#div2_2").click(function(){
     		$("#secondpagehome").hide();
			$("#f2").show();
			$("#foot_div").css({"display":"none"});
  });  
});

$(document).ready(function(){
  $("#div2_4").click(function(e)
  {
    e.preventDefault();
    $.ajax({
            type: "GET",
            url: 'extra.php',
            cache: false,
            success: function(data)
            {
				$("#foot_div").css({"display":"none"});
                $("#secondpagehome").load('timeline.php'); // www.example.com/file.php
            }
        });
      });
});
</script>
<script src="JS/ajax.js" ></script>
</head>

<link rel="stylesheet" type="text/css" href="css/cssflip.css"></link>
<body>
<div id="secondpagehome">		
 <div class="container1">       
 <p id="textt2">Now its your turn to shine....</p>
        <div id="tu-css3flip">	
        <ul>
			<li>
				<div class="tu-item tu-item-1" >				
					<div class="tu-info-wrap">
						<div class="tu-info">
							<div class="tu-info-front tu-item-1">
								<img src="./new_images/home/search_icon1.png" width="75" style="margin-top:24%;margin-left:2%;" height="85"></img>
								<h3 style="margin-top:-45%">Search Vacancy</h3>
								
							</div>
							<div class="tu-info-back" id="div2_2">
								<a href="#"><img id="timeline" src="./new_images/home/search_icon2.png" style="margin-top:12%;margin-left:-4%" width="200" height="200" /></a>					
								</div>	
						</div>
					</div>
				</div>
			</li>
			
				<li>
				<div class="tu-item tu-item-3" >
					<div class="tu-info-wrap">
						<div class="tu-info">
							<div class="tu-info-front tu-item-3">
							<img src="./new_images/home/company1.png" width="75" style="margin-top:24%;margin-left:2%;" height="85"></img>
							<h3 style="margin-top:-45%">Top StartUps</h3>
							</div>
							<div class="tu-info-back">
								 <a href="company_charts.php" target="_blank"><img id="timeline" src="./new_images/home/company22.png" style="margin-top:12%;margin-left:-4%" width="200" height="200" /></a>
							</div>
						</div>
					</div>
				</div>
			</li>
			
			<li>
				<div class="tu-item tu-item-2" >
					<div class="tu-info-wrap">
						<div class="tu-info">
							<div class="tu-info-front tu-item-2">
							<img src="./new_images/home/timeline1.png" width="75" style="margin-top:24%;margin-left:2%;" height="85"></img>
							<h3 style="margin-top:-45%">Timeline</h3>
							</div>
							<div class="tu-info-back">
									<a href="timeline.php"><img id="timeline" src="./new_images/home/timeline2.png" style="margin-top:12%;margin-left:-4%" 
																				width="200" height="200" /></a>
							</div>
						</div>
					</div>
				</div>
			</li>
	
			</ul>
		</div>
		
		<p id="textt"> "Stay hungry. Stay foolish..."</p>
		<p id="textt1">  - Steve Jobs</p>
	</div></div>
	<div id="f2" class="fr">
			<iframe src="crawl_get_data.php" class="fr1" seamless scrolling="yes" frameborder="0"></iframe>
	</div>
	
</body>
</html>