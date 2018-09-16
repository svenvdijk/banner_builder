<?php

session_start();

include_once('./includes/connection.php');

if(isset($_SESSION['logged_in'])) {

    header('Location: index.php');

} else {

    if(isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if(empty($username) or empty($password)) {
            $error = 'All fields are required!';
        } else {

            $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");
            $query->bindValue(1, $username);
            $query->bindValue(2, $password);

            $query->execute();
            
            $num = $query->rowCount();
            
            if($num == 1) {
                //User entered correct details
                $_SESSION['logged_in'] = true;

                header('Location: index.php');

            } else {

                $error = 'Incorrect details!';
                
            }
        }
    }

    include 'header.php';

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

                    <h4>Login</h4>
                    <form action="login.php" method="post" autocomplete="off">
                        <input type="text" name="username" placeholder="Username" /> <Br>
                        <input type="password" name="password" placeholder="Password" /> <br>
                        <input type="submit" value='Login' />
                    </form>
                    <a href="forgot.php">
                        <p>I forgot my username or password</p>
                    </a>
                    <a href="signup.php">
                        <p>Create account</p>
                    </a>
                </div>
            </section>
        </div>
    </body>
    </html>

    <?php
}

?>
