<?php
include 'includes/header.php';
$display = "";
$thisFile = __FILE__;
/** @noinspection PhpIncludeInspection */

$debug_div = '';
$hideSP = '';
$resizeResponseDiv = '';
$clearButton = '';
$get_vars = (!empty($_GET)) ? filter_input_array(INPUT_GET) : array();
$post_vars = (!empty($_POST)) ? filter_input_array(INPUT_POST) : array();
$form_vars = array_merge($post_vars, $get_vars); // POST overrides and overwrites GET
if (!empty($form_vars)) require_once('includes/lib/Program-O/chatbot/conversation_start.php');
$bot_id = (!empty($form_vars['bot_id'])) ? $form_vars['bot_id'] : 1;
$say = (!empty($form_vars['say'])) ? $form_vars['say'] : '';
$convo_id = (isset($form_vars['convo_id'])) ? $form_vars['convo_id'] : md5(time());
$format = (!empty($form_vars['format'])) ? _strtolower($form_vars['format']) : 'html';

if (ERROR_DEBUGGING)
{
    $convo_id = (isset($form_vars['convo_id'])) ? $form_vars['convo_id'] : 'DEBUG'; // Hard-code the convo_id during debugging
    $debug_src = (!empty($form_vars) && file_exists(_DEBUG_PATH_ . "{$convo_id}.txt")) ? _DEBUG_URL_ . "reader.php?file={$convo_id}.txt" : '';
    $debug_div = <<<endDebugDiv

<iframe id="debugDiv" src="$debug_src" frameborder="0">
endDebugDiv;
    $hideSP = 'display: none;';
    $resizeResponseDiv = 'max-height: 200px;';
    $clearButton = <<<endClr
<input id="btnClear" name="" type="button" value="Clear Div" onclick="document.getElementById('responses').innerHTML = '';">
endClr;
}
?>

<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section-heading">FAQ</h1>
            </div>
        </div>
    </div>
</section>

<section class="faq">
    <div class="container">
        <div class="row">
            <div class="col-md-8 box-shadow">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="heading1">
                            <h2 class="section-heading">
                                <button class="btn" type="button" data-toggle="collapse" data-target="#faq1" aria-expanded="false" aria-controls="faq1">
                                    What features are included in a basic home security system?
                                    <span class="icon"></span>
                                </button>
                            </h2>
                        </div>

                        <div id="faq1" class="collapse in" aria-labelledby="heading1" data-parent="#accordionExample">
                            <div class="card-body">
                                Home security systems are available with many features, but basic features alone might meet your needs. A basic equipment set provides magnetic sensors for all vulnerable entryways and has one or more infrared sensors to detect motion inside the home. These sensors link to a control panel that has a loud siren and a connection to the monitoring company, which can dispatch emergency personnel.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading2">
                            <h2 class="section-heading">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                    What advanced features are available for home security?
                                    <span class="icon"></span>
                                </button>
                            </h2>
                        </div>
                        <div id="faq2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Advanced security systems combine the basic components described above (sensors and a control panel) with extra crime-deterring equipment. Examples of simple add-ons are glass break sensors, panic buttons for the walls, and a panic pendant to wear around the neck. Panic pendants have been lifesavers during medical emergencies as well as during home invasions.</p>
                                <p>Door locks with key codes and smartphone remote control are another advanced security feature. These are especially popular with real estate agents and with residents who have frequent visitors such as health care providers, dog walkers and babysitters.</p>
                                <p>Surveillance cameras add yet another layer of home security. Control panels can include cameras for capturing still images or video, and of course cameras can be set up throughout the home and outdoors. One special type of doorbell security camera sends mobile notifications when the doorbell rings and lets you watch surveillance footage from your smartphone. You can speak with the visitor and create the effect that you’re actually at home.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading3">
                            <h2 class="section-heading">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                    What kinds of home security cameras are available?
                                    <span class="icon"></span>
                                </button>
                            </h2>
                        </div>
                        <div id="faq3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Modern indoor/outdoor video surveillance for home security is full colour, full motion and high resolution. The best security cameras have night vision and quickly adapt to changes in lighting. Some allow remote monitoring and control via a mobile device or desktop computer.</p>
                                <p>The main difference between indoor and outdoor security cameras is the construction quality; it varies because outdoor cameras need to withstand harsher conditions. Some outdoor security cameras are enhanced with heaters and fans to help protect against the elements. Outdoor cameras also need to be more durable because they’re particularly vulnerable to attempted disabling by criminals. Some are housed in especially tamper-proof casings.</p>
                                <p>When choosing video surveillance you can choose between fixed and moving cameras. In some cases a fixed camera makes the most sense. When a moving camera is best, dome cameras are recommended because they make it more difficult to evade view. A dome camera can cover 360 degrees but makes it impossible for onlookers to know where the lens is pointed.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading4">
                            <h2 class="section-heading">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                    Will my pet trigger the motion detector?
                                    <span class="icon"></span>
                                </button>
                            </h2>
                        </div>

                        <div id="faq4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
                            <div class="card-body">
                                Home security systems can be fully functional even when pets share your home. First, a typical motion sensor won’t detect a cat, dog or anyone else. (Sensors with different weight settings are available too.) Second, modern home security technology can distinguish between the movements of humans and our animal companions. Speed and movement patterns are considered along with mass to help ensure that pets don’t trigger false alarms.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading5">
                            <h2 class="section-heading">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#faq5" aria-expanded="false" aria-controls="faq5">
                                    How do home security systems protect against fire and floods?
                                    <span class="icon"></span>
                                </button>
                            </h2>
                        </div>

                        <div id="faq5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
                            <div class="card-body">
                                Besides guarding against intruders, some home security systems protect against environmental disasters by detecting heat, smoke and moisture. Alarms and text alerts can help prevent or minimize damage from fire and water.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading6">
                            <h2 class="section-heading">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#faq6" aria-expanded="false" aria-controls="faq6">
                                    What are the "smart home" or home automation features of security systems?
                                    <span class="icon"></span>
                                </button>
                            </h2>
                        </div>

                        <div id="faq6" class="collapse" aria-labelledby="heading6" data-parent="#accordionExample">
                            <div class="card-body">
                                When setting up a home security system you can create a “smart home.” This is known as home automation. Mobile apps for security systems can also control and monitor your home’s lighting, thermostat and other systems. Customers choose home automation for added security, for convenience and to better control their utility expenses.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading7">
                            <h2 class="section-heading">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#faq7" aria-expanded="false" aria-controls="faq7">
                                    How much do home security systems cost?
                                    <span class="icon"></span>
                                </button>
                            </h2>
                        </div>

                        <div id="faq7" class="collapse" aria-labelledby="heading7" data-parent="#accordionExample">
                            <div class="card-body">
                                The cost of a home security system greatly varies depending on factors such as equipment, contracts, monitoring and more.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="live-chat">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <div class="live-chat-wrap">
                    <div class="live-chat-header bg-dark">
                        <h4 class="section-heading text-white">Chat Board</h4>
                        <span class="chat-hide" style="display: none;"><i class="fa fa-times"></i></span>
                    </div>
                    <div class="live-chat-body" style="display: none;">
                        <div class="message message-support">
                            <img src="<?php echo BASE_URL; ?>assets/images/chat/support.png" alt="Support">
                            <span class="text">Hi, Welcome to Our live chat. How may I help you?</span>
                        </div>
                        <!--<div class="message message-me">
                                <img src="<?php /*echo BASE_URL; */?>assets/images/chat/me.png" alt="Me">
                                <span class="text">Hello</span>
                            </div>-->
                        <div id="responses">
                            <?php echo $display; ?>
                        </div>
                        <form name="chatform" method="post" onsubmit="if(document.getElementById('say').value == '') return false;">
                            <div class="form-group">
                                <textarea name="say" id="say" class="form-control" rows="2" placeholder="Write a message..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" id="btn_say">SEND</button>
                            <input type="hidden" name="con1vo_id" id="convo_id" value="<?php echo $convo_id; ?>"/>
                            <input type="hidden" name="bot_id" id="bot_id" value="<?php echo $bot_id; ?>"/>
                            <input type="hidden" name="format" id="format" value="<?php echo $format; ?>"/>
                            <?php /*echo $clearButton*/?>
                        </form>
                        <?php echo $debug_div ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Section -->
<footer>
    <div class="footer-content bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-left">
                    <h3 class="section-heading text-white">About J K Ausway PVT LTD</h3>
                    <p class="text-white">Monitored alarm systems for generat Georgia area. We are J K Ausway PVT LTD. Let our family protect yours@.</p>
                    <p class="text-white">Unit 3, 31 DALGAN STREET, Oakleigh South, VIC 3167 <br>624-167-488</p>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4 text-left">
                    <ul class="quicklinks">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="products-and-services.php">Products and Services</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                    </ul>
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <p class="copyright">Copyright © 2020 | J K Ausway PVT LTD. All rights reserved.</p>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="getAFreeQuote" tabindex="-1" role="dialog" aria-labelledby="getAFreeQuoteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-center">
                <h3 class="modal-title section-heading text-white" id="getAFreeQuoteLabel">Get a Free Quote</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h5>J K Ausway Home Security</h5>
                        <p>$299 Installed* Home Security System</p>
                    </div>

                    <div class="col-md-12">
                        <form method="post" name="get_free_quote_form" class="get-free-quote-form" role="form">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputFullName">Full Name</label>
                                    <input type="text" name="inputFullName" class="form-control" id="full_name" placeholder="Full Name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" name="inputEmail" class="form-control" id="input_email" placeholder="Email Id" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputName">Name</label>
                                    <input type="text" name="inputName" class="form-control" id="quote_name" placeholder="Quote Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPostcode">Postcode</label>
                                    <input type="text" name="inputPostcode" class="form-control" id="post_code" placeholder="Postcode" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">State</label>
                                    <input type="text" name="inputState" class="form-control" id="input_state" placeholder="State Name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPhone">Phone</label>
                                    <input type="number" name="inputPhone" class="form-control" placeholder="Ex.0158585858" id="input_phone" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label id='q_loader' style='display: none;'>Awaiting while sending...</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary">Book a free quote now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/vendor/jquery/jquery-2.1.1.js"></script>

<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Owl Carasol JavaScript -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/vendor/owlcarasol/js/owl.carousel.js"></script>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/vendor/jquery/jquery.validate.min.js"></script>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/toastr.min.js"></script>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/custom.js"></script>

</body>
</html>