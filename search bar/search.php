<?php

// setting header file to accept request


	mysql_connect("db.luddy.indiana.edu", "i494f20_allnagy", "my+sql=i494f20_allnagy") or die("Error connecting to database: ".mysql_error());
	
	mysql_select_db("tutorial_search") or die(mysql_error());
	/* tutorial_search is the name of database we've created */
?>
<!DOCTYPE html>
<head>
	<title>Search results</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
	$query = $_GET['query']; 
	// gets value sent over search form
	
	$min_length = 3;
	
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to &gt;
		
		$query = mysql_real_escape_string($query);
		// makes sure nobody uses SQL injection
		
		$raw_results = mysql_query("SELECT * FROM Song
			WHERE (`title` LIKE '%".$query."%') OR (`artistName` LIKE '%".$query."%') OR (`genre` LIKE '%".$query."%')") or die(mysql_error());
			
		// * means that it selects all fields, you can also write: `title`, `artistName`, `genre`
		// Song is the name of our table
		
		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
		
		if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
			while($results = mysql_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			
				echo "<p><h3>".$results['title']."</h3>".$results['text']."</p>";
				// posts results gotten from database(title and text) you can also show id ($results['id'])
			}
			
		}
		else{ // if there is no matching rows do following
			echo "No results";
		}
		
	}
	else{ // if query length is less than minimum
		echo "Minimum length is ".$min_length;
	}
?>
</body>
</html>
