<html>
<head>
<script>
function changetouppercase()
{
	var element = document.getElementById('crawl_ip');
	element.value = element.value.toUpperCase();
}

</script>
</head>
<body>
<form name="crawling"  action="crawl_get_data.php" method="POST">
<input type="text" name="crawl_ip" id="crawl_ip" placeholder="Search..." onchange='changetouppercase()'>
<button id="crawl_sub" type="submit" name="crawl_sub" value="submit">Search</button>
</form>
<div id="crawl_div"></div>
</body>
</html>