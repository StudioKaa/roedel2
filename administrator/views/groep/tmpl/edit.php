<?php
/**
 * @version     0.0.2
 * @package     com_roedel
 * @copyright   Copyright (C) 2014. Alle rechten voorbehouden.
 * @license     GNU General Public License versie 2 of hoger; Zie LICENSE.txt
 * @author      Bart Roos <b.roos@casema.nl> - http://studiokaa.co
 */
// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_roedel/assets/css/roedel.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function() {
        
    });

    Joomla.submitbutton = function(task)
    {
        if (task == 'groep.cancel') {
            Joomla.submitform(task, document.getElementById('groep-form'));
        }
        else {
            
            if (task != 'groep.cancel' && document.formvalidator.isValid(document.id('groep-form'))) {
                
                Joomla.submitform(task, document.getElementById('groep-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_roedel&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="groep-form" class="form-validate">

    <div class="form-horizontal">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_ROEDEL_TITLE_GROEP', true)); ?>
        <div class="row-fluid">
            <div class="span10 form-horizontal">
                <fieldset class="adminform">

                    				<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('group_id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('group_id'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('email'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('email'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('foto'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('foto'); ?></div>
			</div>
                        <div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('teamfoto'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('teamfoto'); ?></div>
			</div>
				<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('desc'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('desc'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('teamleider'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('teamleider'); ?></div>
			</div>
                        <div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('teamleider_label'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('teamleider_label'); ?></div>
			</div>
                        <div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('order'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('order'); ?></div>
			</div>


                </fieldset>
            </div>
        </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>
        
        

        <?php echo JHtml::_('bootstrap.endTabSet'); ?>

        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>

    </div>
</form>