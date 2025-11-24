<?php
session_start();
if (!isset($_SESSION['account_loggedin'])) {
    header('Location: index.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Workout Added</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
        				<li><a href="#">Home</a></li>
        				<li><a href="/profile.php">Profile</a></li>
    					<?php
                            //if admin show the admin page in navbar
                            if ($_SESSION['user_id'] === 1){
                    			echo "<li><a href=\"admin.php\">Admin</a></li>";
                			}
          				?>
        			</ul>
        			<ul class="nav navbar-nav navbar-right">
        				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        			</ul>
        		</div>
        	</div>
        </nav>
    <?php
        session_start();
        // Database connection
        $servername = "sql301.infinityfree.com";
        $username = "if0_40485803";
        $password = "EkvjSmSRSL0q";
        $dbname = "if0_40485803_BradyWorkoutDatabase";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_SESSION['user_id'];
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $text = mysqli_real_escape_string($conn, $_POST['workout']);
            $sets = $_POST['sets'];
            $sql = "INSERT INTO Workouts (user_id, title, text, sets) VALUES ('$user_id', '$title', '$text', '$sets')";
            if ($conn->query($sql) === TRUE) {
                echo "New workout added";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
    ?>
        <br>
		<a href="home.php">Return to home</a>
        <br>
		<a href="workout.php">Add another workout</a>
	</body>
</html>