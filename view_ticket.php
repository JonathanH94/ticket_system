<?php

require('config.php');
require('view.php');
// require('session_message.php');


?>

<div class="main-content">

    <?php  if (!empty($vt_result)) : ?>

        <div class="view_ticket">

            <h2><?=htmlspecialchars($vt_result['title'])?> <span class="<?= htmlspecialchars($vt_result['status']) ?>">(<?= htmlspecialchars($vt_result['status'])?>)</span></h2>
        </div>
        <hr>
        
        <div class="ticket_details">
            <p><?=date( 'F dS, G:i',strtotime($vt_result['created']))?></p>
            <p><?=htmlspecialchars($vt_result['msg'])?></p>
        </div>
        <hr>
    <?php endif; ?>
    <div> 
        <?php if(!empty($error_msg)) :?>
        
            <label for="error"><?= htmlspecialchars($error_msg) ?></label>

        <?php endif;?>
        
    </div>     

    <div class="post-comment">
        <form action="" method="post">
            <textarea name="msg" placeholder="Please enter your comment here..." id="msg"></textarea><br>
            <input type="submit" value="Post Comment">
        </form>

    </div>

</div>



<?php
require('footer.php');

?>