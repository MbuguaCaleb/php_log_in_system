<?php
//ensuring that the user cannot access server file unless on submit
if (isset($_POST['signup-submit'])) {

    //connection to the database
    require('./dbh.inc.php');

    //fetching information from the signup form
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    //error handlers
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        //redirecting while displaying the error messages
        header("Location: ../signup.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        //pregmatch checks to ensure that your inpu matches a specific pattern
        header("Location: ../signup.php?error=invalidmail&uid");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //ensuring that the given email is valid
        header("Location: ../signup.php?error=invalidmail&uid=" . $username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

        //Only letters and white space and numbers are allowed
        //Ensuring that a valid username has been submitted
        header("Location: ../signup.php?error=invaliduid&mail=" . $email);
        exit();
    } else if ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=" . $username . "&mail=" . $email);
        exit();
    } else {
    
    }
}
