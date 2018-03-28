<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_kickslider
 *
 * @author      Niels Nübel <info@niels-nuebel.de>
 * @copyright   Copyright (c) 2013-2018 niels-nuebel.de
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$doc = JFactory::getDocument();

$slides = ModKickSliderHelper::getSlider($params, 'slides');
$duration = $params->get('duration', 3000);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

require JModuleHelper::getLayoutPath('mod_kickslider', $params->get('layout', 'default'));
