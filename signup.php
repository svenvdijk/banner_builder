<?php

session_start();

include_once('./includes/connection.php');

include 'header.php';

if(isset($_SESSION['logged_in'])) {

    header('Location: index.php');

} else {

    if(isset($_POST['username'], $_POST['email'], $_POST['password'])){

    }

    ?>
    <body>
        <div class="container">
            <section class="wrapper">
                <div class="wrapper login_wrapper">

                    <?php if(isset($error)) { ?>
                        <div class="error">
                            <p> <?php echo $error ?> </p>
                        </div>
                    <?php } ?>

                    <h4>Create an Account</h4>
                    <form action="signup.php" method="post" autocomplete="off">
                        <input type="text" name="username" placeholder="Username" /> <Br>
                        <input type="text" name="email" placeholder="Email address"> <br>
                        <input type="password" name="password" placeholder="Password" /> <br>
                        <input type="submit" value='Login' />
                    </form>
                    <a href="login.php">
                        <p>Already got an account?</p>
                    </a>
                </div>
            </section>
            
        </div>
    </body>
    </html> 
    <?php
}
 ?>