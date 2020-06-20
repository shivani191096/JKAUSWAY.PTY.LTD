<?php
include 'includes/header.php';
include 'includes/lib/functions/database.php';
include 'includes/lib/classes/gadgets.php';
?>
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section-heading">Buy Security Gadgets</h1>
            </div>
        </div>
    </div>
</section>

<section class="product-list">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <?php
                    $gadgets = new gadgets();
                    $gadgets_list = $gadgets->getlist();
                  //  echo "<pre>";print_r($gadgets_list);die;
                    if ($gadgets_list != "empty") {
                        $i = 0;
                        foreach ($gadgets_list as $key => $gadget) {
                            if($i%3 == 0){
                                echo "<div class='clearfix'></div>";
                            }
                            ?>
                        <div class="col-md-4 product">
                            <img src="<?php echo BASE_URL; ?>assets/images/products/<?php echo $gadget['image_url']; ?>" alt="Product">
                            <div class="product-body">
                                <a href="#" class="product-link"><?php echo $gadget['gadget_name']; ?></a>
                                <p class="product-price">$<?php echo number_format($gadget['gadget_price'],2,".",","); ?></p>
                                <?php if(isset($_SESSION['email'])){ ?>
                                    <a href="#" class="btn btn-primary">BUY</a>
                                <?php }else{ ?>
                                    <a href="#" class="btn btn-primary">BUY</a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php $i++; }
                    } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="request-quotes bg-white">
                    <h2 class="section-heading">Want Customized Services?</h2>
                    <div class="request-quotes-content text-center">
                        <a href="request-a-quote.php" class="btn btn-primary btn-lg">Request A Quotes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
