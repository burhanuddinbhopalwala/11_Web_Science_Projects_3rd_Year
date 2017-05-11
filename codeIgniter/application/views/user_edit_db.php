
<?php
session_start();
include_once('Database_Connect.php');
		
		$email = htmlentities($_POST['email_edit']);
		$tel = htmlentities($_POST['phn_edit']);
		$x = $_SESSION['name'];
		$query ="update user SET phone='".$tel."' where name='".$x."'";
		$result = mysql_query($query);

		if (!$result) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message .= 'Whole query: ' . $query;
				die($message);
					  }
?>