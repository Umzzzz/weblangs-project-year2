<html>
<head>
<?php $page_title = 'iSongs by UMAIR YAQUOOB'; ?>
<?php include("header.php"); ?>
</head>
<body>
<?php
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("music_db") or die (mysql_error());

//collect data from database when you type in customers last name. 
if (isset($_POST['search'])) {
	$searchq = $_POST['search']; 
	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	
	$query = mysql_query("SELECT transactions.Transaction_ID, customers.Surname, songs.Song_Name, artist.Last_name 
	FROM(artist INNER JOIN songs ON artist.Artist_ID = songs.Artist_ID) INNER JOIN 
	((customers INNER JOIN transactions ON customers.Customer_ID = transactions.Customer_ID) 
	INNER JOIN transaction_details ON transactions.Transaction_ID = transaction_details.Transaction_ID) 
	ON songs.Song_ID = transaction_details.Song_ID WHERE Surname LIKE '%$searchq%' 
	ORDER BY transactions.Transaction_ID ASC")  or die (mysql_error());
	
	$count = mysql_num_rows($query); 
	if($count == 0) {
	}else{
	    //  Table header. 
		 echo "Search results for: " . $searchq;
	     echo ' <table>
		<tr>
			<th scope="col">Transaction ID</th>
			<th scope="col">Customer Surname</th>
			<th scope="col">Song name</th>
			<th scope="col">Artist</th>
			 
	 </tr>
	 '; 
	      while($row = mysql_fetch_array($query, MYSQLI_ASSOC)) {
		  echo  '<tr><td>' . $row['Transaction_ID'] . '</td><td>' . $row['Surname'] .
		  '</td><td>' . $row['Song_Name'] . '</td><td>' . $row['Last_name'] .  '</td></tr>';
		 
		}
		
	}
	
	}	
	
	echo '</table>'; // Close the table. 
	
?>
<?php include("footer.php"); ?>
</body>
</html>	
