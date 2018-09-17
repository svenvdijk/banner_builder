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
                <div class="signup-page">

                    <header class="header_main">
                        <a class="header_logo" href="#">logo</a>
                        <h2>Sign up for free</h2>
                        <div class="header_login">
                            <span>Already have an account? </span>
                            <a class="btn btn_login" href="login.php">Log in</a>
                        </div>
                    </header>
                        
                    <div class="signup-content login_wrapper">
                        <div class="benefits page-body">
                            <div>
                                <h3>Your own account</h3>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            </div>
                            <hr>
                            <div>
                                <h3>Cut images to the correct size</h3>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            </div>
                            <hr>
                            <div>
                                <h3>Your history</h3>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            </div>
                            <hr>
                        </div>
                        <?php if(isset($error)) { ?>
                            <div class="error">
                                <p> <?php echo $error ?> </p>
                            </div>
                        <?php } ?>

                        <div class="signup-form side-left">
                            <form action="signup.php" method="post" autocomplete="off">
                                <label>First name<sub class="required" title="required" >*</sub></label>
                                <input type="text" name="first_name" placeholder="First name" /> <Br>
                                <label>Last name<sub class="required" title="required" >*</sub></label>
                                <input type="text" name="last_name" placeholder="Last name" /> <Br>
                                <label>Username<sub class="required" title="required" >*</sub></label>
                                <input type="text" name="username" placeholder="Username" /> <Br>
                                <label>Email address<sub class="required" title="required" >*</sub></label>
                                <input type="text" name="email" placeholder="Email address"> <br>
                                <label>Password<sub class="required" title="required" >*</sub></label>
                                <input type="password" name="password" placeholder="Password" /> <br>
                                <input type="submit" value='Create account' />
                            </form>
                        </div>


                    </div>
                </div>
            </section>
            
        </div>
    </body>
    </html> 
    <?php
}
 ?>