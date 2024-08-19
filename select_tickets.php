<?php

require('config.php');


$select_tickets = $conn->prepare("SELECT ticket_id, title, msg, created, status FROM tickets WHERE user_id = :user_id ");
$select_tickets->bindParam(':user_id', $_SESSION['user_id']);
$select_tickets->execute();

$st_results = $select_tickets->fetchAll(PDO::FETCH_ASSOC);

?>