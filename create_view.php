<?php

require('header.php');
require('session_message.php');

?>

<div class="main-content">
    <div class="create-form">

        <h2 class="create-h2">Create Ticket</h2>
        <hr/>
        <?php 
        if(!empty($error_msg)) {

            echo '<label for="error">'. $error_msg. '</label>';

        }
        ?>
        <form action="create.php" method="post">
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Title" id="title" >
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="john.doe@email.com" id="email">
            <label for="msg">Message</label>
            <textarea name="msg" placeholder="Enter your message here..." id="msg"></textarea></br>
            <input type="submit" value="Create">
        </form>


    </div>
</div>

<?php
require('footer.php');

?>