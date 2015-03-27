<html>
<head>
<title>The Form Output</title>
</head>
<body>
<?php
DEFINE ('DB_USER' , 'root');
DEFINE ('DB_PASSWORD' , '');
DEFINE ('DB_HOST' , 'localhost');
DEFINE ('DB_NAME' , 'music_db');
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
OR die ('Could not connect to MYSQL: ' . mysqli_connect_error() );
$first_name = $_POST['first_name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];

mysqli_query($dbc, "INSERT INTO music_db.customers (Customer_ID, First_name, Surname, Email, Registration_date, password) VALUES ( '', '$first_name','$surname','$email', CURRENT_TIMESTAMP, md5('$password'))");

echo "<h2>Hello, $first_name $surname.<br><br> Your name was successfully entered into the database.</h2><br><br>";

echo "<h2>Click the link to login and go to the Home Page.</h2><br><br>";

echo "<a href=home.php>Home Page</a><br><br>";

?>
</body>
</html>