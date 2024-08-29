<?php
// require '../logic/session_config.php';
require('../views/partials/header.php');
require('../logic/config.php');
require '../logic/get_ticket_details.php'



?>

<div class="main-content">

    <?php  if (!empty($vt_result)) : ?>

        <div class="view_ticket">

            <h2><?=htmlspecialchars($vt_result['title'])?> <span class="<?= htmlspecialchars($vt_result['status']) ?>">(<?= htmlspecialchars($vt_result['status'])?>)</span></h2>
        </div>
        <hr>
        
        <div class="ticket_details">
            <div>
                <i class="fa-solid fa-ticket fa-3x"></i>
            </div>
            <p class="ticket_created"><?=date( 'F dS Y, G:i',strtotime($vt_result['created']))?></p>
            <p><?=htmlspecialchars($vt_result['msg'])?></p>
        </div>
        <div>
            <a class="close-btn" href="/get_ticket_details?id=<?= $_GET['id']?>&status=closed" onclick="return confirm('Are you sure you want to close this ticket?')" >Close</a>
            <a class="resolve-btn" href="/get_ticket_details?id=<?= $_GET['id']?>&status=resolved" onclick="return confirm('Are you sure you want to resolve this ticket?')">Resolve</a>
        </div>


        <hr>
    <?php endif; ?>
    <div class="new-comment"> 
        <?php if(!empty($error_msg)) :?>
        
            <label for="error"><?= htmlspecialchars($error_msg) ?></label>

        <?php endif;?>
        
    </div>     

    <div class="comment_ticket_details">
        <div>
            <i class="fa-regular fa-comment fa-3x"></i>
        </div>

        <?php foreach($comments as $comment) :?>

            <p class="ticket_created"><?=date( 'F dS Y, G:i',strtotime($comment['created']))?></p>
            <p><?=htmlspecialchars($comment['msg'])?></p>


        <?php endforeach; ?>

    </div>

    <div class="post-comment">
        <form action="/insert_comment" method="post">
            <input type="hidden" name="ticket_id" value="<?= htmlspecialchars($ticket_id) ?>">
            <textarea name="msg" placeholder="Please enter your comment here..." id="msg"></textarea><br>
            <input type="submit" value="Post Comment">
        </form>
        <br>
    </div>

</div>



<?php
require('../views/partials/footer.php');

?>