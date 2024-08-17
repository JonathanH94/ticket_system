<?php
require('header.php');
require('session_message.php');

?>

<div class="main-content">

    <h2 class="index">My Tickets</h2>

    <hr/>

    <p class="p">Welcome <?= $_SESSION['login'] ?>, to the ticketing system. Here you can view the list of tickets below.</p>

    <div>
        <a href="create_view.php" class="create_btn">Create a ticket</a>

    </div>


</div>

<?php
require('footer.php');

?>