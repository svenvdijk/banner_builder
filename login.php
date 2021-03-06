<?php

session_start();

include_once('./includes/connection.php');

if(isset($_SESSION['logged_in'])) {

    header('Location: index.php');

} else {

    if(isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) or empty($password)) {
            $error = 'All fields are required!';
        } else {

            $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ?");
            $query->bindValue(1, $username);
            $query->execute();

            $num = $query->rowCount();
            
            while($row = $query->fetch(PDO::FETCH_ASSOC)){

                $secret = $row['user_password'];

                if(password_verify($password, $secret)){
                    //User entered correct details
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $row['user_email'];

                    header('Location: index.php');

                } else {
                    $error = 'Incorrect details!';
                }

            }

            if($num == 0) {

                $error = 'Incorrect details!';
                
            }
        }
    }

    include 'header.php';

    ?>
   
    <body>
        <div class="container">
            <section class="wrapper">
                <div class="login-page">

                    <header class="header_main">
                        <a class="header_logo" href="#">logo</a>
                        <div class="header_login">
                            <span>New to NewsGo?</span>
                            <a class="btn btn_login" href="signup.php">Sign Up</a>
                        </div>
                    </header>
                        
                    <div class="login-content login_wrapper">
                        <div class="page-body">
                            <?php if(isset($error)) { ?>
                                <div class="error">
                                    <p> <?php echo $error ?> </p>
                                </div>
                            <?php } ?>

                            <h3>Log in</h3>
                            <form action="login.php" method="post" autocomplete="off">
                                <label for="username">Username</label>
                                <input type="text" name="username" placeholder="Username" /> <Br>
                                <label for="password">Password</label>
                                <input type="password" name="password" placeholder="Password" /> <br>
                                <input type="submit" value='Login' />
                            </form>
                            <div class="login-footer">
                                <a href="#">Forgot password?</a>
                            </div>
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
