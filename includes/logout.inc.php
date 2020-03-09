<?php

session_start();

//delete the values in session variables
session_unset();

//destroy session
session_destroy();
header('Location: ../index.php');
