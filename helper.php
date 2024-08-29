<?php

/**
 * 
 * 
 * Router function. $error_msg needs to be declared as 'global' within the function,
 * otherwise, error msgs will not appear to the Client.
 *
 * @param string $request
 * @return never
 */


function route(string $request): never
{
    global $error_msg; //must be declared, otherwise $_SESSION['error_msg'] won't work

    static $routes = [
        '/'                   => '../views/my_tickets.php',
        '/login'              => '../views/login.php',
        '/register'           => '../views/register.php',
        '/register_user'      => '../logic/register_user.php',
        '/ticket_page'        => '../views/ticket_page.php',
        '/auth_login'         => '../logic/auth_login.php',
        '/my_tickets'         => '../views/my_tickets.php',
        '/select_tickets'     => '../logic/select_tickets.php',
        '/get_ticket_details' => '../logic/get_ticket_details.php',
        '/create_ticket'      => '../views/create_ticket.php',
        '/insert_ticket'      => '../logic/insert_ticket.php',
        '/insert_comment'     => '../logic/insert_comment.php',
        '/logout'             => '../logic/logout.php',
    ];

    if (array_key_exists($request, $routes)) {
        require $routes[$request];
        exit;
    } else {
        http_response_code(404);
        require '../views/404.php';
        echo "Page not found!";
        exit;
    }
}    



/**
 * 
 * Both of these functions are working, however, the above is cleaner
 * 
 */

/*

function router($request) {     

    global $error_msg;

    $view_routes = ['/login', '/register', '/my_tickets', '/create_ticket', '/ticket_page'];

    $logic_routes = ['/auth_login', '/get_ticket_details', '/insert_comment', '/insert_ticket', '/logout', 
    '/register_user', '/select_tickets', '/session_message'] ;

    if (in_array($request, $view_routes)) {
        require '..'.'/'.'views'.$request.'.php';
        // require '..'.'/'.'views'.$request.'.php';
        // exit;
        

    } elseif(in_array($request, $logic_routes)) {

        require '..'.'/'.'logic'.$request.'.php';
        // exit;


    } else {

        http_response_code(404);
        require '../views/404.php';
        echo 'page not found!';


    }

}


function routing($request) {

    global $error_msg;
    $view_routes = ['/login', '/register', '/my_tickets', '/create_ticket', '/ticket_page'];

    $logic_routes = ['/auth_login', '/get_ticket_details', '/insert_comment', '/insert_ticket', '/logout', 
    '/register_user', '/select_tickets', '/session_message'] ;


    if (in_array($request, $view_routes)) {

        switch($request) {
            case $request:
            require '..'.'/'.'views'.$request.'.php';
            break;


        }
    }elseif(in_array($request, $logic_routes)) {

        switch($request) {
            case $request:
            require '..'.'/'.'logic'.$request.'.php';
            break;    


        }

    }

}

*/






