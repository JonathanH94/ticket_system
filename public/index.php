<?php 
require '../logic/session_message.php';


$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//I will turn this into a turn function at some stage
switch($request) {

    case '/':
    require '../views/my_tickets.php';
    break;

    case '/login':
    require '../views/login.php';
    break;

    case '/register':
    require '../views/register.php';
    break;

    case '/register_user':
    require '../logic/register_user.php';
    break;


    case '/ticket_page':
    require '../views/ticket_page.php';
    break;
    
    case '/auth_login':
    require '../logic/auth_login.php';
    break;

    case '/my_tickets':
    require '../views/my_tickets.php';
    break;

    case '/select_tickets':
    require '../logic/select_tickets.php';
    break;

    case '/get_ticket_details':
    require '../logic/get_ticket_details.php';
    break;

    case '/create_ticket':
    require '../views/create_ticket.php';
    break;

    case '/insert_ticket':
    require '../logic/insert_ticket.php';
    break;

    case '/insert_comment':
    require '../logic/insert_comment.php';
    break;

    case '/logout':
    require '../logic/logout.php';
    break;

    //I need to setup a proper 404 view
    default:
    http_response_code(404);
    require '../views/404.php';
    echo "Page not found!";
    break;



}


