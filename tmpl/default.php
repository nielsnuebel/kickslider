<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_banners
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('stylesheet', 'mod_kickslider/kickslider.css', array('version' => 'auto', 'relative' => true));

$root = 'kickslider';
?>
<div class="<?= $root . '_' . $module->id ?><?php echo $moduleclass_sfx; ?>">
    <ul class="kickslider">
<?php foreach ($slides as $slide): ?>
        <li class="kickslider__item">
            <div class="kickslider__background" style="background-image: url(<?= $slide->image ?>)"></div>
            <?= JHtml::_('image', $slide->image, htmlspecialchars($slide->alt, ENT_COMPAT, 'UTF-8'), $slide->attr) ?>
            <div class="kickslider__item_content">
                <div>
                    <h2><span><?= $slide->headline ?></span></h2>
                    <p><span><?= $slide->subline ?></span></p>
                </div>
            </div>
        </li>
<?php endforeach;?>
    </ul>
</div>

<script type="text/javascript">
    function initSlider<?= $module->id ?>() {
        window.addEventListener("resize", resizeSlider);

        function resizeSlider() {
            var biggestElement = 0;
            var images = document.querySelectorAll('.<?= $root . '_' . $module->id ?> .kickslider__image');

            Array.prototype.forEach.call(images, function (el, index, array) {
                if(el.offsetHeight > biggestElement)
                {
                    biggestElement = el.offsetHeight;
                }
            });

            var slider = document.querySelectorAll('.<?= $root . '_' . $module->id ?> .kickslider');

            slider[0].style.height = biggestElement + 'px';
        }


        var slideIndex = 1;
        showSlides(slideIndex);
        resizeSlider();


        function showSlides() {
            var i;
            var slides = document.querySelectorAll('.<?= $root . '_' . $module->id ?> .kickslider__item');
            for (i = 0; i < slides.length; i++) {
                slides[i].className = slides[i].className.replace(" active", "");
            }
            slides[slideIndex-1].className += " active";
            slideIndex++;
            if (slideIndex> slides.length) {slideIndex = 1}
            setTimeout(showSlides, <?= $duration ?>);
        }
    }

    initSlider<?= $module->id ?>()
</script>