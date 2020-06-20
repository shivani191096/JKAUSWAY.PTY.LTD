<?php
include 'includes/header.php';
include 'includes/lib/functions/database.php';
include 'includes/lib/classes/blog.php';
?>
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section-heading">J K Ausway Security Blog</h1>
            </div>
        </div>
    </div>
</section>

<section class="blog">
    <div class="container">

        <ul class="list-inline blog-filter">
            <li><a href="javascript:void(0)" class="btn btn-filter" id="all">All</a></li>
            <li><a href="javascript:void(0)" class="btn btn-filter" id="Business_Security">Business Security</a></li>
            <li><a href="javascript:void(0)" class="btn btn-filter" id="Home_Security">Home Security</a></li>
            <li><a href="javascript:void(0)" class="btn btn-filter" id="Security_Cameras">Security Cameras</a></li>
        </ul>
        <div class="clearfix"></div>
        <div class="row blog-list">

            <?php
            $blogs = new blog();
            $blogs_list = $blogs->getlist_blog();
             // echo "<pre>";print_r($blogs_list);die;
            if ($blogs_list != "empty") {
                $i = 0;
                foreach ($blogs_list as $key => $blog_data) {

                    ?>
                    <div class="col-md-4 <?php echo $blog_data['cat_name']; ?>">
                        <div class="card box-shadow">
                            <img class="card-img-top" src="<?php echo BASE_URL; ?>assets/images/<?php echo $blog_data['feature_image']; ?>" alt="Thumbnail" style="height: 225px; width: 100%; display: block;" data-holder-rendered="true">
                            <div class="card-body">
                                <h4><?php echo $blog_data['blog_name']; ?></h4>
                                <p class="card-text"><?php echo mb_strimwidth(html_entity_decode($blog_data['blog_content']), 0, 150, "..."); ?></p>
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <a href="<?php echo BASE_URL; ?>blog_tail.php?id=<?php echo $blog_data['blog_id']; ?>" class="btn btn-read-more">Read More</a>
                                    </div>
                                    <!--<div class="col-md-6 text-right">
                                        <small class="text-muted"><?php /*echo date('d-m-Y', strtotime($blog_data['created_at'])); */?></small>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
        <?php $i++; }
            } ?>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>