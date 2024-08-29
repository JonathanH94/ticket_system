<?php


if (session_status() === PHP_SESSION_NONE) {
    
    ini_set('session.use_only_cookies', 1);
    ini_set('session.use_strict_mode', 1);

    
    session_set_cookie_params([
        'lifetime' => 1800,
        'domain' => 'localhost',
        'path' => '/',
        'secure' => true,
        'httponly' => true
    ]);

    
    session_start();
} else {
    
    if (!ini_get('session.use_only_cookies')) {
        ini_set('session.use_only_cookies', 1);
    }
    if (!ini_get('session.use_strict_mode')) {
        ini_set('session.use_strict_mode', 1);
    }
}

$timeout_dur = 1800;

if(isset($_SESSION['last_active'])) {

    $elapsed_time = time() - $_SESSION['last_active'];

    if($elapsed_time >= $timeout_dur) {
        session_unset();
        session_destroy();
        header('Location: /login');
        exit;


    }

}


$_SESSION['last_active'] = time();


if(!isset($_SESSION['last_regen'])) {

    session_regenerate_id(true);
    $_SESSION['last_regen'] = time();

}else {

    $interval = 60 * 30;

    if (time() - $_SESSION['last_regen'] >= $interval) {

        session_regenerate_id(true);
        $_SESSION['last_regen'] = time();

    }


}


$error_msg = "";

if(isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg'])) {
    $error_msg = $_SESSION['error_msg'];
    unset($_SESSION['error_msg']);
}




?>


