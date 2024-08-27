<?php

require('../views/partials/login_header.php');
// require('session_message.php');

?>


<div class="login-form-container">
    <h2>Login</h2>
    <?php if(!empty($error_msg)) {
        echo '<label for="error">'. $error_msg . '</label>';

    } ?>
    <form action="/auth_login" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Login">
    </form>







</div>

