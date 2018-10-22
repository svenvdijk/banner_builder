<?php

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

?>