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

namespace cSkrollr;
use \Sunra\PhpSimple\HtmlDomParser;

class cSkrollrHook extends \System
{
    /**
     * loadDataContainer hook
     *
     * Add onload_callback definition when loadDataContainer hook is
     * called to define onload_callback as late as possible
     *
     */
    public function appendcSkrollrDataFieldsCallback($strName)
    {
        if ($strName == 'tl_content') {
            $GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] =
                array('tl_content_cSkrollr', 'appendcSkrollrDataFields');
        }
    }

    /**
     * getContentElement hook
     *
     * insert data-attribs to html when
     * getContentElement hook is called 
     *
     */
    public function appendcSkrollrToContentElement($objElement, $strBuffer)
    {
        $html = HtmlDomParser::str_get_html($strBuffer);
        $cskrollrAttributes = deserialize($objElement->cskrollr_attributes);
        if (!empty($cskrollrAttributes)) {
            foreach ($cskrollrAttributes as $key => $value) {
                $html->find('*', 0)->{'data-' . $value['value']} = $value['label'];
            }
        }
        return $html->save();
    }

    /**
     * getArticle hook
     *
     * insert data-attribs to html when
     * getArticle hook is called 
     *
     */
    public function appendcSkrollrToArticle($tpl, $data, $article)
    {
        $cskrollrAttributes = deserialize($tpl->cskrollr_attributes);
        if (!empty($cskrollrAttributes)) {
            foreach ($cskrollrAttributes as $key => $value) {
                $cSkrollrData .= ' data-' . $value['value'] . '="' . $value['label'] . '"';
            }
        }
        $tpl->cskrollr_attributes = $cSkrollrData;
        $template = new \FrontendTemplate('mod_article_cSkrollr');
        $template->setData($tpl->getData());
        $article->Template = $template;
    }
}
