<?php

require('config.php');
require('session_message.php');

if($_SERVER['REQUEST_METHOD'] =="POST") {

    $ticket_id = $_POST['ticket_id'];
    $new_comment_msg = $_POST['msg']; 

    if(empty($new_comment_msg)) {

        $_SESSION['error_msg'] = "Cannot submit a blank comment";
        header('Location: view_ticket_page.php?id=' .$ticket_id);
        exit();

    } else   {

        try {
            $insert_comment = $conn->prepare("INSERT INTO ticket_comments (ticket_id, msg) VALUES (:ticket_id, :msg)");
            $insert_comment->bindParam(":ticket_id", $ticket_id);
            $insert_comment->bindParam(":msg", $new_comment_msg);
            $insert_comment->execute();

            header('Location: view_ticket_page.php?id=' .$ticket_id);
            exit();

        } catch (PDOException $e) {

            die("Comment failed to insert: " . $e->getMessage());
            header('Location: view_ticket_page.php');
        }

    }








}