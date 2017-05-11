<?php


function getheader()
{
echo "<!DOCTYPE html>
<html lang='en'>

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>

    <title>Placement Assured</title>

    <!-- boot strap css core-->
    <link rel='stylesheet' href='css/bootstrap.min.css' type='text/css'>

    <!-- custom fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='font-awesome/css/font-awesome.min.css' type='text/css'>

    <!-- css desined -->
    <link rel='stylesheet' href='css/animate.min.css' type='text/css'>

    <!-- css desined -->
    <link rel='stylesheet' href='css/creative.css' type='text/css'>

    <link rel='stylesheet' type='text/css' href='css/normalize.css' />
		<link rel='stylesheet' type='text/css' href='css/demo.css' />
		<link rel='stylesheet' type='text/css' href='css/component.css' />
		<script src='js/modernizr.custom.js'></script>

</head>

<body id='page-top'>

    <nav id='mainNav' class='navbar navbar-default navbar-fixed-top'>
        <div class='container-fluid'>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand page-scroll' href='index.php'>Placement Assured</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                <ul class='nav navbar-nav navbar-right'>
                    <li>
                        <a class='page-scroll' href='#about'>About</a>
                    </li>
                    <li>
                        <a class='page-scroll' href='#services'>Services</a>
                    </li>
                    <li>
                        <a class='page-scroll' href='#team'>Team</a>
                    </li>
                    <li>
                        <a class='page-scroll' href='#contact'>Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>";
    
}


function getfooter()
{
 echo "
    <footer>
        <div class='container'>
            <div class='row'>
                <div class='col-md-4'>
                    <span class='copyright'>Copyright &copy; placementassured.607@gmail.com</span>
                </div>
                <div class='col-md-4'>
                    <ul class='list-inline social-buttons'>
                        <li><a href='functions/error.php'><i class='fa fa-twitter'></i></a>
                        </li>
                        <li><a href='functions/error.php'><i class='fa fa-facebook'></i></a>
                        </li>
                        <li><a href='functions/error.php'><i class='fa fa-linkedin'></i></a>
                        </li>
                    </ul>
                </div>
                <div class='col-md-4'>
                    <ul class='list-inline quicklinks'>
                        <li><a href='functions/error.php'>Privacy Policy</a>
                        </li>
                        <li><a href='functions/error.php'>Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
   	
	";
}


function getscripts()
{
	echo "
 <script src='js/classie.js'></script>
		<script src='js/boxesFx.js'></script>
		<script>
			new BoxesFx( document.getElementById( 'boxgallery' ) );
		</script>

    <!-- jQuery -->
    <script src='js/jquery.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='js/bootstrap.min.js'></script>

    <!-- Plugin JavaScript -->
    <script src='js/jquery.easing.min.js'></script>
    <script src='js/jquery.fittext.js'></script>
    <script src='js/wow.min.js'></script>

    <!-- Custom Theme JavaScript -->
    <script src='js/creative.js'></script>	
";	
}


   ?>