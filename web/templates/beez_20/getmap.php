<?php
	function ae_detect_ie()
	{
		if (isset($_SERVER['HTTP_USER_AGENT']) &&     (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
			return true;
		else
			return false;
	}
	
	
?>
<?php
/**
 * @version                $Id: index.php 21518 2011-06-10 21:38:12Z chdemko $
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */
setlocale(LC_CTYPE, 'es');

// No direct access.
defined('_JEXEC') or die;

// check modules
$showRightColumn        = ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom                        = ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft                        = ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
        $showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
$color              = $this->params->get('templatecolor');
$logo               = $this->params->get('logo');
$navposition        = $this->params->get('navposition');
$app                = JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams     = $app->getTemplate(true)->params;

if (ae_detect_ie()): 
else: $doc->addScript($this->baseurl.'/templates/beez_20/javascript/md_stylechanger.js', 'text/javascript', true);
endif;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
        <head>
                <jdoc:include type="head" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/position.css" type="text/css" media="screen,projection" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/layout.css" type="text/css" media="screen,projection" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/print.css" type="text/css" media="print" />
<meta name="viewport"  content="width=device-width, initial-scale=1.0, minimum-scale=0.5 maximum-scale=1.0" />
<script src="<?php echo $this->baseurl ?>/js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="<?php echo $this->baseurl ?>/js/slide.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/js/javascript.js"></script>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-15858964-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


 <link rel="stylesheet" href="<?php echo $this->baseurl ?>/css/stylenew.css" type="text/css" media="print" />



				
<?php
        $files = JHtml::_('stylesheet','templates/beez_20/css/general.css',null,false,true);
        if ($files):
                if (!is_array($files)):
                        $files = array($files);
                endif;
                foreach($files as $file):
?>
                <link rel="stylesheet" href="<?php echo $file;?>" type="text/css" />
<?php
                 endforeach;
        endif;
?>
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/<?php echo htmlspecialchars($color); ?>.css" type="text/css" />
<?php			if ($this->direction == 'rtl') : ?>
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/template_rtl.css" type="text/css" />
<?php				if (file_exists(JPATH_SITE . '/templates/beez_20/css/' . $color . '_rtl.css')) :?>
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/<?php echo $color ?>_rtl.css" type="text/css" />
<?php				endif; ?>
<?php			endif; ?>
                <!--[if lte IE 6]>
                <link href="<?php echo $this->baseurl ?>/templates/beez_20/css/ieonly.css" rel="stylesheet" type="text/css" />           
                <![endif]-->
            
		<!--[if IE 7]>
                        <link href="<?php echo $this->baseurl ?>/templates/beez_20/css/ie7only.css" rel="stylesheet" type="text/css" />
                <![endif]-->
                
		
		<?php if (ae_detect_ie()):
		?>
		<?php else: ?>
	        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/beez_20/javascript/hide.js"></script>
		<?php endif;  ?>
                
 
 
                <script type="text/javascript">
                        var big ='<?php echo (int)$this->params->get('wrapperLarge');?>%';
                        var small='<?php echo (int)$this->params->get('wrapperSmall'); ?>%';
                        var altopen='<?php echo JText::_('TPL_BEEZ2_ALTOPEN',true); ?>';
                        var altclose='<?php echo JText::_('TPL_BEEZ2_ALTCLOSE',true); ?>';
                        var bildauf='<?php echo $this->baseurl ?>/templates/beez_20/images/plus.png';
                        var bildzu='<?php echo $this->baseurl ?>/templates/beez_20/images/minus.png';
                        var rightopen='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTOPEN',true); ?>';
                        var rightclose='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTCLOSE'); ?>';
                        var fontSizeTitle='<?php echo JText::_('TPL_BEEZ2_FONTSIZE'); ?>';
                        var bigger='<?php echo JText::_('TPL_BEEZ2_BIGGER'); ?>';
                        var reset='<?php echo JText::_('TPL_BEEZ2_RESET'); ?>';
                        var smaller='<?php echo JText::_('TPL_BEEZ2_SMALLER'); ?>';
                        var biggerTitle='<?php echo JText::_('TPL_BEEZ2_INCREASE_SIZE'); ?>';
                        var resetTitle='<?php echo JText::_('TPL_BEEZ2_REVERT_STYLES_TO_DEFAULT'); ?>';
                        var smallerTitle='<?php echo JText::_('TPL_BEEZ2_DECREASE_SIZE'); ?>';
                </script>





<?php	$db = &JFactory::getDBO();            
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
					   $db->setQuery('SELECT cat.title, cat.id, cont.ordering, cont.title as conttitle, cat.parent_id FROM #__categories cat RIGHT JOIN #__content cont ON cat.id = cont.catid WHERE cont.id='.$id);
					   $rows = $db->loadObjectList();
															
					   foreach ( $rows as $row ){
						$category_title = $row->title;
						$category_id = $row->id;
						$ordering = $row->ordering;
						$cont_title = $row->conttitle;
						$parent_id = $row->parent_id;	
					   }									
						       
					       
					}
					?>
					



	   <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/beez_20/javascript/cesae.js"></script>
		
 	 <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/cesaecapas.css" type="text/css"   />
 
        </head>

       <body>

 <?php	$db = &JFactory::getDBO();            
				
			/* Trying to get CATEGORY title from DB */
			 $db->setQuery('SELECT cat.title, cat.id, cont.ordering, cont.title as conttitle, cat.parent_id FROM #__categories cat RIGHT JOIN #__content cont ON cat.id = cont.catid ');
					   $rows = $db->loadObjectList();
					foreach ( $rows as $row ){
				
				print_r(str_replace("&","&amp;",$row->title));
				print_r("<br/>");
				
				 
			}
			 
			
			?>



        </body>
</html>
