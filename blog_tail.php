<?php
include 'includes/header.php';
include 'includes/lib/functions/database.php';
include 'includes/lib/classes/blog.php';
?>

<section class="page-title">
    <div class="container">
        <div class="row">
            <?php
            $res = $_SERVER['REQUEST_URI'] ;
            $id = substr($res, strrpos($res, "id=")+3);
            $blogs = new blog();
            $blogs_list = $blogs->get_blog($id);
          //  echo "<pre>";print_r($blogs_list[0]);die;
            ?>
            <h2 class="title-post"><?php echo $blogs_list[0]['blog_name']; ?></h2>
            <img src="assets/images/<?php echo $blogs_list[0]['feature_image']; ?>" alt="" style="width: 800px;height: 400px; margin-bottom: 10px;">
            <div class="col-md-8">
            <p style="font-size: 16px;"><?php echo html_entity_decode($blogs_list[0]['blog_content']); ?></p>
            </div>
            <?php ?>
        </div>
    </div>
</section>
<?php
include 'includes/footer.php';
?>
