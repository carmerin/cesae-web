<?php
/**
* @version	$Id: sef.php 2010-03-19 20:59:20Z diana $
* @package	Dynamic XML Sitemap
* @copyright  Copyright (C) 2009-2010 - Diana Scherff (http://www.dianascherff.com). All rights reserved.
* @license	GNU/GPL
*/

/// no direct access
defined('_JEXEC') or die('Restricted access');

class modDynamicXmlSitemapQueriesSef
{
	//get menu data
	function dataQuery(&$params)
	{
		global $mainframe;

		$db	=& JFactory::getDBO();
		$access	= intval($params->get('access', 1));
		if ($access == 0) {
			$accesstype = '= 0';
		} else {
			$accesstype = '>= 0';
		}

		$query = 'SELECT id, alias, link, parent, componentid, sublevel, home'.
			' FROM #__menu'.
			' WHERE published = 1'.
			'  AND access '.$accesstype.
			' ORDER BY ordering';
		$db->setQuery($query);
		$menu = $db->loadObjectList();

		return $menu;
	}
}


// http://www.dianascherff.com/component/content/category/95-quotes.html
// http://www.dianascherff.com/component/content/section/10.html
