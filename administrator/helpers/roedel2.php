<?php

/**
 * @version     0.0.2
 * @package     com_roedel
 * @copyright   Copyright (C) 2014. Alle rechten voorbehouden.
 * @license     GNU General Public License versie 2 of hoger; Zie LICENSE.txt
 * @author      Bart Roos <b.roos@casema.nl> - http://studiokaa.co
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Roedel helper.
 */
class Roedel2Helper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        	JHtmlSidebar::addEntry(
			JText::_('COM_ROEDEL_TITLE_GROEPEN'),
			'index.php?option=com_roedel2&view=groepen',
			$vName == 'groepen'
		);

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_roedel2';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }
}
