<style>

#bookss
{
display:inline-block;
margin-left:50px;
margin-right:50px;
width:300px;
}

</style>
<body bgcolor="#f2f0ea">
<div style="margin-top:5%">

<?php 
$max_results=12;

$con=mysql_connect('localhost' , 'root','') or   die('connection Error');
         if($con)
          {
             mysql_select_db('historymatters') or die('Could not Select Database');

          }
	
	
include_once("simple_html_dom.php");

ini_set('max_execution_time', 3000);

$html = new simple_html_dom();

$query_URL = "http://www.infibeam.com/Books/categories/History/Asia/India/search?page=6";
$html->load_file($query_URL);
$results = $html->find(".search_result li");
for($i=0;$i<$max_results;$i++){
	
		$text = $results[$i]->find(".img");
		$text= $text[0]->find("a");
		$text= $text[0]->innertext;
		echo "<div id='bookss'>";
		echo $text;
		echo "<br>";
		
		$url= $results[$i]->find(".title");
		$url=$url[0]->find("h2");
		$url=str_replace('|', '', $url[0]->innertext);
		$url=str_replace('/Books','http://www.infibeam.com/Books',$url);
		
		echo $url;
		echo "</div>";
		
		 $q1 = "select * from booklinks where link='".$url."'";
		 $sql1 = mysql_query($q1) or die(mysql_error());
		 if(mysql_num_rows($sql1) == 1)
		 {
		 
		 }
		 else
		 {
         $q="insert into booklinks (link,book) values('$text','$url')";
		 $sql=mysql_query($q) or die(mysql_error());
		 }

}
		
?>
</div>
</body>