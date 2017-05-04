<?php
// no direct access
defined('_JEXEC') or die;
?>

<?php if($this->header != 0): ?>
    <h<?php echo $this->header; ?>><?php echo $this->group['name']; ?></h<?php echo $this->header; ?>>
<?php endif; ?>

<?php if($this->show_teamfoto == 1 && !empty($this->group['photo'])): ?>
    <div class="groupphoto">
        <img src="<?php echo $this->group['photo']; ?>" alt="teamfoto" />
    </div>
<?php endif; ?>

<?php if($this->user->guest): ?>
    <h3>Het team:</h3>
    <ul>
        <?php foreach ($this->group['firstNames'] as $name): ?>
            <li><?php echo $name; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <div class="group">
        <?php if($this->show_groupmail == 1): ?>
            <h3>Mail het hele team:</h3>
            <p><a href="mailto:<?php echo $this->group['email']; ?>"><?php echo $this->group['email']; ?></a></p>
        <?php endif; ?>


        <h3>Het team:</h3>
        <div class="members members<?php echo $this->page_width; ?>">
            <?php foreach ($this->group['members'] as $member): ?>

                <div class="member">

                    <?php if(!empty($member['photoData'])): ?>
                        <img src="data:<?php echo $member['mimeType'];?>;base64,<?php echo $member['photoData']; ?>" />
                    <?php else: ?>
                        <img src="<?php echo JUri::base(); ?>/images/stories/leidingfoto/geen.jpeg" />
                    <?php endif; ?>

                    <p><?php echo $member['fullName']; ?><br />&nbsp;
                        <?php echo $member['function']; ?></p>
                    <p class="icons"><a href="mailto:<?php echo $member['primaryEmail']; ?>"><i class="icon-envelope"></i></a>&nbsp;<a target="_blank" href="index.php?option=com_roedel2&view=user&id=<?php echo $member['id']; ?>"><i class="icon-user"></i></a></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
