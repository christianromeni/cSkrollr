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
* Custom Backend Formular Field
*/

$GLOBALS['BE_FFL']['dataAttributes'] = 'DataAttributes';

/**
* Hooks
*/

$GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('cSkrollr\cSkrollrHook', 'appendcSkrollrDataFieldsCallback');
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('cSkrollr\cSkrollrHook', 'appendcSkrollrToContentElement');
$GLOBALS['TL_HOOKS']['compileArticle'][] = array('cSkrollr\cSkrollrHook', 'appendcSkrollrToArticle');

$GLOBALS['TL_BODY'][] = '<script src="/system/modules/cSkrollr/assets/skrollr.min.js"></script>';
$GLOBALS['TL_BODY'][] = '<script type="text/javascript">var s = skrollr.init();</script>';