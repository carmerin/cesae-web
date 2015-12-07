<?php
/**
* @version	$Id: helper.php 2009-09-17 20:14:40Z diana $
* @package	Dynamic XML Sitemap
* @copyright  Copyright (C) 2009-2010 - Diana Scherff (http://www.dianascherff.com). All rights reserved.
* @license	GNU/GPL
*/

/// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once dirname(__FILE__).DS.'helper.php';
require_once dirname(__FILE__).DS.'queries'.DS.'advanced.php';
require_once dirname(__FILE__).DS.'queries'.DS.'components.php';
//require_once dirname(__FILE__).DS.'queries'.DS.'sef.php';

//$sef = modDynamicXmlSitemapQueriesSef::sefSettings($params);
$strXMLSitemap = "";

/*
if (($sef == 1) OR ($sef == 2)) {
	if ($sef == 2) {
		$suffix = ".html";
	}
	include_once dirname(__FILE__).DS.'views'.DS.'sef.php';
} else { */
	include_once dirname(__FILE__).DS.'views'.DS.'plain.php';
//}
require_once JModuleHelper::getLayoutPath('mod_dynamic_xmlsitemap');
