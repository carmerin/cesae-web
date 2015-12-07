<?php
/**
* @version	$Id: advanced.php 2010-03-19 20:59:20Z diana $
* @package	Dynamic XML Sitemap
* @copyright  Copyright (C) 2009-2010 - Diana Scherff (http://www.dianascherff.com). All rights reserved.
* @license	GNU/GPL
*/

/// no direct access
defined('_JEXEC') or die('Restricted access');

//get manually entered URLs
class modDynamicXmlSitemapQueriesAdvanced
{
	function addonUrls(&$params)
	{
		global $mainframe;

		$manual	= trim($params->get('manual'));
		$addon = explode(" ", $manual);

		return $addon;
	}
}
