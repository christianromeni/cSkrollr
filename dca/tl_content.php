<?php
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package   cSkrollr 
 * @author    Christian Romeni  <c.romeni@brainfactory.de>
 * @link      https://brainfactory.de
 * @license   GNU 
 * @copyright BrainFactory
 */

/**
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['default'] = str_replace('author;','author;{cskrollr_legend},cskrollr_attributes;', $GLOBALS['TL_DCA']['tl_content']['palettes']['default']);

/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['cskrollr_attributes'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['cskrollr_attributes'],
    'exclude' => true,
    'search' => false,
    'inputType' => 'dataAttributes',
    'eval' => array('mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w100'),
    'sql' => "blob NULL"
);

class tl_content_cSkrollr extends tl_content
{

    /**
     * Onload callback for tl_content
     *
     * Add data field to all content palettes
     *
     * @param DataContainer $dc
     */
    public function appendcSkrollrDataFields(DataContainer $dc = null)
    {
        // add data section to all palettes
        foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key => $value) {
            // if element is '__selector__' OR 'default' OR the palette has already a data key
            if ($key == '__selector__' || $key == 'default' || strpos($value, ',cskrollr_attributes(?=\{|,|;|$)') !== false) {
                continue;
            }

            $GLOBALS['TL_DCA']['tl_content']['palettes'][$key] = $value . ';{cskrollr_legend},cskrollr_attributes';
        }
    }
}