<?php
session_start();
if(isset($_SESSION['name']))
echo "Set";

else
echo "not";
?>
