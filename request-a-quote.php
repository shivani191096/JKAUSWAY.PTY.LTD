<?php
include 'includes/header.php';
?>

<section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="section-heading">Request a Quote</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="request-a-quote">
        <div class="container">
            <div class="row">
                <div class="alert" style="display: none;">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    Invalid Email credentials! Try Again
                </div>
                <div class="col-md-12">
                    <form method="post" role="form" id="req_quotes" name="request-a-quote-form" class="request-a-quote-form">

                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="selectSecurityFor">Security For</label>
                            </div>
                            <div class="form-group col-md-4">
                                <select name="selectSecurityFor" class="form-control" id="selectSecurityFor" required>
                                    <option value="">Select security...</option>
                                    <option value="home">Home</option>
                                    <option value="office">Office</option>
                                    <option value="school">School</option>
                                    <option value="college">College</option>
                                </select>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="selectBudget">Budget</label>
                            </div>
                            <div class="form-group col-md-4">
                                <select name="selectBudget" class="form-control" id="selectBudget" required>
                                    <option value="">Select budget...</option>
                                    <option value="10000">10,000$</option>
                                    <option value="5000">5000$</option>
                                    <option value="2000">2000$</option>
                                    <option value="1000">1000$</option>
                                </select>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                    <?php if (!isset($_SESSION['email'])){ ?>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputEmail">Email id</label>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Email Id" required>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <?php }else{ ?>
                         <input type="hidden" name="inputEmail" class="form-control" id="inputEmail" value="<?php echo $_SESSION['email']; ?>" placeholder="Email Id">
                        <?php } ?>

                        <div class="form-row">
                            <div class="form-group col-md-2">
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <div id='req_loader' style='display: none;'>
                                        <label>Awaiting while sending...</label>
                                    </div>
                                    <div class="form-check">
                                        <label><button type="submit" class="btn btn-primary">Submit</button></label>
                                        <label class="checkbox-inline">
                                            <a href="products-and-services.php" type="button" class="btn btn-secondary">Cancel</a>
                                        </label>
                                    </div>
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
