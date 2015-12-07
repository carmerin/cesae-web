<?php
/**
* @version    $Id: helper.php 2009-09-17 20:14:40Z diana $
* @package    Dynamic XML Sitemap
* @copyright  Copyright (C) 2009-2010 - Diana Scherff (http://www.dianascherff.com). All rights reserved.
* @license    GNU/GPL
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
?>
<jdoc:include type="modules" name="dynamicxmls" />
<?php
echo '</urlset>';
?>