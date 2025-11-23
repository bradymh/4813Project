<?php
// Start the session
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Logout</title>
        <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    	<nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              <a class="navbar-brand" href="#">Workout Tracker</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li><a href="/home.php">Home</a></li>
    			<li><a href="/profile.php">Profile</a></li>
              </ul>
            </div>
          </div>
        </nav>	            
        <div class="container-fluid">
            <h2>You have Succesfully Logged Out</h2>
            <a href="index.html">Return to login</a>
        </div>
    </body>
</html>