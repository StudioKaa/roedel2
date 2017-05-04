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
class Roedel2ViewHomepage extends JViewLegacy
{
	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
        $doc = JFactory::getDocument();
        $doc->addStyleSheet(JUri::base() . 'components/com_roedel2/assets/css/roedel.css');

        $this->juser = JFactory::getUser();

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {;
            throw new Exception(implode("\n", $errors));
        }
        
        parent::display($tpl);
	}
    	
}
