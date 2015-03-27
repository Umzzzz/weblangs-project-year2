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

$q = "SELECT artist.First_name FROM artist ORDER BY First_name ASC";
$r = @mysqli_query ($dbc, $q);

//form start 
echo '<form action = "process_dropdown.php" method="post">

<select name ="how">
<option value="">--Please select artist name </option>';

//Fetch and print all records 
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	echo '<option>' . $row['First_name'] . '</option>';
}

echo '<p><input type="submit" value="Send"></p>
</select> 

</form>'; // End of form

?>


<?php include("footer.php"); ?>
</body>
</html>