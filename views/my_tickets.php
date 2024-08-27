<?php
require('../views/partials/header.php');
// require('../logic/session_message.php');


if (!isset($_SESSION['st_results'])) {
   
    
    header('Location: /select_tickets');
    exit();
}

?>

<div class="main-content">

    <h2 class="index">My Tickets</h2>

    <hr/>

    <p class="p">Welcome <?= htmlspecialchars($_SESSION['login']) ?>, to the ticketing system. Here you can view the list of tickets below.</p>

    <div>
        <a href="/create_ticket" class="create_btn">Create a ticket</a>

    </div><br><br>

    <hr/>
   <div> 
        <?php if(!empty($error_msg)) :?>
        
            <label for="error"><?= htmlspecialchars($error_msg) ?></label>

        <?php endif;?>
        <div class="ticket_container">
            <div class="ticket_select">
                <form action="/select_tickets" method="post" id="ticket_form">
                    <select name="ticket_type" id="ticket_type" onchange="document.getElementById('ticket_form').submit();">
                        <option value=""></option>
                        <option value="open">Open Tickets</option>
                        <option value="resolved">Resolved Tickets</option>
                        <option value="closed">Closed Tickets</option>
                    </select> 
                    
             </form>
            </div>
            <!-- <div class="ticket_search">
                <form action="select_tickets.php" method="post">
                    <input type="hidden" name="ticket_type" value="<?= htmlspecialchars($ticket_type) ?>">
                    <input type="search" placeholder="Search..." name="search_title">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></i></button>
                </form>
               
            </div> -->
        </div>
        <br>
        <div class="ticket-list">
            <?php if(!empty($_SESSION['st_results'])) :?>  
                <?php foreach($_SESSION['st_results'] as $st_result) : ?>   
                    <a href="/ticket_page?id=<?= htmlspecialchars($st_result['ticket_id'])?>" class="ticket">
                        <span class="con icon-container">
                            <?php if ( $st_result['status'] == 'open') :?>
                            <i class="fa-regular fa-clock"></i>
                            <?php elseif ( $st_result['status'] == 'resolved') :?>
                            <i class="fa-regular fa-circle-check"></i>
                            <?php elseif ( $st_result['status'] == 'closed') :?>
                            <i class="fa-regular fa-circle-xmark"></i>
                            <?php endif; ?>
                        </span>
                        <span class="con details-container">    
                            <span class="title"><?=htmlspecialchars($st_result['title'])?></span>
                            <span class="msg"><?=htmlspecialchars($st_result['msg'])?></span>
                        </span>    
                        <span class="ticket_created_home"><?=date( 'F dS Y, G:i',strtotime($st_result['created']))?></span>
                    </a>
                <?php endforeach; ?>
                <?php unset($_SESSION['st_results']); ?>
            <?php else: ?>
                <h3>No Tickets Found</h3>
            <?php endif; ?>
        </div>
   </div>      
</div>

<?php
require('../views/partials/footer.php');

?>





