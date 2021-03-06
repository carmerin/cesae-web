<?php
function ae_detect_ie()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) &&     (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        return true;
    else
        return false;
}
function fechatranslate($fecha)
{
    return str_replace("December","Diciembre",str_replace("November","Noviembre",str_replace("October","Octubre",str_replace("September","Septiembre",str_replace("August","Agosto",str_replace("July","Julio",str_replace("June","Junio",str_replace("May","Mayo",str_replace("April","Abril",str_replace("March","Marzo",str_replace("February","Febrero",str_replace("January","Enero",$fecha))))))))))));
}
?>
<?php
$request_url = apache_getenv("HTTP_HOST") . apache_getenv("REQUEST_URI");
//echo $request_url;
//echo $id;
//exit();
if ($request_url == 'blog.cesae.es/index.php/' || $request_url == 'blog.cesae.es/index.php' || $request_url == 'blog.cesae.es/' || $request_url == 'blog.cesae.es' )
{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: http://www.cesae.es/blog-portada");
}
if ($request_url == 'www.cesae.es/blog' )
{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: http://www.cesae.es/blog-portada");
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
<!-- <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >  -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-ES" lang="es-ES" dir="<?php echo $this->direction; ?>" >
<head>

    <meta http-equiv="Cache-control" content="public">

    <script type="text/javascript">
//        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
//            alert('Si es un movil');
//            $('head').append('<meta name="viewport" content="initial-scale=1, maximum-scale=1">');
//        }else{
//            alert('No es un movil');
//            $('head').append('<meta name="viewport"  content="initial-scale=1.0; user-scalable=0; minimum-scale=1.0; maximum-scale=1.0" />');
//        }
    </script>

    <meta name="viewport" content="initial-scale=0.4, maximum-scale=1">
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=iso-8859-1">
    <meta name="google-site-verification" content="aDxl9069P2igDFaum6XsSd1Myc6K1uxolUa5I22oh7s" />
    <!-- Llamada a Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|Open+Sans:400italic,600italic,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/position.css" type="text/css" media="screen,projection" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/layout.css" type="text/css" media="screen,projection" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/print.css" type="text/css" media="print" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/css/stylenew.css" type="text/css" media="print" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/beez_20/css/cesaecapas.css" type="text/css"   />


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



    <jdoc:include type="head" />



    <?php
    if ($id=="" || $id=="0"  ):
        ?>

    <?php else: ?>

        <?php $db = &JFactory::getDBO();


        $pagename = '';
        $titlepage = '';
        /* Trying to get CATEGORY title from DB */
        $db->setQuery('SELECT con.title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE con.id ='.$id);
        $rows = $db->loadObjectList();
        //print_r($rows);
        $num_rows = count($rows);

        //print_r($num_rows);

        foreach ( $rows as $row ){
            //print_r('<link rel="canonical" href="http://www.cesae.es/index.php/');
// DEPRECATED			print_r('<link rel="canonical" href="http://www.cesae.es/');
            //print_r($row->catid);print_r('-');
            //print_r($row->aliascat);print_r('/');
            //print_r($row->id);print_r('-');
            print_r($row->alias);
            print_r('/"/>');

            //$pagename = 'http://www.cesae.es/index.php/'.$row->catid.'-'.$row->aliascat.'/'.$row->id.'-'.$row->alias.'/';
            $pagename = 'http://www.cesae.es/'.$row->alias;
            $titlepage = $row->title;
        }

        if(isset($_REQUEST['blog-buscador-inputform'])){
            $titlepage = "Másters y cursos de " . $_REQUEST['blog-buscador-inputform'];
            $title = "Másters y cursos de " . $_REQUEST['blog-buscador-inputform'];
            $nuevo_title = "Resultados de ".$search_query." - Blog CESAE";
        }

        ?>

    <?php	endif; ?>
   <!--      <script src="//code.jquery.com/jquery-1.7.2.js"></script>  -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
    <script src="<?php echo $this->baseurl ?>/js/slide.js" type="text/javascript"></script>
    <script src="<?php echo $this->baseurl ?>/js/jquery.ticker.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/js/javascript.js"></script>

    <?php if (ae_detect_ie()):
        ?>
    <?php else: ?>
<!--        <script type="text/javascript" src="--><?php //echo $this->baseurl ?><!--/templates/beez_20/javascript/hide.js"></script>-->
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

    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/beez_20/javascript/cesae.js"></script>
    <script>
        function buscarblogin(loc,elto)
        {
            //self.location.href=  "/blog?search=buscar&query1=" + elto.value;
            document.getElementById("frmblogbuscar").submit();
        }

    </script>
    <?php /*
    <!--Start of Zopim Live Chat Script-->
    <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
            d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
            _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
            $.src='//v2.zopim.com/?2IHUF7w4G96RX36f5bGjrSF1aPvGDwNP';z.t=+new Date;$.
                type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
    </script>
    <!--End of Zopim Live Chat Script-->
 */ ?>
</head>

<body>


<?php $sitemap = $_GET['sitemap'];
if ($sitemap=="ok"  ):
    ?>


    <?php	$db = &JFactory::getDBO();
    $date = date("Y-m-d");


    //	print "\n";
    print_r('<url>');
    //	print "\n";
    //print_r('<loc>http://www.cesae.es/index.php/</loc>');
    print_r('<loc>http://www.cesae.es/</loc>');
    //	print "\n";
    print_r('<lastmod>');
    print_r($date);
    print_r('T23:50:13Z</lastmod>');
    //	print "\n";
    print_r('<changefreq>daily</changefreq>');
    //	print "\n";
    print_r('<priority>0.9</priority>');
    //	print "\n";
    print_r('</url>');
    //	print "\n";
    print_r('<url>');
    //	print "\n";
    print_r('<loc>http://www.cesae.es/index.asp</loc>');
    //	print "\n";
    print_r('<lastmod>');
    print_r($date);
    print_r('T23:50:13Z</lastmod>');
    //	print "\n";
    print_r('<changefreq>daily</changefreq>');
    //	print "\n";
    print_r('<priority>0.9</priority>');
    //	print "\n";
    print_r('</url>');
    // Trying to get CATEGORY title from DB
    $db->setQuery('SELECT con.title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE  con.state=1  order by con.ordering');
    $rows = $db->loadObjectList();
    foreach ( $rows as $row ){
        //	print "\n";
        print_r('<url>');
        //	print "\n";
        //print_r('<loc>http://www.cesae.es/index.php/');
        print_r('<loc>http://www.cesae.es/');
        //print_r($row->catid);print_r('-');
        //print_r($row->aliascat);print_r('/');
        //print_r($row->id);print_r('-');
        print_r($row->alias);
        print_r('/</loc>');
        //	print "\n";
        print_r('<lastmod>');
        print_r($date);
        print_r('T22:17:05Z</lastmod>');
        //	print "\n";
        print_r('<changefreq>daily</changefreq>');
        //	print "\n";
        print_r('<priority>0.7</priority>');
        //	print "\n";
        print_r('</url>');



    }


    ?>

<?php else: ?>
<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
-->
<div id="contenedor">
<div id="cabecera">
    <div id="cabecera-logo">
        <?php $id = $_GET['id'];


        $db = &JFactory::getDBO();
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

        print_r('<!--  DATOS PAGE ');
        print_r('PARENT: ');
        print_r($parent_id);print_r('-');
        print_r('CATEGORY: ');print_r($category_id);print_r('-');
        print_r('ID: ');print_r($id);
        print_r(' --> ');

        //exit();

        if ($id=="" || $id=="0"  ):
            ?>
            <a href="http://www.cesae.es" title="CESAE Business Tourism School" id="LogoCesae" style="background-color:transparent;"><img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>"  title="CESAE Business Tourism School" alt="CESAE Business Tourism School" border="0" width="470px" height="19px"  /></a>
        <?php else: ?>
            <a href="http://www.cesae.es" title="CESAE Business Tourism School" id="LogoCesae" style="background-color:transparent;"><img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>"  title="CESAE Business Tourism School" alt="CESAE Business Tourism School" border="0" width="470px" height="19px"  /></a>
        <?php endif;?>
    </div>
    <div id="cabecera-botonera-bottom">
        <div id="cabecera-botonera-bottom-1">
            <a href="http://es-es.facebook.com/cesaeescueladenegocios" title="CESAE Facebook" target="_blank" ><img src="<?php echo $this->baseurl ?>/images/facebook.jpg" width="17" height="17" title="CESAE Facebook" alt="CESAE Facebook" border="0" onmouseover="Javascript:this.src='<?php echo $this->baseurl ?>/images/facebookon.jpg';" onmouseout="Javascript:this.src='<?php echo $this->baseurl ?>/images/facebook.jpg'"  ontouchstart="Javascript:this.src='<?php echo $this->baseurl ?>/images/facebookon.jpg';" ontouchend="Javascript:this.src='<?php echo $this->baseurl ?>/images/facebook.jpg'" /></a>
        </div>
        <div class="cabecera-botonera-bottom-espacio">
            &nbsp;
        </div>
        <div id="cabecera-botonera-bottom-2">
            <a href="https://twitter.com/#!/CesaeFormacion" title="CESAE Twitter" target="_blank" ><img src="<?php echo $this->baseurl ?>/images/twitter.jpg" title="CESAE Twitter" alt="CESAE Twitter" width="17" height="17" border="0" onmouseover="Javascript:this.src='<?php echo $this->baseurl ?>/images/twitteron.jpg';" onmouseout="Javascript:this.src='<?php echo $this->baseurl ?>/images/twitter.jpg'" ontouchstart="Javascript:this.src='<?php echo $this->baseurl ?>/images/twitteron.jpg';" ontouchend="Javascript:this.src='<?php echo $this->baseurl ?>/images/twitter.jpg'" /></a>
        </div>
        <div class="cabecera-botonera-bottom-espacio">
            &nbsp;
        </div>
        <div id="cabecera-botonera-bottom-3">
            <a href="https://plus.google.com/u/0/106405914977833716814/posts" title="CESAE Google+" target="_blank" ><img src="<?php echo $this->baseurl ?>/images/google.jpg" width="17" height="17" title="CESAE Google+"  alt="CESAE Google+"  border="0" onmouseover="Javascript:this.src='<?php echo $this->baseurl ?>/images/googleon.jpg';" onmouseout="Javascript:this.src='<?php echo $this->baseurl ?>/images/google.jpg'"  ontouchstart="Javascript:this.src='<?php echo $this->baseurl ?>/images/googleon.jpg';" ontouchend="Javascript:this.src='<?php echo $this->baseurl ?>/images/google.jpg'" /></a>

        </div>
        <div class="cabecera-botonera-bottom-espacio">
            &nbsp;
        </div>
        <div id="cabecera-botonera-bottom-4">
            <a href="http://www.youtube.com/user/CesaeFormacion" title="CESAE Youtube" target="_blank" ><img src="<?php echo $this->baseurl ?>/images/youtube.jpg" title="CESAE Youtube" alt="CESAE Youtube" width="17" height="17" border="0" onmouseover="Javascript:this.src='<?php echo $this->baseurl ?>/images/youtubeon.jpg';" onmouseout="Javascript:this.src='<?php echo $this->baseurl ?>/images/youtube.jpg'" ontouchstart="Javascript:this.src='<?php echo $this->baseurl ?>/images/youtubeon.jpg';" ontouchend="Javascript:this.src='<?php echo $this->baseurl ?>/images/youtube.jpg'" /></a>

        </div>
    </div>
    <?php if (($category_id=="" and $id>=50)  or ($category_id>=50 and $category_id<=57 ) ):  ?>
        <div id="cabecera-telefono-blog">
            <img src="<?php echo $this->baseurl ?>/images/top_tlf.jpg" alt="CESAE teléfono 912 977 166" title="CESAE teléfono 912 977 166"  width="140px" height="19px"  />


        </div>

        <div id="cabecera-barra1" >
            <img src="<?php echo $this->baseurl ?>/images/top_separador.jpg" alt="separador" width="6px" height="37px" />

        </div>
        <div id="cabecera-blog">
            <a href="http://www.cesae.es"    title="CESAE" ><img src="<?php echo $this->baseurl ?>/images/top_blog2.jpg" alt="CESAE" title="CESAE" border="0" onmouseover="Javascript:this.src='<?php echo $this->baseurl ?>/images/top_blog2.jpg';" onmouseout="Javascript:this.src='<?php echo $this->baseurl ?>/images/top_blog2.jpg'"  ontouchstart="Javascript:this.src='<?php echo $this->baseurl ?>/images/top_blog2.jpg';" ontouchend="Javascript:this.src='<?php echo $this->baseurl ?>/images/top_blog2.jpg'" /></a>
        </div>
        <div id="cabecera-barra2">
            <img src="<?php echo $this->baseurl ?>/images/top_separador.jpg" alt="separador"  width="6px" height="37px"  />

        </div>
    <?php else: ?>
        <!--    <a href="http://www.cesae.es/blog-portada"    title="BLOG CESAE" ><img src="<?php echo $this->baseurl ?>/images/top_blog.jpg" alt="BLOG CESAE" title="Blog CESAE" border="0" onmouseover="Javascript:this.src='<?php echo $this->baseurl ?>/images/top_blogon.jpg';" onmouseout="Javascript:this.src='<?php echo $this->baseurl ?>/images/top_blog.jpg'"  ontouchstart="Javascript:this.src='<?php echo $this->baseurl ?>/images/top_blogon.jpg';" ontouchend="Javascript:this.src='<?php echo $this->baseurl ?>/images/top_blog.jpg'" /></a>
			 -->

        <div id="cabecera-telefono">
            <img src="<?php echo $this->baseurl ?>/images/top_tlf.jpg" alt="CESAE teléfono 912 977 166" title="CESAE teléfono 912 977 166" width="140px" height="19px" />


        </div>
        <div id="cabecera-barra1" >
            <img src="<?php echo $this->baseurl ?>/images/top_separador.jpg" alt="separador"  width="6px" height="37px"   />

        </div>

    <?php endif;?>

    <div id="cabecera-botonera-top" style="display:none;">
        <div id="cabecera-botonera-top-1">
            <a href="http://www.cesae.es" title="CESAE Business Tourism School" ><b>ESPAÑOL</b></a>
        </div>
        <div id="cabecera-botonera-top-2">
            <img src="<?php echo $this->baseurl ?>/images/top_separador2.jpg" alt="separador"  width="4px" height="7px" />

        </div>
        <div id="cabecera-botonera-top-3">
            <a href="#" title="CESAE Business Tourism School ENGLISH version">ENGLISH</a>
        </div>
    </div>

</div>

<div id="pestanas">
<?php
if ($category_id=="2"  ):
?>
<div id="pestanas-1" class="pestanas-on"  onmouseover="JavaScript:markareac(1);" onmouseout="JavaScript:desmarkareac(1,'<?php echo $category_id ?>');"  ontouchstart="JavaScript:markareac(1);" ontouchend="JavaScript:desmarkareac(1,'<?php echo $category_id ?>');" style="width:195px !important;">
<?php else: ?>
<div id="pestanas-1" class="pestanas-off"  onmouseover="JavaScript:markareac(1);" onmouseout="JavaScript:desmarkareac(1,'<?php echo $category_id ?>');"  ontouchstart="JavaScript:markareac(1);" ontouchend="JavaScript:desmarkareac(1,'<?php echo $category_id ?>');" style="width:195px !important;">
    <?php endif;?>
    <a href="/businesstourismschool" title="CESAE Escuela de turismo y negocios"  >
        <!--
		<div id="pestanas-1-logo">
			<h2 class="menuenlaceh2"><img src='<?php echo $this->baseurl ?>/images/CESAEmenutexto.png' title="CESAE Business Tourism School" alt="CESAE Business Tourism School" border="0" /></h2>
		</div>
	-->
        <div id="pestanas-1-texto">
            <h2  class="menuenlaceh2"><img src="/images/icon-top-menu.png" style="margin-right:5px;">CESAE <span class="nobold">INSTITUCIÓN</span></h2>
        </div>
    </a>
</div>
<div class="pestanas-espacio">
    &nbsp;
</div>
<?php
if ($category_id=="7"  ):
?>
<div id="pestanas-2"  class="pestanas-on" onmouseover="JavaScript:markareac(2);" onmouseout="JavaScript:desmarkareac(2,'<?php echo $category_id ?>');"  ontouchstart="JavaScript:markareac(2);" ontouchend="JavaScript:desmarkareac(2,'<?php echo $category_id ?>');">
<?php else: ?>
<div id="pestanas-2"  class="pestanas-off" onmouseover="JavaScript:markareac(2);" onmouseout="JavaScript:desmarkareac(2,'<?php echo $category_id ?>');"  ontouchstart="JavaScript:markareac(2);" ontouchend="JavaScript:desmarkareac(2,'<?php echo $category_id ?>');">
    <?php endif;?>
    <a href="/masters-turismo-hosteleria" title="Máster en turismo, dirección hotelera y revenue management "  >
        <div id="pestanas-2-texto">
            <?php $id = $_GET['id'];
            if ($id=="" || $id=="0"  ):
                ?>
                <h2 class="h2home">MÁSTERS</h2>
            <?php else: ?>
                <h2 class="menuenlaceh2">MÁSTERS</h2>
            <?php endif;?>

        </div>
    </a>
</div>
<div class="pestanas-espacio">
    &nbsp;
</div>
<?php
if ($category_id=="73"  ):
?>
<div id="pestanas-3"  class="pestanas-on" onmouseover="JavaScript:markareac(3);" onmouseout="JavaScript:desmarkareac(3,'<?php echo $category_id ?>');"  ontouchstart="JavaScript:markareac(3);" ontouchend="JavaScript:desmarkareac(3,'<?php echo $category_id ?>');">
<?php else: ?>
<div id="pestanas-3"  class="pestanas-off" onmouseover="JavaScript:markareac(3);" onmouseout="JavaScript:desmarkareac(3,'<?php echo $category_id ?>');"  ontouchstart="JavaScript:markareac(3);" ontouchend="JavaScript:desmarkareac(3,'<?php echo $category_id ?>');">
    <?php endif;?>
    <a href="/programas-expertos" title="Programas y expertos en turismo, revenue management, hoteleria y hostelería " >
        <div id="pestanas-3-texto">
            <h2 class="menuenlaceh2">PROGRAMAS Y EXPERTOS</h2>
        </div>
    </a>
</div>
<div class="pestanas-espacio">
    &nbsp;
</div>
<?php
if ($category_id=="8"  ):
?>
<div id="pestanas-4"  class="pestanas-on" onmouseover="JavaScript:markareac(4);" onmouseout="JavaScript:desmarkareac(4,'<?php echo $category_id ?>');"  ontouchstart="JavaScript:markareac(4);" ontouchend="JavaScript:desmarkareac(4,'<?php echo $category_id ?>');">
<?php else: ?>
<div id="pestanas-4"  class="pestanas-off" onmouseover="JavaScript:markareac(4);" onmouseout="JavaScript:desmarkareac(4,'<?php echo $category_id ?>');"  ontouchstart="JavaScript:markareac(4);" ontouchend="JavaScript:desmarkareac(4,'<?php echo $category_id ?>');">
    <?php endif;?>
    <a href="/executiveeducation" title="Executive education en marketing hotelero y revenue management " >
        <div id="pestanas-4-texto">
            <h2 class="menuenlaceh2">EXECUTIVE EDUCATION</h2>
        </div>
    </a>
</div>
<div class="pestanas-espacio">
    &nbsp;
</div>
<?php
if ($category_id=="9"  ):
?>
<div id="pestanas-5" class="pestanas-on" onmouseover="JavaScript:markareac(5);" onmouseout="JavaScript:desmarkareac(5,'<?php echo $category_id ?>');"  ontouchstart="JavaScript:markareac(5);" ontouchend="JavaScript:desmarkareac(5,'<?php echo $category_id ?>');">
<?php else: ?>
<div id="pestanas-5" class="pestanas-off" onmouseover="JavaScript:markareac(5);" onmouseout="JavaScript:desmarkareac(5,'<?php echo $category_id ?>');"  ontouchstart="JavaScript:markareac(5);" ontouchend="JavaScript:desmarkareac(5,'<?php echo $category_id ?>');">
    <?php endif;?>
    <a href="/cursohotel" title="Cursos profesionales de turismo, hostelería, hotelería, gastronomía y restauración" >
        <div id="pestanas-5-texto">
            <?php $id = $_GET['id'];
            if ($id=="" || $id=="0"  ):
                ?>
                <h2 class="h2home">CURSOS PROFESIONALES</h2>
            <?php else: ?>
                <h2 class="menuenlaceh2">CURSOS PROFESIONALES</h2>
            <?php endif;?>
        </div>
    </a>

</div>
<div class="pestanas-espacio">
    &nbsp;
</div>
<?php /*
if ($category_id=="10"  ):
?>
<div id="pestanas-5" class="pestanas-on" onmouseover="JavaScript:markareac(5);" onmouseout="JavaScript:desmarkareac(5,'<?php echo $category_id ?>');"  ontouchstart="JavaScript:markareac(5);" ontouchend="JavaScript:desmarkareac(5,'<?php echo $category_id ?>');" style="width:195px !important;">
    <?php else: ?>
    <div id="pestanas-5" class="pestanas-off" onmouseover="JavaScript:markareac(5);" onmouseout="JavaScript:desmarkareac(5,'<?php echo $category_id ?>');"  ontouchstart="JavaScript:markareac(5);" ontouchend="JavaScript:desmarkareac(5,'<?php echo $category_id ?>');" style="width:195px !important;">
        <?php endif;?>
        <a href="/mediacampus" title="CESAE Media Campus" >
            <div id="pestanas-5-texto">
                <h2 class="menuenlaceh2">MEDIA CAMPUS</h2>
            </div>
        </a>
    </div>
</div>
 */?>
</div>
<div id="fotos">

<?php $id = $_GET['id'];
if ($id=="" || $id=="0"  ):
    ?>
    <!--	<img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_MDGH.jpg" title="MDGH Máster en Dirección y Gestión de Empresas Hoteleras"  alt="MDGH Máster en Dirección y Gestión de Empresas Hoteleras" width="980px" height="250px"   onclick="JavaScript:location.href='/masterdireccionygestionempresashoteleras'" style="opacity: 0.0;" />
						<img border="0" src="<?php echo $this->baseurl ?>/images/MDGH_Z_FT.jpg" title="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Zenit Full time"  alt="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Zenit Full time" width="980px" height="250px"   onclick="JavaScript:location.href='/mastergestionhotelera'" style="opacity: 0.0;" />
						<img border="0" src="<?php echo $this->baseurl ?>/images/MDGH_EX.jpg" title="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Executive"  alt="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Executive" width="980px" height="250px"   onclick="JavaScript:location.href='/masterdireccionygestionempresashoteleras'" style="opacity: 0.0;" />
						<img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_PDGH.jpg" title="PDGH Programa Superior en Dirección y Gestión Hotelera"  alt="PDGH Programa Superior en Dirección y Gestión Hotelera" width="980px" height="250px"  onclick="JavaScript:location.href='/programadireccionygestionhotelera'" style="opacity: 0.0;" />
						<img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_PDWS.jpg" title="PDWS Programa Superior en Dirección y Gestión Wellness y spa"  alt="PDWS Programa Superior en Dirección y Gestión Wellness y spa" width="980px" height="250px"  onclick="JavaScript:location.href='/programadireccionygestionwellnessyspa'" style="opacity: 0.0;" />
						<img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_Cursos.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial"  width="980px" height="250px"   onclick="JavaScript:location.href='/cursohotel'" style="opacity: 0.0;" />
						<img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_RedesSociales.jpg" title="CESAE Redes sociales" alt="CESAE Redes sociales" width="980px"  height="250px" onclick="JavaScript:location.href='/redessociales'" style="opacity: 0.0;" />
						<img border="0" sr0c="<?php echo $this->baseurl ?>/images/BANNER_Nebrija.jpg" title="Programas de Gestión Empresarial Nebrija Business School" alt="Programas de Gestión Empresarial Nebrija Business School" width="980px" height="250px" onclick="JavaScript:location.href='/programasgestionempresarial'" style="opacity: 0.0;"/>
						<img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_Institucion.jpg" title="CESAE Institución" alt="CESAE Institución" width="980px" height="250px" onclick="JavaScript:location.href='/institucion'"  style="opacity: 0.0;"/>
						<img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_CESAEBlog.jpg" title="CESAE BLOG" alt="CESAE BLOG"  width="980px" height="250px"  onclick="JavaScript:location.href='/blog-portada'" style="opacity: 0.0;" />
						<img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_Bienvenidos_2.jpg" title="CESAE Business Tourism School" alt="CESAE Business Tourism School" width="980px" height="250px" onclick="JavaScript:location.href='http://www.cesae.es'"  />
						-->

    <div  id="slide"  >
        <a href="#" title="CESAE MDGH PDGH Cursos Redes Sociales Nebrija Institución">
            <img border="0" src="<?php echo $this->baseurl ?>/images/Banner_AntiguosAlumnos.jpg" title="CESAE Opiniones antiguos alumnos"  alt="CESAE Opiniones antiguos alumnos" width="980px" height="250px"   onclick="JavaScript:location.href='/antiguosalumnos'" style="opacity: 0.0;" />
            <!--	<img border="0" src="<?php echo $this->baseurl ?>/images/MDGH_Z_FT.jpg" title="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Zenit Full time"  alt="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Zenit Full time" width="980px" height="250px"   onclick="JavaScript:location.href='/mastergestionhotelera'" style="opacity: 0.0;" />  -->
            <!--	<img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_PRMC.jpg" title="PRMC Programa Superior en Revenue Management y Comunicación Online 2.0"  alt="PRMC Programa Superior en Revenue Management y Comunicación Online 2.0" width="980px" height="250px"   onclick="JavaScript:location.href='/programa-superior-en-revenue-management-y-comunicacion-online-20-programa'" style="opacity: 0.0;" /> -->
            <!--	<img border="0" src="<?php echo $this->baseurl ?>/images/Banner-Accede.jpg" title="Títulos Universitarios"  alt="Títulos Universitarios" width="980px" height="250px"   onclick="JavaScript:location.href='/mastersyprogramassuperiores'" style="opacity: 0.0;" />   -->
            <img border="0" src="<?php echo $this->baseurl ?>/images/Banner_Accede_2014.jpg" title="Títulos Universitarios" alt="Títulos Universitarios" width="980px" height="250px" onclick="JavaScript:location.href='/masters-turismo-hosteleria'" style="opacity: 0.0;"/>
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_EDAT.jpg" title="EDAT Especialista Universitario en  Dirección de Alojamientos Hoteleros y Turísticos"  alt="EDAT Especialista Universitario en  Dirección de Alojamientos Hoteleros y Turísticos " width="980px" height="250px"   onclick="JavaScript:location.href='/especialistauniversitarioenrecepciondehoteles'" style="opacity: 0.0;" />
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_MDGH.jpg" title="MDGH Máster en Dirección y Gestión de Empresas Hoteleras"  alt="MDGH Máster en Dirección y Gestión de Empresas Hoteleras" width="980px" height="250px"   onclick="JavaScript:location.href='/masterdireccionygestionempresashoteleras'" style="opacity: 0.0;" />
            <img border="0" src="<?php echo $this->baseurl ?>/images/Banner_MRCT.jpg" title="MÁSTER EN REVENUE MANAGEMENT, MARKETING Y COMÚNICACIÓN TURÍSTICA (MRCT)"  alt="MÁSTER EN REVENUE MANAGEMENT, MARKETING Y COMÚNICACIÓN TURÍSTICA (MRCT)" width="980px" height="250px"   onclick="JavaScript:location.href='/masterdireccionygestionempresashoteleras'" style="opacity: 0.0;" />
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER-PDWS_2014_2.jpg" title="PDWS Programa Superior en Dirección y Gestión Wellness y spa"  alt="PDWS Programa Superior en Dirección y Gestión Wellness y spa" width="980px" height="250px"  onclick="JavaScript:location.href='/programadireccionygestionwellnessyspa'" style="opacity: 0.0;" />
            <!-- <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_Cursos.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial"  width="980px" height="250px"   onclick="JavaScript:location.href='/cursohotel'" style="opacity: 0.0;" />  -->
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_ERAT.jpg" title="ERAT Experto Universitario en  Recepción de Alojamientos Hoteleros y Turísticos"  alt="ERAT Experto Universitario en  Recepción de Alojamientos Hoteleros y Turísticos" width="980px" height="250px"   onclick="JavaScript:location.href='/expertouniversitarioenrecepciondehoteles'" style="opacity: 0.0;" />
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_Cursos_2014.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial"  width="980px" height="250px"   onclick="JavaScript:location.href='/cursohotel'" style="opacity: 0.0;" />
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_Bienvenidos_2.jpg" title="CESAE Business Tourism School" alt="CESAE Business Tourism School" width="980px" height="250px" onclick="JavaScript:location.href='http://www.cesae.es'"  />


        </a>
        <div id="texto_banner" class="texto_banner_home" style="z-index:20;">
            <h1 class="texto_banner_home_h1" >Escuela de formación en turismo, dirección y gestión hotelera</h1>
        </div>

    </div>
    <!-- AQUÍ VAN LAS IMAGENES -->

<?php elseif ($category_id>=50 and $category_id<=57 ) :  ?>  <!-- PORTADA BLOG -->
    <div  id="slide"  >
        <a href="#" title="CESAE MDGH PDGH Cursos Redes Sociales Nebrija Institución">
            <!-- <img border="0" src="<?php echo $this->baseurl ?>/images/MDGH_Z_FT.jpg" title="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Zenit Full time"  alt="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Zenit Full time" width="980px" height="250px"   onclick="JavaScript:location.href='/mastergestionhotelera'" style="opacity: 0.0;" /> -->
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_PRMC.jpg" title="PRMC Programa Superior en Revenue Management y Comunicación Online 2.0"  alt="PRMC Programa Superior en Revenue Management y Comunicación Online 2.0" width="980px" height="250px"   onclick="JavaScript:location.href='/programa-superior-en-revenue-management-y-comunicacion-online-20-programa'" style="opacity: 0.0;" />
            <img border="0" src="<?php echo $this->baseurl ?>/images/MDGH_EX.jpg" title="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Executive"  alt="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Executive" width="980px" height="250px"   onclick="JavaScript:location.href='/masterdireccionygestionempresashoteleras'" style="opacity: 0.0;" />
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER-PDGH_2014_2.jpg" title="PDGH Programa Superior en Dirección y Gestión Hotelera"  alt="PDGH Programa Superior en Dirección y Gestión Hotelera" width="980px" height="250px"  onclick="JavaScript:location.href='/programadireccionygestionhotelera'" style="opacity: 0.0;" />
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER-PDWS_2014_2.jpg" title="PDWS Programa Superior en Dirección y Gestión Wellness y spa"  alt="PDWS Programa Superior en Dirección y Gestión Wellness y spa" width="980px" height="250px"  onclick="JavaScript:location.href='/programadireccionygestionwellnessyspa'" style="opacity: 0.0;" />
            <!--<img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_Cursos.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial"  width="980px" height="250px"   onclick="JavaScript:location.href='/cursohotel'" style="opacity: 0.0;" /> -->
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_ERAT.jpg" title="ERAT Experto Universitario en  Recepción de Alojamientos Hoteleros y Turísticos"  alt="ERAT Experto Universitario en  Recepción de Alojamientos Hoteleros y Turísticos" width="980px" height="250px"   onclick="JavaScript:location.href='/expertouniversitarioenrecepciondehoteles'" style="opacity: 0.0;" />
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_Cursos_2014.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial"  width="980px" height="250px"   onclick="JavaScript:location.href='/cursohotel'" style="opacity: 0.0;" />
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_RedesSociales.jpg" title="CESAE Redes sociales" alt="CESAE Redes sociales" width="980px"  height="250px" onclick="JavaScript:location.href='/redessociales'" style="opacity: 0.0;" />
            <!-- <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_Nebrija.jpg" title="Programas de Gestión Empresarial Nebrija Business School" alt="Programas de Gestión Empresarial Nebrija Business School" width="980px" height="250px" onclick="JavaScript:location.href='/programasgestionempresarial'" style="opacity: 0.0;"/>  -->
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_Nebrija_2014.jpg" title="Programas de Gestión Empresarial Nebrija Business School" alt="Programas de Gestión Empresarial Nebrija Business School" width="980px" height="250px" onclick="JavaScript:location.href='/programasgestionempresarial'" style="opacity: 0.0;"/>
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_EDAT.jpg" title="EDAT Especialista Universitario en  Dirección de Alojamientos Hoteleros y Turísticos"  alt="EDAT Especialista Universitario en  Dirección de Alojamientos Hoteleros y Turísticos " width="980px" height="250px"   onclick="JavaScript:location.href='/especialistauniversitarioenrecepciondehoteles'" style="opacity: 0.0;" />
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_Institucion.jpg" title="CESAE Institución" alt="CESAE Institución" width="980px" height="250px" onclick="JavaScript:location.href='/institucion'"  style="opacity: 0.0;"/>
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_Bienvenidos.jpg" title="CESAE Business Tourism School" alt="CESAE Business Tourism School" width="980px" height="250px" onclick="JavaScript:location.href='http://www.cesae.es'" style="opacity: 0.0;" />
            <img border="0" src="<?php echo $this->baseurl ?>/images/BANNER_CESAEBlog.jpg" title="CESAE BLOG" alt="CESAE BLOG"  width="980px" height="250px"  onclick="JavaScript:location.href='/blog-portada'"  />
        </a>
    </div>

<?php else:  ?>

    <?php	$db = &JFactory::getDBO();

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

    <div >
        <?php

        if ($category_id=="2" || $parent_id=="2"  ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/BANNER_Institucion.jpg" title="CESAE Institución" alt="CESAE Institución"  width="980px" height="250px"   />
        <?php endif;?>

        <?php // 20140924 JORGE starts
        if ($category_id=="73"):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner_Accede_2014.jpg" title="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Executive" alt="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Executive" width="980px" height="250px"  />
        <?php endif;?>


        <?php
        if ($category_id=="12" ):
            ?>
            <!-- <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/BANNER_MDGH.jpg" title="MDGH Máster en Dirección y Gestión de Empresas Hoteleras" alt="MDGH Máster en Dirección y Gestión de Empresas Hoteleras" width="980px" height="250px"  /> -->
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/MDGH_EX.jpg" title="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Executive" alt="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Executive" width="980px" height="250px"  />
            <?php
            elseif ($category_id=="58" ):
            ?>
            <!-- <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/MDGH_Z_FT.jpg"  title="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Zenit Full time" alt="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Zenit Full time" width="980px" height="250px"  /> -->
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/BANNER_PRMC.jpg"  title="PRMC Programa Superior en Revenue Management y Comunicación Online 2.0" alt="PRMC Programa Superior en Revenue Management y Comunicación Online 2.0" width="980px" height="250px"  />
            <?php
            elseif ($category_id=="69" ):
            ?>
            <!-- <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/MDGH_Z_FT.jpg"  title="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Zenit Full time" alt="MDGH Máster en Dirección y Gestión de Empresas Hoteleras Zenit Full time" width="980px" height="250px"  /> -->
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/BANNER_PRMC.jpg"  title="PRMC Programa Superior en Revenue Management y Comunicación Online 2.0" alt="PRMC Programa Superior en Revenue Management y Comunicación Online 2.0" width="980px" height="250px"  />
            <?php
            elseif ($category_id=="92" ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner-Sumiller.jpg"  title="Cursos y másteres de sumillería y catas de vinos" alt="Cursos y másteres de sumillería y catas de vinos" width="980px" height="250px"  />
                <?php
            elseif ($category_id=="93" ):
                ?>
                <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner-Pasteleria.jpg"  title="Cursos y másteres de pastelería y repostería profesional" alt="Cursos y másteres de pastelería y repostería profesional" width="980px" height="250px"  />
            <?php
            elseif ($category_id=="94" ):
                ?>
                <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner-Cocina.jpg"  title="Experto Maitre" alt="Experto Maitre" width="980px" height="250px"  />
                <?php
            elseif ($category_id=="95" ):
                ?>
                <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner-Cocina.jpg"  title="Experto en Gastronomía (EGAS)" alt="Experto en Gastronomía (EGAS)" width="980px" height="250px"  />

        <?php
        elseif ($category_id=="13" ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/BANNER-PDGH_2014_2.jpg"  title="PDGH Programa Superior en Dirección y Gestión Hotelera" alt="PDGH Programa Superior en Dirección y Gestión Hotelera" width="980px" height="250px"  />
        <?php
        elseif ($category_id=="15" ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/BANNER-PDWS_2014_2.jpg"  title="PDWS Programa Superior en Dirección y Gestión Hotelera" alt="PDWS Programa Superior en Dirección y Gestión Hotelera" width="980px" height="250px"  />
        <?php
        elseif ($category_id=="14"  ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner-PDGR.jpg"  title="PDGR PROGRAMA SUPERIOR EN DIRECCIÓN Y GESTIÓN EN RESTAURACIÓN" alt="PDGR PROGRAMA SUPERIOR EN DIRECCIÓN Y GESTIÓN EN RESTAURACIÓN" width="980px" height="250px"  />
        <?php
        elseif ($parent_id=="7" && $category_id=="60"  ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner-MDET.jpg"  title="MDET Master en Dirección y Gestión de Empresas Turísticas" alt="MDET Master en Dirección y Gestión de Empresas Turísticas" width="980px" height="250px"  />
        <?php
        elseif ($category_id=="7" && $parent_id=="1"  ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner_Accede_2014.jpg"  title="CESAE Títulos Universitarios" alt="CESAE Títulos Universitarios" width="980px" height="250px"  />
        <?php
        elseif ($category_id=="8" && $parent_id=="1"  ):
            ?>
            <!--<img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner-Accede.jpg"  title="CESAE Títulos Universitarios" alt="CESAE Títulos Universitarios" width="980px" height="250px"  />  -->
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner_Accede_2014.jpg"  title="CESAE Títulos Universitarios" alt="CESAE Títulos Universitarios" width="980px" height="250px"  />
        <?php
        elseif ($category_id=="70"  ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/BANNER_ERAT.jpg"  title="ERAT Experto Universitario en  Recepción de Alojamientos Hoteleros y Turísticos" alt="ERAT Experto Universitario en  Recepción de Alojamientos Hoteleros y Turísticos" width="980px" height="250px"  />
        <?php
        elseif ($category_id=="71"  ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/BANNER_EDAT.jpg"  title="EDAT Especialista Universitario en  Dirección de Alojamientos Hoteleros y Turísticos" alt="EDAT Especialista Universitario en  Dirección de Alojamientos Hoteleros y Turísticos" width="980px" height="250px"  />
        <?php
        elseif ($category_id=="59" || $category_id=="69"):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner_MRCT.jpg"  title="MRCT Master en Revenue Management, Marketing y Comunicación Turística" alt="MRCT Master en Revenue Management, Marketing y Comunicación Turística" width="980px" height="250px"  />
        <?php
        elseif ($category_id=="8" ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/BANNER_PRMC.jpg"  title="PRMC Programa Superior en Revenue Management y Comunicación Online 2.0" alt="PRMC Programa Superior en Revenue Management y Comunicación Online 2.0" width="980px" height="250px"  />
        <?php endif;?>
        <?php
        if ($category_id=="9" || $category_id=="64" || $category_id=="68" || ($parent_id=="9"  && $category_id!="70"   && $category_id!="71") || $parent_id=="17"  || $parent_id=="18"  || $parent_id=="19"  || $parent_id=="20"  || $parent_id=="61"):
            ?>
            <!-- <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/BANNER_Cursos.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" width="980px" height="250px"  /> -->
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/BANNER_Cursos_2014.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" width="980px" height="250px"  />
        <?php endif;?>
        <?php
        if ($category_id=="10" || $parent_id=="10" ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/BANNER_RedesSociales.jpg" title="CESAE Redes sociales" alt="CESAE Redes sociales"  width="980px" height="250px"  />
        <?php endif;?>

        <?php
        //para mostrar las cabeceras de los cursos nuevos
        if ($category_id=="87"){
            echo '<img id="imagentop1" src="'.$this->baseurl .'/images/Banner-Cocina.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" width="980px" height="250px"  />';
        }elseif($category_id=="88"){
            echo '<img id="imagentop1" src="'.$this->baseurl .'/images/Banner-Pasteleria.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" width="980px" height="250px"  />';
        }elseif($category_id=="89"){
            echo '<img id="imagentop1" src="'.$this->baseurl .'/images/Banner-Sumiller.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" width="980px" height="250px"  />';
        }elseif($category_id=="91"){
            echo '<img id="imagentop1" src="'.$this->baseurl .'/images/Banner-Sumiller.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" width="980px" height="250px"  />';
        }
        ?>

        <?php
        if ($category_id=="48" ):
                ?>
        <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner_Accede_2014.jpg"  title="Taller de Social media y marketing hotelero" alt="Taller de Social media y marketing hotelero" width="980px" height="250px"  />
        <?php
        elseif ($category_id=="75"  ):
        ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner_Accede_2014.jpg"  title="Taller de upselling y crosselling" alt="Taller de upselling y crosselling" width="980px" height="250px"  />
            <?php
        elseif ($category_id=="76"  ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner_Accede_2014.jpg"  title="Taller de upselling y crosselling" alt="Taller de upselling y crosselling" width="980px" height="250px"  />
            <?php
        elseif ($category_id=="46"  ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner_Accede_2014.jpg"  title="Taller de técnicas aplicadas a la comunicación 3.0" alt="Taller de técnicas aplicadas a la comunicación 3.0" width="980px" height="250px"  />
            <?php
        elseif ($category_id=="47"  ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner_Accede_2014.jpg"  title="Taller de práctica operativa del Revenue management" alt="Taller de práctica operativa del Revenue management" width="980px" height="250px"  />

        <?php endif;?>

        <!--  Modificacion para crear nueva página de categorías globales -  Hecha por Netvision, Julio 2014-->
        <?php
        if ($id=="527" ){
            echo '<img id="imagentop1" src="'.$this->baseurl .'/images/Banner-Cocina.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" width="980px" height="250px"  />';
        ?>
            <div id="menunivel2">
                <div class="barra-superior" id="menunivel2-1-1col">&nbsp;</div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-3col">
                    <p class="h2interior" style="text-transform:uppercase;">Cursos y Másteres de alta cocina profesional y cocina de autor  en CESAE</p>
                </div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-1col">CESAE <span class="nobold">INFO</span></div>
            </div>
        <?php } ?>

        <?php
        if ($id=="741" ){
            echo '<img id="imagentop1" src="'.$this->baseurl .'/images/Banner-Pasteleria.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" width="980px" height="250px"  />';

            ?>
            <div id="menunivel2">
                <div class="barra-superior" id="menunivel2-1-1col">&nbsp;</div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-3col">
                    <p class="h2interior" style="text-transform:uppercase;">Cursos y Másteres de pastelería y respostería profesional en CESAE</p>
                </div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-1col">CESAE <span class="nobold">INFO</span></div>
            </div>
        <?php } ?>
        <?php
        if ($id=="742" ){
            echo '<img id="imagentop1" src="'.$this->baseurl .'/images/Banner-Sumiller.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" width="980px" height="250px"  />';

            ?>
            <div id="menunivel2">
                <div class="barra-superior" id="menunivel2-1-1col">&nbsp;</div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-3col">
                    <p class="h2interior" style="text-transform:uppercase;">Cursos y másteres  de sumillería y catas de vinos</p>
                </div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-1col">CESAE <span class="nobold">INFO</span></div>
            </div>
        <?php } ?>
        <?php
        if ($id=="743" ){
            echo '<img id="imagentop1" src="'.$this->baseurl .'/images/Banner-Direccion.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" width="980px" height="250px"  />';

            ?>
            <div id="menunivel2">
                <div class="barra-superior" id="menunivel2-1-1col">&nbsp;</div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-3col">
                    <p class="h2interior" style="text-transform:uppercase;">Cursos y másteres  de dirección y gestión de hoteles y negocios</p>
                </div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-1col">CESAE <span class="nobold">INFO</span></div>
            </div>
        <?php } ?>
        <?php
        if ($id=="744" ){
            echo '<img id="imagentop1" src="'.$this->baseurl .'/images/Banner-Restauracion.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" width="980px" height="250px"  />';

            ?>
            <div id="menunivel2">
                <div class="barra-superior" id="menunivel2-1-1col">&nbsp;</div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-3col">
                    <p class="h2interior" style="text-transform:uppercase;">Cursos y másteres  de gestión y marketing aplicados a la hostelería</p>
                </div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-1col">CESAE <span class="nobold">INFO</span></div>
            </div>
        <?php } ?>
        <?php
        if ($id=="745" ){
            echo '<img id="imagentop1" src="'.$this->baseurl .'/images/Banner-Revenue.jpg" title="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" alt="Cursos de Hotelería, Cursos de Restauración, Cursos de Wellness Spa, Programas de Gestión Empresarial" width="980px" height="250px"  />';

            ?>
            <div id="menunivel2">
                <div class="barra-superior" id="menunivel2-1-1col">&nbsp;</div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-3col">
                    <p class="h2interior" style="text-transform:uppercase;">Cursos y másteres  de expertos y especialistas en revenue management</p>
                </div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-1col">CESAE <span class="nobold">INFO</span></div>
            </div>
        <?php } ?>


        <?php  if ($id=="528" ):  ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/Banner_Accede_2014.jpg" title="Nuestras Universidades" alt="Nuestras Universidades" width="980px" height="250px"  />

            <div id="menunivel2">

                <div class="barra-superior" id="menunivel2-1-1col">CESAE INSTITUCIÓN</div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-3col">
                    <p class="h2interior" style="text-transform:uppercase;">Nuestras Universidades</p>
                </div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-1col">CESAE <span class="nobold">INFO</span></div>
            </div>
        <?php endif;?>

        <?php
        if ($id=="529" ):
            ?>
            <img id="imagentop1" src="<?php echo $this->baseurl ?>/images/BANNER_CESAEBlog.jpg" title="Resultados de la busqueda" alt="Resultados de la busqueda" width="980px" height="250px"  />

            <div id="menunivel2">

                <div class="barra-superior" id="menunivel2-1-1col">&nbsp;</div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-3col">
                    <p class="h2interior" style="text-transform:uppercase;">RESULTADOS DE BUSQUEDA DE <?php echo $_REQUEST['blog-buscador-inputform']; ?></p>
                </div>
                <div class="pestanas-espacio">&nbsp;</div>
                <div class="barra-superior" id="menunivel2-1-1col">CESAE <span class="nobold">INFO</span></div>
            </div>
        <?php endif;?>
        <!--  FIN Modificacion para crear nueva página de categorías globales y nuestras universidades -  Hecha por Netvision, Julio 2014-->
    </div>
<?php endif; ?>




</div>
<!-- SI ES HOME HAGO UN TRATAMIENTO. EN OTRO CASO PINTO EL CONTENIDO ESTANDAR DE OTRAS PÁGINAS -->

<?php $id = $_GET['id'];
if ($id=="" || $id=="0"  ):
?>
<div id="menuhome">
<div id="menuhome-1">

    <?php	$db = &JFactory::getDBO();

    /* Trying to get CATEGORY title from DB */
    //$db->setQuery('SELECT con.title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE con.catid = 2 and con.ordering>1 and con.state=1 order by cat.lft ');
    $db->setQuery('SELECT con.title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE con.catid = 2 and con.ordering>1 and con.state=1 order by con.ordering ');
    $rows = $db->loadObjectList();
    //print_r($rows);
    $num_rows = count($rows);
    //print_r($num_rows);

    foreach ( $rows as $row ){
//			print_r('<div class="menuhome-a"><img  src="');
//			print_r( $this->baseurl);
//			print_r('/images/bullet.jpg" alt="Elemento"  width="6px" height="6px"     /></div>');
        print_r('<div class="menuhome-b">');
        //print_r('<a href="index.php/');
        print_r('<a href="/');
        //print_r($row->catid);print_r('-');
        //print_r($row->aliascat);print_r('/');
        //print_r($row->id);print_r('-');
        print_r($row->alias);
        print_r('"  title="');
        print_r(str_replace("&"," ",$row->title));
        print_r('"   >');
        print_r('<h3 class="menuenlaceh3">');
        print_r(str_replace("&","&amp;",$row->title));
        print_r('</h3>');
        print_r('</a></div>');

    }


    ?>



</div>
<div class="pestanas-espacio">
    &nbsp;
</div>
<div id="menuhome-2">

    <?php	$db = &JFactory::getDBO();

    /* Trying to get CATEGORY title from DB */
    $db->setQuery('SELECT con.title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE cat.parent_id =7 and con.ordering=1 and con.state=1  and not con.id in (534)  order by cat.lft');    //EXCLUYO MDGH FULLTIME
    $rows = $db->loadObjectList();
    //print_r($rows);
    $num_rows = count($rows);
    //print_r($num_rows);

    foreach ( $rows as $row ){

//		if (ae_detect_ie())
//			print_r('<div class="menuhome-a" style="padding-left:2px;"><img  src="');
//		else
//			print_r('<div class="menuhome-a"><img  src="');
//
//			print_r( $this->baseurl);
//			print_r('/images/bullet.jpg" alt="Elemento"  width="6px" height="6px"   /></div>');


        if (ae_detect_ie())
            print_r('<div class="menuhome-b" style="width:158px;">');
        else
            print_r('<div class="menuhome-b">');


        //print_r('<a href="index.php/');
        print_r('<a href="/');

        //print_r($row->catid);print_r('-');
        //print_r($row->aliascat);print_r('/');
        //print_r($row->id);print_r('-');

        print_r($row->alias);
        print_r('"  title="');
        print_r(str_replace("&"," ",$row->title));
        print_r('"   >');
        print_r('<h3 class="menuenlaceh3">');
        print_r(str_replace("&","&amp;",$row->title));
        print_r('</h3>');
        print_r('</a></div>');

    }


    ?>


</div>
<div class="pestanas-espacio">
    &nbsp;
</div>
<div id="menuhome-3">
    <?php	$db = &JFactory::getDBO();

    /* Trying to get CATEGORY title from DB */
    //$db->setQuery('SELECT con.title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE con.catid =73 and con.ordering=1 and con.state=1  order by cat.lft');
    $db->setQuery('SELECT con.title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE cat.parent_id =73 and con.ordering=1 and con.state=1 order by cat.lft LIMIT 6');    //EXCLUYO MDGH FULLTIME
    $rows = $db->loadObjectList();
    //print_r($rows);
    $num_rows = count($rows);
    //print_r($num_rows);

    foreach ( $rows as $row ){
//			print_r('<div class="menuhome-a"><img  src="');
//			print_r( $this->baseurl);
//			print_r('/images/bullet.jpg" alt="Elemento" width="6px" height="6px"   /></div>');
        print_r('<div class="menuhome-b">');
        //print_r('<a href="index.php/');
        print_r('<a href="/');
        //print_r($row->catid);print_r('-');
        //print_r($row->aliascat);print_r('/');
        //print_r($row->id);print_r('-');
        print_r($row->alias);
        print_r('"  title="');
        print_r(str_replace("&"," ",$row->title));
        print_r('"  >');
        print_r('<h3 class="menuenlaceh3">');
        print_r(str_replace("&","&amp;",$row->title));
        print_r('</h3>');
        print_r('</a></div>');

    }


    ?>

</div>
<div class="pestanas-espacio">
    &nbsp;
</div>


<div id="menuhome-4">
    <?php	$db = &JFactory::getDBO();

    /* Trying to get CATEGORY title from DB */
//    $db->setQuery('SELECT con.title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE con.catid=9  and con.state=1 order by cat.lft');
    //$db->setQuery('SELECT * FROM #__content  WHERE catid=8 AND state=1 AND ordering!=1');
    $db->setQuery('SELECT con.title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE cat.parent_id =8 and con.ordering=1 and con.state=1 order by cat.lft');    //EXCLUYO MDGH FULLTIME

    $rows = $db->loadObjectList();
    //print_r($rows);
    $num_rows = count($rows);
    //print_r($num_rows);

    foreach ( $rows as $row ){
//			print_r('<div class="menuhome-a"><img  src="');
//			print_r( $this->baseurl);
//			print_r('/images/bullet.jpg"  alt="Elemento"  width="6px" height="6px"   /></div>');
        print_r('<div class="menuhome-b">');
        //print_r('<a href="index.php/');
        print_r('<a href="/');
        //print_r($row->catid);print_r('-');
        //print_r($row->aliascat);print_r('/');
        //print_r($row->id);print_r('-');
        print_r($row->alias);
        print_r('"  title="');
        print_r(str_replace("&"," ",$row->title));
        print_r('" >');
        print_r('<h3 class="menuenlaceh3">');
        print_r(str_replace("&","&amp;",$row->title));
        print_r('</h3>');
        print_r('</a></div>');

    }


    ?>

</div>
<div class="pestanas-espacio">
    &nbsp;
</div>
<div id="menuhome-5">


    <?php	$db = &JFactory::getDBO();

    /* Trying to get CATEGORY title from DB */
    $db->setQuery('SELECT con.title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE cat.parent_id =9 and con.ordering=1  and con.state=1  order by cat.lft');
    $rows = $db->loadObjectList();
    //print_r($rows);
    $num_rows = count($rows);
    //print_r($num_rows);

    foreach ( $rows as $row ){
//			print_r('<div class="menuhome-a"><img  src="');
//			print_r( $this->baseurl);
//			print_r('/images/bullet.jpg"  alt="Elemento"  width="6px" height="6px"   /></div>');
        print_r('<div class="menuhome-b">');
        //print_r('<a href="index.php/');
        print_r('<a href="/');
        //print_r($row->catid);print_r('-');
        //print_r($row->aliascat);print_r('/');
        //print_r($row->id);print_r('-');
        print_r($row->alias);
        print_r('"  title="');
        print_r(str_replace("&"," ",$row->title));
        print_r('" >');
        print_r('<h3 class="menuenlaceh3">');
        print_r(str_replace("&","&amp;",$row->title));
        print_r('</h3>');
        print_r('</a></div>');

    }


    ?>

    <?php if (ae_detect_ie()):	?>
    <div id="menuaccesocampus-top" style="width:172px">
        <?php else: ?>
        <div id="menuaccesocampus-top">

            <?php endif;  ?>

            <form id="frmAcceso" name="frmAcceso" action="http://www.cesae.campuslearning.es/index.asp" method="post" target="_blank" >

                <div id="menuaccesocampus-top-1">ACCESO <img src="/images/ico-cesae-logo.png" style="margin-bottom:-1px;"> CESAE <span class="nobold">CAMPUS</span></div>
                <div class="flecha_form" style="margin:5px 0 -10px -7px !important; padding:0 !important;"></div>
                <div id="menuaccesocampus-salto-1"></div>
                <span class="login">Acceso usuarios registrados | <a href="http://www.cesae.campuslearning.es/Index.asp" title="CESAE Campuslearning" target="_blank" class="enlace under">Registrar</a></span>
                <div id="menuaccesocampus-salto-2"></div>
                <div id="menuaccesocampus-top-7">
                    <input type="text" name="txtUsuario" class="inputhome" value="Usuario" onfocus="JavaScript:this.value=''"  onblur="JavaScript: if (this.value=='') this.value='Usuario';" />
                </div>
                <div id="menuaccesocampus-salto-2"></div>
                <div id="menuaccesocampus-top-8">
                    <input type="password" name="txtPassword" class="inputhome" value="*******" onfocus="JavaScript:this.value=''"  onblur="JavaScript: if (this.value=='') this.value='*******';" />
                </div>
                <div id="menuaccesocampus-salto-3"></div>

                <!--                       <div id="menuaccesocampus-top-9">-->
                <!--                        <div id="menuaccesocampus-top-9-into" >-->
                <a href="JavaScript:iracampus();" title="CESAE Campuslearning" id="enlacebotonmenu" class="homebutton" >INICIAR SESIÓN</a>
                <!--                        </div>-->
                <!--                    </div>-->
            </form>
        </div>
    </div>
    <div id="separador-home"></div>
</div>

<!-- Bloque nuevo de noticias de la HOME - Netvision.es 21/07/2014-->

<div class="agenda_home">

    <?php	$db = &JFactory::getDBO();

    /* Se obtienen los articulos marcados como ARTICULO_DESTACADO en el panel de administración del Joomla */
    $db->setQuery('SELECT con.* FROM #__content con WHERE con.articulo_destacado=1  and con.state=1  order by mask ASC limit 3');
    $rows = $db->loadObjectList();

    $counter_agenda=0;

    foreach( $rows as $row){
        $counter_agenda++;

        //revisamos si el enlace externo esta activado

        if(!empty($row->enlace_externo)){
            $enlace_agenda = $row->enlace_externo;
        }else{
            $enlace_agenda = $row->alias;
        }

        print_r('<div class="agenda_box" id="agenda');
        print_r($counter_agenda);
        print_r('" >');
        print_r('<a href="/');
        print_r($enlace_agenda);
        print_r('" title="');
        print_r(str_replace("&"," ",$row->title));
        print_r('" >');
        print_r('<h2>');
        print_r(str_replace("&","&amp;",$row->title));
        print_r('</h2>');
        print_r('</a>');
        if(!empty($row->subtitulo)){
            print_r('<h3>');
            print_r(str_replace("&","&amp;",$row->subtitulo));
            print_r('</h3>');
        }
        if(!empty($row->infotxt1)){
            print_r('<span class="text_agenda">');
            print_r(str_replace("&","&amp;",$row->infotxt1));
            print_r('</span>');
        }
        if(!empty($row->infotxt2)){
            print_r('<span class="text_agenda">');
            print_r(str_replace("&","&amp;",$row->infotxt2));
            print_r('</span>');
        }

        print_r('<div class="masinfo-contenedor">');
        print_r('<span class="masinfo">');

        print_r('<a href="/');
        print_r($enlace_agenda);
        print_r('" title="');
        print_r(str_replace("&"," ",$row->title));
        print_r('" >');
        print_r('+info</a></span></div>');



        print_r('</div>');
    }

    ?>
    <div class="clearfix"></div>
</div>
<!-- FIN Bloque nuevo de noticias de la HOME - Netvision.es 21/07/2014-->

<!-- Bloque nuevo de categorias de la HOME - Netvision.es 22/07/2014-->

<div class="categorias_home">
    <a href="/cursos-cocina">
        <div class="categorias_box" id="cocina">
            <div class="bot_categorias_home">Cocina</div>
        </div>
    </a>
    <a href="/cursos-pasteleria">
        <div class="categorias_box" id="pasteleria">
            <div class="bot_categorias_home">Pastelería</div>
        </div>
    </a>
    <a href="/cursos-sumilleria">
        <div class="categorias_box" id="sumilleria">
            <div class="bot_categorias_home">Sumillería y enología</div>
        </div>
    </a>
    <a href="/cursos-direccionygestion">
        <div class="categorias_box" id="gestion">
            <div class="bot_categorias_home">Dirección y gestión</div>
        </div>
    </a>
    <a href="/cursos-hosteleria">
        <div class="categorias_box" id="restauracion">
            <div class="bot_categorias_home">Restauración</div>
        </div>
    </a>
    <a href="/cursos-revenuemanagement">
        <div class="categorias_box" id="revenue">
            <div class="bot_categorias_home">Revenue Management</div>
        </div>
    </a>
</div>

<!-- FIN Bloque nuevo de categorias de la HOME - Netvision.es 22/07/2014-->

<!-- Bloque nuevo de universidades de la HOME - Netvision.es 22/07/2014-->
<div class="universidades_home">

    <div class="titulos_universitarios">
        <strong>Titulos Universitarios</strong>
        <div class="clearfix"></div>
        <img src="images/logo_univ_fco_vitoria.jpg" alt="Universidad Francisco de Vitoria" width="80" height="80">
        <img src="images/logo_univ_nebrija.jpg" alt="Universidad Nebrija" width="80" height="80">
        <img src="images/logo_univ_ucam.jpg" alt="Universidad Católica San Antonio" width="95" height="80">
    </div>

    <div class="colaboradores_home">
        <strong style="z-index:100 !important">Colaboradores</strong>
        <div id="ticker_logos">
            <ul>
                <li><img src="images/logos_colaboradores_01.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_02.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_03.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_04.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_05.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_06.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_07.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_08.gif" alt="Colaboradores"></li>
            </ul>
        </div>
    </div>
</div>
<!-- Bloque nuevo de universidades de la HOME - Netvision.es 22/07/2014-->



              <div id="pie">
                  <div id="pie-1">
                    <a href="http://www.cesae.es"  title="CESAE Escuela de Negocios" id="pie-1-enlace" >© CESAE Escuela de Negocios, <?php echo date('Y'); ?></a>
		          </div>
                  <div id="pie-2">
                     <a href="https://www.google.es/maps/place/Calle+Foronda,+4,+28034+Madrid/@40.4901725,-3.6877837,17z/data=!3m1!4b1!4m2!3m1!1s0xd422963fd0e17a9:0x4a166c9e191d7971" id="pie-2-enlace-1" title="CESAE Calle Foronda nº 4 - Bajo " target="_blank" >Calle Foronda nº 4 - Bajo </a>
                     |
                     <span id="pie-2-enlace-2"  >28034 Madrid</span>
                    |
                    <span id="pie-2-enlace-3">SPAIN</span>
                    |
                    <span id="pie-2-enlace-4">Tel: 912 977 166</span>
                    |
                    <span id="pie-2-enlace-5">Fax: 901 020 527</span>
                    |
                    <a href="mailto:info@cesae.es" id="pie-2-enlace-6" title="CESAE Mail info@cesae.es">info@cesae.es</a>
                    |
                    <a href="http://www.cesae.es" id="pie-2-enlace-7" title="CESAE Mail www.cesae.es">www.cesae.es</a>

                </div>
                 <div id="pie-3">
                    <span id="pie-3-enlace"><img src="images/cesaepie.png" title="CESAE Escuela de Negocios" alt="CESAE Escuela de Negocios" border="0" width="150px" height="6px" /></span>

                </div>
            </div>

<!--<div id="pie">-->
<!--    Calle Foronda, 4 bajo  |  28003 Madrid  |  SPAIN  |  Tel: 912 977 166  |  Fax: 901 020 527 | <a href="mailto:info@cesae.es" id="pie-2-enlace-6" title="CESAE Mail info@cesae.es">info@cesae.es</a> | <a href="http://www.cesae.es" id="pie-2-enlace-7" title="CESAE Mail www.cesae.es">www.cesae.es</a>-->
<!--</div>-->

<?php

// --------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------
// BLOG
// --------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------

elseif ($category_id>=50 and $category_id<=57 ):
    ?>

    <div id="menunivel2">
        <div class="pestanas-espacio">
            &nbsp;
        </div>
        <div id="menunivel2-blog-1" class="barra-superior">
            <a href="/blog/blog-portada" title="BLOG CESAE"  >
                <!--<div id="pestanas-blog-1-logo">
				<img src='<?php echo $this->baseurl ?>/images/CESAEmenutexto.png' title="CESAE Business Tourism School" alt="CESAE Business Tourism School" border="0" />
			</div>
			<div id="pestanas-blog-1-texto"> -->
                <div class="pestanas-blog-logo" style="color:#FFFFFF;font-size:11px;">
                    CESAE BLOG
                </div>
            </a>
        </div>
        <div class="pestanas-espacio">
            &nbsp;
        </div>
        <div id="menunivel2-blog-2" class="barra-superior">
            <!--
                <a href="/blog-cesaeescueladenegocios" title="CESAE ESCUELA DE NEGOCIOS">

                    <div class="pestanas-blog-texto">
                    CESAE ESCUELA DE NEGOCIOS
                    </div>

                </a>-->
        </div>
        <div class="pestanas-espacio">
            &nbsp;
        </div>
        <div id="menunivel2-blog-3" class="barra-superior">
            <a href="/blog/blog-calendariodecursos" title="CALENDARIO DE CURSOS">


                <div class="pestanas-blog-texto">
                    CALENDARIO DE CURSOS
                </div>
            </a>
        </div>
        <div class="pestanas-espacio">
            &nbsp;
        </div>
        <div id="menunivel2-blog-4" class="barra-superior">
            <div class="pestanas-blog-texto-busquedas">
                BUSQUEDAS
            </div>
        </div>
    </div>
    <div id="contenedor-blog">
    <div id="contenedor-blog-1">
    <?php if ($id=="246" )  :

        $db = &JFactory::getDBO();


        $mysearch=$_GET['search'];
        $mysearchquery1=$_GET['query1'];
        $mysearchquery2=$_GET['query2'];

        $mysearch='buscar';
        $mysearchquery1=$_GET['blog-buscador-inputform'];

        $nuevo_title = "Resultados de ".$mysearchquery1." - Blog CESAE";
        $pagetitle = "Resultados de ".$mysearchquery1." - Blog CESAE";
        $title = "Resultados de ".$mysearchquery1." - Blog CESAE";

        if ($mysearchquery1=='')
            $mysearch='';

        $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
        if ($mysearch=='')
        {
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and con.catid>50 and con.catid<=57  order by con.publish_up desc  LIMIT 2 ';
        }
        if ($mysearch=='mes')
        {
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y")  and con.catid>50 and con.catid<=57  and  DATE_FORMAT(con.publish_up,"%M") like "' . $mysearchquery1 .'" and DATE_FORMAT(con.publish_up,"%Y") like "' . $mysearchquery2 . '" order by con.publish_up desc ' ;

        }
        if ($mysearch=='ano')
        {
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=' . $mysearchquery1 . '  and con.catid>50 and con.catid<=57   order by con.publish_up desc ' ;

        }
        if ($mysearch=='categoria')
        {
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42  and  con.catid=' . $mysearchquery1 . '  and con.catid>50 and con.catid<=57  order by con.publish_up desc ' ;

        }
        if ($mysearch=='etiqueta')
        {
            $myquery= $myquery . ' WHERE con.state=1  and con.catid>50 and con.catid<=57 and usr.id<>42  and  (con.metakey like "' . $mysearchquery1 . '" or  con.metakey like "' . $mysearchquery1 . '%" or con.metakey like "%' . $mysearchquery1 . '"  or con.metakey like "%' . $mysearchquery1 . '%") order by con.publish_up desc ' ;

        }
        if ($mysearch=='autores')
        {
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42   and con.catid>50 and con.catid<=57  and con.created_by=' . $mysearchquery1 . ' order by con.publish_up desc  LIMIT 75 ' ;

        }
        if ($mysearch=='buscar')
        {
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42   and  con.catid>50 and con.catid<=57  and con.introtext like "' . $mysearchquery1 . '%" or  con.introtext like "%' . $mysearchquery1 . '%"  or  con.introtext like "%' . $mysearchquery1 . '" or con.title like   "%' . $mysearchquery1 . '%" or con.title like   "' . $mysearchquery1 . '%" or con.title like   "%' . $mysearchquery1 . '" order by con.publish_up desc ' ;

        }

        $noticia=0;
        $db->setQuery($myquery );
        $rows = $db->loadObjectList();
        $contadorscript=0;
        foreach ( $rows as $row )
        {
            $noticia=$noticia+1;
            //$pagename = 'http://www.cesae.es/index.php/'.$row->catid.'-'.$row->aliascat.'/'.$row->id.'-'.$row->alias.'/';
            $pagename = 'http://www.cesae.es/'.$row->alias;
            $titlepage = $row->title;


            $contadorscript=$contadorscript + 1;
            print_r('<div class="contenedor-blog-1-cat">');

            //print_r('<a href="index.php/');
            print_r('<a href="/blog/blog-portada/');
            //print_r($row->catid);print_r('-');
            //print_r($row->aliascat);
            //print_r($row->alias);
            print_r('?search=categoria&query1=' . $row->catid .  '"  title="');
            print_r(str_replace("&"," ",$row->cattitle));
            print_r('"  class="menuenlace" >');
            print_r(str_replace("&","&amp;",$row->cattitle));
            print_r('</a>');
            print_r('</div>');

            print_r('<div class="contenedor-blog-1-tit">');
            //print_r('<a href="index.php/');
            print_r('<a href="/blog/');
            //print_r($row->catid);print_r('-');
            //print_r($row->aliascat);print_r('/');
            //print_r($row->id);print_r('-');
            print_r($row->alias);
            print_r('"  title="');
            print_r(str_replace("&"," ",$row->title));
            print_r('"  class="menuenlace" >');
            print_r('<b>' . str_replace("&","&amp;",$row->title) . '</b>');
            print_r('</a>');
            print_r('</div>');

            print_r('<div class="contenedor-blog-1-aut">');
            print_r('<div class="contenedor-blog-1-aut-1"><img src="');
            print_r($this->baseurl);
            print_r('/images/ico-cesae-blog.jpg" title="Blog CESAE" alt="Blog CESAE" /></div>');
            print_r('<div class="contenedor-blog-1-aut-2"><div class="contenedor-blog-1-aut-2-1"><a href="/blog/blog-portada/?search=autores&query1=' . $row->created_by .'">' . str_replace("&","&amp;",$row->name) . '</a></div><div class="contenedor-blog-1-aut-2-2">' . fechatranslate($row->publish_upformat) . '</div></div>');
//					   print_r('<div class="contenedor-blog-1-aut-3">COMENTARIOS</div>');
//					   print_r('<div class="contenedor-blog-1-aut-4" style="background-image:url(');
//					   print_r($this->baseurl);
//					 //  print_r('/images/ico-comentarios-blog.jpg)"><div class="contenedor-blog-1-aut-4-2">' . str_replace("&","&amp;",$row->contadorcomments) .  '</div></div>');
//					   print_r('/images/ico-comentarios-blog.jpg)"><div class="contenedor-blog-1-aut-4-2"><fb:comments-count href='. $pagename .'></fb:comments-count></div></div>');
            print_r('</div>');


            if ($mysearch=='')
            {
                print_r('<div class="contenedor-blog-1-sep">');
                print_r('</div>');

                if ($noticia==1)
                {
                    print_r('<script type="text/javascript" >');
                    print_r('$.getScript("http://platform.linkedin.com/in.js?async=true", function(){ IN.init(); })');
                    print_r('</script>');
                }

                print_r('<div class="socialshare-blog" >');
                print_r('<div class="socialshare2-f">');
                print_r('<iframe src="http://www.facebook.com/plugins/like.php?app_id=&amp;href=' . $pagename  . '&amp;send=false&amp;layout=button_count&amp;width=584&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=25" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:584px; height:25px;" allowTransparency="true"></iframe>');
                print_r('</div>');
                print_r('<div class="socialshare2-t">');
                if ($noticia==1)
                    print_r('<a href="http://twitter.com/share" data-url="www.cesae.es" data-counturl="' . $pagename . '" data-text="' . $titlepage . '" class="twitter-share-button" data-count="horizontal" data-via=""></a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>');
                else
                    print_r('<a href="http://twitter.com/share" data-url="www.cesae.es" data-counturl="' . $pagename . '" data-text="' . $titlepage . '" class="twitter-share-button" data-count="horizontal" data-via=""></a>');
                print_r('</div>');
                print_r('<div class="socialshare2-g">');
                if ($noticia==1)
                    print_r('<g:plusone size="medium" href="' . $pagename .'" count="true"></g:plusone><script type="text/javascript">(function() {var po = document.createElement("script"); po.type = "text/javascript"; po.async = true; po.src = "https://apis.google.com/js/plusone.js"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s); })(); </script>');
                else
                    print_r('<g:plusone size="medium" href="' . $pagename .'" count="true"></g:plusone>');
                print_r('</div>');
                print_r('<div class="socialshare2-l">');
                print_r('<script type="in/share" data-url="' . $pagename . '" data-counter="right"></script>');
                print_r('</div>');
                print_r('</div>');
            }
            if ($mysearch<>'')
            {
                print_r('<div class="contenedor-blog-1-sep"></div>');
            }
            print_r('<div class="contenedor-blog-1-tex" style="font-size:12px !important; line-height:18px;">');


            //PORTADA DEL BLOG
            /*
            $partes = explode("FININTRO",$row->introtext);
            $count = count($partes);
            if ($count==1)
                $partes = explode("PORTADABLOG",$partes[0]);
            else
                $partes = explode("PORTADABLOG",$partes[1]);
            */
            $partes = explode("PORTADABLOG",str_replace("FININTRO"," ",$row->introtext));
            $count = count($partes);

//print_r($count . '---');

            $introtext = $row->introtext;
            $introtext = strip_tags($row->introtext);
            $introtext = substr($introtext, 0, 350);
            $introtext = trim($introtext, '"');

            if ($mysearch=='')
            {
                if ($count==1)
                    print_r($partes[0]);
                else
                    print_r('<p>');
                print_r($introtext);
                print_r('...');
                print_r('</p>');
            }
            else
            {


                if ($count==1)
                    //print_r('');
                    print_r($introtext);
                else
                    //print_r($partes[0]);
                    print_r('<p>');
                print_r($introtext);
                print_r('...');
                print_r('</p>');
            }

            print_r('</div>');

            //if ($mysearch<>'')
            //{

            print_r('<div class="contenedor-blog-1-sep-leermas">');
            //print_r('<a href="index.php/');
            print_r('<a href="/blog/');
            //print_r($row->catid);print_r('-');
            //print_r($row->aliascat);print_r('/');
            //print_r($row->id);print_r('-');
            print_r($row->alias);
            print_r('"  title="');
            print_r(str_replace("&"," ",$row->title));
            print_r('"  class="menuenlace" >');
            print_r('LEER MAS');
            print_r('</a>');
            print_r('</div>');
            //}
            print_r('<div class="contenedor-blog-1-sep2">');
            print_r('</div>');
        }


        echo "<script>$(document).attr('title', '".$nuevo_title."');</script>";
        ?>

    <?php elseif (($id=="367"   ) || ($id=="368"   ) || ($id=="369"   ) || ($id=="370"   ) || ($id=="371"   ) || ($id=="372"   ) || ($id=="373"   ) || ($id=="374"   ) || ($id=="375"   ) || ($id=="376"   ) || ($id=="377"   ) || ($id=="378"   ) || ($id=="379"   ) || ($id=="380"   ) || ($id=="381"   ) || ($id=="382"   ) || ($id=="383"   ) || ($id=="384"   ) || ($id=="385"   ) || ($id=="386"   ) || ($id=="387"   ) || ($id=="388"   ) || ($id=="389"   ) || ($id=="390"   ) || ($id=="391"   ) || ($id=="392"   )		|| ($id=="393"   )  || ($id=="394"   ) || ($id=="399"   ) || ($id=="503"   )  )  	:  ?>

        <?php $anoactual= date('Y');  ?>

        <?php if ($id=="367"   )  :  ?>

            <?php

            $mysearchquery1='51';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42  and  con.catid=' . $mysearchquery1 . '  and con.catid>50 and con.catid<=57  order by con.publish_up desc ' ;

            ?>



        <?php elseif ($id=="368"   )  :  ?>
            <?php

            $mysearchquery1='52';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42  and  con.catid=' . $mysearchquery1 . '  and con.catid>50 and con.catid<=57  order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="369"   )  :  ?>
            <?php

            $mysearchquery1='54';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42  and  con.catid=' . $mysearchquery1 . '  and con.catid>50 and con.catid<=57  order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="370"   )  :  ?>
            <?php

            $mysearchquery1='53';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42  and  con.catid=' . $mysearchquery1 . '  and con.catid>50 and con.catid<=57  order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="371"   )  :  ?>
            <?php

            $mysearchquery1='55';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42  and  con.catid=' . $mysearchquery1 . '  and con.catid>50 and con.catid<=57  order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="372"   )  :  ?>
            <?php

            $mysearchquery1='56';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42  and  con.catid=' . $mysearchquery1 . '  and con.catid>50 and con.catid<=57  order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="373"   )  :  ?>
            <?php

            $mysearchquery1='57';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42  and  con.catid=' . $mysearchquery1 . '  and con.catid>50 and con.catid<=57  order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="374"   )  :  ?>
            <?php

            $mysearchquery1='44';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42   and con.catid>50 and con.catid<=57  and con.created_by=' . $mysearchquery1 . ' order by con.publish_up desc  LIMIT 75 ' ;

            ?>
        <?php elseif ($id=="375"   )  :  ?>
            <?php

            $mysearchquery1='43';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42   and con.catid>50 and con.catid<=57  and con.created_by=' . $mysearchquery1 . ' order by con.publish_up desc  LIMIT 75 ' ;

            ?>
        <?php elseif ($id=="376"   )  :  ?>
            <?php

            $mysearchquery1='45';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42   and con.catid>50 and con.catid<=57  and con.created_by=' . $mysearchquery1 . ' order by con.publish_up desc  LIMIT 75 ' ;

            ?>
        <?php elseif ($id=="377"   )  :  ?>
            <?php

            $mysearchquery1='49';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42   and con.catid>50 and con.catid<=57  and con.created_by=' . $mysearchquery1 . ' order by con.publish_up desc  LIMIT 75 ' ;

            ?>
        <?php elseif ($id=="378"   )  :  ?>
            <?php

            $mysearchquery1='47';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42   and con.catid>50 and con.catid<=57  and con.created_by=' . $mysearchquery1 . ' order by con.publish_up desc  LIMIT 75 ' ;

            ?>
        <?php elseif ($id=="379"   )  :  ?>
            <?php

            $mysearchquery1='46';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42   and con.catid>50 and con.catid<=57  and con.created_by=' . $mysearchquery1 . ' order by con.publish_up desc  LIMIT 75 ' ;

            ?>
        <?php elseif ($id=="380"   )  :  ?>
            <?php

            $mysearchquery1='48';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42   and con.catid>50 and con.catid<=57  and con.created_by=' . $mysearchquery1 . ' order by con.publish_up desc  LIMIT 75 ' ;

            ?>
        <?php elseif ($id=="381"   )  :  ?>
            <?php

            $mysearchquery1='December';
            $mysearchquery2=$anoactual;
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y")  and con.catid>50 and con.catid<=57  and  DATE_FORMAT(con.publish_up,"%M") like "' . $mysearchquery1 .'" and DATE_FORMAT(con.publish_up,"%Y") like "' . $mysearchquery2 . '" order by con.publish_up desc ' ;

            ?>

        <?php elseif ($id=="382"   )  :  ?>
            <?php

            $mysearchquery1='November';
            $mysearchquery2=$anoactual;
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y")  and con.catid>50 and con.catid<=57  and  DATE_FORMAT(con.publish_up,"%M") like "' . $mysearchquery1 .'" and DATE_FORMAT(con.publish_up,"%Y") like "' . $mysearchquery2 . '" order by con.publish_up desc ' ;

            ?>

        <?php elseif ($id=="383"   )  :  ?>
            <?php

            $mysearchquery1='October';
            $mysearchquery2=$anoactual;
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y")  and con.catid>50 and con.catid<=57  and  DATE_FORMAT(con.publish_up,"%M") like "' . $mysearchquery1 .'" and DATE_FORMAT(con.publish_up,"%Y") like "' . $mysearchquery2 . '" order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="384"   )  :  ?>
            <?php

            $mysearchquery1='September';
            $mysearchquery2=$anoactual;
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y")  and con.catid>50 and con.catid<=57  and  DATE_FORMAT(con.publish_up,"%M") like "' . $mysearchquery1 .'" and DATE_FORMAT(con.publish_up,"%Y") like "' . $mysearchquery2 . '" order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="385"   )  :  ?>
            <?php

            $mysearchquery1='August';
            $mysearchquery2=$anoactual;
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y")  and con.catid>50 and con.catid<=57  and  DATE_FORMAT(con.publish_up,"%M") like "' . $mysearchquery1 .'" and DATE_FORMAT(con.publish_up,"%Y") like "' . $mysearchquery2 . '" order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="386"   )  :  ?>
            <?php

            $mysearchquery1='July';
            $mysearchquery2=$anoactual;
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y")  and con.catid>50 and con.catid<=57  and  DATE_FORMAT(con.publish_up,"%M") like "' . $mysearchquery1 .'" and DATE_FORMAT(con.publish_up,"%Y") like "' . $mysearchquery2 . '" order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="387"   )  :  ?>
            <?php

            $mysearchquery1='June';
            $mysearchquery2=$anoactual;
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y")  and con.catid>50 and con.catid<=57  and  DATE_FORMAT(con.publish_up,"%M") like "' . $mysearchquery1 .'" and DATE_FORMAT(con.publish_up,"%Y") like "' . $mysearchquery2 . '" order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="388"   )  :  ?>
            <?php

            $mysearchquery1='May';
            $mysearchquery2=$anoactual;
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y")  and con.catid>50 and con.catid<=57  and  DATE_FORMAT(con.publish_up,"%M") like "' . $mysearchquery1 .'" and DATE_FORMAT(con.publish_up,"%Y") like "' . $mysearchquery2 . '" order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="389"   )  :  ?>
            <?php

            $mysearchquery1='April';
            $mysearchquery2=$anoactual;
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y")  and con.catid>50 and con.catid<=57  and  DATE_FORMAT(con.publish_up,"%M") like "' . $mysearchquery1 .'" and DATE_FORMAT(con.publish_up,"%Y") like "' . $mysearchquery2 . '" order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="390"   )  :  ?>
            <?php

            $mysearchquery1='March';
            $mysearchquery2=$anoactual;
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y")  and con.catid>50 and con.catid<=57  and  DATE_FORMAT(con.publish_up,"%M") like "' . $mysearchquery1 .'" and DATE_FORMAT(con.publish_up,"%Y") like "' . $mysearchquery2 . '" order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="391"   )  :  ?>
            <?php

            $mysearchquery1='February';
            $mysearchquery2=$anoactual;
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y")  and con.catid>50 and con.catid<=57  and  DATE_FORMAT(con.publish_up,"%M") like "' . $mysearchquery1 .'" and DATE_FORMAT(con.publish_up,"%Y") like "' . $mysearchquery2 . '" order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="392"   )  :  ?>
            <?php

            $mysearchquery1='January';
            $mysearchquery2=$anoactual;
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y")  and con.catid>50 and con.catid<=57  and  DATE_FORMAT(con.publish_up,"%M") like "' . $mysearchquery1 .'" and DATE_FORMAT(con.publish_up,"%Y") like "' . $mysearchquery2 . '" order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="393"   )  :  ?>
            <?php

            $mysearchquery1='2011';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=' . $mysearchquery1 . '  and con.catid>50 and con.catid<=57   order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="394"   )  :  ?>
            <?php

            $mysearchquery1='2010';
            $myquery='SELECT  con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=' . $mysearchquery1 . '  and con.catid>50 and con.catid<=57   order by con.publish_up desc  ' ;

            ?>
        <?php elseif ($id=="399"   )  :  ?>
            <?php

            $mysearchquery1='2012';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=' . $mysearchquery1 . '  and con.catid>50 and con.catid<=57   order by con.publish_up desc ' ;

            ?>
        <?php elseif ($id=="503"   )  :  ?>
            <?php

            $mysearchquery1='2013';
            $myquery='SELECT con.introtext, con.metadesc as introtextshort, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, usr.id as usrid,  (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments, con.created_by FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id ';
            $myquery= $myquery . ' WHERE con.state=1 and usr.id<>42 and DATE_FORMAT(con.publish_up,"%Y")=' . $mysearchquery1 . '  and con.catid>50 and con.catid<=57   order by con.publish_up desc ' ;

            ?>
        <?php endif;  ?>


        <?php	$db = &JFactory::getDBO();

        //echo($myquery);
        $db->setQuery($myquery );
        $rows = $db->loadObjectList();
        $contadorscript=0;
        foreach ( $rows as $row )
        {

            //	echo($row->alias);

            //$pagename = 'http://www.cesae.es/index.php/'.$row->catid.'-'.$row->aliascat.'/'.$row->id.'-'.$row->alias.'/';
            $pagename = 'http://www.cesae.es/blog/'.$row->alias;
            $titlepage = $row->title;


            $contadorscript=$contadorscript + 1;
            print_r('<div class="contenedor-blog-1-cat">');

            //print_r('<a href="index.php/');
            print_r('<a href="/blog/blog-portada/');
            //print_r($row->catid);print_r('-');
            //print_r($row->aliascat);
            //print_r($row->alias);
            print_r('?search=categoria&query1=' . $row->catid .  '"  title="');
            print_r(str_replace("&"," ",$row->cattitle));
            print_r('"  class="menuenlace" >');
            print_r(str_replace("&","&amp;",$row->cattitle));
            print_r('</a>');
            print_r('</div>');

            print_r('<div class="contenedor-blog-1-tit">');
            //print_r('<a href="index.php/');
            print_r('<a href="/blog/');
            //print_r($row->catid);print_r('-');
            //print_r($row->aliascat);print_r('/');
            //print_r($row->id);print_r('-');
            print_r($row->alias);
            print_r('"  title="');
            print_r(str_replace("&"," ",$row->title));
            print_r('"  class="menuenlace" >');
            print_r('<b>' . str_replace("&","&amp;",$row->title) . '</b>');
            print_r('</a>');
            print_r('</div>');

            print_r('<div class="contenedor-blog-1-aut">');
            print_r('<div class="contenedor-blog-1-aut-1"><img src="');
            print_r($this->baseurl);
            print_r('/images/ico-cesae-blog.jpg" title="Blog CESAE" alt="Blog CESAE" /></div>');
            print_r('<div class="contenedor-blog-1-aut-2"><div class="contenedor-blog-1-aut-2-1"><a href="/blog/blog-portada/?search=autores&query1=' . $row->created_by .'">' . str_replace("&","&amp;",$row->name) . '</a></div><div class="contenedor-blog-1-aut-2-2">' . fechatranslate($row->publish_upformat) . '</div></div>');
            print_r('<div class="contenedor-blog-1-aut-3">COMENTARIOS</div>');
            print_r('<div class="contenedor-blog-1-aut-4" style="background-image:url(');
            print_r($this->baseurl);
            //  print_r('/images/ico-comentarios-blog.jpg)"><div class="contenedor-blog-1-aut-4-2">' . str_replace("&","&amp;",$row->contadorcomments) .  '</div></div>');
            print_r('/images/ico-comentarios-blog.jpg)"><div class="contenedor-blog-1-aut-4-2"><fb:comments-count href='. $pagename .'></fb:comments-count></div></div>');
            print_r('</div>');

            // print_r('<div class="contenedor-blog-1-sep">');
            // print_r('</div>');

            /*
             print_r('<script type="text/javascript" >');
             print_r('$.getScript("http://platform.linkedin.com/in.js?async=true", function(){ IN.init(); })');
            print_r('</script>');

           print_r('<div class="socialshare-blog" >');
               print_r('<div class="socialshare2-f">');
                   print_r('<iframe src="http://www.facebook.com/plugins/like.php?app_id=&amp;href=' . $pagename  . '&amp;send=false&amp;layout=button_count&amp;width=584&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=25" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:584px; height:25px;" allowTransparency="true"></iframe>');
               print_r('</div>');
               print_r('<div class="socialshare2-t">');
                   print_r('<a href="http://twitter.com/share" data-url="www.cesae.es" data-counturl="' . $pagename . '" data-text="' . $titlepage . '" class="twitter-share-button" data-count="horizontal" data-via=""></a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>');
               print_r('</div>');
               print_r('<div class="socialshare2-g">');
                   print_r('<g:plusone size="medium" href="' . $pagename .'" count="true"></g:plusone><script type="text/javascript" id="script_' . $contadorscript . '">(function() {var po_' . $contadorscript . ' = document.createElement("script__' . $contadorscript . '"); po_' . $contadorscript . '.type = "text/javascript"; po_' . $contadorscript . '.async = true; po_' . $contadorscript . '.src = "https://apis.google.com/js/plusone.js"; var s_' . $contadorscript . ' = document.getElementById("script' . $contadorscript . '"); s_' . $contadorscript . '.parentNode.insertBefore(po_' . $contadorscript . ', s_' . $contadorscript . '); })(); </script>');
               print_r('</div>');
               print_r('<div class="socialshare2-l">');
               print_r('<script type="in/share" data-url="' . $pagename . '" data-counter="right"></script>');
               print_r('</div>');
           print_r('</div>');
            */

            print_r('<div class="contenedor-blog-1-tex"><br/>');

            //$partes = explode("FININTRO",$row->introtext);
            $partes = explode("FININTRO",str_replace("PORTADABLOG","",$row->introtext));

            $count = count($partes);

            //if ($mysearch=='')
            //{
            //	if ($count==1)
            //		print_r($partes[0]);
            //	else
            //		print_r($partes[1]);
            //}
            //else
            //{
            if ($count==1)
                print_r('');
            else
                print_r($partes[0]);
            //}

            print_r('</div>');

            print_r('<div class="contenedor-blog-1-sep-leermas">');
            //print_r('<a href="index.php/');
            print_r('<a href="/blog/');
            //print_r($row->catid);print_r('-');
            //print_r($row->aliascat);print_r('/');
            //print_r($row->id);print_r('-');
            print_r($row->alias);
            print_r('"  title="');
            print_r(str_replace("&"," ",$row->title));
            print_r('"  class="menuenlace" >');
            print_r('LEER MAS');
            print_r('</a>');
            print_r('</div>');

            print_r('<div class="contenedor-blog-1-sep2">');
            print_r('</div>');
        }

        //quit();


        ?>



    <?php elseif ($id=="365"  || $id=="366" )  :  ?>

        <div class="contenedor-blog-1-tex">
            <jdoc:include type="component"  />
        </div>

    <?php else:  ?>


        <?php	$db = &JFactory::getDBO();



        $db->setQuery('SELECT con.introtext, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name, con.created_by, con.metakey, (select count(1) from #__jcomments where object_id=' . $id . ') contadorcomments FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id WHERE con.id =' . $id );
        $rows = $db->loadObjectList();

        $categoriapost='';
        $etiquetaspost='';

        foreach ( $rows as $row ){

            $pagename = 'http://www.cesae.es/blog/'.$row->alias;
            $titlepage = $row->title;

            $vectoretiquetaspost= explode(",",$row->metakey);
            $etiquetaspost='';
            for($i = 0; $i < count($vectoretiquetaspost); $i++)
            {
                if ($i > 0)
                {
                    $etiquetaspost= $etiquetaspost . ', ';
                }

                $etiquetaspost= $etiquetaspost . '<a href="/blog/blog-portada/?search=etiqueta&query1=' . $vectoretiquetaspost[$i] .  '"  title="' . $vectoretiquetaspost[$i] . '"  class="menuenlace" >' . $vectoretiquetaspost[$i] . '</a>';

            }
            print_r('<div class="contenedor-blog-1-cat">');

            //print_r('<a href="index.php/');
            print_r('<a href="/blog/blog-portada/');
            //print_r($row->catid);print_r('-');
            //print_r($row->aliascat);
            //print_r($row->alias);
            print_r('?search=categoria&query1=' . $row->catid .  '"  title="');
            print_r(str_replace("&"," ",$row->cattitle));
            print_r('"  class="menuenlace" >');
            print_r(str_replace("&","&amp;",$row->cattitle));
            print_r('</a>');
            print_r('</div>');

            $categoriapost='<a href="/blog/blog-portada/?search=categoria&query1=' . $row->catid .  '"  title="' . str_replace("&"," ",$row->cattitle) . '"  class="menuenlace" >' . str_replace("&","&amp;",$row->cattitle) . '</a>';

            print_r('<div>');
            print_r('<h1 class="contenedor-blog-1-tit">' . str_replace("&","&amp;",$row->title) . '</h1>');
            print_r('</div>');

            print_r('<div class="contenedor-blog-1-aut">');
            print_r('<div class="contenedor-blog-1-aut-1"><img src="');
            print_r($this->baseurl);
            print_r('/images/ico-cesae-blog.jpg" title="Blog CESAE" alt="Blog CESAE" /></div>');
            print_r('<div class="contenedor-blog-1-aut-2"><div class="contenedor-blog-1-aut-2-1"><a href="/blog/blog-portada/?search=autores&query1=' . $row->created_by .'">' . str_replace("&","&amp;",$row->name) . '</a></div><div class="contenedor-blog-1-aut-2-2">' . fechatranslate($row->publish_upformat) . '</div></div>');
            print_r('<div class="contenedor-blog-1-aut-3">COMENTARIOS</div>');
            print_r('<div class="contenedor-blog-1-aut-4" style="background-image:url(');
            print_r($this->baseurl);
            //print_r('/images/ico-comentarios-blog.jpg)"><div class="contenedor-blog-1-aut-4-2">' . str_replace("&","&amp;",$row->contadorcomments) .  '</div></div>');
            print_r('/images/ico-comentarios-blog.jpg)"><div class="contenedor-blog-1-aut-4-2"><fb:comments-count href='. $pagename .'></fb:comments-count></div></div>');
            print_r('</div>');


        }

        ?>
        <div class="contenedor-blog-1-sep">
        </div>

        <script type="text/javascript" >
            $.getScript("http://platform.linkedin.com/in.js?async=true", function(){
                IN.init();
            });

        </script>
        <div class="socialshare-blog" >
            <div class="socialshare2-f">

                <iframe src="http://www.facebook.com/plugins/like.php?app_id=&amp;href=<?php 	print_r($pagename); ?>&amp;send=false&amp;layout=button_count&amp;width=584&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=25" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:584px; height:25px;" allowTransparency="true"></iframe>
            </div>
            <div class="socialshare2-t">
                <a href="http://twitter.com/share" data-url="www.cesae.es" data-counturl="<?php print_r($pagename); ?>" data-text="<?php print_r($titlepage); ?>" class="twitter-share-button" data-count="horizontal" data-via=""></a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
            </div>
            <div class="socialshare2-g">
                <g:plusone size="medium" href="<?php print_r($pagename); ?>" count="true"></g:plusone><script type="text/javascript" id="script1">(function() {var po = document.createElement("script"); po.type = "text/javascript"; po.async = true; po.src = "https://apis.google.com/js/plusone.js"; var s = document.getElementById("script1"); s.parentNode.insertBefore(po, s); })(); </script>
            </div>
            <div class="socialshare2-l">
                <script type="in/share" data-url="<?php print_r($pagename); ?>" data-counter="right"></script>
            </div>

        </div>

        <!--
		 <div class="contenedor-blog-etiquetassalto">
		 </div>
		 <div class="contenedor-blog-etiquetas">
			<div class="contenedor-blog-etiquetas-1">
				<img src="<?php echo $this->baseurl ?>/images/ico-folder-blog.jpg" border="0" title="Categoria del post" alt="Categoria del post" />
			</div>
			<div class="contenedor-blog-etiquetas-1">
				CATEGORÍA:
			</div>
			<div class="contenedor-blog-etiquetas-2">
				<?php
					print_r($categoriapost);

				?>
			</div>
		 </div>
		 <div class="contenedor-blog-etiquetassalto2">
		 </div>
		 <div class="contenedor-blog-etiquetasfin">
			<div class="contenedor-blog-etiquetas-3">
				<img src="<?php echo $this->baseurl ?>/images/ico-blog-categoria.jpg" border="0" title="Etiquetas del post" alt="Etiquetas del post" />
			</div>
			<div class="contenedor-blog-etiquetas-1">
				ETIQUETAS:
			</div>
			<div class="contenedor-blog-etiquetas-2">
				<?php
					print_r($etiquetaspost);

				?>
			</div>
		 </div>
		  <div class="contenedor-blog-etiquetassalto">
		 </div>
			 -->
        <div class="contenedor-blog-1-tex">
            <jdoc:include type="component"  />
        </div>


        <div class="contenedor-blog-1-sep2"></div>
        <div class="blogcomentarios-header">Deja un comentario</div>
        <div class="contenedor-blog-etiquetassalto"></div>


        <?php

        print_r('<div class="fb-comments" data-href="'.$pagename.'" data-width="714" data-num-posts="10"></div>');
        ?>

        <div class="contenedor-blog-etiquetassalto">
        </div>
        <div class="contenedor-blog-etiquetas">
            <div class="contenedor-blog-etiquetas-1">
                <img src="<?php echo $this->baseurl ?>/images/ico-folder-blog.jpg" border="0" title="Categoria del post" alt="Categoria del post" />
            </div>
            <div class="contenedor-blog-etiquetas-1">
                CATEGORÍA:
            </div>
            <div class="contenedor-blog-etiquetas-2">
                <?php
                print_r($categoriapost);

                ?>
            </div>
        </div>
        <div class="contenedor-blog-etiquetassalto2">
        </div>
        <div class="contenedor-blog-etiquetasfin2">
            <div class="contenedor-blog-etiquetas-3">
                <img src="<?php echo $this->baseurl ?>/images/ico-blog-categoria.jpg" border="0" title="Etiquetas del post" alt="Etiquetas del post" />
            </div>
            <div class="contenedor-blog-etiquetas-1">
                ETIQUETAS:
            </div>
            <div class="contenedor-blog-etiquetas-2">
                <?php
                print_r($etiquetaspost);

                ?>
            </div>
        </div>
        <div class="contenedor-blog-etiquetassaltofin">
        </div>
    <?php endif;  ?>

    </div>
    <div id="contenedor-blog-2">
    <div class="contenedor-blog-2-caja-1-fixed">
        <div class="contenedor-blog-2-caja-1-fixed-1">
            <div class="blog-input-buscar-1" style="background:url(<?php echo $this->baseurl ?>/images/form-buscar-new.jpg) no-repeat right; margin-left:5px; margin-top:10px">
                <form name="frmblogbuscar" id="frmblogbuscar" method="get" action="/blog/blog-portada">
                    <!--					    <form name="frmblogbuscar" id="frmblogbuscar" method="get" action="/resultados">-->
                    <input type="text" class="blog-input-buscar-2" id="blog-buscador-inputform" name="blog-buscador-inputform" onfocus="JavaScript:this.value='';" onblur="JavaScript:buscarblogin('<?php echo $this->baseurl ?>',this);" value="Escribe aquí tu búsqueda" />
                </form>
            </div>
        </div>

    </div>
    <div class="contenedor-blog-2-caja-2 barra-superior">NEWSLETTER CESAE </div>
    <div class="contenedor-blog-2-caja-1-fixed" style="height:120px;">
        <div class="contenedor-blog-2-caja-1-fixed-1">
            <h4 style="width:100%; text-align:center !important; margin-bottom:5px;">SUSCRIBETE AQUI PARA RECIBIR LA NEWSLETTER DE CESAE</h4>
            <div class="flecha_form">
            </div>
            <div class="blog-input-buscar-1" style="background:url(<?php echo $this->baseurl ?>/images/form-newsletter-new.jpg) no-repeat right; margin-left:5px;">
                <form  id="form-newsletter" class="notext">
                    <input type="text"  name="email"  class="blog-input-buscar-2" id="blog-newsletter-inputform" value="Escribe aquí tu Email" onfocus="JavaScript:this.value='';" />
                    <input type="text"  name="nombre_principal" value=" "  class="blog-input-buscar-2"  style="display:none;" />
                    <input type="hidden" value="BlogDeCesae" name="uri"/>
                    <input type="hidden" name="loc" value="es_ES"/>
                    <input type="hidden" name="caso" value="alta_newsletter"/>
                    <input type="submit" value="" class="notext">
                </form>
            </div>
        </div>
        <script type="text/javascript">
            // jQuery(document).ready(function() {
            jQuery("#form-newsletter").submit(function(e){
                e.preventDefault();
                jQuery.ajax({
                    type: "POST",
                    url: "../newsletter-ajax-form.php",
                    data: jQuery(e.target).serialize(),
                    dataType: "html",
                    error: function(jqXHR,textStatus,errorThrown){
                        alert("No ha sido posible enviar el formulario por favor intentelo de nuevo.");

                    },
                    success: function(data,textStatus) {
                        alert("Alta OK");
                        window.location.href = "http://www.cesae.es/?SEND";
                    }
                });
                return false;
            });
            //});
        </script>
    </div>



    <div class="contenedor-blog-2-caja-2 barra-superior">AUTORES</div>
    <div class="contenedor-blog-2-caja-1" style="background-color: #f9f9f9 !important;">
        <div class="contenedor-blog-2-caja-1-inner">
            <ul class="ul_blog">
                <?php	$db = &JFactory::getDBO();

                /* Trying to get CATEGORY title from DB */
                //$db->setQuery('SELECT usr.id, usr.name, COUNT(1) contador FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id   WHERE con.state=1   and con.catid>50 and con.catid<=57 and usr.id<>42  group by usr.id, usr.name order by usr.name ');
                $db->setQuery('SELECT  con.title, con.id, con.alias, replace(replace(con.introtext,"<p>",""),"</p>","") as auxid,  tjoin.contador FROM  #__content con    left join (SELECT usr2.id, COUNT(1) as contador FROM  #__content con2    left join #__users usr2  on con2.created_by=usr2.id   WHERE con2.state=1   and con2.catid>50 and con2.catid<=57   group by usr2.id  ) tjoin on replace(replace(con.introtext,"<p>",""),"</p>","")=tjoin.id  WHERE con.state=1 and  con.id>=374 and con.id<=380   order by con.id ');
                $rows = $db->loadObjectList();
                //print_r($rows);
                $num_rows = count($rows);
                //print_r($num_rows);

                foreach ( $rows as $row ){

                    if ($row->contador<>'')
                    {
                        print_r('<li>');
                        //print_r('<a href="index.php/50-blogcesae/?search=autores&query1=' . $row->id );
                        print_r('<a href="/blog/' . $row->alias );
                        print_r('"  class="menuenlace" >');
                        print_r(str_replace("&","&amp;",$row->title));
                        print_r('</a><span class="blogcontadorgris">&nbsp;&nbsp;(');
                        print_r(str_replace("&","&amp;",$row->contador));
                        print_r(')</span></li>');
                    }
                }


                ?>
            </ul>
        </div>
    </div>
    <div class="contenedor-blog-2-caja-2 barra-superior">
        CATEGORIAS
    </div>
    <div class="contenedor-blog-2-caja-1" style="background-color: #f9f9f9 !important;">
        <div class="contenedor-blog-2-caja-1-inner">
            <ul class="ul_blog">
                <?php	$db = &JFactory::getDBO();

                //quit();
                /* Trying to get CATEGORY title from DB */
                //	$db->setQuery('SELECT  cat.id catid, cat.alias aliascat, cat.title, COUNT(1) contador FROM  #__content con left join   #__categories cat on con.catid=cat.id  WHERE con.state=1 and  DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y") and    con.catid >50 and con.catid<=57   group by  cat.id , cat.alias, cat.title  order by cat.title');
                //	$db->setQuery('SELECT  cat.id catid, cat.alias aliascat, cat.title, COUNT(1) contador FROM  #__content con left join   #__categories cat on con.catid=cat.id  WHERE con.state=1  and    con.catid >50 and con.catid<=57    group by  cat.id , cat.alias, cat.title  order by cat.title');
                $db->setQuery('SELECT  con.title, con.id, con.alias, replace(replace(con.introtext,"<p>",""),"</p>","") as auxid,  tjoin.contador FROM  #__content con    left join (SELECT  cat.id as id1 , COUNT(1) contador FROM  #__content con left join   #__categories cat on con.catid=cat.id  WHERE con.state=1  and    con.catid>50 and con.catid<=57   group by  cat.id ) tjoin on replace(replace(con.introtext,"<p>",""),"</p>","")=tjoin.id1  WHERE con.state=1 and  con.id>=367 and con.id<=373   order by con.id ');

                $rows = $db->loadObjectList();
                //print_r($rows);
                $num_rows = count($rows);
                //print_r($num_rows);

                foreach ( $rows as $row ){
                    print_r('<li>');
                    //print_r('<a href="index.php/50-blogcesae/?search=categoria&query1=' . $row->catid );
                    //print_r('<a href="/blog-portada/?search=categoria&query1=' . $row->catid );
                    print_r('<a href="/blog/' . $row->alias );
                    print_r('"  class="menuenlace" >');
                    print_r(str_replace("&","&amp;",$row->title));
                    print_r('</a><span class="blogcontadorgris">&nbsp;&nbsp;(');
                    print_r(str_replace("&","&amp;",$row->contador));
                    print_r(')</span></li>');

                }


                ?>
            </ul>
        </div>
    </div>

    <div class="contenedor-blog-2-caja-2 barra-superior">
        ARCHIVO
    </div>
    <div class="contenedor-blog-2-caja-1" style="background-color: #f9f9f9 !important;">
        <div class="contenedor-blog-2-caja-1-inner">
            <ul class="ul_blog">
                <?php	$db = &JFactory::getDBO();

                /* Trying to get CATEGORY title from DB */
                //$db->setQuery('SELECT DATE_FORMAT(con.publish_up,"%M") as mes, DATE_FORMAT(con.publish_up,"%Y") as ano, COUNT(1) contador FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id   WHERE con.state=1 and con.catid>50 and con.catid<=57  and usr.id<>42 and  DATE_FORMAT(con.publish_up,"%Y")=DATE_FORMAT(CURDATE(),"%Y") group by DATE_FORMAT(con.publish_up,"%M"),DATE_FORMAT(con.publish_up,"%Y")  order by DATE_FORMAT(con.publish_up,"%m") desc ');
                //$db->setQuery('SELECT  con.title, con.id, con.alias,replace(replace(con.introtext,"<p>",""),"</p>","") as auxid,  tjoin.contador FROM  #__content con    left join (SELECT  left(DATE_FORMAT(con.publish_up,"%M"),3) as id1 , DATE_FORMAT(con.publish_up,"%Y") as id2 , COUNT(1) contador FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id   WHERE con.state=1 and con.catid>50 and con.catid<=57  and usr.id<>42 group by  DATE_FORMAT(con.publish_up,"%M") , DATE_FORMAT(con.publish_up,"%Y")   ) tjoin on mid(replace(replace(con.introtext,"<p>",""),"</p>",""),1,4)=tjoin.id2 and mid(replace(replace(con.introtext,"<p>",""),"</p>",""),6,3)=tjoin.id1 WHERE con.state=1 and  con.id>=381 and con.id<=392   order by con.id ');

                $mes = date('m');
                //print_r($mes);
                //print_r('---');
                //print_r($anoactual);

                if (date('m')=='01'): $idsabuscar='392'; endif;
                if (date('m')=='02'): $idsabuscar='392,391'; endif;
                if (date('m')=='03'): $idsabuscar='392,391,390'; endif;
                if (date('m')=='04'): $idsabuscar='392,391,390,389'; endif;
                if (date('m')=='05'): $idsabuscar='392,391,390,389,388'; endif;
                if (date('m')=='06'): $idsabuscar='392,391,390,389,388,387'; endif;
                if (date('m')=='07'): $idsabuscar='392,391,390,389,388,387,386'; endif;
                if (date('m')=='08'): $idsabuscar='392,391,390,389,388,387,386,385'; endif;
                if (date('m')=='09'): $idsabuscar='392,391,390,389,388,387,386,385,384'; endif;
                if (date('m')=='10'): $idsabuscar='392,391,390,389,388,387,386,385,384,383'; endif;
                if (date('m')=='11'): $idsabuscar='392,391,390,389,388,387,386,385,384,383,382'; endif;
                if (date('m')=='12'): $idsabuscar='392,391,390,389,388,387,386,385,384,383,382,381'; endif;
                //print_r($idsabuscar);

                //	$db->setQuery('SELECT  con.title, con.id, con.alias,replace(replace(con.introtext,"<p>",""),"</p>","") as auxid,  tjoin.contador FROM  #__content con    left join (SELECT  left(DATE_FORMAT(con.publish_up,"%M"),3) as id1 , DATE_FORMAT(con.publish_up,"%Y") as id2 , COUNT(1) contador FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id   WHERE con.state=1 and con.catid>50 and con.catid<=57  and usr.id<>42 group by  DATE_FORMAT(con.publish_up,"%M") , DATE_FORMAT(con.publish_up,"%Y")   ) tjoin on mid(replace(replace(con.introtext,"<p>",""),"</p>",""),1,4)=tjoin.id2 and mid(replace(replace(con.introtext,"<p>",""),"</p>",""),6,3)=tjoin.id1 WHERE con.state=1 and  con.id in (' . $idsabuscar . ')   order by con.id ');
                $db->setQuery('SELECT  con.title, con.id, con.alias,replace(replace(con.introtext,"<p>",""),"</p>","") as auxid,  tjoin.contador FROM  #__content con    left join (SELECT  left(DATE_FORMAT(con.publish_up,"%M"),3) as id1 , DATE_FORMAT(con.publish_up,"%Y") as id2 , COUNT(1) contador FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id   WHERE DATE_FORMAT(con.publish_up,"%Y")='. date('Y') .' and con.state=1 and con.catid>50 and con.catid<=57  and usr.id<>42 group by  DATE_FORMAT(con.publish_up,"%M") , DATE_FORMAT(con.publish_up,"%Y")   ) tjoin on  mid(replace(replace(con.introtext,"<p>",""),"</p>",""),6,3)=tjoin.id1 WHERE con.state=1 and  con.id in (' . $idsabuscar . ')   order by con.id ');
                $rows = $db->loadObjectList();
                //print_r($rows);
                $num_rows = count($rows);
                //print_r($num_rows);

                foreach ( $rows as $row ){
                    print_r('<li>');
                    //print_r('<a href="index.php/50-blogcesae/?search=mes&query1=' .  $row->mes . '&query2=' .  $row->ano  . '" title="BLOG CESAE post fecha ' . fechatranslate(str_replace("&","&amp;",$row->mes)) . ' ' . str_replace("&","&amp;",$row->ano) . '" class="menuenlace">');
                    //print_r('<a href="/blog-portada/?search=mes&query1=' .  $row->mes . '&query2=' .  $row->ano  . '" title="BLOG CESAE post fecha ' . fechatranslate(str_replace("&","&amp;",$row->mes)) . ' ' . str_replace("&","&amp;",$row->ano) . '" class="menuenlace">');
                    print_r('<a href="/blog/' .  $row->alias  . '" title="BLOG CESAE post fecha ' . fechatranslate(str_replace("&","&amp;",$row->mes)) . ' ' . str_replace("&","&amp;",$row->ano) . '" class="menuenlace">');
                    print_r(fechatranslate(str_replace("&","&amp;",$row->title)) . ' ' . date('Y')  );
                    //print_r('&nbsp;');
                    //print_r(str_replace("&","&amp;",$row->ano));
                    print_r('</a><span class="blogcontadorgris">&nbsp;&nbsp;(');
                    print_r(str_replace("&","&amp;",$row->contador));
                    print_r(')</li>');

                }


                ?>
            </ul>

            <?php	$db = &JFactory::getDBO();

            /* Trying to get CATEGORY title from DB */
            //$db->setQuery('SELECT DATE_FORMAT(con.publish_up,"%Y") as ano, COUNT(1) contador FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id   WHERE con.state=1 and con.catid>50  and con.catid<=57   and usr.id<>42 and  DATE_FORMAT(con.publish_up,"%Y")<DATE_FORMAT(CURDATE(),"%Y") group by DATE_FORMAT(con.publish_up,"%Y") order by DATE_FORMAT(con.publish_up,"%Y") desc ');
            $db->setQuery('SELECT  con.title, con.id, con.alias,replace(replace(con.introtext,"<p>",""),"</p>","") as auxid,  tjoin.contador FROM  #__content con    left join (SELECT DATE_FORMAT(con.publish_up,"%Y") as id1, COUNT(1) contador FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id   WHERE con.state=1 and con.catid>50  and con.catid<=57   and usr.id<>42 and  DATE_FORMAT(con.publish_up,"%Y")<DATE_FORMAT(CURDATE(),"%Y") group by DATE_FORMAT(con.publish_up,"%Y")  ) tjoin on mid(replace(replace(con.introtext,"<p>",""),"</p>",""),1,4)=tjoin.id1  WHERE con.state=1 and  con.id in (393,394,399,503)   order by con.title desc ');

            $rows = $db->loadObjectList();
            //print_r($rows);
            $num_rows = count($rows);
            //print_r($num_rows);
            $hayarchivo=0;
            foreach ( $rows as $row ){
                if ($hayarchivo==0)
                {
                    $hayarchivo=1;
                    print_r('<br/>');
                    print_r('<div class="blog-separador-archivo"></div>');
                    print_r('<ul  class="ul_blog">');
                }
                print_r('<li>');
                //print_r('<a href="index.php/50-blogcesae/?search=ano&query1=' . $row->ano . '" title=title="BLOG CESAE post año ' . fechatranslate(str_replace("&","&amp;",$row->ano)) . '" class="menuenlace">Año ');
                //print_r('<a href="/blog-portada/?search=ano&query1=' . $row->ano . '" title=title="BLOG CESAE post año ' . fechatranslate(str_replace("&","&amp;",$row->ano)) . '" class="menuenlace">Año ');
                print_r('<a href="/blog/' . $row->alias . '" title=title="BLOG CESAE post año ' . fechatranslate(str_replace("&","&amp;",$row->ano)) . '" class="menuenlace">');
                //print_r(str_replace("&","&amp;",$row->ano));
                print_r(str_replace("&","&amp;",$row->title));
                print_r('</a><span class="blogcontadorgris">&nbsp;&nbsp;(');
                print_r(str_replace("&","&amp;",$row->contador));
                print_r(')</li>');

            }
            print_r('</ul>');

            ?>
        </div>
    </div>
    <div class="contenedor-blog-2-caja-2 barra-superior">ÚLTIMOS POSTS</div>
    <div class="contenedor-blog-2-caja-1" style="background-color: #f9f9f9 !important;">
        <div class="contenedor-blog-2-caja-1-inner">
            <ul class="ul_blog">
                <?php	$db = &JFactory::getDBO();


                /* Trying to get CATEGORY title from DB */
                $db->setQuery('SELECT  con.title,cat.id catid, cat.alias aliascat, con.id, con.alias, DATE_FORMAT(con.publish_up,"%d de %M de %Y") as publish_upformat  FROM  #__content con left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id   WHERE con.state=1 and usr.id<>42 and  con.catid>50 and con.catid<=57   order by con.publish_up desc  LIMIT 5 ');
                $rows = $db->loadObjectList();
                //print_r($rows);
                $num_rows = count($rows);
                //print_r($num_rows);

                foreach ( $rows as $row ){
                    print_r('<li class="li_ultimos_posts">');
                    //print_r('<a href="index.php/');
                    print_r('<a href="/blog/');
                    //print_r($row->catid);print_r('-');
                    //print_r($row->aliascat);print_r('/');
                    //print_r($row->id);print_r('-');
                    print_r($row->alias);
                    print_r('"  title="');
                    print_r(str_replace("&"," ",$row->title));
                    print_r('"  class="menuenlace" >');
                    print_r(str_replace("&","&amp;",$row->title));
                    print_r('</a>');

                    //print_r(' [' . fechatranslate($row->publish_upformat) . ']');
                    print_r('</li>');

                }


                ?>
            </ul>
        </div>
    </div>
    <!--
			 <div class="contenedor-blog-2-caja-2" style="background-image:url(<?php echo $this->baseurl ?>/images/btnlargogris.png)" >
				COMENTARIOS RECIENTES
			 </div>
			  <div class="contenedor-blog-2-caja-1">
				<div class="contenedor-blog-2-caja-1-inner">
				<ul>
				<?php	$db = &JFactory::getDBO();

				/* Trying to get CATEGORY title from DB */
			//	$db->setQuery('SELECT con.introtext, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(comm.date,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name,  left(comm.comment,50)  comment FROM  #__jcomments comm left join #__content con on comm.object_id=con.id left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id WHERE con.state=1   and usr.id<>42  and con.catid>50 and con.catid<=57   order by comm.date desc  LIMIT 5 ' );
				$db->setQuery('SELECT con.introtext, con.id,con.alias,con.title, con.publish_up,DATE_FORMAT(comm.date,"%d de %M de %Y") as publish_upformat,  con.introtext, con.ordering, cat.id catid, cat.alias aliascat, cat.title cattitle, usr.name,  left(comm.comment,50)  comment FROM  #__jcomments comm left join #__content con on comm.object_id=con.id left join   #__categories cat on con.catid=cat.id  left join #__users usr  on con.created_by=usr.id WHERE con.state=1   and usr.id<>42  and con.catid>50 and con.catid<=57  and 1=2 order by comm.date desc  LIMIT 5 ' );

				$rows = $db->loadObjectList();
				//print_r($rows);
				$num_rows = count($rows);
				//print_r($num_rows);

				foreach ( $rows as $row ){
					print_r('<li>');
					//print_r('<a href="index.php/');
					print_r('<a href="/blog/');
						//print_r($row->catid);print_r('-');
						//print_r($row->aliascat);print_r('/');
						//print_r($row->id);print_r('-');
						print_r($row->alias);
						print_r('"  title="');
						print_r(str_replace("&"," ",$row->title));
						print_r('"  class="menuenlace" >');
						print_r(str_replace("<br />","&nbsp;",str_replace("&","&amp;",$row->comment)));
						print_r('</a>');

						//print_r(' [' . fechatranslate($row->publish_upformat) . ']');
					print_r('</li>');

				}

				?>
				</ul>
				</div>
			 </div>
			  -->
    <div class="contenedor-blog-2-caja-2 barra-superior">
        CESAE EN FACEBOOK
    </div>
    <div class="contenedor-blog-2-caja-1-fixed">
        <div class="contenedor-blog-2-caja-1-inner-2" style="background-color: #f9f9f9 !important;">

            <iframe src="http://www.facebook.com/plugins/like.php?app_id=&amp;href=http://www.cesae.es&amp;send=false&amp;layout=button_count&amp;width=584&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=25" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:584px; height:25px;" allowTransparency="true"></iframe>
        </div>
    </div>
    <div class="contenedor-blog-2-caja-2 barra-superior">
        CESAE EN TWITTER
    </div>
    <div class="contenedor-blog-2-caja-1-fixed">
        <div class="contenedor-blog-2-caja-1-inner-2" style="background-color: #f9f9f9 !important;">

            <a href="http://twitter.com/share" data-url="http://www.cesae.es" data-counturl="http://www.cesae.es" data-text="CESAE" class="twitter-share-button" data-count="horizontal" data-via=""></a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        </div>
    </div>
    <div class="contenedor-blog-2-caja-2 barra-superior">
        OTRAS REDES SOCIALES
    </div>
    <div class="contenedor-blog-2-caja-1-fixed-last">
        <div class="contenedor-blog-2-caja-1-inner-2" style="background-color: #f9f9f9 !important;">

            <a href="https://plus.google.com/u/0/106405914977833716814/posts" target="_blank"><img src="<?php echo $this->baseurl ?>/images/ico-blog-google.jpg" border="0" title="CESAE Business Tourism School en Google" alt="CESAE Business Tourism School en Google" /></a>
            <a href="http://www.linkedin.com/company/cesae-escuela-de-negocios"  target="_blank"><img src="<?php echo $this->baseurl ?>/images/ico-blog-ln.jpg" border="0" title="CESAE Business Tourism School en Linkedin" alt="CESAE Business Tourism School en Linkedin"/></a>
            <a href="http://www.youtube.com/user/CesaeFormacion"  target="_blank"><img src="<?php echo $this->baseurl ?>/images/ico-blog-youtube.jpg" border="0" title="CESAE Business Tourism School en Youtube" alt="CESAE Business Tourism School en Youtube"/></a>
            <a href="http://www.flickr.com/photos/cesaeformacion/"  target="_blank"><img src="<?php echo $this->baseurl ?>/images/ico-blog-flick.jpg" border="0" title="CESAE Business Tourism School en Flickr" alt="CESAE Business Tourism School en Flickr"/></a>
            <a href="http://www.slideshare.net/cesaeformacion"  target="_blank"><img src="<?php echo $this->baseurl ?>/images/ico-blog-slide.jpg" border="0" title="CESAE Business Tourism School en Slideshare" alt="CESAE Business Tourism School en Slideshare"/></a>
        </div>
    </div>
    </div>
    </div>

    <!-- Bloque nuevo de categorias de la HOME - Netvision.es 22/07/2014-->

    <div class="categorias_home" style="border-top: #b4b1ad 2px solid; padding-top:2px; margin-top:4px;">
<!--        <a href="/directoriocategorias?cat=Cocina">-->
    <a href="/cursos-cocina">
        <div class="categorias_box" id="cocina">
            <div class="bot_categorias_home">Cocina</div>
        </div>
    </a>
    <a href="/cursos-pasteleria">
        <div class="categorias_box" id="pasteleria">
            <div class="bot_categorias_home">Pastelería</div>
        </div>
    </a>
    <a href="/cursos-sumilleria">
        <div class="categorias_box" id="sumilleria">
            <div class="bot_categorias_home">Sumillería y enología</div>
        </div>
    </a>
    <a href="/cursos-direccionygestion">
        <div class="categorias_box" id="gestion">
            <div class="bot_categorias_home">Dirección y gestión</div>
        </div>
    </a>
    <a href="/cursos-hosteleria">
        <div class="categorias_box" id="restauracion">
            <div class="bot_categorias_home">Restauración</div>
        </div>
    </a>
    <a href="/cursos-revenuemanagement">
        <div class="categorias_box" id="revenue">
            <div class="bot_categorias_home">Revenue Management</div>
        </div>
    </a>
    </div>

    <!-- FIN Bloque nuevo de categorias de la HOME - Netvision.es 22/07/2014-->

    <!-- Bloque nuevo de universidades de la HOME - Netvision.es 22/07/2014-->
    <div class="universidades_home">

            <div class="titulos_universitarios">
                <strong>Titulos Universitarios</strong>
                <div class="clearfix"></div>
                <img src="images/logo_univ_fco_vitoria.jpg" alt="Universidad Francisco de Vitoria" width="80" height="80">
                <img src="images/logo_univ_nebrija.jpg" alt="Universidad Nebrija" width="80" height="80">
                <img src="images/logo_univ_ucam.jpg" alt="Universidad Católica San Antonio" width="95" height="80">
            </div>

    <div class="colaboradores_home">
        <strong style="z-index:100 !important">Colaboradores</strong>
        <div class="clearfix"></div>

        <div id="ticker_logos">
            <ul>
                <li><img src="images/logos_colaboradores_01.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_02.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_03.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_04.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_05.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_06.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_07.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_08.gif" alt="Colaboradores"></li>
            </ul>
        </div>
    </div>
    </div>
    <!-- Bloque nuevo de universidades de la HOME - Netvision.es 22/07/2014-->
    	<div id="pie-blog">
                     <div id="pie-1">
                        <a href="http://www.cesae.es"  title="CESAE Escuela de Negocios" id="pie-1-enlace" >© CESAE Escuela de Negocios, <?php echo date('Y'); ?></a>
    		 </div>
                     <div id="pie-2">
                         <a href="https://www.google.es/maps/place/Calle+Foronda,+4,+28034+Madrid/@40.4901725,-3.6877837,17z/data=!3m1!4b1!4m2!3m1!1s0xd422963fd0e17a9:0x4a166c9e191d7971" id="pie-2-enlace-1" title="CESAE Calle Foronda nº 4 - Bajo " target="_blank" >Calle Foronda nº 4 - Bajo </a>
                         |
                         <span id="pie-2-enlace-2"  >28034 Madrid</span>
    		    |
    		    <span id="pie-2-enlace-3">SPAIN</span>
    		    |
    		    <span id="pie-2-enlace-4">Tel: 912 977 166</span>
    		    |
    		    <span id="pie-2-enlace-5">Fax: 901 020 527</span>
    		    |
    		    <a href="mailto:info@cesae.es" id="pie-2-enlace-6" title="CESAE Mail info@cesae.es">info@cesae.es</a>
    		    |
    		    <a href="http://www.cesae.es" id="pie-2-enlace-7" title="CESAE Mail www.cesae.es">www.cesae.es</a>

                    </div>
                     <div id="pie-3">
                        <span id="pie-3-enlace"><img src="images/cesaepie.png" title="CESAE Escuela de Negocios" alt="CESAE Escuela de Negocios" border="0"  width="150px" height="6px" /></span>

                    </div>
            </div>
<!--    <div id="pie-blog">-->
<!--        Calle Foronda, 4 bajo  |  28003 Madrid  |  SPAIN  |  Tel: 912 977 166  |  Fax: 901 020 527 | <a href="mailto:info@cesae.es" id="pie-2-enlace-6" title="CESAE Mail info@cesae.es">info@cesae.es</a> | <a href="http://www.cesae.es" id="pie-2-enlace-7" title="CESAE Mail www.cesae.es">www.cesae.es</a>-->
<!--    </div>-->

<?php else:  ?>

<div id="menunivel2">

    <?php $nombrepagina = ''; ?>
    <?php $nombrepaginaredessociales = ''; ?>


    <?php
    //echo($id);echo('-');echo($parent_id);echo('-');echo($ordering);


    if ($id==12  || $id==272  || $id==451  || $id==505  || $id==513  || $id==13  || $id==14  || $id==15  || $id==46 ||  $id==48  || $id==66 || $id==49 || $id==50 || $id==51 || $id==52 || $id==111  || $id==115  || $id==119  || $id==144  || $id==148  || $id==247 || $id==248 || $id==249  || $parent_id.'-'.$ordering == '17-1' || $parent_id.'-'.$ordering == '19-1' || $parent_id.'-'.$ordering == '61-1' || $parent_id.'-'.$ordering == '20-1' || $parent_id.'-'.$ordering == '9-1' ):?>


        <?php $nombrepaginaredessociales='ok';  ?>
    <?php endif;  ?>

    <?php if ($parent_id==1): ?>
        <?php if ( $ordering==1): ?>
            <?php
            if($id=="527" || $id=="741" || $id=="742" || $id=="743"  || $id=="744"  || $id=="745"){
                echo "";
            }else{
            ?>
            <div id="menunivel2-1-5col" class="barra-superior">
                <p class="h1interior"><?php echo strtr(strtoupper($category_title),"áéíóú","ÁÉÍÓÚ");  ?></p>
            </div>
            <?php } ?>
        <?php endif;  ?>
        <?php if ( $ordering>1): ?>


            <?php
            if($id=="527" || $id=="741" || $id=="742" || $id=="743"  || $id=="744"  || $id=="745"){
                echo "";
            }else{
            ?>
                <div id="menunivel2-1-1col" class="barra-superior">
                    <?php echo strtr(strtoupper($category_title),"áéíóú","ÁÉÍÓÚ");  ?>
                </div>
                <div class="pestanas-espacio">
                    &nbsp;
                </div>
                <div id="menunivel2-1-3col" class="barra-superior">
                    <p class="h2interior"><?php echo strtr(strtoupper($cont_title),"áéíóú","ÁÉÍÓÚ");  ?></p>
                </div>
                <div class="pestanas-espacio">
                    &nbsp;
                </div>
                <div id="menunivel2-1-1col" class="barra-superior">
                    CESAE <span class="nobold">INFO</span>
                </div>
            <?php } ?>


            <?php if ( $category_id==8): ?>
                <?php $nombrepagina = strtr(strtoupper($cont_title),"áéíóú","ÁÉÍÓÚ"); ?>
            <?php endif;  ?>

        <?php endif;  ?>


    <?php endif;  ?>
    <?php if ($parent_id>1): ?>
        <div id="menunivel2-1-1col" class="barra-superior">
            <?php
            $db3 = &JFactory::getDBO();

            $db3->setQuery('SELECT replace(cat.title,"MÁSTERS Y PROGRAMAS SUPERIORES","MÁSTERS Y PROGRAMAS") as title, cat.id  FROM #__categories cat  WHERE cat.id in (SELECT cat.parent_id  FROM #__categories cat  WHERE cat.id =' . $category_id . ')');
            $rows3 = $db->loadObjectList();
            foreach ( $rows3 as $row ){
                //print_r(strtoupper($row->title));
                print_r(strtr(strtoupper($row->title),"áéíóú","ÁÉÍÓÚ"));

                $catparent_id=$row->id;
            }
            ?>
        </div>
        <div class="pestanas-espacio">
            &nbsp;
        </div>
        <div id="menunivel2-1-3col" class="barra-superior">



            <p class="h2interior">
                <?php
                $db3 = &JFactory::getDBO();

                $db3->setQuery('SELECT cat.title  FROM #__categories cat  WHERE cat.id =' . $category_id . ' ');
                $rows3 = $db->loadObjectList();
                foreach ( $rows3 as $row ){
                    //print_r(strtoupper($row->title));
                    if ($id==249)  //MDET
                    {
                        print_r('MASTER EN TURISMO');
                    }
                    else
                    {
                        print_r(strtr(strtoupper($row->title),"áéíóú","ÁÉÍÓÚ"));
                    }
                    $nombrepagina = strtr(strtoupper($row->title),"áéíóú","ÁÉÍÓÚ");

                }

                ?>
            </p>
        </div>
        <div class="pestanas-espacio">
            &nbsp;
        </div>
        <div id="menunivel2-1-1col" class="barra-superior">


            <?php	$db = &JFactory::getDBO();
            $db2 = &JFactory::getDBO();

            $db2->setQuery('SELECT replace(con.title,"MÁSTERS Y PROGRAMAS SUPERIORES","MÁSTERS Y PROGRAMAS") as title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE cat.id =' . $catparent_id . ' and con.ordering=1  and con.state=1  order by con.ordering');
            $rows2 = $db->loadObjectList();
            $num_rows2 = count($rows2);
            foreach ( $rows2 as $row ){


                //print_r('<a href="index.php/');
                print_r('<a href="/');
                //print_r($row->catid);print_r('-');
                //print_r($row->aliascat);print_r('/');
                //print_r($row->id);print_r('-');
                print_r($row->alias);print_r('" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;"><b>CESAE</b> <span class="nobold">INFO</span>');
                // print_r('VER OTROS ');
                //setlocale(LC_CTYPE, "es_ES");print_r(strtoupper($row->title));
                //print_r(strtr(strtoupper($row->title),"áéíóú","ÁÉÍÓÚ"));
                //print_r(strtr(strtoupper($row->title),"áéíóú","ÁÉÍÓÚ"));
//					print_r('</b>');
                print_r('</a>');



            }

            ?>
        </div>

    <?php endif;  ?>


</div>
<div id="contenidonivel2" >
<div id="contenidonivel2-1">




    <?php	$db = &JFactory::getDBO();
    $db2 = &JFactory::getDBO();
    $db2->setQuery('SELECT con.title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE cat.parent_id =' . $category_id . ' and con.ordering=1  and con.state=1  order by cat.lft');
    $rows2 = $db->loadObjectList();
    $num_rows2 = count($rows2);
//    print_r($parent_id);
//    die();

    //print_r(' - '.$num_rows2);

    if ($num_rows2>0)
    {
        foreach ( $rows2 as $row ){



                if ($row->id==$id)
                    print_r('<div class="contenidonivel2-lateralizquierdo-on" >');
                else
                    print_r('<div class="contenidonivel2-lateralizquierdo-off">');

                if (($parent_id==1) and ( $ordering==1))
                    print_r('<h2 class="contenidonivel2-lateralizquierdo-boton" >');
                else
                    print_r('<h2 class="contenidonivel2-lateralizquierdo-boton-nopadding">');

                //print_r('<a href="index.php/');
                print_r('<a href="/');
                //print_r($row->catid);print_r('-');
                //print_r($row->aliascat);print_r('/');
                //print_r($row->id);print_r('-');
                print_r($row->alias);
                print_r('" title="');
                print_r($row->title);
                print_r('" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">');
                print_r($row->title);
                print_r('</a>');

                if (($parent_id==1) and ( $ordering==1))
                    print_r('</h2>');
                else
                    print_r('</h2>');

                print_r('</div>');

                print_r('<div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>');


        }
    }
    else
    {
        /* Trying to get CATEGORY title from DB */
        //$str = (string) $category_id;
        //echo 'SELECT con.title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE con.catid =' . $category_id . ' and con.ordering>1 order by con.ordering';
        $db->setQuery('SELECT con.title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE con.catid =' . $category_id . ' and con.ordering>1  and con.state=1  order by con.ordering');
        $rows = $db->loadObjectList();
        $num_rows = count($rows);
        //echo $num_rows;


        foreach ( $rows as $row ){

            //comprobamos los id para mostrar o no la barra lateral izquierda - Netvision Dic 2014
            if($id=="527" || $id=="741" || $id=="742" || $id=="743" || $id=="744" || $id=="745"){
                print_r ();
            }else{

                if ($row->id==$id)
                    print_r('<div class="contenidonivel2-lateralizquierdo-on" >');
                else
                    print_r('<div class="contenidonivel2-lateralizquierdo-off">');

                if (($parent_id==1) and ( $ordering==1))
                    print_r('<h2 class="contenidonivel2-lateralizquierdo-boton" >');
                else
                    print_r('<h2 class="contenidonivel2-lateralizquierdo-boton-nopadding" >');

                //print_r('<a href="index.php/');
                print_r('<a href="/');
                //print_r($row->catid);print_r('-');
                //print_r($row->aliascat);print_r('/');
                //print_r($row->id);print_r('-');


                // CASOS DE EXECUTIVE --- EXCEPCIONES
                if ($row->id==18)
                    print_r('practica-operativa-del-revenue-management-programa');
                elseif ($row->id==17)
                    print_r('tecnicas-para-maximizar-la-comunicacion-30-en-hoteles-objetivos'); 	//print_r('cursocomunicacion30enhoteles-programa');
                else
                    print_r($row->alias);

                print_r('" title="');
                print_r($row->title);
                print_r('" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;  text-decoration:none !important;">');
                print_r($row->title);
                print_r('</a>');

                if (($parent_id==1) and ( $ordering==1))
                    print_r('</h2>');
                else
                    print_r('</h2>');

                print_r('</div>');

                print_r('<div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>');
            }

        }
    }
    ?>

    <!-- Modificaciones hechas por Netvision - Diciembre 2014 Categorias Superiores en páginas individuales-->
    <?php
        if ($id=="527" ):
    ?>

            <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/master-cocina-profesional" title="Master en Cocina Profesional (MCOP)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Master en Cocina Profesional (MCOP)</a></h2></div>
            <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
            <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-experto-en-gastronomia" title="Experto en Gastronomía (EGAS)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Experto en Gastronomía (EGAS)</a></h2></div>
            <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
            <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-experto-en-maitre" title="Experto en Maitre" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Experto en Maitre</a></h2></div>
            <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="clearfix"></div>
    <?php endif;  ?>

    <?php
    if ($id=="741" ):
        ?>

        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/master-pasteleria-profesional" title="Máster en Repostería Profesional (MREP)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Máster en Repostería Profesional (MREP)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-experto-en-reposteria-profesional" title="Experto en Repostería Profesional (EREP)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Experto en Repostería Profesional (EREP)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="clearfix"></div>
    <?php endif;  ?>

    <?php if ($id=="742" ):  ?>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/master-maitre-sumiller-profesional" title="Máster en Maitre y Sumiller Profesional (MMSP)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Máster en Maitre y Sumiller Profesional (MMSP)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-experto-sumiller" title="Experto Sumiller" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Experto Sumiller</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-experto-personal-vino-para-bodega" title="Experto Personal de Vino para Bodegas" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Experto Personal de Vino para Bodegas</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="clearfix"></div>
    <?php endif;  ?>

    <?php if ($id=="743" ):  ?>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/master-direccion-gestion-hotelera" title="Máster en Dirección y Gestión de Empresas Hoteleras (MDGH)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Máster en Dirección y Gestión de Empresas Hoteleras (MDGH)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/master-en-turismo" title="Máster en Dirección y Gestión de Empresas Turísticas (MDET)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Máster en Dirección y Gestión de Empresas Turísticas (MDET)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/programadireccionygestionhotelera" title="Programa Superior en Dirección y Gestión de Empresas Hoteleras (PDGH)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Programa Superior en Dirección y Gestión de Empresas Hoteleras (PDGH)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/programadireccionygestionwellnessyspa" title="Programa Superior en Dirección y Gestión Wellness &amp; Spa (PDWS)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Programa Superior en Dirección y Gestión Wellness &amp; Spa (PDWS)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-experto-en-social-media-y-community-manager-en-turismo" title="Experto en Social Media y Community Manager en Turismo" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Experto en Social Media y Community Manager en Turismo</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-experto-universitario-recepcion-hoteles" title="Experto Universitario en Recepción de alojamientos Hoteleros y Turísticos (ERAT)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Experto Universitario en Recepción de alojamientos Hoteleros y Turísticos (ERAT)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-especialistauniversitarioendirecciondehoteles" title="Especialista Universitario en Dirección de Alojamientos Hoteleros (EDAT)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Especialista Universitario en Dirección de Alojamientos Hoteleros (EDAT)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/cursosdehoteleria" title="Cursos de Hostelería" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Cursos de Hostelería</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/cursoswellnesyspa" title="Cursos de Wellness &amp; Spa " class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Cursos de Wellness &amp; Spa </a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/cursosturismo" title="Cursos de Turismo " class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Cursos de Turismo </a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/programasgestionempresarial" title="Programas de Gestion Empresarial" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Programas de Gestion Empresarial</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="clearfix"></div>
    <?php endif;  ?>

    <?php if ($id=="744" ):  ?>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/programadireccionygestionrestauracion" title="Programa Superior en Dirección y Gestión en Restauración (PDGR)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Programa Superior en Dirección y Gestión en Restauración (PDGR)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-excelencia-seguridad-alimentaria-restauracion" title="Excelencia y Seguridad Alimentaria en Restauración" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Excelencia y Seguridad Alimentaria en Restauración</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-organizacion-direccion-planificacion-establecimiento-restauracion" title="Organización, Dirección y Planificación del Establecimiento de Restauración" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Organización, Dirección y Planificación del Establecimiento de Restauración</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-i-d-i-nuevas-tendencias-restauracion" title="I+d+i: Nuevas Tendencias en Restauración" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">I+d+i: Nuevas Tendencias en Restauración</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-gestion-operativa-interna-establecimiento-restauracion" title="Gestión Operativa Interna del Establecimiento de Restauración" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Gestión Operativa Interna del Establecimiento de Restauración</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="clearfix"></div>
    <?php endif;  ?>

    <?php if ($id=="745" ):  ?>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/masterrevenuemanagementmarketingycomunicacionturistica" title="Máster en Revenue Management, Marketing y Comunicación Turística (MRCT)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Máster en Revenue Management, Marketing y Comunicación Turística (MRCT)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/programa-superior-en-revenue-management-y-comunicacion-online-20" title="Programa Superior en Revenue Management y Comunicación online 2.0 (PRMC)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Programa Superior en Revenue Management y Comunicación online 2.0 (PRMC)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-experto-revenue-management-comunicacion-hotelera" title="Experto en Revenue Management y Comunicación Hotelera (ERCH)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Experto en Revenue Management y Comunicación Hotelera (ERCH)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/revenueavanzadoupsellingycrossselling" title="Revenue Management Avanzado: Rentabilidad Hotelera, Upselling y Cross selling (RMA)" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Revenue Management Avanzado: Rentabilidad Hotelera, Upselling y Cross selling (RMA)</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-de-revenue-management" title="Curso de Revenue Management" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Curso de Revenue Management</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/comunicaciononlineygestion20hotelera" title="Curso de Comunicación online y Gestión 2.0 Hotelera" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Curso de Comunicación online y Gestión 2.0 Hotelera</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/curso-de-gestion-comecial-y-revenue-management-en-restauracion" title="Gestión Comercial y Revenue Management en Restauración" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Gestión Comercial y Revenue Management en Restauración</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/practica-operativa-del-revenue-management" title="Práctica Operativa del Revenue Management" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Práctica Operativa del Revenue Management</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton"><a href="/tecnicas-para-maximizar-la-comunicacion-30-en-hoteles" title="Técnicas para Maximizar la Comunicación 3.0 en Hoteles" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;text-decoration:none !important;">Técnicas para Maximizar la Comunicación 3.0 en Hoteles</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>

        <div class="clearfix"></div>
    <?php endif;  ?>


    <?php //creamos la barra izquierda de la página de Nuestras Unioversidades - Netvision Julio 2014
    if($id==528){ ?>

        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton-nopadding"><a href="/programasgestionempresarial" title="Programas de la Universidad Francisco de Vitoria" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;  text-decoration:none !important;">Programas de la Universidad Francisco de Vitoria</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton-nopadding"><a href="/programasgestionempresarial" title="Programas de la Universidad Nebrija" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;  text-decoration:none !important;">Programas de la Universidad Nebrija</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
        <div class="contenidonivel2-lateralizquierdo-off"><h2 class="contenidonivel2-lateralizquierdo-boton-nopadding"><a href="/programasgestionempresarial" title="Programas de la Universidad Católica San Antonio" class="contenidonivel2-lateralizquierdo-boton" style="color:#FFFFFF;  text-decoration:none !important;">Programas de la Universidad Católica San Antonio</a></h2></div>
        <div class="contenidonivel2-lateralizquierdo-salto">&nbsp;</div>
    <?php  } ?>

    <div class="contenidonivel2-lateralizquierdo-anuncio">
        <!-- <div  id="slide"   > -->


            <?php if ($id=='1' || $id=='11' || $id=='34' || $id=='36' || $id=='27' || $id=='30' || $id=='35' || $id=='6' || $id=='4' || $id=='9' || $id=='12' || $id=='247' || $id=='248' || $id=='249' || $id=='13' || $id=='14' || $id=='15' || $id=='416' || $id=='442' || $id=='414' || $id=='17' || $id=='19' || $id=='22' || $id=='24' || $id=='270' || $id=='272' ) :  ?>
            <a href="/profesorado" title="CESAE Executive Education, Master Dirección y Gestión de Empresas, Programas Gestión Empresarial" >
                <img border="0" src="<?php echo $this->baseurl ?>/images/Microbanner_Profesores.jpg" title="CESAE Profesorado"  alt="CESAE Profesorado" width="194px"  style="display:block;" border="0"  />
            <?php elseif ($id=='25'  || $id=='123' || $id=='124' || $id=='125' || $id=='126' || $id=='127' || $id=='128' || $id=='129' || $id=='130' || $id=='131' || $id=='132' || $id=='133' || $id=='134' || $id=='136' || $id=='137' || $id=='138' || $id=='139' || $id=='140' || $id=='141' || $id=='142' || $id=='143'	 ):  ?>
            <a href="/programasgestionempresarial" title="CESAE Executive Education, Master Dirección y Gestión de Empresas, Programas Gestión Empresarial" >
                <img border="0"  src="<?php echo $this->baseurl ?>/images/Microbanner_Nebrija_1_old.png" title="Programas de Gestión Empresarial Nebrija Business School"  alt="Programas de Gestión Empresarial Nebrija Business School" width="194px"  style="display:block;" border="0"  />
            <?php else:  ?>
            <a href="/profesorado" title="CESAE Executive Education, Master Dirección y Gestión de Empresas, Programas Gestión Empresarial" >
                <img border="0" src="<?php echo $this->baseurl ?>/images/Microbanner_Profesores.jpg" title="CESAE Profesorado"  alt="CESAE Profesorado" width="194px"  style="display:block;" border="0"  />
            <?php endif;  ?>
        </a>
        <!--	</div>  -->
    </div>
</div>


<?php  if ($category_id=="2"  ): ?>

<div id="contenidonivel2-2"  style="min-height:628px;"  >

<?php elseif ($parent_id=="7"  ) :  ?>
<div id="contenidonivel2-2"  style="min-height:545px;"  >
<?php elseif ($parent_id=="9"  ) :  ?>
<div id="contenidonivel2-2"  style="min-height:545px;"  >

<?php elseif ($category_id=="9"  ) :  ?>
<div id="contenidonivel2-2"  style="min-height:550px;"  >

<?php elseif ($category_id=="10"  ) :  ?>
<div id="contenidonivel2-2"  style="min-height:430px;"  >

<?php else :  ?>
<div id="contenidonivel2-2"   >

<?php endif;  ?>
<!-- Modificaciones hechas por Netvision - Julio 2014-->
<?php
//if ($id=="527" || $id=="741" || $id=="742" || $id=="743" ):
//
//    $categoria_superior = $_REQUEST['cat'];
//
//    $db = &JFactory::getDBO();
//
//    /* Se obtienen los articulos marcados como ARTICULO_DESTACADO en el panel de administración del Joomla */
//    $db->setQuery('SELECT con.* FROM #__content con WHERE con.categoria_superior="'.$categoria_superior.'"  and con.state=1  order by id DESC');
//    $rows = $db->loadObjectList();
//
//    print_r('<ul class="categorias_ul">');
//
//    foreach( $rows as $row){
//
//        print_r('<li>');
//        print_r('<a href="/');
//        print_r($row->alias);
//        print_r('" >');
//        print_r('<h3 class="categorias_superiores">');
//        print_r(str_replace("&","&amp;",$row->title));
//        print_r('</h3>');
//        print_r('</a>');
//        print_r('</li>');
//
//
//    }
//    print_r('</ul>');
//
//     endif;  ?>

<?php
if ($id=="528" ):
    ?>

    <div class="socialshare1web" style="margin-bottom:20px; clear:left;"><strong style="text-transform:uppercase">nuestras universidades</strong></div>
    <p style="text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; color: #000000; font-family: Arial, Helvetica, sans; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"> </p>
    <p style="text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; color: #000000; font-family: Arial, Helvetica, sans; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"> </p>
    <div class="box_universidades"><img src="images/logo_univ_victoria_gde.jpg" border="0" alt="Universidad Victoria" />
        <p>Programas de la Universidad Francisco de Vitoria</p>
    </div>
    <div class="box_universidades"><img src="images/logo_univ_nebrija_gde.jpg" border="0" alt="Universidad Nebrija" />
        <p>Programas de la Universidad Nebrija</p>
    </div>
    <div class="box_universidades"><img src="images/logo_ucam_gde.jpg" border="0" alt="UCAM" />
        <p>Programas de la Universidad Católica San Antonio</p>
    </div>
    <br clear="all" /><br /><br /><br />


<?php endif;  ?>

<?php
if ($id=="529" ):
    ?>

    <div class="socialshare1web" style="margin-bottom:20px; clear:left;"><strong style="text-transform:uppercase">RESULTADOS DE LA BUSQUEDA DE  <?php echo $_REQUEST['blog-buscador-inputform']; ?></strong></div>

<?php

$search_query = $_REQUEST['blog-buscador-inputform'];

$nuevo_title = "Resultados de ".$search_query." - Blog CESAE";

//         echo $search_query;
//         die();

$db = &JFactory::getDBO();

/* Se obtienen los articulos marcados como ARTICULO_DESTACADO en el panel de administración del Joomla */
$db->setQuery('SELECT con.* FROM #__content con WHERE con.title LIKE "%'.$search_query.'%"  and con.state=1 and  con.catid>50 and con.catid<=57 OR con.introtext LIKE "%'.$search_query.'%"  and con.state=1 and  con.catid>50 and con.catid<=57 OR con.fulltext LIKE "%'.$search_query.'%"  and con.state=1 and  con.catid>50 and con.catid<=57 GROUP BY id order by id DESC');
$rows = $db->loadObjectList();

print_r('<ul class="categorias_ul">');

foreach( $rows as $row){

    $introtext = $row->introtext;
    $introtext = strip_tags($row->introtext);
    $introtext = substr($introtext, 0, 250);

    print_r('<li>');
    print_r('<a href="/');
    print_r($row->alias);
    print_r('" >');
    print_r('<h3 class="categorias_superiores">');
    print_r(str_replace("&","&amp;",$row->title));
    print_r('</h3>');
    print_r('</a>');
    print_r('<p>');
    print_r($introtext);
    print_r('...');
    print_r('<a href="/');
    print_r($row->alias);
    print_r('" >');
    print_r(' [ver más]');
    print_r('</a>');
    print_r('</p>');
    print_r('</li>');


}
print_r('</ul>');

?>
    <div class="clearfix"></div>
    <script>$(document).attr('title', '<?php echo $nuevo_title; ?>');</script>
<?php endif;  ?>
<!-- Fin Modificaciones hechas por Netvision - Julio 2014-->


<?php if ( $category_id=='67' ):  ?>
    <p class="titularantiguosalumnos">Nuestros antiguos alumnos son nuestra mejor carta de presentación.
        <br />Así opinan de nosotros:</p>


<?php else:  ?>


<?php if ( $nombrepagina<>'' ):  ?>



<?php if ( $nombrepaginaredessociales=='ok' ):  ?>
<div class="socialshareweb" >
    <?php endif;  ?>
    <?php if ( $nombrepaginaredessociales<>'ok' ):  ?>
    <div class="socialsharewebnosharing" >
        <?php endif;  ?>


        <?php if ( $nombrepaginaredessociales=='ok' ):  ?>

<!--            <div class="socialshare1web"><strong>--><?php //print_r($nombrepagina); ?><!--</strong></div>-->
            <div class="socialshare1webotros">

                <?php	$db = &JFactory::getDBO();
                $db2 = &JFactory::getDBO();

                $db2->setQuery('SELECT replace(con.title,"MÁSTERS Y PROGRAMAS SUPERIORES","MÁSTERS Y PROGRAMAS") as title, CAST(con.catid AS CHAR) as catid , CAST(con.id AS CHAR) as id , con.alias, cat.alias aliascat FROM #__content con left join #__categories cat on con.catid=cat.id WHERE cat.id =' . $catparent_id . ' and con.ordering=1  and con.state=1  order by con.ordering');
                $rows2 = $db->loadObjectList();
                $num_rows2 = count($rows2);
                foreach ( $rows2 as $row ){

                    print_r('<a href="/');
                    print_r($row->alias);print_r('" ><b>');
                    print_r('Ver otros ');print_r($row->title);
                    print_r('</b>');
                    print_r('</a>');


                }

                ?>

            </div>

            <?php

            /* Trying to get CATEGORY title from DB */
            $db->setQuery('SELECT cat.title, cat.id, cont.ordering, cont.title as conttitle, cont.alias, cat.parent_id FROM #__categories cat RIGHT JOIN #__content cont ON cat.id = cont.catid WHERE cont.id='.$id);
            $rows = $db->loadObjectList();

            foreach ( $rows as $row ){
                $alias = $row->alias;
                $nombrepaginaalias='http://www.cesae.es/'. $alias .'/';
            }
            ?>

<!--            <div class="socialshare2web">&nbsp;</div>-->
<!---->
<!--            <script type="text/javascript" >-->
<!--                $.getScript("http://platform.linkedin.com/in.js?async=true", function(){-->
<!--                    IN.init();-->
<!--                });-->
<!---->
<!--            </script>-->
<!--            <div class="socialshare2-f">-->
<!---->
<!--                <iframe src="http://www.facebook.com/plugins/like.php?app_id=&amp;href=--><?php //	print_r($nombrepaginaalias); ?><!--&amp;send=false&amp;layout=button_count&amp;width=584&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=25" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:584px; height:25px;" allowTransparency="true"></iframe>-->
<!--            </div>-->
<!--            <div class="socialshare2-t">-->
<!--                <a href="http://twitter.com/share" data-url="--><?php //print_r($nombrepaginaalias); ?><!--" data-counturl="--><?php //print_r($nombrepaginaalias); ?><!--" data-text="--><?php //print_r($titlepage); ?><!--" class="twitter-share-button" data-count="horizontal" data-via=""></a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>-->
<!--            </div>-->
<!--            <div class="socialshare2-g">-->
<!--                <g:plusone size="medium" href="--><?php //print_r($nombrepaginaalias); ?><!--" count="true"></g:plusone><script type="text/javascript">(function() {var po = document.createElement("script"); po.type = "text/javascript"; po.async = true; po.src = "https://apis.google.com/js/plusone.js"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s); })(); </script>-->
<!--            </div>-->
<!--            <div class="socialshare2-l">-->
<!--                <script type="in/share" data-url="--><?php //print_r($nombrepaginaalias); ?><!--" data-counter="right"></script>-->
<!--            </div>-->

        <?php endif;  ?>


    </div>
    <?php endif;  ?>



    <?php endif;  ?>


    <?php
    //echo($id);
    $videoyoutube='';
    $videoyoutube2='';
    if ($id=="272"  ) $videoyoutube2='//www.youtube.com/embed/Zya5SDJi3ak';
    if ($id=="12"  ) $videoyoutube='//www.youtube.com/embed/1lbyJ_qNSYA';
    if ($id=="247"  ) $videoyoutube='//www.youtube.com/embed/1lbyJ_qNSYA';
    if ($id=="248"  ) $videoyoutube='//www.youtube.com/embed/qzokDCVFftU';
    if ($id=="13"  ) $videoyoutube='//www.youtube.com/embed/yIKPFwdCKCo';
    if ($id=="15"  ) $videoyoutube='//www.youtube.com/embed/sQEdzFjD5cw';
    if ($id=="14"  ) $videoyoutube='//www.youtube.com/embed/EkB3anRyjfY';
    if ($videoyoutube<>''  ):
        ?>
        <div id="mapa">
            <div id="mapa1">&nbsp;</div>
            <div id="mapa2">
                <iframe width="560" height="315" src="<?php echo($videoyoutube); ?>" frameborder="0" allowfullscreen></iframe>
            </div>

        </div>
        <div style="height:20px"></div>
    <?php endif;?>
    <?php
    if ($videoyoutube2<>''  ):
        ?>
        <iframe width="560" height="315" src="<?php echo($videoyoutube2); ?>" frameborder="0" allowfullscreen></iframe>

    <?php endif;?>
    <div>
        <jdoc:include type="component"  />
    </div>


    <?php if ($category_id=="2"  ):?>
        <?php if ( $id=="10" ):?>
        <?php endif;?>
        <?php
        //if ($id=="6" or $id=="10" ):
        if ($id=="10" ):
            ?>
            <div id="mapa">
                <div id="mapa1">&nbsp;</div>
                <div id="mapa2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3034.3260527487705!2d-3.6877836999999998!3d40.49017250000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422963fd0e17a9%3A0x4a166c9e191d7971!2sCalle+Foronda%2C+4%2C+28034+Madrid!5e0!3m2!1ses!2ses!4v1411574566338" width="550" height="400" frameborder="0" style="border:0"></iframe>
                </div>
                <div id="mapa3">&nbsp;</div>
            </div>
        <?php endif;?>
    <?php endif;?>


</div>

<div id="contenidonivel2-3"  >

<!-- FORMULARIO DE CESAE -->
<div id="contenidonivel2-3-1" style="height:0px"></div>
<!--		<form name="formulario" method="post" action="http://sig.derivalya.es/sig/gateway/gatewayweb.aspx" id="cursosForm" >-->
<form name="formulario" method="post" data-action="http://sig.derivalya.es/sig/gateway/gatewaywebv2.aspx" id="cursosForm" >
<input type="hidden" name="fecha" value="<?php echo date('l jS \of F Y h:i:s A'); ?> " />
<!-- Campo que determina el nombre del curso o master - Netvision.es junio2014 -->
<input type="hidden" name="chk" value="<?php print_r($nombrepagina) ?>" />
<input type="hidden" name="cursos" value="<?php print_r($nombrepagina) ?>" />
<input type="hidden" name="cmbprogramas" value="<?php print_r($nombrepagina) ?>" />
<input type="hidden" name="formacion" value="Formación" />


<div class="secciontituloformulario"><br/></div>
<div class="secciontituloformulario" style="font-size:11px; color:#000 !important; text-align:center; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: auto;">RECIBA MÁS INFORMACIÓN</div>
<div class="secciontituloformulario" style="font-size:11px; color:#000 !important; letter-spacing: -0.15px;text-align:center; margin-top:3px; margin-bottom:13px;">DE ESTE CURSO, SIN COMPROMISO</div>
<div class="flecha_form">
</div>

<div class="contenidonivel2-lateralderecho" >
    <label for="nombre"></label>
    <input type="text" name="nombre" id="nombre" maxlength="100" class="formulariotext" value="Nombre *"  onfocus="JavaScript:this.value='';" onblur="JavaScript: if (this.value=='') this.value='Nombre *';" />
</div>
<div class="contenidonivel2-lateralderecho" >
    <input type="text" name="apellidos" id="apellidos" maxlength="100" value="Apellidos *" class="formulariotext" onfocus="JavaScript:this.value='';" onblur="JavaScript: if (this.value=='') this.value='Apellidos *';" />
</div>
<div class="contenidonivel2-lateralderecho" >
<!--                <div class="styled-select">-->
<select id="pais" class="formulariotext_select" name="pais">
<option value="Afganistan">Afganistan</option>
<option value="Africa Central">Africa Central</option>
<option value="Albania">Albania</option>
<option value="Alemania">Alemania</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antartida">Antartida</option>
<option value="Antigua y Barbuda">Antigua y Barbuda</option>
<option value="Arabia Saudita">Arabia Saudita</option>
<option value="Argelia">Argelia</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaiyan">Azerbaiyan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrein">Bahrein</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Bielorrusia">Bielorrusia</option>
<option value="Belgica">Belgica</option>
<option value="Belice">Belice</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Butan">Butan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brasil">Brasil</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Camboya">Camboya</option>
<option value="Camerun">Camerun</option>
<option value="Canada">Canada</option>
<option value="Cabo Verde">Cabo Verde</option>
<option value="Ciudad del Vaticano">Ciudad del Vaticano</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Colombia">Colombia</option>
<option value="Comoras">Comoras</option>
<option value="Congo">Congo</option>
<option value="Corea del Norte">Corea del Norte</option>
<option value="Corea del Sur">Corea del Sur</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Costa de Marfil">Costa de Marfil</option>
<option value="Croacia">Croacia</option>
<option value="Cuba">Cuba</option>
<option value="Chipre">Chipre</option>
<option value="Dinamarca">Dinamarca</option>
<option value="Dominica">Dominica</option>
<option value="Ecuador">Ecuador</option>
<option value="Egipto">Egipto</option>
<option value="El Salvador">El Salvador</option>
<option value="Emiratos Arabes">Emiratos Arabes</option>
<option value="Eritrea">Eritrea</option>
<option value="Eslovaquia">Eslovaquia</option>
<option value="Eslovenia">Eslovenia</option>
<option value="España" selected="selected">España</option>
<option value="Estados Unidos">Estados Unidos</option>
<option value="Estonia">Estonia</option>
<option value="Etiopia">Etiopia</option>
<option value="Fiji">Fiji</option>
<option value="Filipinas">Filipinas</option>
<option value="Finlandia">Finlandia</option>
<option value="Francia">Francia</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Grecia">Grecia</option>
<option value="Granada">Granada</option>
<option value="Groenlandia">Groenlandia</option>
<option value="Guadalupe">Guadalupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-bissau">Guinea-bissau</option>
<option value="Guinea Ecuatorial">Guinea Ecuatorial</option>
<option value="Guyana">Guyana</option>
<option value="Guyana Francesa">Guyana Francesa</option>
<option value="Haiti">Haiti</option>
<option value="Holanda">Holanda</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungria">Hungria</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Irak">Irak</option>
<option value="Irlanda">Irlanda</option>
<option value="Isla Bouvet">Isla Bouvet</option>
<option value="Isla de Coco">Isla de Coco</option>
<option value="Isla de Navidad">Isla de Navidad</option>
<option value="Isla de Pascua">Isla de Pascua</option>
<option value="Isla Norfolk">Isla Norfolk</option>
<option value="Islandia">Islandia</option>
<option value="Islas Cayman">Islas Cayman</option>
<option value="Islas Cook">Islas Cook</option>
<option value="Islas Feroe">Islas Feroe</option>
<option value="Islas Heard y McDonald">Islas Heard y McDonald</option>
<option value="Islas Malvinas">Islas Malvinas</option>
<option value="Islas Marianas del Norte">Islas Marianas del Norte</option>
<option value="Islas Marshall">Islas Marshall</option>
<option value="Islas Pitcairn">Islas Pitcairn</option>
<option value="Islas Salomon">Islas Salomon</option>
<option value="Islas Turcas y Caicos">Islas Turcas y Caicos</option>
<option value="Islas Virgenes">Islas Virgenes</option>
<option value="Israel">Israel</option>
<option value="Italia">Italia</option>
<option value="Jamaica">Jamaica</option>
<option value="Japon">Japon</option>
<option value="Jordania">Jordania</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenia">Kenia</option>
<option value="Kiribati">Kiribati</option>
<option value="Kosovo">Kosovo</option>
<option value="Kuwait">Kuwait</option>
<option value="Kirguistan">Kirguistan</option>
<option value="Laos">Laos</option>
<option value="Letonia">Letonia</option>
<option value="Libano">Libano</option>
<option value="Lesoto">Lesoto</option>
<option value="Liberia">Liberia</option>
<option value="Libia">Libia</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lituania">Lituania</option>
<option value="Luxemburgo">Luxemburgo</option>
<option value="Macao">Macao</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malasia">Malasia</option>
<option value="Maldivas">Maldivas</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Martinica">Martinica</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauricio">Mauricio</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia">Micronesia</option>
<option value="Moldavia">Moldavia</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montenegro">Montenegro</option>
<option value="Montserrat">Montserrat</option>
<option value="Marruecos">Marruecos</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Noruega">Noruega</option>
<option value="Nueva Caledonia">Nueva Caledonia</option>
<option value="Nueva Zelanda">Nueva Zelanda</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Palestina">Palestina</option>
<option value="Panama">Panama</option>
<option value="Papua Nueva Guinea">Papua Nueva Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Polinesia Francesa">Polinesia Francesa</option>
<option value="Polonia">Polonia</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republica Checa">Republica Checa</option>
<option value="Republica Dominicana">Republica Dominicana</option>
<option value="Reino Unido">Reino Unido</option>
<option value="Reunion">Reunion</option>
<option value="Rumania">Rumania</option>
<option value="Rusia">Rusia</option>
<option value="Ruanda">Ruanda</option>
<option value="Sahara Occidental">Sahara Occidental</option>
<option value="Samoa">Samoa</option>
<option value="Santa Helena">Santa Helena</option>
<option value="San Cristobal y Nieves">San Cristobal y Nieves</option>
<option value="Santa Lucia">Santa Lucia</option>
<option value="San Pedro y Miguelon">San Pedro y Miguelon</option>
<option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Santo Tome y Principe">Santo Tome y Principe</option>
<option value="Senegal">Senegal</option>
<option value="Serbia y Montenegro">Serbia y Montenegro</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leona">Sierra Leona</option>
<option value="Singapur">Singapur</option>
<option value="Siria">Siria</option>
<option value="Somalia">Somalia</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudafrica">Sudafrica</option>
<option value="Sudan">Sudan</option>
<option value="Surinam">Surinam</option>
<option value="Suazilandia">Suazilandia</option>
<option value="Suecia">Suecia</option>
<option value="Suiza">Suiza</option>
<option value="Taiwan">Taiwan</option>
<option value="Tayikistan">Tayikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Tailandia">Tailandia</option>
<option value="Timor Oriental">Timor Oriental</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad y Tobago">Trinidad y Tobago</option>
<option value="Tunez">Tunez</option>
<option value="Turquia">Turquia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukrania">Ukrania</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Wallis y Futuna">Wallis y Futuna</option>
<option value="Yemen">Yemen</option>
<option value="Yibuti">Yibuti</option>
<option value="Zambia">Zambia</option>
<option value="Zimbaue">Zimbaue</option>
</select>
<!--                </div>-->
</div>
<div class="contenidonivel2-lateralderecho" >
    <!--                <div class="styled-select" id='provincia'>-->
    <select name='ciudad' id='provincia' class='formulariotext_select'>
        <option value='' selected>-Seleccione una Provincia-</option>
        <option value='A Coruña'>A Coruña</option>
        <option value='Álava'>Álava</option>
        <option value='Albacete'>Albacete</option>
        <option value='Alicante'>Alicante</option>
        <option value='Almería'>Almería</option>
        <option value='Asturias'>Asturias</option>
        <option value='Ávila'>Ávila</option>
        <option value='Badajoz'>Badajoz</option>
        <option value='Barcelona'>Barcelona</option>
        <option value='Bizkaia'>Bizkaia</option>
        <option value='Burgos'>Burgos</option>
        <option value='Cáceres'>Cáceres</option>
        <option value='Cádiz'>Cádiz</option>
        <option value='Cantabria'>Cantabria</option>
        <option value='Castellón'>Castellón</option>
        <option value='Ciudad Real'>Ciudad Real</option>
        <option value='Córdoba'>Córdoba</option>
        <option value='Cuenca'>Cuenca</option>
        <option value='Gipuzkoa'>Gipuzkoa</option>
        <option value='Girona'>Girona</option>
        <option value='Granada'>Granada</option>
        <option value='Guadalajara'>Guadalajara</option>
        <option value='Huelva'>Huelva</option>
        <option value='Huesca'>Huesca</option>
        <option value='Illes Balears'>Illes Balears</option>
        <option value='Jaén'>Jaén</option>
        <option value='Las Palmas'>Las Palmas</option>
        <option value='La Rioja'>La Rioja</option>
        <option value='León'>León</option>
        <option value='Lleida'>Lleida</option>
        <option value='Lugo'>Lugo</option>
        <option value='Madrid'>Madrid</option>
        <option value='Málaga'>Málaga</option>
        <option value='Murcia'>Murcia</option>
        <option value='Navarra'>Navarra</option>
        <option value='Ourense'>Ourense</option>
        <option value='Palencia'>Palencia</option>
        <option value='Pontevedra'>Pontevedra</option>
        <option value='Salamanca'>Salamanca</option>
        <option value='Santa Cruz de Tenerife'>Santa Cruz de Tenerife</option>
        <option value='Sevilla'>Sevilla</option>
        <option value='Segovia'>Segovia</option>
        <option value='Soria'>Soria</option>
        <option value='Tarragona'>Tarragona</option>
        <option value='Teruel'>Teruel</option>
        <option value='Toledo'>Toledo</option>
        <option value='Valencia'>Valencia</option>
        <option value='Valladolid'>Valladolid</option>
        <option value='Zamora'>Zamora</option>
        <option value='Zaragoza'>Zaragoza</option>
        <option value='Ceuta'>Ceuta</option>
        <option value='Melilla'>Melilla</option>
    </select>
    <!--                </div>-->

    <input type="text" name="ciudad" id="provincia_text" class="formulariotext" value="Ciudad" onfocus="JavaScript:this.value='';" onblur="JavaScript: if (this.value=='') this.value='Ciudad';" />
</div>

<div class="contenidonivel2-lateralderecho" >

    <input type="text" name="telefono" id="telefono" maxlength="100" value="Teléfono *" class="formulariotext required" onfocus="JavaScript:this.value='';" onblur="JavaScript: if (this.value=='') this.value='Teléfono *';" />
</div>
<div class="contenidonivel2-lateralderecho" >
    <input type="text" name="mail" id="mail"  maxlength="200" value="Correo electrónico *"  class="formulariotext required" onfocus="JavaScript:this.value='';" onblur="JavaScript: if (this.value=='') this.value='Correo electrónico *';" />
</div>

<div class="contenidonivel2-lateralderecho" >
    <textarea name="comentarios" id="comentarios"  class="formulariocomentarios" rows="8"   onfocus="JavaScript:this.value='';" onblur="JavaScript: if (this.value=='') this.value='Comentarios';">Comentarios</textarea>
</div>

<div class="secciontituloformulario" style="height:65px"><br clear="all"/></div>

<div class="test" style="color:red; font-size:11px; width:172px; margin-left:5px;"></div>

<div class="contenidonivel2-lateralderecho-boton" >
    <input type="submit" id="btnsolicita" class="myButton"  value="SOLICITA INFORMACIÓN" alt="Click aquí para recibir más información sobre este programa formativo">
</div>
<div class="secciontituloformulario" style="height:25px"><br/></div>

</form>

<a href="#" title="CESAE Executive Education, Master Dirección y Gestión de Empresas, Programas Gestión Empresarial" >

    <?php if ($id=='1' || $id=='11' || $id=='34' || $id=='36' || $id=='27' || $id=='30' || $id=='35' || $id=='6' || $id=='4' || $id=='9' || $id=='12' || $id=='247' || $id=='248' || $id=='249' || $id=='13' || $id=='14' || $id=='15' || $id=='416' || $id=='442' || $id=='414' || $id=='17' || $id=='19' || $id=='22' || $id=='24' || $id=='270' || $id=='272' ) :  ?>
        <div id="banner-lat-derecho" style="float:right;padding-top:2px;">
            <a href="/antiguosalumnos" title="CESAE Executive Education, Master Dirección y Gestión de Empresas, Programas Gestión Empresarial" >
            <img border="0" src="<?php echo $this->baseurl ?>/images/Microbanner_Alumnos.jpg" title="CESAE opiniones antiguos alumnos"  alt="CESAE opiniones antiguos alumnos" width="194px"  style="display:block;" border="0"  />
            </a>
        </div>
    <?php elseif ($id=='7' || $id=='28' || $id=='3' || $id=='8'  ) :  ?>
        <div id="banner-lat-derecho" style="float:right;padding-top:2px;">
            <a href="/profesorado" title="CESAE Executive Education, Master Dirección y Gestión de Empresas, Programas Gestión Empresarial" >
            <img border="0"  src="<?php echo $this->baseurl ?>/images/Microbanner_Profesores.jpg" title="CESAE Profesorado"  alt="CESAE Profesorado" width="194px"  style="display:block;" border="0"  />
            </a>
        </div>
    <?php elseif (  $id=='476' || $id=='423' || $id=='26' || $id=='2' || $id=='5' || $id=='10' || $id=='25' || $id=='43' || $id=='254' || $id=='261' || $id=='267' || $id=='59' || $id=='66' || $id=='62' || $id=='52' || $id=='46' || $id=='47' || $id=='48' || $id=='49' || $id=='50' || $id=='51' || $id=='278' || $id=='111' || $id=='115' || $id=='119' || $id=='144' || $id=='148' || $id=='269' || $id=='276' ) :  ?>
        <div id="banner-lat-derecho" style="float:right;padding-top:2px;">
            <a href="/antiguosalumnos" title="CESAE Executive Education, Master Dirección y Gestión de Empresas, Programas Gestión Empresarial" >
            <img border="0"  src="<?php echo $this->baseurl ?>/images/Microbanner_Alumnos.jpg" title="CESAE opiniones antiguos alumnos"  alt="CESAE opiniones antiguos alumnos" width="194px"  style="display:block;" border="0"  />
            </a>
        </div>
    <?php endif;  ?>


</div>


</div>

<!-- Bloque nuevo de categorias de la HOME - Netvision.es 22/07/2014-->

<div class="categorias_home" style="border-top: #b4b1ad 2px solid; padding-top:2px; margin-top:4px;">
    <a href="/cursos-cocina">
        <div class="categorias_box" id="cocina">
            <div class="bot_categorias_home">Cocina</div>
        </div>
    </a>
    <a href="/cursos-pasteleria">
        <div class="categorias_box" id="pasteleria">
            <div class="bot_categorias_home">Pastelería</div>
        </div>
    </a>
    <a href="/cursos-sumilleria">
        <div class="categorias_box" id="sumilleria">
            <div class="bot_categorias_home">Sumillería y enología</div>
        </div>
    </a>
    <a href="/cursos-direccionygestion">
        <div class="categorias_box" id="gestion">
            <div class="bot_categorias_home">Dirección y gestión</div>
        </div>
    </a>
    <a href="/cursos-hosteleria">
        <div class="categorias_box" id="restauracion">
            <div class="bot_categorias_home">Restauración</div>
        </div>
    </a>
    <a href="/cursos-revenuemanagement">
        <div class="categorias_box" id="revenue">
            <div class="bot_categorias_home">Revenue Management</div>
        </div>
    </a>
</div>

<!-- FIN Bloque nuevo de categorias de la HOME - Netvision.es 22/07/2014-->

<!-- Bloque nuevo de universidades de la HOME - Netvision.es 22/07/2014-->
<div class="universidades_home">

        <div class="titulos_universitarios">
            <strong>Titulos Universitarios</strong>
            <div class="clearfix"></div>
            <img src="images/logo_univ_fco_vitoria.jpg" alt="Universidad Francisco de Vitoria" width="80" height="80">
            <img src="images/logo_univ_nebrija.jpg" alt="Universidad Nebrija" width="80" height="80">
            <img src="images/logo_univ_ucam.jpg" alt="Universidad Católica San Antonio" width="95" height="80">
        </div>

    <div class="colaboradores_home">
        <strong>Colaboradores</strong>
        <div class="clearfix"></div>
        <div id="ticker_logos">
            <ul>
                <li><img src="images/logos_colaboradores_01.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_02.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_03.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_04.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_05.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_06.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_07.gif" alt="Colaboradores"></li>
                <li><img src="images/logos_colaboradores_08.gif" alt="Colaboradores"></li>
            </ul>
        </div>
    </div>
</div>
<!-- Bloque nuevo de universidades de la HOME - Netvision.es 22/07/2014-->



<div id="pie">
    <div id="pie-1">
        <a href="http://www.cesae.es"  title="CESAE Escuela de Negocios" id="pie-1-enlace" >© CESAE Escuela de Negocios, <?php echo date('Y'); ?></a>
    </div>
    <div id="pie-2">
        <a href="https://www.google.es/maps/place/Calle+Foronda,+4,+28034+Madrid/@40.4901725,-3.6877837,17z/data=!3m1!4b1!4m2!3m1!1s0xd422963fd0e17a9:0x4a166c9e191d7971" id="pie-2-enlace-1" title="CESAE Calle Foronda nº 4 - Bajo " target="_blank" >Calle Foronda nº 4 - Bajo </a>
        |
        <span id="pie-2-enlace-2"  >28034 Madrid</span>
        |
        <span id="pie-2-enlace-3"  >SPAIN</span>
        |
        <span id="pie-2-enlace-4" >Tel: 912 977 166</span>
        |
        <span id="pie-2-enlace-5" >Fax: 901 020 527</span>
        |
        <a href="mailto:info@cesae.es" id="pie-2-enlace-6" title="CESAE Mail info@cesae.es">info@cesae.es</a>
        |
        <a href="http://www.cesae.es" id="pie-2-enlace-7" title="CESAE Mail www.cesae.es">www.cesae.es</a>

    </div>
    <div id="pie-3">
        <span id="pie-3-enlace"><img src="images/cesaepie.png" title="CESAE Escuela de Negocios" alt="CESAE Escuela de Negocios" border="0"  width="150px" height="6px" /></span>

    </div>
</div>

<?php endif;?>

</div>


<?php endif;?>

<div id="modal1" style="display:none;">
    <div class="modaltext" id="textomsg">
    </div>
    <div class="modalboton" >
        <input type="button" class="modalboton2" value="CERRAR" onclick="JavaScript:cerrarpopup(1);"   />
    </div>
</div>



<script  type="text/javascript">
    $('#modal1').fadeTo(0,0);

    var queryString = window.top.location.search.substring(1);
    if (queryString=='SEND')
    {
        document.getElementById("textomsg").innerHTML="Hemos recibido correctamente su solicitud.";
        document.getElementById("modal1").style.display="block";

        $('#modal1').fadeTo(1000,1);



        /* <![CDATA[ */
        var google_conversion_id = 957475136;
        var google_conversion_language = "en";
        var google_conversion_format = "3";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "qQy1CNDrjgYQwNLHyAM";
        var google_conversion_value = 0;
        /* ]]> */
    }
    if (queryString=='KOSEND')
    {
        document.getElementById("textomsg").innerHTML="El mail no pudo ser enviado.";
        document.getElementById("modal1").style.display="block";
        $('#modal1').fadeTo(1000,1);

        /* <![CDATA[ */
        var google_conversion_id = 957475136;
        var google_conversion_language = "en";
        var google_conversion_format = "3";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "qQy1CNDrjgYQwNLHyAM";
        var google_conversion_value = 0;
        /* ]]> */

    }

    if (queryString=='KOCONFIRM')
    {
        document.getElementById("textomsg").innerHTML="El mail no existe en nuestra base de datos.";
        document.getElementById("modal1").style.display="block";
        $('#modal1').fadeTo(1000,1);

        /* <![CDATA[ */
        var google_conversion_id = 957475136;
        var google_conversion_language = "en";
        var google_conversion_format = "3";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "qQy1CNDrjgYQwNLHyAM";
        var google_conversion_value = 0;
        /* ]]> */

    }

    $(document).ready(function(){

        var appleDevice=false;
        var isiPad = navigator.userAgent.match(/iPad/i) != null;
        var isiPhone = navigator.userAgent.match(/iPhone/i) != null;
        var isiPod = navigator.userAgent.match(/iPod/i) != null;

        if (isiPad || isiPhone || isiPod)
        {
            appleDevice=true;
        }


        if ( window.orientation != null &&  window.orientation != undefined )
        {
            window.onorientationchange = updateView;
            updateView();
        }
    });
    function updateView()
    {
        if ( window.orientation==0 || window.orientation==180)  //vertical
        {
            document.getElementById("contenedor").className="contenedoripad2";
            document.body.className="bodyipad2";

        }
        else
        {
            document.getElementById("contenedor").className="contenedoripad";
            document.body.className="bodyipad";

        }
    }
</script>



<?php
// revisamos si es la home o no, de no serlo pintamos el script para el formulario - Netvision Junio 2014
//se revisa si viene la confirmación del alta al servicio de newsletters - Netvision Agosto 2014
if(isset($_REQUEST['email_confirm'])){
    $email_confirm = $_REQUEST['email_confirm'];
    //comprobamos si ese email ya esta dado de alta
    $result = mysql_query("SELECT email FROM jiutn_newsletter WHERE email='$email_confirm' AND activo='0'");
    $query_row=mysql_fetch_array($result);
    //echo($query_row['email']);
    //        die();

    if(mysql_num_rows($result) >> 0){
            $sql = mysql_query("UPDATE jiutn_newsletter  SET activo='1'  WHERE email='$email_confirm' AND activo='0'");
            $query_row=mysql_fetch_array($sql);

            if($sql){

                ?>
                <script  type="text/javascript">
                    $('#modal1').fadeTo(0,0);

                    var queryString = window.top.location.search.substring(1);

                    document.getElementById("textomsg").innerHTML="Ha activado el alta al servicio de newsletters correctamente";
                    document.getElementById("modal1").style.display="block";

                    $('#modal1').fadeTo(1000,1);
                    /* <![CDATA[ */
                    var google_conversion_id = 957475136;
                    var google_conversion_language = "en";
                    var google_conversion_format = "3";
                    var google_conversion_color = "ffffff";
                    var google_conversion_label = "qQy1CNDrjgYQwNLHyAM";
                    var google_conversion_value = 0;
                    /* ]]> */
                </script>

            <?php
            }//fin del if del $sql
        }else{
        header('Location: http://cesae.es/?KOCONFIRM' );
    } // fin del if del numero de resultados
}//fin del if de la revision del email confirm

$id = $_GET['id'];
if ($id!="" || $id!="0"  ){
    ?>
    <script type="text/javascript">
        //script para el select dinamico por comunidades
        $('#provincia_text').hide();

        //$('#comunidad').change(function(){
        $('#pais').on("change" ,function(){

            var pais = $("#pais :selected").text();

            //se cambian los valores de la variable que tengan espacios en blanco//
            if(pais=='España'){
                $('#provincia').fadeIn();
                $('#provincia_text').hide();
            }else{
                $('#provincia_text').fadeIn();
                $('#provincia').hide();
            }

            return false;
        });



        function IsEmail(mail) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(mail);
        }

        $("form#cursosForm").submit(function(e) {
            var errors = 0;
            $('div.test').empty();

            var url = $("form#cursosForm").attr('data-action');
            $("form#cursosForm").attr('action',url);

            var nombre = $("#nombre").val();
            var apellidos = $("#apellidos").val();
            var telefono = $("#telefono").val();
            var ciudad = $("#provincia").val();
            var mail = $("#mail").val();
            var comentarios = $("#comentarios").val();

            if(nombre=='Nombre *' ){
                $('div.test').append("- El campo nombre es obligatorio <br />");
                errors++;
            }
            if(apellidos=='Apellidos *' ){
                $('div.test').append("- El campo apellidos es obligatorio <br />");
                errors++;
            }
            if(telefono=='Teléfono *' ){
                $('div.test').append("- El campo teléfono es obligatorio <br />");
                errors++;
            }
            if(mail=='Correo electrónico *' ){
                $('div.test').append("- El campo correo electrónico es obligatorio <br />");
                errors++;
            }
            if( !IsEmail(mail)) {
                $('div.test').append("- Debe introducir una dirección de correo electrónica valida <br />");
                errors++;
            }
//            if(comentarios=='Comentarios *' ){
//                $('div.test').append("- El campo comentarios es obligatorio <br />");
//                errors++;
//            }
            if(errors != 0){
                e.preventDefault();
            }

        });

        $(function() {
            $('#ticker_logos').vTicker();
        });

    </script>


        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                //console.log('movil');
                /*
                if (document.getElementById('contenidonivel2-3')!=null)
                {
                    var divOffsetoriginal = $('#contenidonivel2-3').position().top;

                    window.onscroll =  function(){scroll();}

                    function scroll () {
                        var scrollTop = $(window).scrollTop();
                        var divOffset = $('#contenidonivel2-3').offset().top;
                        var dist = (divOffset - scrollTop);
                        if ($('#contenidonivel2-3').height()<1000)
                        {
                            if (dist<0)
                                document.getElementById('contenidonivel2-3-1').style.height=-dist + "px";
                            else
                                document.getElementById('contenidonivel2-3-1').style.height="0px";
                        }
                        else
                            document.getElementById('contenidonivel2-3-1').style.height="0px";

                    }
                }
                */
            }else{
                //console.log('nomovil');
                $("#contenidonivel2-3").stick_in_parent();
                //alert('No es Dispositivo movil');
            }


        </script>

<?php } ?>

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
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">;
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/957475136/?value=0&amp;label…;
    </div>
</noscript>
</body>
</html>
