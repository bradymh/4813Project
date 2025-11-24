<?php
session_start();
$DATABASE_HOST = 'sql301.infinityfree.com';
$DATABASE_USER = 'if0_40485803';
$DATABASE_PASS = 'EkvjSmSRSL0q';
$DATABASE_NAME = 'if0_40485803_BradyWorkoutDatabase';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Check for connection errors
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error
    exit('Failed to connect to database');
}

if (!isset($_POST['username'], $_POST['password'])) {
    exit('Please fill both the username and password fields');
}

if ($stmt = $con->prepare('SELECT id, password FROM Users WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    
    // Check if account exists with the input username
    if ($stmt->num_rows > 0) {
        // Account exists, so bind the results to variables
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        
        if (password_verify($_POST['password'],$password)) {
            session_regenerate_id();
            // Declare session variables
            $_SESSION['account_loggedin'] = TRUE;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['user_id'] = $id;
            // if admin redirect to admin page
            if ($id === 1){
                header('Location: admin.php');
                exit;
            }
            // else user goes to home page
           	header('Location: home.php');
            exit;
        } else {
            echo 'Incorrect username and/or password!';
        }
    } else {
        echo 'Incorrect username and/or password!';
    }
    $con->close();
}
?>