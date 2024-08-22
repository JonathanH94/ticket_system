<?php
require('header.php');
require('session_message.php');
require('select_tickets.php');

?>

<div class="main-content">

    <h2 class="index">My Tickets</h2>

    <hr/>

    <p class="p">Welcome <?= htmlspecialchars($_SESSION['login']) ?>, to the ticketing system. Here you can view the list of tickets below.</p>

    <div>
        <a href="create_ticket.php" class="create_btn">Create a ticket</a>

    </div><br><br>

    <hr/>
   <div> 
        <?php if(!empty($error_msg)) :?>
        
            <label for="error"><?= htmlspecialchars($error_msg) ?></label>

        <?php endif;?>
        <table class="table">
            <tr>
                <th>Ticket ID</th>       
                <th>Title</th>  
                <th>Message</th>    
                <th>Created Datetime</th>
                <th>status</th>

            </tr>
    
            <?php foreach($st_results as $st_result) : ?>
        
            <tr>
                <td> <a href="view_ticket_page.php?id=<?= $st_result['ticket_id']?>"><?= htmlspecialchars($st_result['ticket_id'])?></a></td>
                <td><?= htmlspecialchars($st_result['title']) ?></td>     
                <td><?= htmlspecialchars($st_result['msg']) ?></td> 
                <td><?= htmlspecialchars($st_result['created']) ?></td> 
                <td><?= htmlspecialchars($st_result['status']) ?></td> 
            </tr>   
            <?php endforeach; ?>
        </table>
   </div>      
</div>

<?php
require('footer.php');

?>