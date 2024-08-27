<?php

require('config.php');
require('session_message.php');


if($_SERVER['REQUEST_METHOD'] == "POST") {

    $log_email = $_POST['email'];
    $log_pass = $_POST['password'];


    if(empty($log_email) || empty($log_pass)) {

        $_SESSION['error_msg'] = "Email and password is required";
        header('Location: /login');
        exit();

    } else {

        try {

            $login = $conn->prepare("SELECT user_id, email, password FROM users WHERE email = :email");
            $login->bindParam("email", $log_email);
            $login->execute();

            $user = $login->fetch(PDO::FETCH_ASSOC);
            if($user && password_verify($log_pass, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['login'] = $log_email;
                header('Location: /my_tickets');
                exit();


            } else {

                $_SESSION['error_msg'] = "Incorrect email or password.";
                header('Location: /login');
                exit();

            }


 
        }catch (PDOException $e) {
            die("Failed to login: " . $e->getMessage());
            header('Location: /login');
            exit();

        }





    }







}