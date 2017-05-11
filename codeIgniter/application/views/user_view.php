<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
</head>
<body>


<div>
	<h2><?php echo $page_header; ?></h2>

	<div>
		<?php
			/*foreach ($firstnames as $object)
			{echo $object->username.'</br>';}    //my note : FOR IMPLEMENTING MVC PATTERN IN CODEIGNITER .
			
			echo "</br></hr></br>";
			
			foreach ($users as $object)
			{echo $object->username. 's email address is '.$object->email . '</br>';}*/
			
			<h3>element()</h3> // element() inside array helper .
			$ci_array=array('name'=>'CodeIgniter','size'=>'4mb','language'=>'english','helper'=>'array');
			echo "Frame Work : ".element('name',$ci_array);
			echo "Using Helper : ".element('helper',$ci_array);
			echo element('url',$ci_array); // NULL value prints
			echo element('url',$ci_array,'not their'); // Setting Not Their as Default . 
		?>
	</div>
	<p>Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>