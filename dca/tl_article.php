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
 * Add palettes to tl_article
 */
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = str_replace('author;','author;{cskrollr_legend},cskrollr_attributes;', $GLOBALS['TL_DCA']['tl_article']['palettes']['default']);

/**
 * Add fields to tl_article
 */
$GLOBALS['TL_DCA']['tl_article']['fields']['cskrollr_attributes'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_article']['cskrollr_attributes'],
    'exclude' => true,
    'search' => false,
    'inputType' => 'dataAttributes',
    'eval' => array('mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w100'),
    'sql' => "blob NULL"
);