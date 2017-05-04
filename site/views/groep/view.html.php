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

jimport('joomla.application.component.view');

/**
 * View to edit
 */
class Roedel2ViewGroep extends JViewLegacy {

    /**
     * Display the view
     */
    public function display($tpl = null)
    {
        $document = JFactory::getDocument();
        $document->addStyleSheet(JUri::base() . 'components/com_roedel2/assets/css/roedel.css');

        $this->user = JFactory::getUser();
        $app = JFactory::getApplication();
        $params = $app->getParams();

        $group_id = $app->input->get('id', 'nope');
        if($group_id == 'nope'){
            $group_id = $params->get('id');
        }


        $db = JFactory::getDbo();
        $sql = "SELECT g.id, g.email, g.name, p.photo FROM `google_groups` AS g LEFT JOIN google_groups_photos AS p ON g.email = p.email WHERE g.id = '$group_id' OR g.email = '$group_id'";
        $db->setQuery($sql);
        $group = $db->loadAssoc();

        $group_id = $group['id'];

        $sql = "SELECT u.id, u.fullName, u.primaryEmail, p.mimeType, p.photoData, f.function FROM google_users AS u LEFT JOIN google_users_photos AS p ON u.id = p.id LEFT JOIN google_functions AS f ON u.primaryEmail = f.primaryEmail WHERE u.id IN (SELECT member_id FROM google_members WHERE group_id = '$group_id')";
        $db->setQuery($sql);
        $group['members'] = $db->loadAssocList();

        foreach ($group['members'] as $member) {
            $group['firstNames'][] = explode(" ", $member['fullName'])[0];
        }

        $this->group = $group;
        $this->header = $params->get('show_header', 1);
        $this->show_teamfoto = $params->get('show_teamfoto', 1);
        $this->show_groupmail = $params->get('show_groupmail', 1);
        $this->page_width = $params->get('page_width', 4);

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        parent::display($tpl);
    }

}
