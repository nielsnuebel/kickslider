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

/**
 * Helper for mod_kickslider
 *
 * @package     Joomla.Site
 * @subpackage  mod_kickslider
 *
 * @since       1.6
 */
class ModKickSliderHelper
{
	public static function getSlider($params, $slider)
	{
		$slides = $params->get($slider, 0);
		$data = new stdClass;

		if ($slides)
		{
			foreach ($slides as $key => $slide)
			{
				$image = JPATH_ROOT . '/' . $slide->image;

				if ($slide->image == '' or !JFile::exists($image))
				{
					unset($slides->$key);
					continue;
				}

				$image = new JImage($slide->image);
				$attr  = array(
					"width"  => $image->getWidth(),
					"height" => $image->getHeight()
				);

				if ($slide->title != "")
				{
					$attr['title'] = $slide->title;
				}

				$attr['style'] = '';
				$minheight = $params->get('minheight', false);

				if ($minheight && $minheight > 200)
				{
					$attr['style'] = 'min-height: ' . $minheight . 'px;';
				}

				$slide->position = ' background-position: 50% 50%';
				$postion = $params->get('position', '50% 50%');

				if ($postion && $postion != "")
				{
					$slide->position = ' background-position: ' . $postion . ';';
				}

				$attr['class'] = 'kickslider__image';

				$slide->attr = $attr;
			}
		}

		return $slides;
	}
}
