<?php

// require('config.php');
require('../logic/config.php');
require('../logic/session_message.php');

$ticket_type = 'open';


if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ticket_type'])) {
    $ticket_type = $_POST['ticket_type'];
   
}

$select_tickets = $conn->prepare("SELECT ticket_id, title, msg, created, status FROM tickets WHERE user_id = :user_id AND status = :status");
$select_tickets->bindParam(':user_id', $_SESSION['user_id']);
$select_tickets->bindParam(':status', $ticket_type);
$select_tickets->execute();

$st_results = $select_tickets->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['st_results'] = $st_results;
 
header('Location: /my_tickets');
exit();



?>