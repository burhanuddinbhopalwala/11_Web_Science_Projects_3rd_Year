
<html>
<style>
#bg
{
margin:0 0 0 0;
height:100%;
width:100%;
background:#ebe9e2;
}

#divv
{
position:absolute;
font-weight:bold;
background-image:url('images/loading.gif');
background-repeat:no-repeat;
margin-left:47%;
height:50%;
width:50%;
}

#text_div
{
font-family: Helvetica;
font-size:30px;
text-align:center;
margin-bottom:2%;

}

#total_div
{
margin-top:15%;
}

</style>

<?php

	if(!isset($_COOKIE['username']))
	{
	header( "refresh:3;url=http://localhost/HistoryMatters/Loginform.php" );
	echo "<body bgcolor='#ebe9e2'>";
		echo "<div id='total_div'>";
			echo "<div id='text_div'>Session Over<br>Login Again to Continue</div>";
				echo "<div id='divv'></div>";
		echo "</div>";
	echo "</body>";
	}
	
?>

</html>