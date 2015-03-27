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

$q = "SELECT First_name, Surname, Email FROM customers ORDER BY Surname ASC";
$r = @mysqli_query ($dbc, $q);
//  Table header. 
 echo '<table>
 <tr>
 <th scope="col">First Name</th>
 <th scope="col">Surname</th>
 <th scope="col">Email</th>
 </tr>
 ';
 
  // Fetch and print all the records: 
  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	  echo '<tr><td>' . $row['First_name'] . '</td><td>' . $row['Surname'] .
	  '</td><td>' . $row['Email'] . '</td></tr>
	  ';
}

echo '</table>'; // Close the table. 

?>

<?php include("footer.php"); ?>

</body>
</html>