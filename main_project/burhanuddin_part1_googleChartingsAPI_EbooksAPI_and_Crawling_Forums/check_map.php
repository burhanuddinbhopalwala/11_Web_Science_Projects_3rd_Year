<?php
include_once('Database_Connect.php');
?>
<html>
<head>
<style>
#fade_div
{
margin-top:-4%;
opacity:0.9;
height:110%;
width:100%;
z-index:1005;
background-color:#1d1711;
display:none;
position:fixed;
}

#map_div
{
z-index:1006;
position:fixed;
height:100%;
width:90%;
display:none;
}

#x_img
{
margin-top:0px;
margin-right:0px;
z-index:1007;
cursor: pointer;
}


</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#map_but").click(function(e)
  {
    e.preventDefault();
    $.ajax({
            type: "GET",
            url: 'extra.php',
            cache: false,
            success: function(data)
            {
             
				$("#fade_div").css({"display":"inline"});
				$("#map_div").css({"display":"inline"},function()
				{
				alert("sg");
				});
            }
        });
      });
});

</script>
</head>
<body>
<a id="map_but" href="#">Click Here </a>
<div id="fade_div"><?php	echo '<img id="x_img" src="get_img_blob.php?id=9">'; ?></div>
<div id='map_div'></div>
</body>
</html>