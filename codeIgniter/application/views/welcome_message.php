<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
</head>
<body>


<div>
	<h2><?php echo $page_header; ?></h2>

	<div>                                                  <!--  COMMENT FOR USING THE HTML HELPER -->
		<?php
			/*foreach ($firstnames as $object)
			{echo $object->username.'</br>';}    //my note : FOR IMPLEMENTING MVC PATTERN IN CODEIGNITER .
			
			echo "</br></hr></br>";
			
			foreach ($users as $object)
			{echo $object->username. 's email address is '.$object->email . "</br>";} */
			//----------------------------------------------------------------------Array Helper----------------------------------------------------------------------------------------
			/*
			echo "<h3>element() / Array Helper 1</h3>";// HELPER 1 -> element()
			$ci_array=array('name'=>'CodeIgniter','size'=>'4mb','language'=>'english','helper'=>'Array');
			echo "Frame Work : ".element('name',$ci_array)."</br>";
			echo "Using Helper : ".element('helper',$ci_array)."<br>";      // my note : FOR IMPLEMENTING THE array helper .
			echo "URL : ".element('url',$ci_array)."Its NULL</br>"; // NULL value prints
			echo "URL : ".element('url',$ci_array,'not their'); // Setting Not Their as Default . 
			
			
			echo "<hr>";
			echo "<h3>random_element() / Array Helper 2</h3>";// HELPER 2 ->rendom_element()
			$cards=array(9,10,"Jack","Queen","King","Ace");
			echo random_element($cards)."</br>";
			
			echo "<hr>";
			echo "<h3>elements() / Array Helper 3<h3>";//HELPER3 ->elements()
			$new_array=elements(array('name','size','lang','helper'),$ci_array); // lang is not their in _ci_array
			print_r($new_array); // lang is false in this array .
			$value=$new_array['lang']?"is their":"is not their";
			echo "</br> array[lang]".$value."</br>";
			
			/*$this->load->model("post_model");
			$this->post_model->update(elements('id','title','content'),$_POST);  // set/controll the elements of $_POST .
			*/
			//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			
			//------------------------------------------------------------------------Email Helper-------------------------------------------------------------------------------------------
			/*
			function isValidEmail($email)
			{return preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email);}
			
			echo "<h3>preg_match() / Email Helper 1</h3>";
			echo "<form method='post'>Email : <input type='text' name='email'>";
			echo  "</br></br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='submit' value='submit'></form>";
			extract($_POST);
			if(isset($submit))
			{
			
				$result1 = isValidEmail($email)?" Valid":" Not Valid";
				echo $email." is ".$result1;
				echo "<hr>";
				echo "<h3>valid_email() / Email Helper 2</h3>";
				$result2 = valid_email($email)?" Valid":" Not Valid";  // Email Helper has own email validation email helper .
				echo $email." is ".$result2;
			}
			*/
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------HTML helper----------------------------------------------------------------------------------------------
/*Advantages : 
	1 : We dont need to break-out php for writing the HTML .
	2 : content inside the tags can be generated dynamically . 
*/
	/*echo doctype('html5');
	?>
	<html lang="eng">
	<head>
	<?php /*echo meta('description','My CI site');
		$meta = array
		(
			array('name'=>'robots','contents'=>'no-cache');
			array('name'=>'keywords','contents'=>'oop,php,mysql,MVC');
			array('name'=>'Content-type','content'=>'text/html ; charset=utf-8','type'=>'equiv');
		);
		echo meta($meta);   // META IS NOT WORKING PROPERLY .
	?>
	<title><?php echo $title; ?></title>
	<?php echo link_tag('resources/style.css'); ?>
	</head>
	<body>
	<div id="container">
		<h2><?php echo $page_header; ?></h2>
		<div id="body">
			<?php
				echo heading('Hello World',3);
				echo heading('Hello World',4);
				echo heading('Important Message',5,'class = "important" '); // inside single code it is double codes and vice versa .
				
				echo img('http://proseatcovers.com/img/home/logo.png');
				$img_attr = array
				(
					'src' => 'http://proseatcovers.com/img/home/logo.png',
					'alt' => 'logo',
					'height' => '35',
					'title' => 'Proseatcovers Logo'
				);
				echo br();// passing n for n break tags
				echo img($img_attr); // images with attributes .
				echo br(); 
				echo nbs(); // passing n for n nbsp
				
				$list = array("red","blue","yellow","green");
				$list_attr = array
				(
					'class' => 'list',
					'id' => 'mylist'
				);
				echo ul($list,$list_attr);
				
				$list2_attr = array
				(
					'class' => 'boldlist',
					'id' => 'mylist'
				);
				$list = array 
				(
					'colors' => array('red','blue','green'),
					'shapes' => array('traingle','ractangle','circle' => array('oval','eclipse','sphere')) // each array is new list item .
				);
				echo ul($list,$list2_attr);
				?>*/
//--------------------------------------------------------------------------------URL Helper---------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// The URL helper file contains functions that assists in working with URLs.
	/*echo heading("site_url() : ".site_url(),4)."</br>";
	echo heading("site_url(param) : ".site_url("local/news/123"),4)."</br>";
	$segments = array('local','news','123');
	echo heading("site_url(array_param) : ".site_url($segments),4);
	echo heading("base_url() : ".base_url(),4)."</br>"; // Use only if the website is registered on a domain not use for the localhost .
	echo heading("base_url(param) : ".base_url("images/i1/edit.png"),4)."</br>"; // use if having a domain
	echo heading("current_url() : ".current_url(),4)."</br>";
	echo heading("uri_string() : ".uri_string(),4)."</br>"; // Whatever came after the basepath is return.
	$segment2 = array('user_view','html_helper');
	echo anchor($segment2,'HTML Helper Anchor','rel = "nofollow"'); */
//-------------------------------------------------------------------------------TEXT helper-------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// The Text Helper file contains function that assists in working with text .
	/*$string1 = "This is a string checking the word_limiter() function .";
	echo heading("word_limiter() : ".$string1 = word_limiter($string1,4),4); // followed by 3 dots after words .
	
	$string2 = "This is a string checking the character_limiter() function .";
	echo heading("character_limiter() : ".$string2 = character_limiter($string2,4),4); // followed by 3 dots after 4 character .
	
	$string3 = "php best frameworks are Codeigniter , Druple , Jumla , Zend and many more .";
	$disappear = array('Jumla','Zend');
	echo heading("word_censor() : ".word_censor($string3,$disappear,'**Beep**'),4);
	
	echo heading("My Function() i.e. star_censor() same as word_censor() :  ".star_censor($string3,$disappear),4); // HERE star_censor() is my function in text_helper.php ; 
	
	$string4 = "This is highlight_phrase() demo function .";
	echo  heading("highlight_phrase() : ".highlight_phrase($string4,"highlight_phrase()","<span style = 'color : #990000'>","</span>"),4);
	
	$string5 = "This is word_wrap() demo string .";               // function is usefull for email / file , not for browser(adds newline char) .
	echo heading("word_wrap() : ".word_wrap($string5,8),4);
	
	
	$string6 = "This is ellipsize() demo string .";
	echo heading("ellipsize() : ".ellipsize($string6,8,0.5),4); // 0 for ellipsize at beginning , 1 for ellipsize at end , 0.5 for ellipsize at middle   .
	*/
//---------------------------------------------------------------------------Form Helper()-------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// The Form Helper file contains function that assists in working with text .	
/*
	if( isset($email) && isset($password))
	{
		echo valiadtion_errors();										// NOT WORKING
		echo "Your username : ".$email."</br>";
		echo "Your password : ".$password."</br>";
		echo "Form Submitted URL : ".$url."</br>";
		print_r($_POST);
	}
	else
	{
		echo validation_errors();									  // NOT WORKING
		form_open();   // set action if the action is not to the page itself .
		echo "<label for='email'>Email : </label></br>".form_input('email',set_value('email'))."</br></br>"; //set_value(email) for twice using the form if password is incorrect .
		echo "<label for='email'>Password : </label></br>".form_password('password','')."</br></br>";
		$url_sent_form = current_url();
		form_hidden("url",$url_sent_form); // for Hidden fields . <input type="hidden" name="url" value="localhost/....">;
		echo form_submit("submit","Login");
		form_close();
	}
*/
//-----------------------------------------------------------------------------------FORM HELPER2--------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------STRING HELPER--------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// The Form Helper file contains function that assists in working with text .	
/*
echo link_tag('resources/style.css');  
echo heading("random_string() : ".random_string(),4); // default 'alnum' 8 characters long .
echo heading("random_string(alpha) : ".random_string('alpha'),4); // only for aplhabetic 'alpha' is fix argument for alphabetic  -> 'alpha' .
echo heading("random_string(alpha,25) : ".random_string('alpha',25),4); // second param is the no of chars we want .
echo heading("random_string(alnum,25) : ".random_string('alnum',25),4); // alphabetic + numeric -> alnum
echo heading("random_string(nozero,25) : ".random_string('nozero',25),4); // for nozero -> nozero
echo heading("random_string(unique) : ".random_string('unique'),4); // only for 32 characters .
echo heading("Length : ".strlen(random_string('unique')),4);

echo heading("random_string(sha1) : ".random_string('sha1'),4); // sha1 -> only for 40 characters .
echo heading("Length : ".strlen(random_string('sha1')),4);

echo heading("4 times alternator('one, ','two, ')",4);
for ( $i = 0 ; $i < 4 ; $i++ )
{echo heading(alternator('one, ','two, '),4);}  // 4 times alternate the string parameter inside it . // PERFECT ALTERNATOR FOR 2 ARGUMENT .
echo br();

echo heading("6 times alternator('one, ','two, ','three, ')",4);
for ( $i = 0 ; $i < 6 ; $i++ )
{echo heading(alternator('one, ','two, ','three, '),4);}  // 6 times alternate the string parameter inside it . // INTRESTING NOT THE PERFECT ALTERNATOR FOR 3 ARGMNT.
echo br();

echo heading("8 times alternator('one, ','two, ','three, ')",4);
for ( $i = 0 ; $i < 8 ; $i++ )
{echo heading(alternator('one, ','two, ','three, ','four, '),4);}  // 8 times alternate the string parameter inside it . // INTRESTING NOT THE PERFECT ALTERNATOR FOR 3 ARGMNT.
echo br();

function test_static($int)
{
	static $var = 5;
	echo $var."</br>";
	$var = $int;
}
echo heading("test_static() : ",3);
heading(test_static(1),4);
heading(test_static(2),4);
heading(test_static(3),4);

echo heading("repeater('Burhanuddin',5) : ".repeater('Burhanuddin        ',5),3); // NOTE : its repeater its not repeator .

$string7 = "Codeigniter,,Druple,,,,,,,,Jumla";
echo heading("reduce_multiples($string7,',') : ".reduce_multiples($string7,","),4);

$string8 = "Joe's \"dinner\"";   
echo heading("quotes_to_entities($string8) : ".quotes_to_entities($string8),4); // result : https://localhost/ci_intro ;    //SAME as $string8 output : NOT USE MUCH .


$string9 = "https://localhost////ci_intro";
echo heading("reduce_double_slashes($string8) : ".reduce_double_slashes($string9),4); // result : https://localhost/ci_intro ; 
*/
//-----------------------------------------------------------------------------------THE END--------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 ?>
	</div>
	<p>Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>