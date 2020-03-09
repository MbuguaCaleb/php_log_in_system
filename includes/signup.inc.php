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
        header("Location: ../signup.php?error=invalidmailuid");
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
        //ensuring that the username has not already been taken
        //prepared statements prevent sql injections
        $sql = "SELECT uidUsers FROM users where uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            //incase it does not prepare the statement then throw an error
            header("Location: ../signup.php?error=sqlerror");
            exit();
        } else {
            //binding params
            mysqli_stmt_bind_param($stmt, "s", $username);
            //executing the statement
            mysqli_stmt_execute($stmt);
            //storing the results of the query in stmt
            //used when we want to fetch information from the database
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&mail=" . $email);
                exit();
            } else {
                $sql = "INSERT INTO users(uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                } else {

                    //hashing password with bcrypt before insert
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }

    //closing the mysqli connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../signup.php");
    exit();
}
