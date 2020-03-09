<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href='./bootstrapdist/css/bootstrap.min.css'>

  <title>PHP logIn System</title>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php"><img src="img/logo.jpg" width="30" height="30" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Companies
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">K24</a>
              <a class="dropdown-item" href="#">Kameme Tv</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Family Media</a>
            </div>
          </li>
        </ul>
        <?php
        if (isset($_SESSION['userId'])) {

          echo '<form action="includes/logout.inc.php" method="POST">
                <button type="submit" name="logout-submit" class="btn btn-success">Log Out</button>
                </form>';
        } else {

          echo '<form action="includes/login.inc.php" method="POST" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="mailuid" type="text" placeholder="Username/E-mail">
                <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="password">
                <button class="btn btn-outline-success my-2 my-sm-0" name="login-submit" type="submit">Log in</button>
                </form>
                <a type="button" href="signup.php" class="btn btn-link">Sign Up</a>';
        }
        ?>
      </div>
    </nav>

  </header>