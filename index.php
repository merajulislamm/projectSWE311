<?php
include "config/config.php";
include "custom_functions.php";


include "partials/header_top.php";
include "partials/header.php";
?>
    <!--page wraper-->
    <div class="page-wrapper">
        <?php
        if (isset($_GET['login']) && ($_GET['login'] == 'success')) {
            ?>
            <p style="color: green;">Logged In Success... </p>
            <?php
        } elseif (isset($_GET['logout']) && ($_GET['logout'] == 'success')) {
            ?>
            <p style="color: red;">Logged Out Success... </p>
            <?php
        }
        if (isset($_GET['error']) && ($_GET['error'] == 'permission')) {
            ?>
            <p style="color: red;">You Don't Have Access... </p>
            <?php
        }
        ?>
        <!--post slider-->
        <div class="post-slider">

            <h1 class="slider-title">Hot Trending</h1>
            <i class="fas fa-chevron-left prev"></i>
            <i class="fas fa-chevron-right next"></i>


            <div class="post-wrapper">
                <?php
                $all_post_sql = "SELECT p.* , u.name AS u_name FROM posts p LEFT JOIN users u ON p.user=u.id WHERE p.published='1' ORDER BY id DESC";
                $all_post_qry = mysqli_query($conn, $all_post_sql);
                if (mysqli_num_rows($all_post_qry) > 0) {
                    while ($all_post = mysqli_fetch_array($all_post_qry)) {

                        ?>
                        <div class="post">
                            <img src="uploads/<?php echo $all_post['image']; ?>" alt="" class="slider-image">
                            <div class="post-info">
                                <h4>
                                    <a href="single.php?post_id=<?php echo $all_post['id']; ?>"><?php echo $all_post['title']; ?></a>
                                </h4>
                                <i class="far fa-user"><?php echo $all_post['u_name']; ?></i>
                                &nbsp;
                                <i class="far fa-calendar-alt"> <?php echo $all_post['date']; ?></i>
                            </div>
                        </div>
                        <?php
                    }
                }

                ?>
            </div>
        </div>

        <!--page slider-->

        <!--Content-->
        <div class="content clearfix ">

            <!--Main Content-->
            <div class="main-content">
                <h1 class="recent-post-title">Recent Post</h1>


                <?php
                $last_5_post_sql = "SELECT p.* , u.name AS u_name FROM posts p LEFT JOIN users u ON p.user=u.id WHERE p.published='1' ORDER BY id DESC LIMIT 5";
                $last_5_post_qry = mysqli_query($conn, $last_5_post_sql);
                if (mysqli_num_rows($last_5_post_qry) > 0) {
                    while ($post = mysqli_fetch_array($last_5_post_qry)) {

                        ?>
                        <div class="post">
                            <img src="uploads/<?php echo $post['image']; ?>" alt="" class="post-image">

                            <div class="post-preview">
                                <h1>
                                    <a href="single.php?post_id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a>
                                </h1>

                                <i class="far fa-user"><?php echo $post['u_name']; ?></i>
                                &nbsp;
                                <i class="far fa-calendar-alt"> <?php echo $post['date']; ?></i>

                                <p class="preview-text">
                                    <?php echo show_sub_string($post['description'], 30) ?>.....
                                </p>
                                <a href="single.php?post_id=<?php echo $post['id']; ?>" class="btn read-more">Read
                                    More</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                ?>


            </div>

            <!--//Main Content-->
            <div class="sidebar">
                <div class="section search">
                    <h2 class="section-title">Search</h2>
                    <form action="index.php " method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Search">
                    </form>
                </div>

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