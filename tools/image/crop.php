<?php

session_start();

include_once('../../includes/connection.php');
include_once('../../includes/banner.php');


if(isset($_SESSION['logged_in'])){

    include '../../header.php'

    ?>
        <body>

        <?php
            include '../../includes/navigation.php';
        ?>

            <div class="container content">
                <header>
                    
                </header>
                <section class="wrapper">
                    <div class="container image-container">
                        <div class="image">
                            <canvas id="canvas"></canvas>
                            <div class="image-content">
                                <p>Drop image or select image to upload:<p>
                                <input type="file" id="fileUpload">
                                
                            </div>
                        </div>
                    </div>
                    <div class="container edit-container">
                        <h3>Edit your image</h3>
                        <hr>
                        <p class="image-size">Image size: <span></span></p>
                    </div>
                </section>
            </div>
            
            <?php
                include '../../includes/footer.php';
            ?>
        </body>
    </html>

<?php } else {
    header('Location: ../../login.php');
} ?>

