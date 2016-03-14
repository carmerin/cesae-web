<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Document
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * JDocument head renderer
 *
 * @package     Joomla.Platform
 * @subpackage  Document
 * @since       11.1
 */
class JDocumentRendererHead extends JDocumentRenderer
{
	/**
	 * Renders the document head and returns the results as a string
	 *
	 * @param   string  $head     (unused)
	 * @param   array   $params   Associative array of values
	 * @param   string  $content  The script
	 *
	 * @return  string  The output of the script
	 *
	 * @since   11.1
	 *
	 * @note    Unused arguments are retained to preserve backward compatibility.
	 */
	public function render($head, $params = array(), $content = null)
	{
		ob_start();
		echo $this->fetchHead($this->_doc);
		$buffer = ob_get_contents();
		ob_end_clean();

		return $buffer;
	}

	/**
	 * Generates the head HTML and return the results as a string
	 *
	 * @param   $document  The document for which the head will be created
	 *
	 * @return  string  The head hTML
	 *
	 * @since   11.1
	 */
	public function fetchHead(&$document)
	{
		// Trigger the onBeforeCompileHead event (skip for installation, since it causes an error)
		$app = JFactory::getApplication();
		$app->triggerEvent('onBeforeCompileHead');
		// Get line endings
		$lnEnd	= $document->_getLineEnd();
		$tab	= $document->_getTab();
		$tagEnd	= ' />';
		$buffer	= '';
		$has_title = '0';

		// Generate base tag (need to happen first)
		$base = $document->getBase();
		if (!empty($base)) {
			$buffer .= $tab.'<base href="'.$document->getBase().'" />'.$lnEnd;
		}


		$custom_title='';
		// Generate META tags (needs to happen as early as possible in the head)
		foreach ($document->_metaTags as $type => $tag)
		{
			foreach ($tag as $name => $content)
			{
				if ($type == 'http-equiv') {
					$content.= '; charset=' . $document->getCharset();
					$buffer .= $tab.'<meta http-equiv="'.$name.'" content="'.htmlspecialchars($content).'"'.$tagEnd.$lnEnd;
				}
				else if ($type == 'standard' && !empty($content) && $name!='keywords') {
					$buffer .= $tab.'<meta name="'.$name.'" content="'.htmlspecialchars($content).'"'.$tagEnd.$lnEnd;
				}
				
				if ($name=='rights' && !empty($content)) {
					$custom_title=htmlspecialchars($content);
				}
			}
		}


			
				
		// Don't add empty descriptions
        $documentDescription = $document->getDescription();
        if (!$documentDescription) {
                $buffer .= utf8_encode($tab.'<meta name="description" content="CESAE es la escuela de negocios y turismo líder en Madrid que ha formado ya a más de 7.500 alumnos en la última década. Súmate a la experiencia CESAE, fórmate en turismo y trabaja en las mejores cadenas hoteleras del mundo. " />'.$lnEnd);
        }else{
                $buffer .= $tab.'<meta name="description" content="'.$documentDescription.'" />'.$lnEnd;

        }

		$buffer .= $tab.'<meta name="generator" content="'.htmlspecialchars($document->getGenerator()).'" />'.$lnEnd;

        //aqui se definen las etiquetas <title> de la home page y las páginas de categorías superiores
        if (!$custom_title){

            if($_REQUEST['cat']=='Cocina'){
                $buffer .= utf8_encode($tab.'<title>Cursos y Másteres de alta cocina profesional y cocina de autor  en CESAE</title>'.$lnEnd);
            }elseif($_REQUEST['cat']=='Pasteleria'){
                $buffer .= utf8_encode($tab.'<title>Cursos y Másteres de pastelería y respostería profesional en CESAE</title>'.$lnEnd);
            }elseif($_REQUEST['cat']=='Sumilleria y enologia'){
                $buffer .= utf8_encode($tab.'<title>Cursos y Másteres de sumillería y catas de vinos en CESAE</title>'.$lnEnd);
            }elseif($_REQUEST['cat']=='Direccion y gestion'){
                $buffer .= utf8_encode($tab.'<title>Cursos y Másteres de dirección y gestión de hoteles y negocios en CESAE</title>'.$lnEnd);
            }elseif($_REQUEST['cat']=='Restauracion'){
                $buffer .= utf8_encode($tab.'<title>Cursos y Másteres de gestión y marketing aplicados a la hostelería en CESAE</title>'.$lnEnd);
            }elseif($_REQUEST['cat']=='Revenue Management'){
                $buffer .= utf8_encode($tab.'<title>Cursos y Másteres de expertos y especialistas en revenue management en CESAE</title>'.$lnEnd);
            }else{

                $db = &JFactory::getDBO();
                $id = $_GET['id'];
                $category_id="";
                $option   = JRequest::getCmd('option');
                $view   = JRequest::getCmd('view');

                $temp   = JRequest::getString('id');
                $temp   = explode(':', $temp);





                /* Checking if we are making up an article page */
                if ($option == 'com_content' && $view == 'article' && $id)
                {
                    /* Trying to get CATEGORY title from DB */
                    $db->setQuery('SELECT cat.title, cat.id, cont.ordering, cont.title as conttitle, cont.alias, cat.parent_id FROM #__categories cat RIGHT JOIN #__content cont ON cat.id = cont.catid WHERE cont.id='.$id);
                    $rows = $db->loadObjectList();

                    foreach ( $rows as $row ){
                        $category_title = $row->title;
                        $category_id = $row->id;
                        $ordering = $row->ordering;
                        $cont_title = $row->conttitle;
                        $parent_id = $row->parent_id;
                        $alias = $row->alias;

                        $nombrepaginaalias='http://www.cesae.es/'. $alias .'/';
                    }

//                    print_r($cont_title);
//                    die();

                    if($id){
                    	
                    	$buffer .= $tab.'<title>'.$cont_title.' - CESAE</title>'.$lnEnd;
                        
                        $has_title = '1';
                    }
                    else{
                        
                        $buffer .= $tab.'<title>Blog de turismo, gesti&oacute;n y direcci&oacute;n hotelera</title>'.$lnEnd;
                        
                        $has_title = '1';
                    }

                }

				if($has_title == '0') {
                
	                if($parent_id=="1" && $category_id=="50"){
	                    
	                    $buffer .= $tab.'<title>Blog de turismo, gesti&oacute;n y direcci&oacute;n hotelera</title>'.$lnEnd;
	                }
	                else{
	                    
	                    $buffer .= utf8_encode($tab.'<title>Escuela de turismo, dirección y gestión hotelera - CESAE</title>'.$lnEnd);
	                }
	            }
            }

        }else{

            $buffer .= $tab.'<title>'.$custom_title.'</title>'.$lnEnd;

    }



		// Generate link declarations
		foreach ($document->_links as $link => $linkAtrr)
		{
			$buffer .= $tab.'<link href="'.$link.'" '.$linkAtrr['relType'].'="'.$linkAtrr['relation'].'"';
			if ($temp = JArrayHelper::toString($linkAtrr['attribs'])) {
				$buffer .= ' '.$temp;
			}
			$buffer .= ' />'.$lnEnd;
		}

		// Generate stylesheet links
		foreach ($document->_styleSheets as $strSrc => $strAttr)
		{
			$buffer .= $tab . '<link rel="stylesheet" href="'.$strSrc.'" type="'.$strAttr['mime'].'"';
			if (!is_null($strAttr['media'])) {
				$buffer .= ' media="'.$strAttr['media'].'" ';
			}
			if ($temp = JArrayHelper::toString($strAttr['attribs'])) {
				$buffer .= ' '.$temp;
			}
			$buffer .= $tagEnd.$lnEnd;
		}

		// Generate stylesheet declarations
		foreach ($document->_style as $type => $content)
		{
			$buffer .= $tab.'<style type="'.$type.'">'.$lnEnd;

			// This is for full XHTML support.
			if ($document->_mime != 'text/html') {
				$buffer .= $tab.$tab.'<![CDATA['.$lnEnd;
			}

			$buffer .= $content . $lnEnd;

			// See above note
			if ($document->_mime != 'text/html') {
				$buffer .= $tab.$tab.']]>'.$lnEnd;
			}
			$buffer .= $tab.'</style>'.$lnEnd;
		}

		// Generate script file links
		foreach ($document->_scripts as $strSrc => $strAttr) {
			$buffer .= $tab.'<script src="'.$strSrc.'"';
			if (!is_null($strAttr['mime'])) {
				$buffer .= ' type="'.$strAttr['mime'].'"';
			}
			if ($strAttr['defer']) {
				$buffer .= ' defer="defer"';
			}
			if ($strAttr['async']) {
				$buffer .= ' async="async"';
			}
			$buffer .= '></script>'.$lnEnd;
		}

		// Generate script declarations
		foreach ($document->_script as $type => $content)
		{
			$buffer .= $tab.'<script type="'.$type.'">'.$lnEnd;

			// This is for full XHTML support.
			if ($document->_mime != 'text/html') {
				$buffer .= $tab.$tab.'<![CDATA['.$lnEnd;
			}

			$buffer .= $content.$lnEnd;

			// See above note
			if ($document->_mime != 'text/html') {
				$buffer .= $tab.$tab.']]>'.$lnEnd;
			}
			$buffer .= $tab.'</script>'.$lnEnd;
		}

		// Generate script language declarations.
		if (count(JText::script())) {
			$buffer .= $tab.'<script type="text/javascript">'.$lnEnd;
			$buffer .= $tab.$tab.'(function() {'.$lnEnd;
			$buffer .= $tab.$tab.$tab.'var strings = '.json_encode(JText::script()).';'.$lnEnd;
			$buffer .= $tab.$tab.$tab.'if (typeof Joomla == \'undefined\') {'.$lnEnd;
			$buffer .= $tab.$tab.$tab.$tab.'Joomla = {};'.$lnEnd;
			$buffer .= $tab.$tab.$tab.$tab.'Joomla.JText = strings;'.$lnEnd;
			$buffer .= $tab.$tab.$tab.'}'.$lnEnd;
			$buffer .= $tab.$tab.$tab.'else {'.$lnEnd;
			$buffer .= $tab.$tab.$tab.$tab.'Joomla.JText.load(strings);'.$lnEnd;
			$buffer .= $tab.$tab.$tab.'}'.$lnEnd;
			$buffer .= $tab.$tab.'})();'.$lnEnd;
			$buffer .= $tab.'</script>'.$lnEnd;
		}

		foreach($document->_custom as $custom) {
			$buffer .= $tab.$custom.$lnEnd;
		}

		return $buffer;
	}
}