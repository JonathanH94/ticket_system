<?php
require('header.php');
require('session_message.php');


if (!isset($_SESSION['st_results'])) {
   
    header('Location: select_tickets.php');
    exit();
}

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
        <div class="ticket_select">
            <form action="select_tickets.php" method="post" id="ticket_form">
                <select name="ticket_type" id="ticket_type"  onchange="document.getElementById('ticket_form').submit();">
                    <option value=""></option>
                    <option value="open">Open Tickets</option>
                    <option value="resolved">Resolved Tickets</option>
                    <option value="closed">Closed Tickets</option>
                </select> 

            </form>
        </div>
        <br>
        <div class="ticket-list">
            <?php if(!empty($_SESSION['st_results'])) :?>  
                <?php foreach($_SESSION['st_results'] as $st_result) : ?>   
                    <a href="view_ticket_page.php?id=<?= $st_result['ticket_id']?>" class="ticket">
                        <span class="con">    
                            <span class="title"><?=htmlspecialchars($st_result['title'])?></span>
                            <span class="msg"><?=htmlspecialchars($st_result['msg'])?></span>
                        </span>    
                        <span class="ticket_created_home"><?=date( 'F dS Y, G:i',strtotime($st_result['created']))?></span>
                    </a>
                <?php endforeach; ?>
                <?php unset($_SESSION['st_results']); ?>
            <?php else: ?>
                
            <?php endif; ?>
        </div>
   </div>      
</div>

<?php
require('footer.php');

?>





