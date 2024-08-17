<?php

session_start();
$error_msg = "";

if(!empty($_SESSION['error_msg'])) {
    $error_msg = $_SESSION['error_msg'];
    unset($_SESSION['error_msg']);

}
