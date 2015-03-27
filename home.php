<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/accordion.css" />
  </head>

  <body>
<?php session_start();

if ($_SESSION['email'])

{echo "You are logged in as: ".$_SESSION['email']; echo "<p>";}

else // if no one has logged in session as not been set. 

header ("Location: login.html");


$page_title = 'iSongs Homepage';

include("header.php"); 

 ?>
 
 <!-- * Main Content. -->
<section class="page">
      <ul class="accordion">
        <li>
          <button class="accordion-control">Welcome</button>
          <div class="accordion-panel">
            <p>Hello! This is an online itunes music company.</p>
          </div>
        </li>
        <li>
          <button class="accordion-control">About</button>
          <div class="accordion-panel">
            <p>This project has been created by Umair Yaquoob using PHPMyAdmin for backend database, PHP to retrieve data and JavaScript for functionality of the webpage.</p>
          </div>
        </li>
        <li>
          <button class="accordion-control">Enjoy!</button>
          <div class="accordion-panel">
            <p>I hope you enjoy the work I done using server side and object oriented programming.</p>
          </div>
        </li>
      </ul>
    </section>
	
	<script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/accordion.js"></script>


  </body>	
  <?php include("footer.php"); ?>
</html>
