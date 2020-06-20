<?php
include 'includes/header.php';
include 'includes/lib/functions/database.php';
include 'includes/lib/classes/gadgets.php';
?>
<div class="main-slider">
    <div class="owl-carousel owl-theme">
        <div class="item">
            <img src="<?php echo BASE_URL; ?>assets/images/banner.jpg" alt="Slider 1">
        </div>
        <div class="item">
            <img src="<?php echo BASE_URL; ?>assets/images/banner2.jpg" alt="Slider 2">
        </div>
        <div class="item">
            <img src="<?php echo BASE_URL; ?>assets/images/banner3.jpg" alt="Slider 3">
        </div>
        <div class="item">
            <img src="<?php echo BASE_URL; ?>assets/images/banner4.jpg" alt="Slider 4">
        </div>
    </div>
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p class="text-justify">J K Ausway Pvt Ltd is a Melbourne- Based firm that provides commercial and domestic services to their clients. The company is always looks after to address the growing needs of its customer base in relation to security of its premises.</p>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container" style="padding-bottom: 80px;padding-top: 80px;">
        <div class="row" style="padding-left: 5%;padding-right: 5%;">
            <div class="col-md-4" style="text-align: center;">
                <img src="<?php echo BASE_URL; ?>assets/images/ADT-Panel-v1.png">
                <h4>Home Security Systems</h4>
                <p>24/7 Monitored, wireless Security Systems for the home</p>
                <a href="home_security.php" class="btn btn-primary" type="button">Learn More</a>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <img src="<?php echo BASE_URL; ?>assets/images/ADT-Home-Automation.jpg">
                <h4>JKAusway Automated Security</h4>
                <p>Control your security & home with your smart phone or tablet remotely</p>
                <a href="automated_security.php" class="btn btn-primary" type="button">Learn More</a>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <img src="<?php echo BASE_URL; ?>assets/images/item-indipendant-alarms.jpg">
                <h4>IndiPendant Alarms</h4>
                <p>Personal alarms that help provide peace of mind, safety & security</p>
                <a href="indipendant_alarm.php" class="btn btn-primary" type="button">Learn More</a>
            </div>
        </div>
    </div>
</section>
<section class="product-slider">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="owl-carousel owl-theme">
                    <?php
                    $gadgets = new gadgets();
                    $gadgets_list = $gadgets->getlist();
                    //  echo "<pre>";print_r($gadgets_list);die;
                    if ($gadgets_list != "empty") {
                    $i = 0;
                    foreach ($gadgets_list as $key => $gadget) { ?>
                        <div class="product item">
                            <img src="<?php echo BASE_URL; ?>assets/images/products/<?php echo $gadget['image_url']; ?>" alt="Product">
                            <div class="product-body text-center">
                                <a href="#" class="product-link"><?php echo $gadget['gadget_name'];?></a>
                            </div>
                        </div>
                        <?php $i++; }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
