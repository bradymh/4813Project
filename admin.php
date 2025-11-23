<?php
    //admin adminpassword123
session_start();
if (!isset($_SESSION['account_loggedin'])) {
    header('Location: index.html');
    exit;
}
if ($_SESSION['user_id'] != 1){
    header('Location: home.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Workout Tracker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style> 
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }
        .row.content {height: 100vh}
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;} 
        }
    </style>
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
      <a class="navbar-brand">Workout Tracker</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="/home.php">Home</a></li>
      	<li><a href="/profile.php">Profile</a></li>
        <li class="active"><a href="/admin.php">Admin</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="/profile.php"><?php echo $_SESSION["username"]; ?></a></p>
      <p><a href="/workout.php">Start Workout</a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Users</h1>
      <hr>
      <p></p>
    </div>
  </div>
</div>

</body>
</html>