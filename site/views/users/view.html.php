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
class Roedel2ViewUsers extends JViewLegacy
{
	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
        $doc = JFactory::getDocument();
        $doc->addStyleSheet(JUri::base() . 'components/com_roedel2/assets/css/roedel.css');

        $db = JFactory::getDbo();
        $sql = "SELECT u.id, u.fullName, u.primaryEmail, p.mimeType, p.photoData, f.function FROM google_users AS u LEFT JOIN google_users_photos AS p ON u.id = p.id LEFT JOIN google_functions AS f ON u.primaryEmail = f.primaryEmail ORDER BY u.fullName";
        $db->setQuery($sql);
        $this->users = $db->loadAssocList();

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {;
            throw new Exception(implode("\n", $errors));
        }
        
        parent::display($tpl);
	}
    	
}
