<?php //login.php

session_start(); // stops anyone without a session from seeing the page. 

// Variables represented from the login form and password encryption using md5. 
$email = $_POST['email']; 
$enc_password = $_POST['password'];
$password = md5($enc_password);

//Validate email
if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) 

{echo "Invalid email address.";}


if ($email && $password) // if both entered we continue

{

// Database connection 
DEFINE ('DB_USER' , 'root');
DEFINE ('DB_PASSWORD' , '');
DEFINE ('DB_HOST' , 'localhost');
DEFINE ('DB_NAME' , 'music_db');
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
OR die ('Could not connect to MYSQL: ' . mysqli_connect_error() );

$query = @mysqli_query($dbc, "SELECT * FROM customers WHERE Email='$email'" );

// look at number of rows in the returned query
$num_rows = mysqli_num_rows($query);

if($num_rows !=0) // if there is something there

	{ 
	while ($row = mysqli_fetch_assoc($query))
	{
	$db_email = $row['Email'];
	$db_password = $row['password'];
	}

	// check if entered email and password match those in database
	if ($email==$db_email && $password == $db_password)
	
	{
	
	
	echo "<h2>Login successful - Welcome to iTunes<br>";
	echo "<h2>Click the link to open home pages<br><br><a href='home.php'> Home</a>";
	
	// get email address passed by $_SESSION
	$_SESSION['email'] = $db_email;
	
	// header( 'Location: http://localhost/weblangs_project/index.php' ) ;
	// header ( 'Location: header.php' ) ;
	}
	
	else echo "Incorrect password";
	}
	
	else die ("That email does not exist");
}

else die ("Please enter an email and password");

?>