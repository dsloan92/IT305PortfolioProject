<?php
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);


//Start a session
session_start();

//If the user is already logged in


//Redirect to Admin Page
if (isset($_SESSION['username'])) {
    header('location: admin.php');
}




//If the login form has been submitted
if (isset($_POST['submit'])) {


    //Include creds.php (eventually, passwords should be moved to a secure location
    //or stored in a database)
    include('credentials.php');


    //Get the username and password from the POST array
    $username = $_POST["username"];
    $password = $_POST["password"];


    //If the username and password are correct
    if (array_key_exists($username, $logins) &&
        $logins["$username"] = $password) {


        //Store login name in a session variable
        $_SESSION['username'] = $username;


        //Redirect to admin page
        header('location: admin.php');
    }


    //Login credentials are incorrect
    echo "<p class = text-danger>Invalid Login</p>";
}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/guestbook.css">

    <title>Log In Guestbook Admin</title>
</head>
<body>
<div class = "container text-center m-5">
    <h2 class = "m-2">Please Login To View GuestBook Admin Page</h2>
<form method="post" action="#">
    <label class = form-check-label>Username:
        <input type="text" name="username">
    </label><br>

    <label class = form-check-label>Password:&nbsp;
        <input type="password" name="password">
    </label><br>

    <input class = "btn btn-primary mt-3" type="submit" name="submit" value="Submit">
</form>
</div>
</body>
</html>