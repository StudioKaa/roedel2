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

jimport('joomla.application.component.controllerform');

/**
 * Groep controller class.
 */
class Roedel2ControllerGroep extends JControllerForm
{

    function __construct() {
        $this->view_list = 'groepen';
        parent::__construct();
    }

}