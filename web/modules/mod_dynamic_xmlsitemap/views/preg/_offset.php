<?php
/**
* @version    $Id: _offset.php 2010-03-20 15:12:40Z diana $
* @package    Dynamic XML Sitemap
* @copyright  Copyright (C) 2009-2010 - Diana Scherff (http://www.dianascherff.com). All rights reserved.
* @license    GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

$pattern = '/[ ]{1}/';
$replacement = 'T';

$created = preg_replace($pattern, $replacement, $data->created);
$modified = preg_replace($pattern, $replacement, $data->modified);

if ($modified == '0000-00-00T00:00:00') {
	$date = $created . $tos;
} else {
	$date = $modified . $tos;
}
