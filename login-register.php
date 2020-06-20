<?php
include 'includes/header.php';
?>
<!--
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-heading">Login Account</h3>
            </div>
        </div>
    </div>
</section>-->

<!--<section class="login">
    <div class="container">
        <div class="row">
            <div class="loginalert" style="display: none;margin-bottom: 20px;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                Invalid Login credantial! Try Again
            </div>
            <div class="fgt_pass" style="display: none;margin-bottom: 20px;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                Be Careful! We have sent a verification email to the address Provided.
            </div>
            <div class="col-md-12">
                <form action="" method="post" role="form" id="loginForm" name="login-form" class="login-form">

                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="inputName">Name</label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="email" name="inputEmail" class="form-control" id="inputEmail">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="inputPassword">Password</label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="password" name="inputPassword" class="form-control" id="inputPassword">
                            <p style="cursor: pointer" onclick="forget_pass(this);" id="forgot_password"><u style="color: #999;">forgot password?</u></p>
                        </div>

                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>-->

<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-heading">Create an Account</h3>
            </div>
        </div>
    </div>
</section>

<section class="register">
    <div class="container">
        <div class="row">
            <div class="alert" style="display: none;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                Email id is not available!
            </div>
            <div class="success" style="display: none; margin-bottom: 20px;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                Thank you for registring. We have sent a verification email to the address Provided.
            </div>
            <div class="col-md-12">
                <form action="" method="post" role="form" id="signupForm" name="register-form" class="register-form">

                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="inputFirstName">First Name</label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="inputFirstName" class="form-control" id="inputFirstName" placeholder="First Name" required>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="inputLastName">Last Name</label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="inputLastName" class="form-control" id="inputLastName" placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="inputEmail">Email id</label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Email Id" required>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="inputAddress">Address</label>
                        </div>
                        <div class="form-group col-md-4">
                            <textarea type="text" class="form-control" name="inputAddress" id="inputAddress" rows="5" placeholder="Address" required></textarea>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="inputPhoneNumber">Phone No.</label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="number" name="inputPhoneNumber" class="form-control" placeholder="Ex.0158585858" id="inputPhoneNumber" required>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group">
                            <div class="form-check col-md-6">
                                <label><button type="submit" class="btn btn-primary">Submit</button></label>
                                <label class="checkbox-inline">
                                    <a href="interactive-security-login.php" type="button" class="btn btn-secondary">Cancel</a></label>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
