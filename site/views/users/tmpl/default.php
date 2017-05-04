<?php
// no direct access
defined('_JEXEC') or die;
?>

<h1>Wie is wie</h1>

<div class="group">
    <h2>Alle vrijwilligers</h2>
    <div class="members members4">
        <?php foreach ($this->users as $user): ?>

            <div class="member">

                <?php if(!empty($user['photoData'])): ?>
                    <img src="data:<?php echo $user['mimeType'];?>;base64,<?php echo $user['photoData']; ?>" />
                <?php else: ?>
                    <img src="<?php echo JUri::base(); ?>/images/stories/leidingfoto/geen.jpeg" />
                <?php endif; ?>

                <p><?php echo $user['fullName']; ?><br />
                <?php echo $user['function']; ?>&nbsp;</p>
                <p class="icons"><a href="mailto:<?php echo $user['primaryEmail']; ?>"><i class="icon-envelope"></i></a>&nbsp;<a target="_blank" href="index.php?option=com_roedel2&view=user&id=<?php echo $user['id']; ?>"><i class="icon-user"></i></a></p>
            </div>

        <?php endforeach; ?>

    </div>
</div>