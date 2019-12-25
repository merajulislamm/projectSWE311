<?php
include "config/config.php";
include "custom_functions.php";


include "partials/header_top.php";
include "partials/header.php";

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
} else {
    header("Location: index.php?error=invalid_post");
}

$post_sql = "SELECT p.* , u.name AS u_name FROM posts p LEFT JOIN users u ON p.user=u.id WHERE p.published='1' AND p.id='$post_id'";

$post_qry = mysqli_query($conn, $post_sql);
if (mysqli_num_rows($post_qry) <= 0) {
    header("Location: index.php?error=invalid_post");
}

$post = mysqli_fetch_array($post_qry);
?>
    <!--page wraper-->
    <div class="page-wrapper">

        <!--Content-->
        <div class="content clearfix ">

            <!--Main Content-->
            <div class="main-content single">
                <h1 class="Post-title"><?php echo $post['title']; ?></h1>
                <div style="margin: 0 auto;text-align: center">
                    <img src="uploads/<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" style="height: 250px;width: 600px;">
                </div>
                <div class="post-content">
                    <p><?php echo $post['description']; ?></p>

                </div>
            </div>

            <!--//Main Content-->


            <div class="sidebar">

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                        <li><a href="a">Sports</a></li>
                        <li><a href="a">Politics</a></li>
                        <li><a href="a">Media</a></li>
                        <li><a href="a">Biography</a></li>
                        <li><a href="a">IQ</a></li>
                        <li><a href="a">Motivation</a></li>
                        <li><a href="a">Entertainment</a></li>
                    </ul>
                </div>

            </div>


        </div>
        <!--//Content-->


    </div>
    <!--page wraper-->

<?php
include "partials/footer.php";
include "partials/footer_bottom.php";

?>