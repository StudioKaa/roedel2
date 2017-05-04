<?php
ini_set('display_errors', 1);

// No direct access
defined('_JEXEC') or die;

ini_set("display_errors", 1);

jimport('joomla.application.component.view');
require_once '/home/strato/http/premium/rid/08/63/54000863/htdocs/lab.scoutingrveer.nl/GOOGLE/HelperGetUser.php';

/**
 * View class for a list of Roedel.
 */
class Roedel2ViewUser extends JViewLegacy
{
	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
        $doc = JFactory::getDocument();
        $doc->addStyleSheet(JUri::base() . 'components/com_roedel2/assets/css/roedel.css');

        $jinput = JFactory::getApplication()->input;

        $this->guser = HelperGetUser($jinput->get('id'));
        $user_id = $this->guser['id'];
        $user_email = $this->guser['primaryEmail'];

        $db = JFactory::getDbo();
        $sql = "SELECT * FROM google_members AS m JOIN google_groups AS g ON m.group_id = g.id WHERE m.member_id = $user_id";
        $db->setQuery($sql);
        $this->groups = $db->loadAssocList();

        $sql = "SELECT * FROM google_users_photos WHERE id = $user_id";
        $db->setQuery($sql);
        $this->photo = $db->loadAssoc();

        $sql = "SELECT function FROM google_functions WHERE primaryEmail = '$user_email'";
        $db->setQuery($sql);
        $this->functie = $db->loadResult();

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {;
            throw new Exception(implode("\n", $errors));
        }

        parent::display($tpl);
    }
    	
}
