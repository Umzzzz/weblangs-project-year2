<html>
<head>
<?php $page_title = 'iSongs by UMAIR YAQUOOB'; ?>
<?php include("header.php"); ?>
</head>
<body>
<?php 
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'music_db');
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die ('Could not connect to MYSQL: ' . mysqli_connect_error() );

$name = $_POST['how'];

// Query
$q ="SELECT songs.Song_Name, artist.First_name, songs.Release_date, songs.Genre, songs.Price, artist.Nationality, artist.Label FROM artist 
      LEFT JOIN music_db.songs ON artist.Artist_ID = songs.Artist_ID WHERE First_name ='$name'";
$r = @mysqli_query ($dbc, $q);

	
// Table header.
echo "Search results for: " . $name;
echo '<table>
<tr>
<th scope="col">Song</th>
<th scope="col">Release date</th>
<th scope="col">Genre</th>
<th scope="col">Price</th>
<th scope="col">Nationality<th> 
<th scope="col">Label</th>
</tr>
';

// Fetch and print all the records:
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
echo '<tr><td>' . $row['Song_Name'] . '</td><td>' . $row['Release_date'] . '</td><td>' . $row['Genre'] . '</td><td>'. $row['Price'] . '</td><td>' . $row['Nationality'] . 
'</td><td>' . $row['Label'] . '</td></tr>'; 
}

echo '</table>'; // Close the table.
?>
<?php include("footer.php"); ?>
</body>
</html>

