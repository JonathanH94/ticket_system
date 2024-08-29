<?php
// require '../logic/session_config.php';
require('../logic/config.php');




if(isset($_GET['id']) && !empty($_GET['id'])) {

   


    
    $ticket_id = intval($_GET['id']);

    $view_ticket = $conn->prepare("SELECT ticket_id, title, msg, created, status FROM tickets WHERE ticket_id = :ticket_id ");
    $view_ticket->bindParam(":ticket_id", $ticket_id, PDO::PARAM_INT );
    $view_ticket->execute();
    $vt_result = $view_ticket->fetch(PDO::FETCH_ASSOC);

    

} else {
    $_SESSION['error_msg'] = "No ID found";
    header('Location: /my_tickets');
    exit();


}

if (isset($_GET['status']) && in_array($_GET['status'], ['open', 'closed', 'resolved'])) {
    $update_status = $conn->prepare('UPDATE tickets SET status = :status WHERE ticket_id = :ticket_id');
    $update_status->bindParam(":status", $_GET['status']);
    $update_status->bindParam(":ticket_id", $ticket_id, PDO::PARAM_INT);
    $update_status->execute();
    header('Location: /ticket_page?id=' . $ticket_id);
    exit;
}


$select_ticket_comment = $conn->prepare("SELECT * FROM ticket_comments WHERE ticket_id = :ticket_id ORDER BY created DESC");
$select_ticket_comment->bindParam(':ticket_id', $ticket_id, PDO::PARAM_INT);
$select_ticket_comment->execute();
$comments = $select_ticket_comment->fetchAll(PDO::FETCH_ASSOC);


?>


