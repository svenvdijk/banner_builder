<?php

session_start();

include_once('./includes/connection.php');

include 'header.php';

if(isset($_SESSION['logged_in'])) {

    header('Location: index.php');

} else {

    if(isset($_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['email'], $_POST['password'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = ($_POST['password']);
        $secret = password_hash($password, PASSWORD_BCRYPT);

        if(empty($first_name)) {
            $error = 'First name is required!';
        } elseif(empty($last_name)) {
            $error = 'Last name is required!';
        } elseif(empty($username)) {
            $error = 'Username name is required!';
        } elseif(empty($email)) {
            $error = 'Email address is required!';
        } elseif(empty($password)) {
            $error = 'Password is required!';
        } else {
            $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? OR user_email = ?");
            $query->bindValue(1, $username);
            $query->bindValue(2, $email);

            $query->execute();

            $num = $query->rowCount();

            if($num > 0) {
                $error = 'User already exist';
            } else {
                $query = $pdo->prepare("INSERT INTO users (user_firstname, user_lastname, user_name, user_email, user_password) VALUES (?, ?, ?, ?, ?)");
                $query->bindValue(1, $first_name);
                $query->bindValue(2, $last_name);
                $query->bindValue(3, $username);
                $query->bindValue(4, $email);
                $query->bindValue(5, $secret);

                $query->execute();

                $confirm = 'Account has been created!';
            }


        }
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

                        <div class="signup-form side-left">

                            <?php if(isset($error)) { ?>
                                <div class="error">
                                    <p> <?php echo $error ?> </p>
                                </div>
                            <?php } ?>

                            <?php if(isset($confirm)) { ?>
                                <div class="confirm">
                                    <p> <?php echo $confirm ?> </p>
                                </div>
                            <?php } ?>

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