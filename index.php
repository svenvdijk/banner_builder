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

            <div class="container">
                <section class="wrapper">
                    <a href="bannertool.php">Bannertool</a>
                </section>
            </div>
        </body>
    </html>
<?php
} else {
    header('Location: login.php');
}

?>


