<?php
include('Database_Connect.php');
include('sidebar.php');
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

</style>

<title>Location_Chart</title>
  

	<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

	<script type="text/javascript">
/*---------------------------------------------------------------------------Start Geo Chart----------------------------------------------------------------------------*/

   google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {

           var data = google.visualization.arrayToDataTable([
          ['Countries_Names', 'Vacancies%'],
          ['India', 72],
		  ['China', 65],
          ['US', 77],
          ['Indonesia', 45],
          ['Brazil', 61],
          ['Pakistan', 40],
          ['Nigeria', 41],
		  ['Bangladesh', 22],
		  ['Russia', 56],
		  ['Japan', 49]
        ]);


        var options = {
		'backgroundColor':'transparent'
		};

        var chart = new google.visualization.GeoChart(document.getElementById('geo_chart'));

        chart.draw(data, options);
      }
/*---------------------------------------------------------------------------End Geo Chart----------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------Bubble Chart Starts----------------------------------------------------------------------------*/

 google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {

      var data = google.visualization.arrayToDataTable([
        ['Country_Name', 'Vacancy%', 'Placements%', 'Popular_Company',     'Priority'],
		['India', 72, 55, 'Amazon', 1 ],
        ['China',   65 ,  50, 'Ebay', 2 ],
        ['US',    77,    60, 'Amazon', 3 ],
        ['Indonesia',    45 ,  18,   'Zomato',  4 ],
        ['Brazil',    61 ,  47,      'Paytm',  5],
        ['Pakistan',    40 ,  20,         'Ebay',  6],
        ['Nigeria',    41 ,   27,       'Freshdesk',  7],
        ['Bangladesh',    22 ,  14,      'Jabong',  8],
        ['Russia',    56 ,    39 ,      'Snapdeal',  9],
        ['Japan',    49 ,  42 ,      'Freshdesk',  10 ],
    ]);

      var options = {
        title: 'Bubble Chart',
        hAxis: {title: 'Vacancy%'},
        vAxis: {title: 'Placements%'},
        bubble: {textStyle: {fontSize: 11}}
      };

      var chart = new google.visualization.BubbleChart(document.getElementById('bubble_chart'));
      chart.draw(data, options);
    }

/*---------------------------------------------------------------------------Bubble Chart Ends----------------------------------------------------------------------------*/
	 </script>
  </head>

<body background="new_images/background.gif" >	
   <!--Div that will hold the pie chart-->

		<div id="geo_chart" style="width:1500px;height:500;margin-top:120px;margin-left:10px;"></div>
		<div id="bubble_chart"></div>
		
  </body>
</html>	