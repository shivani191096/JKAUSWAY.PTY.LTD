<?php
include 'includes/header.php';
?>
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-heading">Create Password</h3>
            </div>
        </div>
    </div>
</section>


<section class="register">
    <div class="container">
        <div class="row">
            <div class="loginalert" style="display: none;margin-bottom: 20px;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong>Invalid credantial! Please Try Again</strong>
            </div>
            <div class="col-md-12">
                <form action="" method="post" role="form" id="change_pass" name="register-form" class="register-form">
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="inputEmail">Current Password</label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="password" name="current_password" class="form-control" id="current_password" required>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="inputFirstName">New Password</label>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="password" name="new_password" minlength="8" class="form-control" id="new_password" required>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-group col-md-1">
                        <label for="inputLastName">Confirm Password</label>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="password" name="conf_password" minlength="8" class="form-control" id="conf_password" required>
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group">
                            <div class="form-check col-md-6">
                                <label><button type="submit" class="btn btn-primary">Submit</button></label>
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

