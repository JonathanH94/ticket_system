<?php 
require '../logic/session_config.php';
require('config.php');

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $reg_email = $_POST['email'];
    $reg_pass = $_POST['password'];
    $reg_confirm_pass = $_POST['confirm_password'];


    if(empty($reg_email) || !filter_var($reg_email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_msg'] = "A valid email address is required";
        header('Location: /register');
        exit();

    }elseif(empty($reg_pass)) {
        $_SESSION['error_msg'] = "Please enter a password";
        header('Location: /register');
        exit();


    }elseif(empty($reg_pass) || strlen($reg_pass) < 6) {
        $_SESSION['error_msg'] = "Password must be at least 6 characters";
        header('Location: /register');
        exit();


    }elseif($reg_pass != $reg_confirm_pass) {
        $_SESSION['error_msg'] = "Passwords do not match";
        header('Location: /register');
        exit();

    } else {

        $select_check = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $select_check->bindParam(":email", $reg_email);
        $select_check->execute();
        $count = $select_check->rowCount();

        if($count > 0) {

            $_SESSION['error_msg'] = "Email address is taken.";
            header('Location: /register');
            exit();

        } else {

            try {
                $password_hash = password_hash($reg_pass, PASSWORD_ARGON2I);
                $insert_reg = $conn->prepare("INSERT INTO users (email, password) VALUES(:email, :password)");

                $insert_reg->bindParam(":email", $reg_email);
                $insert_reg->bindParam(":password", $password_hash);
                $insert_reg->execute();

                // echo "Thank you for registering with the platform";
                header('Location: /login');


            } catch (PDOException $e) {
                die("Registered details failed to insert into DB: " . $e->getMessage());
                header('Location: /register');


            }

        }


    }

}