<?php
include 'includes/header.php';
include 'includes/lib/functions/database.php';
include 'includes/lib/classes/gadgets.php';
?>
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section-heading">About Us</h1>
            </div>
        </div>
    </div>
</section>

<section class="about-us product-slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                                    <a href="#" class="product-link"><?php echo $gadget['gadget_name']; ?></a>
                                </div>
                            </div>
                            <?php $i++; }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p class="text-justify">J K Ausway Pvt Ltd is a Melbourne- Based firm that provides commercial and domestic services to their clients. The company is always looks after to address the growing needs of its customer base in relation to security of its premises.</p>

                <p class="text-justify">In Australia, J K Ausway Pvt Ltd is committed to providing ongoing reliable, quality service and innovative products to all customers. From protection of the average Australian home and corner shop to the provision of sophisticated security systems for major commercial facilities such as banking institutions, airports, large corporations and government agencies, J K Ausway Pvt Ltd provides security solutions tailored to the individual risk.</p>

                <p class="text-justify">Three of the most reputable names in security have merged to provide a personalized, reliable and affordable home security solution. J K Ausway Pvt Ltd is striving to compete with other major names in the industry by providing unparalleled brand recognition and competitive value. The company’s system is both affordable and loaded with features. Two monitoring options are available from the company.</p>
            </div>
        </div>
    </div>
</section>
<?php
include 'includes/footer.php';
?>
