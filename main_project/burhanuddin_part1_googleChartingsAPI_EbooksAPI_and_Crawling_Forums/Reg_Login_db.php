<?php

$link = mysql_connect('localhost','root','');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db('minor', $link);
if (!$db_selected) {
    die ('Can\'t use Minor : ' . mysql_error());
}
		
		$name = htmlentities($_POST['name']);
		$tel = htmlentities($_POST['tel']);
		$email = htmlentities($_POST['email']);
		$password = htmlentities($_POST['password']);

		$new = strrev($password);
		$password = hash("sha512", $new); 

		
		$query = "insert into user(name,phone,email,password) values('$name','$tel','$email','$password')";
		$result = mysql_query($query);

		if (!$result) {
				$message  = 'Invalid query: ' . mysql_error() . "\n";
				$message .= 'Whole query: ' . $query;
				die($message);
					  }
					echo "You Have Registered Successfully";
?>