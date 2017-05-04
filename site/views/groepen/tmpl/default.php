<?php
// no direct access
defined('_JEXEC') or die;
?>

<h1>Wie is wie</h1>

<div class="allteams">
    <h2>Alle teams:</h2>
    <ul>
    <?php foreach ($this->groups as $group): ?>
        <li><a href="#<?php echo $group['email'] ?>"><?php echo $group['name'] ?></a></li>
    <?php endforeach; ?>
    </ul>
</div>

<?php foreach ($this->groups as $group): ?>

    <div class="group">
        <a name="<?php echo $group['email']; ?>"></a>
        <h2><?php echo $group['name']; ?></h2>
        <div class="members members4">
            <?php foreach ($group['members'] as $member): ?>

                <div class="member">

                    <?php if(!empty($member['photoData'])): ?>
                        <img src="data:<?php echo $member['mimeType'];?>;base64,<?php echo $member['photoData']; ?>" />
                    <?php else: ?>
                        <img src="<?php echo JUri::base(); ?>/images/stories/leidingfoto/geen.jpeg" />
                    <?php endif; ?>

                    <p><?php echo $member['fullName']; ?><br />
                    <?php echo $member['function']; ?>&nbsp;</p>
                    <p class="icons"><a href="mailto:<?php echo $member['primaryEmail']; ?>"><i class="icon-envelope"></i></a>&nbsp;<a target="_blank" href="index.php?option=com_roedel2&view=user&id=<?php echo $member['id']; ?>"><i class="icon-user"></i></a></p>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

<?php endforeach; ?>