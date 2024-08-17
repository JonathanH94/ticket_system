<?php

require('config.php');
require('session_message.php');


if($_SERVER['REQUEST_METHOD'] == "POST") {

    $title = $_POST['title'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];


    if(empty($title)) {
        $_SESSION['error_msg'] = "<label> A title is required </label>";
        header('Location: create_view.php');
        exit();

    } elseif((empty($email)) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $_SESSION['error_msg'] = "<label> A valid email is required </label>";
        header('Location: create_view.php');
        exit();

    } elseif ((empty($msg)) || strlen($msg)> 250)  {

        $_SESSION['error_msg'] = "<label> Message cannot be empty and must be less than 250 characters </label>";
        header('Location: create_view.php');
        exit();

    } else {
        try{
            $insert = $conn->prepare("INSERT INTO tickets (title, msg, email) VALUES (:title, :msg, :email)");
            $insert->bindParam(':title', $title);
            $insert->bindParam(':msg', $msg);
            $insert->bindParam(':email', $email);
            $insert->execute();

            echo "Thank you for submitting a ticket.";

        } catch(PDOException $e) {
            die("Insert into database failed".$e->getMessage());
            header('Location: create_view.php');

        }

    }






}

