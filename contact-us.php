<?php
include 'includes/header.php';
?>

<header class="page-banner">
    <div class="container">
        <div class="row intro-text text-left">
            <div class="col-md-8">
                <h2 class="section-heading">Find out how an JKAusway Security System can help protect your home and family</h2>
                <div class="clearfix"></div>
                <h5 class="section-heading">From only</h5>
                <div class="clearfix"></div>
                <h2 class="section-heading price"><span class="small">$</span>299<span class="small">*.00</span></h2>
                <div class="clearfix"></div>
                <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#getAFreeQuote">Get a Free Quote</a>
            </div>
        </div>
    </div>
</header>

<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section-heading">Contact Us</h1>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>J K Ausway Pvt Ltd is a Melbourne- Based firm that provides commercial and domestic services to their clients. The company is always looks after to address the growing needs of its customer base in relation to security of its premises.</p>

                <p><b>Phone: </b>888-365-8434</p>

                <p><b>Note: </b>If you are calling from outside Australia – +61 405423429</p>
            </div>

            <div class="col-md-6">
                <div class="enq_alert" style="display: none;">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    Email id is not available!
                </div>
                <div class="enq_success" style="display: none; margin-bottom: 20px;">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    Thank you for connect with us. We have sent your Ticket to the address Provided.
                </div>
                <form method="post" name="contact-us-form" class="contact-us-form" id="contact_us_form" role="form">
                    <div class="form-group">
                        <label for="inputFullName">Full Name</label>
                        <input type="text" name="inputFullName" class="form-control" id="inputFullName" placeholder="Full Name" required>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail">Email Address</label>
                        <input type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Email Id" required>
                    </div>

                    <div class="form-group">
                        <label for="inputPhone">Phone Number</label>
                        <input type="number" name="inputPhone" class="form-control" placeholder="Ex.0158585858" id="inputPhone" required>
                    </div>

                    <div class="form-group">
                        <label for="inputCompany">Company</label>
                        <input type="text" name="inputCompany" class="form-control" id="inputCompany" placeholder="Company Name" required>
                    </div>

                    <div class="form-group">
                        <label for="inputPostcode">Postcode</label>
                        <input type="text" name="inputPostcode" class="form-control" id="inputPostcode" placeholder="Postcode" required>
                    </div>

                    <div class="form-group">
                        <label for="selectState">State</label>
                        <select name="selectState" class="form-control" name="selectState" id="selectState" required>
                            <option value="">Select State...</option>
                            <option value="nsw">NSW</option>
                            <option value="vic">VIC</option>
                            <option value="qld">QLD</option>
                            <option value="act">ACT</option>
                            <option value="sa">SA</option>
                            <option value="wa">WA</option>
                            <option value="tas">TAS</option>
                            <option value="nt">NT</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message to JKAusway Customer Service</label>
                        <textarea name="message" id="textarea" class="form-control" rows="5" placeholder="Write a message..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputSubscribe">Opt In</label><br/>
                        <input type="checkbox" name="inputSubscribe" id="inputSubscribe" value="1"> Subscribe Today
                        <p>By completing the above form and ticking the “Subscribe Today”-Button, you confirm that you have reviewed, understood and accepted our privacy terms as well as our Cookie terms. Read our <a href="#">Privacy Policy</a></p>
                    </div>

                    <div class="form-group">
                        <label for="inputUnsubscribe">No, I do not wish to receive any further Product and Sales & Marketing communications and updates from JKAusway Security and its products and brands.</label>
                        <input type="checkbox" name="inputUnsubscribe" id="inputUnsubscribe" value="1"> Unsubscribe
                    </div>

                    <div class="form-group">
                        <label><button type="submit" class="btn btn-primary">Send Enquiry</button></label>
                        <div id='loader' style='display: none;'>
                            <label>Awaiting while sending...</label>
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
