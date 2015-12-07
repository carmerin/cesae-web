<?php
/**
* @version	$Id: helper.php 2009-09-17 20:14:40Z diana $
* @package	Dynamic XML Sitemap
* @copyright  Copyright (C) 2009-2010 - Diana Scherff (http://www.dianascherff.com). All rights reserved.
* @license	GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

$dataquery = modDynamicXmlSitemapHelper::dataQuery($params);
$lastmd = modDynamicXmlSitemapHelper::lastMod($params);
$livesite = modDynamicXmlSitemapHelper::liveSite($params);
$itemid = modDynamicXmlSitemapHelper::menuItem();
$tos = modDynamicXmlSitemapHelper::timeOffset();
$catsec = modDynamicXmlSitemapHelper::catSec($params);
$cat = array();
$sec = array();

//create article links according to params
foreach ($dataquery as $data) {
	if ($data->catid <> 0) {
		$strXMLSitemap .="<url>";
		$strXMLSitemap .="<loc>$livesite/index.php?option=com_content&amp;view=article&amp;id=$data->id:$data->alias&amp;catid=$data->catid:$data->catalias&amp;Itemid=$itemid</loc>";
		if ($catsec == 1) {
			$cat[$data->catid] = $data->catalias;
			$sec[$data->sid] = $data->sid;
		}
	} else {
		$strXMLSitemap .="<url>";
		$strXMLSitemap .="<loc>$livesite/index.php?option=com_content&amp;view=article&amp;id=$data->id:$data->alias&amp;Itemid=$itemid</loc>";
	}
	if ($lastmd == 1) {
		include_once dirname(__FILE__).DS.'preg'.DS.'_offset.php';
		$strXMLSitemap .="<lastmod>$date</lastmod>";
	}
	$strXMLSitemap .="</url>";
}
unset($data);

//create section and category links according to params
if ($catsec == 1) {
	foreach ($sec as $skey => $s) {
		$strXMLSitemap .="<url>";
		$strXMLSitemap .="<loc>$livesite/index.php?option=com_content&amp;view=section&amp;id=$s&amp;Itemid=$itemid</loc>";
		$strXMLSitemap .="</url>";
	}
	unset($s);
	foreach ($cat as $key => $c) {
		$strXMLSitemap .="<url>";
		$strXMLSitemap .="<loc>$livesite/index.php?option=com_content&amp;view=category&amp;id=$key:$c&amp;layout=default&amp;Itemid=$itemid</loc>";
		$strXMLSitemap .="</url>";
	}
	unset($c);
}

$vmenabled = modDynamicXmlSitemapQueriesComponents::isVmEnabled();
$vmdata = modDynamicXmlSitemapQueriesComponents::queryVmData($params);
$vmnames = modDynamicXmlSitemapQueriesComponents::includeNames($params);

//create virtuemart links if installed
if (($vmenabled == 1) AND (count($vmdata) > 0)) {
	@include_once dirname( __FILE__ ).DS.'..'.DS.'..'.DS.'..'.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'virtuemart.cfg.php';
	if (@constant("FLYPAGE")) {
		$cfg_fp = FLYPAGE;
	} else {
		$cfg_fp = "flypage.tpl";
	}
	foreach ($vmdata as $vm) {
		$strXMLSitemap .="<url>";
		$strXMLSitemap .="<loc>$livesite/index.php?option=com_virtuemart&amp;page=shop.product_details&amp;product_id=$vm->product_id&amp;category_id=$vm->category_id";
		if (($vm->cflypage != NULL) AND ($vm->cflypage != "")) {
			$new_fp = $vm->cflypage;
		} else {
			$new_fp = $cfg_fp;
		}
		$strXMLSitemap .="&amp;flypage=$new_fp";
		if ($vmnames == 1) {
			$category_name = urlencode($vm->category_name);
			$product_name = urlencode($vm->product_name);
			$strXMLSitemap .="&amp;name=$product_name&amp;category=$category_name";
		}
		$strXMLSitemap .="</loc>";
		$strXMLSitemap .="</url>";
	}
	unset($vm);
}

$kfenabled = modDynamicXmlSitemapQueriesComponents::isKunenaEnabled();
$kfdata = modDynamicXmlSitemapQueriesComponents::kunenaData($params);

//create kunena thread links if installed
if (($kfenabled == 1) AND (count($kfdata) > 0)) {
	foreach ($kfdata as $kf) {
		$strXMLSitemap .="<url>";
		$strXMLSitemap .="<loc>$livesite/index.php?option=com_kunena&amp;func=view&amp;catid=$kf->catid&amp;id=$kf->id";
		$strXMLSitemap .="</loc>";
		$strXMLSitemap .="</url>";
	}
	unset($kf);
}

$addon = modDynamicXmlSitemapQueriesAdvanced::addonUrls($params);

//create manual links
foreach ($addon as $addlinks) {
	if (!empty($addlinks)) {
		$addlinkshtml = htmlentities($addlinks);
		$strXMLSitemap .="<url>";
		$strXMLSitemap .="<loc>$addlinkshtml</loc>";
		$strXMLSitemap .="</url>";
	}
}
unset($addlinks);
