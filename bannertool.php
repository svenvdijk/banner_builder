<?php

session_start();

include_once('./includes/connection.php');
include_once('./includes/banner.php');

$banner = new Banner;
$banners = $banner->fetch_all();


if(isset($_SESSION['logged_in'])){

    include 'header.php'

    ?>
        <body>

            <?php
                include './includes/navigation.php';
            ?>
    
            <div class="container">
                <section class="wrapper">
                    <?php foreach ($banners as $banner) { ?>
                        <div class="banner_wrapper">
                            <header class="banner_header">
                                <h4>
                                    <?php echo $banner['banner_title'];?>: <?php echo $banner['banner_sizeX'];?>*<?php echo $banner['banner_sizeY'] ?>
                                </h4>
                            </header>
                            <div data_id="<?php echo $banner['banner_id'];?>" class="banner_content" style="width:<?php echo $banner['banner_sizeX'];?>px; height:<?php echo $banner['banner_sizeY'];?>px">
                                
                            </div>
                        </div>
                    <?php } ?>
                </section>
                
            </div>
    
        </body>
    </html>

<?php } else {
    header('Location: login.php');
} ?>

