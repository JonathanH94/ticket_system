<?php
// require '../logic/session_config.php';
require('../views/partials/login_header.php');



?>


<div class="login-form-container">
    <h2>Register</h2>
    <?php if(!empty($error_msg)) {
        echo '<label for="error">'. $error_msg. '</label>';
    }
    ?>
    <form action="/register_user" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password">
        <input type="submit" value="Register">
    </form>


</div>

