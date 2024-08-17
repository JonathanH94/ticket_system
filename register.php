<?php

require('login_header.php');
require('session_message.php');


?>


<div class="login-form-container">
    <h2>Register</h2>
    <?php if(!empty($error_msg)) {
        echo '<label for="error">'. $error_msg. '</label>';
    }
    ?>
    <form action="register_user.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password">
        <input type="submit" value="Register">
    </form>


</div>

