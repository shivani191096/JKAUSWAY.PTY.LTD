<?php
include 'includes/header.php';
?>

<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section-heading">J K Ausway Interactive Security Login</h1>
            </div>
        </div>
    </div>
</section>

<section class="interactive-security-login">
    <div class="container">
        <div class="row">
            <div class="loginalert" style="display: none;margin-bottom: 20px;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                Invalid Login credentials! Try Again
            </div>
            <div class="fgt_pass" style="display: none;margin-bottom: 20px;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                Be Careful! We have sent a verification email to the address Provided.
            </div>
            <div class="col-md-12">
                <form action="" method="post" role="form" id="loginForm" name="interactive-security-login-form" class="interactive-security-login-form">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputName">Login</label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="email" name="inputName" class="form-control" id="inputEmail" value="<?php if(isset($_COOKIE["u_name"])) { echo $_COOKIE["u_name"]; } ?>" placeholder="Email Id" required>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputPassword">Password</label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="password" name="inputPassword" minlength="8" class="form-control" id="inputPassword" value="<?php if(isset($_COOKIE["u_pass"])) { echo $_COOKIE["u_pass"]; } ?>" placeholder="Password" required>
                        </div>
                    </div>

                    <div class="clearfix m-10"></div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="checkbox" name="inputRemember" id="inputRemember" value="1"> Remember My Login
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <label>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </label>
                                    <label class="checkbox-inline">
                                        <a type="button" href="index.php" class="btn btn-secondary">Cancel</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix m-10"></div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-4">
                           <a class="forgotPassword" href="login-register.php"><u>Create New Account</u> | </a> <a onclick="forget_pass(this);" class="forgotPassword" href="#"><u>Forgot Password?</u></a>
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