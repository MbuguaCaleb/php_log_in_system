<?php
require('./header.php');
?>
<main>
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