<style>
#user_info_edit
{
height:100%;
width:100%;
margin-bottom:0%;
}

#Edit_form
{
text-align:center;
font-family:Raleway;
font-size:21px;
}

#nm_1
{
margin-top:6%;
text-align:center;
font-size:50px;
font-family:Raleway;
}

#save
{

margin-top:1%;
font-size:100%;
font-family:Raleway;
}

#all
{
font-size:15px;
}

</style>
<script type="text/javascript" src="JS/user_edit.js"></script>
<script>
function check123()
	{
		var x=document.Edit_form.phn_edit.value;
			if(x.length!=10)
			{
			alert("Phone Number not valid");
			return false;
			}
			
			else
			{
			return true;
			}		
	}


$(document).ready( function() {
	$("#Edit_form").submit(function(event) {
	event.preventDefault();


		$.ajax({
			url:"user_edit_db.php",
			data: $("#Edit_form").serialize(),
			type:"POST",
			success: function(txt) {
				alert("Edited Successfully");			
				$("#content").load('profile.php');
			},
			error: function(txt) {
				console.log(txt);
			},
			cache:false
		});
	
	
	
	});
});

</script>






<body style="margin:0 0 0 0;">

<?php
include_once('Database_Connect.php');
session_start();
echo "<div id='user_info_edit'>";
if(isset($_SESSION['name']))
{
$un = $_SESSION['name'];
$q = "select * from user where name='".$un."'";
$sql = mysql_query($q);

$row = mysql_fetch_assoc($sql);
						$x = $row['name'];
						$y = $row['phone'];
						$z = $row['email'];
						
						echo "<p id='nm_1'>$x</p>";
						echo "<form name='Edit_form' id='Edit_form'>";
						//echo "Email :  <input type='text' name='email_edit' value='$z' id='email_id' style='width:240px' /><br>";
						echo "Phone :  <input type='text' name='phn_edit' value='$y' id='phn_id' /><br>";
						echo "<p id='all'>Phone Number Must be 10 digit long <br></p>";
						echo "<input type='submit' value='Save Your Details' onClick='return check123()' />";
						echo "</form>";

}
else
{
echo "Login to Display information";
}
echo "</div>";
?>

</body>