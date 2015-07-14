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
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'cSkrollr',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Elements
	'cSkrollr\DataAttributes' => 'system/modules/cSkrollr/classes/DataAttributes.php',
	'cSkrollr\cSkrollrHook' => 'system/modules/cSkrollr/classes/cSkrollrHook.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_article_cSkrollr' => 'system/modules/cSkrollr/templates',
));
