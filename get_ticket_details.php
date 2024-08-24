<?php
// require('header.php');
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

if (isset($_GET['status']) && in_array($_GET['status'], ['open', 'closed', 'resolved'])) {
    $update_status = $conn->prepare('UPDATE tickets SET status = :status WHERE ticket_id = :ticket_id');
    $update_status->bindParam(":status", $_GET['status']);
    $update_status->bindParam(":ticket_id", $ticket_id, PDO::PARAM_INT);
    $update_status->execute();
    header('Location: view_ticket_page.php?id=' . $ticket_id);
    exit;
}


$select_ticket_comment = $conn->prepare("SELECT * FROM ticket_comments WHERE ticket_id = :ticket_id ORDER BY created DESC");
$select_ticket_comment->bindParam(':ticket_id', $ticket_id, PDO::PARAM_INT);
$select_ticket_comment->execute();
$comments = $select_ticket_comment->fetchAll(PDO::FETCH_ASSOC);


?>


