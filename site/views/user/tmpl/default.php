<?php
// no direct access
defined('_JEXEC') or die;
ini_set('display_errors', 1);
?>

<?php if(!empty($this->photo['photoData'])): ?>
    <img class="roedel_profile_left" src="data:<?php echo $this->photo['mimeType'];?>;base64,<?php echo $this->photo['photoData']; ?>" />
<?php else: ?>
    <img class="roedel_profile_left" src="<?php echo JUri::base(); ?>/images/stories/leidingfoto/geen.jpeg" />
<?php endif; ?>

<h1><?php echo $this->guser->name['fullName']; ?></h1>
<?php if(!empty($this->functie)): ?>
    <p><?php echo $this->functie; ?></p>
<?php endif; ?>

<h3>Teams:</h3>
<ul class="grouplist">
    <?php foreach ($this->groups as $group): ?>
        <li><?php echo $group['name'];?>&nbsp;<a target="_blank" href="index.php?option=com_roedel2&view=groep&id=<?php echo $group['id']; ?>"><i class="icon-share"></i></a></li>
    <?php endforeach; ?>
</ul>

<h3>E-mailadressen:</h3>
<ul>
    <li><strong><?php echo $this->guser->primaryEmail; ?></strong></li>
    <?php foreach ($this->guser['aliases'] as $alias): ?>
        <li><?php echo $alias;?></li>
    <?php endforeach; ?>
</ul>

<?php if(!empty($this->guser['phones'])): ?>
<h3>Telefoonnummer:</h3>
<ul>
    <?php foreach ($this->guser['phones'] as $phone): ?>
        <li><?php echo $phone['value'];?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>