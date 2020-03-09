<?php
require('./header.php');
?>
<main>

    <?php

    if (isset($_GET['error'])) {

        if ($_GET['error'] == "emptyfields") {

            echo '<p class="text-center" style="color: red;">Fill all fields!</p>';
        } else if ($_GET['error'] == "invaliduid") {
            echo '<p class="text-center" style="color: red;">Invalid username!</p>';
        } else if ($_GET['error'] == "invalidmailuid") {
            echo '<p class="text-center" style="color: red;">Invalid username and e-mail!</p>';
        } else if ($_GET['error'] == "invalidmail") {
            echo '<p class="text-center" style="color: red;">Invalid  e-mail!</p>';
        } else if ($_GET['error'] == "passwordcheck") {
            echo '<p class="text-center" style="color: red;">Your Passwords do not match!</p>';
        } else if ($_GET['error'] == "usertaken") {
            echo '<p class="text-center" style="color: red;">Username is already taken!</p>';
        }
    } else if ($_GET(['signup'] == "success")) {
        echo '<p class="text-center" style="color: green;">Signup successful!</p>';
    }
    ?>
    <div class="container" style="margin-top: 2rem">
        <form action="includes/signup.inc.php" method="POST">
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="uid" class="form-control" id="username" placeholder="Username">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="mail" class="form-control" id="mail" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="pwd-repeat" class="col-sm-2 col-form-label">Repeat Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwd-repeat" name="pwd-repeat" placeholder="Repeat Password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" name="signup-submit" class="btn btn-primary">Sign up</button>
                </div>
            </div>
        </form>

    </div>


</main>


<?php
require('./footer.php');
?>