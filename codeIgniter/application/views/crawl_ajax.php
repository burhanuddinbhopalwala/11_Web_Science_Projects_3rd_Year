<?php

	mysql_connect('localhost', 'root', '');
	mysql_select_db('minor');
	
	if(isset($_POST['SearchInput'])) {
		$SearchInput = strtolower($_POST['SearchInput']);

		$history = mysql_query('select * from search_key where keyword like "%'.$SearchInput.'%" limit 10');
		while($hist = mysql_fetch_assoc($history)) {
			$Name =$hist['keyword'];
			$Name = str_replace($SearchInput, '<span class="highlight">'.$SearchInput.'</span>', $Name);
			$Name = str_replace(ucfirst($SearchInput), '<span class="highlight">'.ucfirst($SearchInput).'</span>', $Name);
			echo '<a>'.$Name.'</a>';
		}
	
	}

?>