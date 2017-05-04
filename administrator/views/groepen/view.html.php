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
 * View class for a list of Roedel.
 */
class Roedel2ViewGroepen extends JViewLegacy {

    protected $items;
    protected $pagination;
    protected $state;

    /**
     * Display the view
     */
    public function display($tpl = null) {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        RoedelHelper::addSubmenu('groepen');

        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();
        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @since	1.6
     */
    protected function addToolbar() {
        require_once JPATH_COMPONENT . '/helpers/roedel2.php';

        $state = $this->get('State');
        $canDo = RoedelHelper::getActions($state->get('filter.category_id'));

        JToolBarHelper::title(JText::_('COM_ROEDEL_TITLE_GROEPEN'), 'groepen.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR . '/views/groep';
        if (file_exists($formPath)) {

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolBarHelper::editList('groep.edit', 'JTOOLBAR_EDIT');
            }
        }

        if ($canDo->get('core.admin')) {
            JToolBarHelper::preferences('com_roedel');
        }

        //Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_roedel&view=groepen');

    }

}
