<?php

require('config.php');
require('session_message.php');


if($_SERVER['REQUEST_METHOD'] == "POST") {

    $title = $_POST['title'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];


    if(empty($title)) {
        $_SESSION['error_msg'] = "A title is required";
        header('Location: create_view.php');
        exit();

    } elseif((empty($email)) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $_SESSION['error_msg'] = "A valid email is required";
        header('Location: create_view.php');
        exit();
        //got rid of the 250 character limit as msg is stored as a 'text' datatype
    } elseif ((empty($msg))) {

        $_SESSION['error_msg'] = "Message cannot be empty";
        header('Location: create_view.php');
        exit();

    } else {
        try{
            $insert = $conn->prepare("INSERT INTO tickets (user_id, title, msg, email) VALUES (:user_id, :title, :msg, :email)");
            $insert->bindParam(':user_id', $_SESSION['user_id']);
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

