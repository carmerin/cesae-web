<?php
/**
 * @version		$Id: router.php 21321 2011-05-11 01:05:59Z dextercowley $
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('joomla.application.categories');

/**
 * Build the route for the com_content component
 *
 * @param	array	An array of URL arguments
 * @return	array	The URL arguments to use to assemble the subsequent URL.
 * @since	1.5
 */
function ContentBuildRoute(&$query)
{
	$segments	= array();

	// get a menu item based on Itemid or currently active
	$app		= JFactory::getApplication();
	$menu		= $app->getMenu();
	$params		= JComponentHelper::getParams('com_content');
	$advanced	= $params->get('sef_advanced_link', 0);



//echo $query['Itemid'];
//quit();
	// we need a menu item.  Either the one specified in the query, or the current active one if none specified
	if (empty($query['Itemid'])) {
		$menuItem = $menu->getActive();
		$menuItemGiven = false;
	}
	else {
		$menuItem = $menu->getItem($query['Itemid']);
		$menuItemGiven = true;
	}




	if (isset($query['view'])) {
		$view = $query['view'];
	}
	else {
		// we need to have a view in the query or it is an invalid URL
		return $segments;
	}


	// are we dealing with an article or category that is attached to a menu item?
	if (($menuItem instanceof stdClass) && $menuItem->query['view'] == $query['view'] && isset($query['id']) && $menuItem->query['id'] == intval($query['id'])) {
		unset($query['view']);

		if (isset($query['catid'])) {
			unset($query['catid']);
		}

		unset($query['id']);

		return $segments;
	}

	if ($view == 'category' || $view == 'article')
	{


		if (!$menuItemGiven) {
			$segments[] = $view;
		}

		unset($query['view']);

		if ($view == 'article') {
			if (isset($query['id']) && isset($query['catid']) && $query['catid']) {
				$catid = $query['catid'];
				$id = $query['id'];
			} else {
				// we should have these two set for this view.  If we don't, it is an error
				return $segments;
			}
		}
		else {
			if (isset($query['id'])) {
				$catid = $query['id'];
			} else {
				// we should have id set for this view.  If we don't, it is an error
				return $segments;
			}
		}

		if ($menuItemGiven && isset($menuItem->query['id'])) {
			$mCatid = $menuItem->query['id'];
		} else {
			$mCatid = 0;
		}

		$categories = JCategories::getInstance('Content');
		$category = $categories->get($catid);

		if (!$category) {
			// we couldn't find the category we were given.  Bail.
			return $segments;
		}

		$path = array_reverse($category->getPath());

		$array = array();

		foreach($path AS $id) {
			if ((int)$id == (int)$mCatid) {
				break;
			}

			list($tmp, $id) = explode(':', $id, 2);

			$array[] = $id;
		}

		$array = array_reverse($array);

		if (!$advanced && count($array)) {
			$array[0] = (int)$catid.':'.$array[0];
		}

		$segments = array_merge($segments, $array);

		if ($view == 'article') {
			if ($advanced) {
				list($tmp, $id) = explode(':', $query['id'], 2);
			}
			else {
				$id = $query['id'];
			}
			$segments[] = $id;
		}
		unset($query['id']);
		unset($query['catid']);
	}

	if ($view == 'archive') {
		if (!$menuItemGiven) {
			$segments[] = $view;
			unset($query['view']);
		}

		if (isset($query['year'])) {
			if ($menuItemGiven) {
				$segments[] = $query['year'];
				unset($query['year']);
			}
		}

		if (isset($query['year']) && isset($query['month'])) {
			if ($menuItemGiven) {
				$segments[] = $query['month'];
				unset($query['month']);
			}
		}
	}

	// if the layout is specified and it is the same as the layout in the menu item, we
	// unset it so it doesn't go into the query string.
	if (isset($query['layout'])) {
		if ($menuItemGiven && isset($menuItem->query['layout'])) {
			if ($query['layout'] == $menuItem->query['layout']) {

				unset($query['layout']);
			}
		}
		else {
			if ($query['layout'] == 'default') {
				unset($query['layout']);
			}
		}
	}

	return $segments;
}



/**
 * Parse the segments of a URL.
 *
 * @param	array	The segments of the URL to parse.
 *
 * @return	array	The URL attributes to be used by the application.
 * @since	1.5
 */
function ContentParseRoute($segments)
{
	$vars = array();

	//Get the active menu item.
	$app	= JFactory::getApplication();
	$menu	= $app->getMenu();
	$item	= $menu->getActive();
	$params = JComponentHelper::getParams('com_content');
	$advanced = $params->get('sef_advanced_link', 0);
	$db = JFactory::getDBO();




	//VEO SI LA URL ES 'RARA'
	$the_url=$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	//echo $the_url;
	$partes = explode("/",$the_url);
	
	
	//echo($_SERVER["SERVER_NAME"]);
	//echo("---");
	//echo($_SERVER["REQUEST_URI"]);
	//exit();
	if (false)
	{
		if ($_SERVER["SERVER_NAME"]=="www.cesae.es")
		{
			if ($_SERVER["REQUEST_URI"]=="/revenuemanagement/,/")
			{
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: http://www.cesae.es/revenuemanagement/");
				exit();
					
			}
			if ($_SERVER["REQUEST_URI"]=="/revenuemanagement/,/")
			{
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: http://www.cesae.es/revenuemanagement/");
				exit();
					
			}
		}
	}
	
	//echo count($partes);
	//echo $partes[count($partes)-1];
	//DEPRECATED
	if (false)
	{
		if ($partes[count($partes)-1]=='http:' or $partes[count($partes)-1]==','  or $partes[count($partes)-1]=='www.cesae.es' )
		{
		//echo "kkk";
		//exit();
			$newurl='';
			for ($i = 0; $i < count($partes)-1; $i++) {
				$newurl=$newurl."/";
				$newurl=$newurl.$partes[$i];
			    }
			header("Location: http://".$newurl.'/');
			exit();
		}
		
		/*
		exit();
		for ($i = 1; $i < count($partes)-1; $i++) {
			if ( strrpos($partes[$i], "www.cesae.es")>0)
			{
					$newurl='';
					for ($i = 0; $i < count($partes)-1; $i++) {
						$newurl=$newurl."/";
						
						if (i>0)
							$newurl=$newurl.str_replace('www.cesae.es','',$partes[$i]);
						else
							$newurl=$newurl.$partes[$i];
					    }
					header("Location: http://".$newurl.'/');
					exit();
				
				
			}
		}
		//exit();
		*/
	}

	// Count route segments
	$count = count($segments);

//echo($count);
//echo($segments[0]);
//echo($segments[$count - 1]);
//quit();

	// Standard routing for articles.  If we don't pick up an Itemid then we get the view from the segments
	// the first segment is the view and the last segment is the id of the article or category.

	if (!isset($item)) {
		

		$vars['view']	= $segments[0];
		$vars['id']		= $segments[$count - 1];

		
		return $vars;
	}
		
	// if there is only one segment, then it points to either an article or a category
	// we test it first to see if it is a category.  If the id and alias match a category
	// then we assume it is a category.  If they don't we assume it is an article
	if ($count == 1) {
		
		
		
		// we check to see if an alias is given.  If not, we assume it is an article
		
		
		if (strpos($segments[0], ':') === false) {
			$vars['view'] = 'article';
			$vars['id'] = (int)$segments[0];
			
		
			if ($vars['id'] ==0)
			{
					$db->setQuery('SELECT  cont.id FROM #__categories cat RIGHT JOIN #__content cont ON cat.id = cont.catid WHERE cont.alias like "'.$segments[0].'"');
					   $rows = $db->loadObjectList();
															
					   foreach ( $rows as $row ){
						$vars['id'] = $row->id;
						
					   }									
					
			}
			return $vars;
		}
		else
		{
			$vars['view'] = 'article';
			$vars['id'] = (int)$segments[0];
			
			//if ($vars['id'] ==0)
			//{
		
		
					$db->setQuery('SELECT  cont.id FROM #__categories cat RIGHT JOIN #__content cont ON cat.id = cont.catid WHERE cont.alias like "'.str_replace(':','-',$segments[0]).'"');
					   $rows = $db->loadObjectList();
															
					   foreach ( $rows as $row ){
						$vars['id'] = $row->id;
						
					   }									
					
			//}
			return $vars;
		}
		//DEPRECATED
		list($id, $alias) = explode(':', $segments[0], 2);


		// first we check if it is a category
		$category = JCategories::getInstance('Content')->get($id);




		if ($category && $category->alias == $alias) {
			$vars['view'] = 'category';
			$vars['id'] = $id;

			return $vars;
		} else {
			$query = 'SELECT alias, catid FROM #__content WHERE id = '.(int)$id;
			$db->setQuery($query);
			$article = $db->loadObject();

			if ($article) {
				if ($article->alias == $alias) {
					$vars['view'] = 'article';
					$vars['id'] = (int)$id;

					return $vars;
				}
			}
		}
	}



	//MGG BLOG 31-07-2013
	// if there is only one segment, then it points to either an article or a category
	// we test it first to see if it is a category.  If the id and alias match a category
	// then we assume it is a category.  If they don't we assume it is an article
	if ($count == 2 && $segments[0]=="blog") {
		
		
		
		// we check to see if an alias is given.  If not, we assume it is an article
		if (strpos($segments[1], ':') === false) {
			$vars['view'] = 'article';
			$vars['id'] = (int)$segments[1];
			
		
			if ($vars['id'] ==0)
			{
					$db->setQuery('SELECT  cont.id FROM #__categories cat RIGHT JOIN #__content cont ON cat.id = cont.catid WHERE cont.alias like "'.$segments[1].'"');
					   $rows = $db->loadObjectList();
															
					   foreach ( $rows as $row ){
						$vars['id'] = $row->id;
						
					   }									
					
			}
			return $vars;
		}
		else
		{
			$vars['view'] = 'article';
			$vars['id'] = (int)$segments[1];
			
		
			//if ($vars['id'] ==0)
			//{
					$db->setQuery('SELECT  cont.id FROM #__categories cat RIGHT JOIN #__content cont ON cat.id = cont.catid WHERE cont.alias like "'.str_replace(':','-',$segments[1]).'"');
					   $rows = $db->loadObjectList();
															
					   foreach ( $rows as $row ){
						$vars['id'] = $row->id;
						
					   }									
					
			//}
			return $vars;
		}

		
	}


	//MIGUEL GG
	//SI LLEGA AQUI... ARTICULO 1 SIEMPRE
	//$vars['view'] = 'article';
	//$vars['catid'] = 1;
	//$vars['id'] = 1;
	//return $vars;
	
	
	if ($_SERVER["SERVER_NAME"]=="blog.cesae.es")
	{
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/07/marketing-gastronomico")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/conoce-el-marketing-gastronomico/");
			exit();
				
		}
		
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/07/cesae-descubriendo-faceboo-fbml")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/cesae-20-descubriendo-facebook-y-el-fbml");
			exit();
		}
	
		if ($_SERVER["REQUEST_URI"]=="/index.php/author/jaime-lpez-chicheri")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog-jaimelopezchicheri");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/12/editor-de-menus-para-restaurantes")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/las-mejores-claves-para-el-editor-de-menus-para-restaurantes");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2011/02/post-alumnos-cesae-la-paridad-de-tarifas-podria-provocar-un-nuevo-modelo-de-negocio-en-nuestro-sistema-turistico")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/la-importancia-de-la-paridad-de-tarifas-en-nuestro-sistema-turistico");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2011/02/recursos-2-0-para-hoteleros-i-blogs")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/guia-de-los-recursos-20-hoteleros-i-blogs");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2011/03/escapada-rural-guia-de-twitter-para-alojamientos-rurales")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/nueva-aplicacion-escapada-rural-guia-de-twitter-para-alojamientos-rurales");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/12/turismo-rural-y-revenue-management")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/descubre-la-relacion-entre-turismo-rural-y-revenue-management");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/tag/tesis-bric")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/perspectivas-del-sector-turistico-para-el-ano-2011-el-ano-del-valor-anadido");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/11/el-analisis-de-toprural-y-ruralgest-de-chema-herrero")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/el-analisis-de-toprural-y-rural-guest-de-chema-herrero");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/12/perspectivas-del-sector-turistico-para-2011-el-ano-del-valor-anadido")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/perspectivas-del-sector-turistico-para-el-ano-2011-el-ano-del-valor-anadido");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/calendario-de-cursos")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/blog-calendariodecursos");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/06/aurelio-martinez-un-alumno-que-toda-escuela-de-negocios-querria-tener")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/aurelio-martinez-un-alumno-que-toda-escuela-de-negocios-querria-tener");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2011/03/animate-a-esta-iniciativa-para-mejorar-el-mundo")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/animate-a-esta-iniciativa-para-mejorar-el-mundo?cid=483");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/12/post-alumnos-cesae-lo-mejor-de-facebook-places-para-hoteles")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/lo-mejor-de-facebook-place-para-hoteles");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/12/extremadura-21-un-evento-de-hosteltur-que-ha-marcado-la-diferencia")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/extremadura-2011-un-evento-de-hosteltur-que-ha-marcado-la-diferencia");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/category/jaime-chicheri-e-commerce-revenue-management")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog-jaimelopezchicheri");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/07/un-channel-manager-en-tu-movil")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/las-ventajas-del-channel-manager-en-tu-movil");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/11/hoteles-saludables-comenzando-por-la-habitacion")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/como-convertir-los-hoteles-en-saludables-comenzando-por-la-habitacion");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/06/google-maps-apuesta-por-el-e-commerce-hotelero")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/google-maps-apuesta-por-el-ecommerce-hotelero");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/06/foro-hosteltur-del-que-al-como")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/descubre-el-foro-hosteltur-del-que-al-como");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/06/analizando-impresiones-del-v-foro-hosteltur-y-algunas-anecdotas/www.cesae.es")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/analizando-impresiones-del-v-foro-hosteltur-y-algunas-anecdotas");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2011/06/los-mejores-restaurantes-del-mundo")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/guia-de-los-mejores-restaurantes-del-mundo");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/07/rentabilizar-un-spa-de-la-base-a-la-gestion-comercial" )
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/pautas-para-rentabilizar-un-spa-de-la-base-a-la-gestion-comercial");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/08/turismo-rural-rural-musical-se-diferencia-de-la-competencia" )
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/quieres-saber-que-es-rural-musica");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/07/terminara-la-crisis-en-2010-que-pasara-en-el-sector-turistico")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/terminara-la-crisis-en-2010-que-pasara-en-el-sector-turistico");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/06/la-distribucion-hotelera" )
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/la-mejor-guia-sobre-distribucion-hotelera");
			exit();
		}
		if ($_SERVER["REQUEST_URI"]=="/index.php/2010/07/que-es-el-turismo-rural")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://www.cesae.es/blog/que-es-el-turismo-rural");
			exit();
		}

	}	
	
	
	//printf($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
	//if (false)
	//{
		if ($partes[count($partes)-1]<>"")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'/');
			exit();
		}
	//}
	
	// if there was more than one segment, then we can determine where the URL points to
	// because the first segment will have the target category id prepended to it.  If the
	// last segment has a number prepended, it is an article, otherwise, it is a category.
	if (!$advanced) {
		$cat_id = (int)$segments[0];

		$article_id = (int)$segments[$count - 1];

		if ($article_id > 0) {
			$vars['view'] = 'article';
			$vars['catid'] = $cat_id;
			$vars['id'] = $article_id;
		} else {
			$vars['view'] = 'category';
			$vars['id'] = $cat_id;
		}

		return $vars;
	}


	// we get the category id from the menu item and search from there
	$id = $item->query['id'];
	$category = JCategories::getInstance('Content')->get($id);

	if (!$category) {
		JError::raiseError(404, JText::_('COM_CONTENT_ERROR_PARENT_CATEGORY_NOT_FOUND'));
		return $vars;
	}

	$categories = $category->getChildren();
	$vars['catid'] = $id;
	$vars['id'] = $id;
	$found = 0;

	foreach($segments as $segment)
	{
		$segment = str_replace(':', '-',$segment);

		foreach($categories as $category)
		{
			if ($category->alias == $segment) {
				$vars['id'] = $category->id;
				$vars['catid'] = $category->id;
				$vars['view'] = 'category';
				$categories = $category->getChildren();
				$found = 1;
				break;
			}
		}

		if ($found == 0) {
			if ($advanced) {
				$db = JFactory::getDBO();
				$query = 'SELECT id FROM #__content WHERE catid = '.$vars['catid'].' AND alias = '.$db->Quote($segment);
				$db->setQuery($query);
				$cid = $db->loadResult();
			} else {
				$cid = $segment;
			}

			$vars['id'] = $cid;

			if ($item->query['view'] == 'archive' && $count != 1){
				$vars['year']	= $count >= 2 ? $segments[$count-2] : null;
				$vars['month'] = $segments[$count-1];
				$vars['view']	= 'archive';
			}
			else {
				$vars['view'] = 'article';
			}
		}

		$found = 0;
	}

	return $vars;
}
