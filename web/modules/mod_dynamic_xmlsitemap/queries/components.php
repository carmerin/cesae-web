<?php
/**
* @version	$Id: components.php 2010-03-19 20:59:20Z diana $
* @package	Dynamic XML Sitemap
* @copyright  Copyright (C) 2009-2010 - Diana Scherff (http://www.dianascherff.com). All rights reserved.
* @license	GNU/GPL
*/

/// no direct access
defined('_JEXEC') or die('Restricted access');

class modDynamicXmlSitemapQueriesComponents
{
	//see if VirtueMart is installed & enabled
	function isVmEnabled()
	{
		global $mainframe;

		$vm = 'com_virtuemart';
		$opt = 'option';
		$db =& JFactory::getDBO();

		$query = 'SELECT COUNT(*)'.
			' FROM #__components'.
			' WHERE '.$db->nameQuote( $opt ).' = '.$db->quote( $vm ).
			' AND enabled = 1';
		$db->setQuery($query);
		$count = $db->loadResult();
		return $count;
	}

	//get virtuemart product & category info
	function queryVmData(&$params)
	{
		global $mainframe;

		$yes = 'Y';
		$db =& JFactory::getDBO();
		$virtuemart = intval($params->get('virtuemart', 1));

		if ($virtuemart == 1) {
			$query = 'SELECT p.product_id AS product_id, p.product_name AS product_name,'.
			'  c.category_id AS category_id, c.category_name AS category_name, c.category_flypage AS cflypage'.
			' FROM #__vm_product p'.
			' LEFT JOIN #__vm_product_category_xref x'.
			' ON p.product_id = x.product_id'.
			' LEFT JOIN #__vm_category c'.
			' ON x.category_id = c.category_id'.
			' WHERE p.product_publish = '.$db->quote( $yes ).
			'  AND c.category_publish = '.$db->quote( $yes );
			$db->setQuery($query);
			$vmdata = $db->loadObjectList();

			return $vmdata;
		}
	}

	//add product names to url
	function includeNames(&$params)
	{
		global $mainframe;

		$vmnames = intval($params->get('vmnames', 1));

		return $vmnames;
	}

//see if Kunena Forums is installed & enabled
	function isKunenaEnabled()
	{
		global $mainframe;

		$kf = 'com_kunena';
		$opt = 'option';
		$db =& JFactory::getDBO();

		$query = 'SELECT COUNT(*)'.
			' FROM #__components'.
			' WHERE '.$db->nameQuote( $opt ).' = '.$db->quote( $kf ).
			' AND enabled = 1';
		$db->setQuery($query);
		$count = $db->loadResult();
		return $count;
	}

//get virtuemart product & category info
	function kunenaData(&$params)
	{
		global $mainframe;

		$db =& JFactory::getDBO();
		$kunena = intval($params->get('kunena', 1));

		if ($kunena == 1) {
			$query = 'SELECT m.id AS id, m.catid AS catid'.
				' FROM #__fb_messages m'.
				' LEFT JOIN #__fb_categories c'.
				' ON m.catid = c.id'.
				' WHERE c.published = 1';
			$db->setQuery($query);
			$kfdata = $db->loadObjectList();

			return $kfdata;
		}
	}
}
