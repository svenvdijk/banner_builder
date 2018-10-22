<?php

session_start();

include_once('../includes/connection.php');

if(isset($_SESSION['logged_in'])) {
    ?>
    <?php
    include 'header.php'
    ?>
        <body>

            <?php
                include './includes/navigation.php';
            ?>

            <div class="container content">
                <section class="wrapper wrapper-home">
                    <div class="content_nav">
                        <a href="./tools/banner/crop.php">Bannertool</a> 
                    </div>
                    <div class="content_nav">
                        <a href="./tools/image/crop.php">Image cropper</a> 
                    </div>
                </section>
            </div>
        </body>

        <?php
        include './includes/footer.php';
        ?>
    </html>
<?php
} else {
    header('Location: login.php');
}

?>


