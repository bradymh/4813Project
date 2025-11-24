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
    <title>Deleted</title>
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
                    if ($_SESSION['user_id'] === 1) {
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
    // Database connection
    $servername = "sql301.infinityfree.com";
    $username = "if0_40485803";
    $password = "EkvjSmSRSL0q";
    $dbname = "if0_40485803_BradyWorkoutDatabase";
    $con = new mysqli($servername, $username, $password, $dbname);

    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $con->prepare('DELETE FROM `Workouts` WHERE id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    if ($stmt) {
        echo "<p>Posts deleted</p>";
    } else {
        echo "<p>Unable to delete posts</p>";
    }
    $con->close();
    ?>
    <a href="home.php">Return</a>
</body>

</html>