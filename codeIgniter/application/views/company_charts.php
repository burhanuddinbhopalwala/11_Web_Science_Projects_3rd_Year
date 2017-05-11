<?php
include('Database_Connect.php');
include('sidebar.php');
?>

<?php
include('topbar.php');

if (isset($_POST['submit'])) {
// Updating the click status 
$name = $_POST['parameters'];

if( $name == "vacancies" )
{
	$query = mysql_query("select company_name , vac_number from $name") ;
	$myurl[] = "[ ' Company_Name' , 'Vacancies_Numbers' ]" ;
	while( $r = mysql_fetch_assoc($query) )
	{
		$com_name = $r['company_name'];
		$vacancies_number = $r['vac_number'];
		$myurl[] = "['".$com_name."' , ".$vacancies_number."]";
	}
}

else if( $name == "placements" )
{
	$query = mysql_query("select company_name , pla_number from $name") ;
	$myurl[] = "[ ' Company_Name' , 'Placements_Numbers' ]" ;
	while( $r = mysql_fetch_assoc($query) )
	{
		$com_name = $r['company_name'];
		$placements_number = $r['pla_number'];
		$myurl[] = "['".$com_name."' , ".$placements_number."]";
	}
}

else if( $name == "average_salaries" )
{
	$query = mysql_query("select company_name , sal_number from $name") ;
	$myurl[] = "[ ' Company_Name' , 'Salaries_Numbers' ]" ;
	while( $r = mysql_fetch_assoc($query) )
	{
		$com_name = $r['company_name'];
		$salaries_number = $r['sal_number'];
		$myurl[] = "['".$com_name."' , ".$salaries_number."]";
	}
}

else if( $name == "revenue" )
{
	$query = mysql_query("select company_name , rev_number from $name") ;
	$myurl[] = "[ ' Company_Name' , 'Revenues_Numbers' ]" ;
	while( $r = mysql_fetch_assoc($query) )
	{
		$com_name = $r['company_name'];
		$revenues_number = $r['rev_number'];
		$myurl[] = "['".$com_name."' , ".$revenues_number."]";
	}
}
	}
?> 

<head>
<style>
	.formStyle2{
	color: #993300;
	font-weight: bold;
}

input#gobutton{
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
padding:5px 25px; /*add some padding to the inside of the button*/
background:#35b128; /*the colour of the button*/
border:1px solid #33842a; /*required or the default border for the browser will appear*/
/*give the button curved corners, alter the size as required*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
/*give the button a drop shadow*/
-webkit-box-shadow: 0 0 4px rgba(0,0,0, .75);
-moz-box-shadow: 0 0 4px rgba(0,0,0, .75);
box-shadow: 0 0 4px rgba(0,0,0, .75);
/*style the text*/
color:#f3f3f3;
font-size:1.1em;
}
/***NOW STYLE THE BUTTON'S HOVER AND FOCUS STATES***/
input#gobutton:hover, input#gobutton:focus{
background-color :#399630; /*make the background a little darker*/
/*reduce the drop shadow size to give a pushed button effect*/
-webkit-box-shadow: 0 0 1px rgba(0,0,0, .75);
-moz-box-shadow: 0 0 1px rgba(0,0,0, .75);
box-shadow: 0 0 1px rgba(0,0,0, .75);
}


.dropdown {
  display: inline-block;
  position: relative;
  overflow: hidden;
  height: 32px;
  width: 275px;
  background: #f2f2f2;
  border: 1px solid;
  border-color: white #f7f7f7 #f5f5f5;
  border-radius: 3px;
  background-image: -webkit-linear-gradient(top, transparent, rgba(0, 0, 0, 0.06));
  background-image: -moz-linear-gradient(top, transparent, rgba(0, 0, 0, 0.06));
  background-image: -o-linear-gradient(top, transparent, rgba(0, 0, 0, 0.06));
  background-image: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.06));
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
}

</style>

<title>Visualization</title>
  
	<script src="JS/ajax.js" ></script>
	
	<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

	<script type="text/javascript">
	// Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart1);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart1() {

        // Create the data table.
        var data = new google.visualization.arrayToDataTable([
			<?php echo(implode(",",$myurl));?>
		]);
        
        // Set chart options
        var options = {'title':'Pie Chart',
                       'width':1300,
                       'height':600,
					   'backgroundColor':'transparent',
						chartArea:{left:450,top:0},
					   'enableInteractivity':true,
					   'is3D':true}; 

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		chart.draw(data, options);
		}
		/*------------------------------ For Slices ---------------------------------*/
		
		// Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart2);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart2() {

        // Create the data table.
        var data = new google.visualization.arrayToDataTable([
			<?php echo(implode(",",$myurl));?>
		]);
        
		  options = {
          title: 'Pie Chart With Slices',
          legend: 'none',
          pieSliceText: 'label',
          slices: {  
					0: {offset: 0.2},
                    13: {offset: 0.3},
                    3: {offset: 0.4},
                    8: {offset: 0.5},
          },
		 'backgroundColor':'transparent',
		 'width':1250,
         'height':600,
		'is3D':true,
		chartArea:{left:450,top:0}
		};

        chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);	
      }
	  /*----------------------------------------------------------------------End Pie Slice Chart------------------------------------------------------*/
	  
	  /*----------------------------------------------------------------------Start Gauge Chart--------------------------------------------------------*/
	  
	   google.load("visualization", "1", {packages:["gauge"]});
      google.setOnLoadCallback(drawChart3);
      function drawChart3() {

        var data = google.visualization.arrayToDataTable([
					<?php echo(implode(",",$myurl));?>
        ]);

        var options = {
          redFrom: 50, redTo: 300,
          yellowFrom:0, yellowTo: 50,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('gauge_chart'));

        chart.draw(data, options);

        setInterval(function() {
          data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 4000);
		
        setInterval(function() {
          data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 5000);
		
        setInterval(function() {
          data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 6000);
		
        setInterval(function() {
          data.setValue(3, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 7000);
		
        setInterval(function() {
          data.setValue(4, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 2000);
		
        setInterval(function() {
          data.setValue(5, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 3000);
		
        setInterval(function() {
          data.setValue(6, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 4000);
		
        setInterval(function() {
          data.setValue(7, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 2000);
		
        setInterval(function() {
          data.setValue(8, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 3000);
		
        setInterval(function() {
          data.setValue(9, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 4000);
		
        setInterval(function() {
          data.setValue(10, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 2000);
		
        setInterval(function() {
          data.setValue(11, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 3000);
		
        setInterval(function() {
          data.setValue(12, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 4000);
		
        setInterval(function() {
          data.setValue(13, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 2000);
		
        setInterval(function() {
          data.setValue(14, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 3000);
		
      }// End Function
	  
	  /*----------------------------------------------------------------------End Guage Chart-----------------------------------------------------------*/
	</script>
  </head>

<body  background="new_images/background.gif" >	
   <!--Div that will hold the pie chart-->
   <form name="form1" method="post" >
<center>
<table width="301"><!-- After form table -->
<tr>
<td><div align="left" style="margin-left:29px ; margin-top:160px; "></div></td>
<td><select class="dropdown" name="parameters">
<option selected="" value="Default">Select Parameter for Visualization</option>
<option value="vacancies">Vacancies Wise</option>
<option value="placements">Placements Wise</option>
<option value="average_salaries">Pay Masters</option>
<option value="revenue">Revenue Wise</option>
</select>
</td>
</tr>
</table>
<p type="button" class="btn btn-warning" style="margin-left:41px; margin-top:-56px;">
<input id="gobutton" type="submit" name="submit" value="Visualize">
</p>
</center>
</form>
<a href="location.php">Click for Location Visualization</a>
 <div id="piechart"></div>
<div id="piechart2" style="margin-top:-180px;margin-left:-130px;"></div>
<div id="gauge_chart" style="width:700px;height:540;margin-top:-135px;margin-left:370px;"></div>
  </body>
</html>	