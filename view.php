<?php
require('header.php');
require('config.php');
require('session_message.php');



if(empty($_GET['id'])) {

    $_SESSION['error_msg'] = "No ID found";
    header('Location: index.php');
    exit();

} else {

    $ticket_id = intval($_GET['id']);

    $view_ticket = $conn->prepare("SELECT ticket_id, title, msg, created, status FROM tickets WHERE ticket_id = :ticket_id ");
    $view_ticket->bindParam(":ticket_id", $ticket_id, PDO::PARAM_INT );
    $view_ticket->execute();

    $vt_result = $view_ticket->fetch(PDO::FETCH_ASSOC);

}

?>


