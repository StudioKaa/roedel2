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
 * @param	array	A named array
 * @return	array
 */
function Roedel2BuildRoute(&$query) {
    $segments = array();

    if (isset($query['task'])) {
        $segments[] = implode('/', explode('.', $query['task']));
        unset($query['task']);
    }
    if (isset($query['view'])) {
        $segments[] = $query['view'];
        unset($query['view']);
    }
    if (isset($query['id'])) {
        $segments[] = $query['id'];
        unset($query['id']);
    }

    return $segments;
}

/**
 * @param	array	A named array
 * @param	array
 *
 * Formats:
 *
 * index.php?/roedel/task/id/Itemid
 *
 * index.php?/roedel/id/Itemid
 */
function Roedel2ParseRoute($segments) {
    $vars = array();

    // view is always the first element of the array
    $vars['view'] = $segments[0];
    $vars['id'] = $segments[1];

    return $vars;
}
