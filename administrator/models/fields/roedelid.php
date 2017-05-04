<?php

defined('_JEXEC') or die;
ini_set('display_errors', 1);

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldRoedelid extends JFormFieldList
{
    protected $type = 'roedelid';

    protected function getOptions() 
    {
        
        $app = JFactory::getApplication();
        $params = JComponentHelper::getParams( 'com_roedel' );
        if($params->get('use_remote')){
            $option = array(); //prevent problems

            $option['driver']   = 'mysqli';            // Database driver name
            $option['host']     = $params->get('remote_server');    // Database host name
            $option['user']     = $params->get('remote_username');       // User for database authentication
            $option['password'] = $params->get('remote_passwd');  // Password for database authentication
            $option['database'] = $params->get('remote_db');    // Database name
            $option['prefix']   = $params->get('remote_prefix');          // Database prefix (may be empty)

            $db = JDatabase::getInstance( $option );
        }
        else{
            $db = JFactory::getDbo();
        }
        
        $query = "SELECT #__roedel_groups.id AS id, #__usergroups.title AS title FROM `#__roedel_groups` JOIN #__usergroups ON #__roedel_groups.group_id = #__usergroups.id WHERE state = 1";
        $db->setQuery($query);
        $sample = $db->loadObjectList();
        $options = array();
                
        if ($sample)
        {
            foreach($sample as $item) 
            {
                $options[] = JHtml::_('select.option', $item->id, $item->title);
            }
        }
        $options = array_merge(parent::getOptions(), $options);
        return $options;
    }
}

?>
