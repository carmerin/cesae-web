<?php
/**
* @version    $Id: helper.php 2009-09-17 20:14:40Z diana $
* @package    Dynamic XML Sitemap
* @copyright  Copyright (C) 2009-2010 - Diana Scherff (http://www.dianascherff.com). All rights reserved.
* @license    GNU/GPL
*/

/// no direct access
defined('_JEXEC') or die('access access');

class modDynamicXmlSitemapHelper
{
	//get section, cateogry & article data
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

		$query = 'SELECT s.id AS sid, s.alias AS salias, c.id AS catid, c.alias AS catalias,'.
			'  d.id AS id, d.alias AS alias, d.created AS created, d.modified AS modified'.
			' FROM #__sections s'.
			' LEFT JOIN #__categories c'.
			' ON s.id = c.section'.
			' RIGHT JOIN #__content d'.
			' ON c.id = d.catid '.
			' WHERE d.state = 1'.
			'  AND d.access '.$accesstype.
			' ORDER BY d.ordering';
		$db->setQuery($query);
		$data = $db->loadObjectList();

		return $data;
	}

	//check if lastmod should be displayed
	function lastMod(&$params)
	{
		global $mainframe;

		$lastmod = intval($params->get('lastmod', 1));

		return $lastmod;
	}

	//check if categories & sections should be displayed
	function catSec(&$params)
	{
		global $mainframe;

		$catsec = intval($params->get('catsec', 1));

		return $catsec;
	}

	//find
	function menuItem()
	{
		global $mainframe;

		$db =& JFactory::getDBO();

		$query = 'SELECT id'.
			' FROM #__menu'.
			' WHERE home = 1';
		$db->setQuery($query);
		$item = $db->loadResult();
		return $item;
	}

	//get and format time offset
	function timeOffset()
	{
		global $mainframe;

		$offset_cfg = $mainframe->getCfg('offset');
		$pattern1 = '/^[0-9]$/';
		$pattern2 = '/[0-9]{2}/';
		$pattern3 = '/^\-/';
		$pattern5 = '/\-/';
		$replacement2 = '-0';

		if (preg_match($pattern1, $offset_cfg)) {
			if (preg_match($pattern2, $offset_cfg)) {
			$offset = '+'.$offset_cfg.':00';
			} else {
				$offset = '+0'.$offset_cfg.':00';
			}
		} elseif (preg_match($pattern3, $offset_cfg)) {
			if (preg_match($pattern2, $offset_cfg)) {
				$offset = $offset_cfg.':00';
			} else {
				$offset_hrs = preg_replace($pattern5, $replacement2, $offset_cfg);
				$offset = $offset_hrs.':00';
			}
		} else {
			$offset = '+00:00';
		}
		return $offset;
	}

	//get live_site URL (location of Joomla! installation)
	function liveSite(&$params)
	{
		global $mainframe;

		$live_site_cfg = $mainframe->getCfg('live_site');
		$live_site_param = trim($params->get('livesite'));
		if (empty($live_site_cfg)) {
			$site = $live_site_param;
		} else {
			$site = $live_site_cfg;
		}
		return $site;
	}
}
