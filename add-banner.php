<?php

session_start();

include_once('./includes/connection.php');

if(isset($_SESSION['logged_in'])) {
    if(isset($_POST['banner_title'], $_POST['banner_sizeY'], $_POST['banner_sizeX'])){
        $banner_title = $_POST['banner_title'];
        $banner_sizeY = $_POST['banner_sizeY'];
        $banner_sizeX = $_POST['banner_sizeX'];

        if(empty($banner_title) or empty($banner_sizeY) or empty($banner_sizeX)) {
            $error = 'All fields are required!';
        } else {
            $query = $pdo->prepare('INSERT INTO banners (banner_title, banner_sizeY, banner_sizeX) VALUES (?, ?, ?)');
            $query->bindValue(1, $banner_title);
            $query->bindValue(2, $banner_sizeY);
            $query->bindValue(3, $banner_sizeX);

            $query->execute();

            header('Location: index.php');
        }
    }
    ?>
    <?php
    
    include 'header.php'
    
    ?>
        <body>

            <?php
                include './includes/navigation.php';
            ?>

            <div class="container">
                <section class="wrapper">
                    <?php if(isset($error)) { ?>
                        <div class="error">
                            <p> <?php echo $error ?> </p>
                        </div>
                    <?php } ?>

                    <h4>Add A New Banner</h4>
                    <form action="add-banner.php" method="post" autocomplete="off">
                        <input type="text" name="banner_title" placeholder="Banner Title" /> <br>
                        <input type="text" name="banner_sizeX" placeholder="Banner Height" /> <br>
                        <input type="text" name="banner_sizeY" placeholder="Banner Width" /> <br>
                        <input type="submit" value="Add New Banner" />
                    </form>
                </section>
            </div>
        </body>
    </html>
<?php 

} else {
    header('Location: login.php');
} 

?>


