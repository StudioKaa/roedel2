<?php
/**
 * @version     0.0.2
 * @package     com_roedel
 * @copyright   Copyright (C) 2014. Alle rechten voorbehouden.
 * @license     GNU General Public License versie 2 of hoger; Zie LICENSE.txt
 * @author      Bart Roos <b.roos@casema.nl> - http://studiokaa.co
 */

ini_set('display_errors', 1);

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Roedel.
 */
class Roedel2ViewGroepen extends JViewLegacy
{
	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
        $doc = JFactory::getDocument();
        $doc->addStyleSheet(JUri::base() . 'components/com_roedel2/assets/css/roedel.css');

        $db = JFactory::getDbo();
        $sql = "SELECT g.id, g.email, g.name FROM google_groups AS g LEFT JOIN google_groups_order AS o ON g.name = o.name ORDER BY o.order IS NULL, o.order ASC";
        $db->setQuery($sql);
        $groups = $db->loadAssocList();

        foreach ($groups as $key => $group) {
            $group_id = $group['id'];
            $sql = "SELECT u.id, u.fullName, u.primaryEmail, p.mimeType, p.photoData, f.function FROM google_users AS u LEFT JOIN google_users_photos AS p ON u.id = p.id LEFT JOIN google_functions AS f ON u.primaryEmail = f.primaryEmail WHERE u.id IN (SELECT member_id FROM google_members WHERE group_id = '$group_id')";
            $db->setQuery($sql);
            $members = $db->loadAssocList();
            $groups[$key]['members'] = $members;

            if(count($members) < 1){
                unset($groups[$key]);
            }
        }

        $this->groups = $groups;

        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {;
            throw new Exception(implode("\n", $errors));
        }
        
        parent::display($tpl);
	}
    	
}
