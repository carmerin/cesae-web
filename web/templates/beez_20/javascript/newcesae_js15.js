// inicializacion de evento Onload

   if (window.addEventListener)
    window.addEventListener('load', initOnLoad, false);
   else if (window.attachEvent)
    window.attachEvent('onload', initOnLoad);
   else
    window.onload = initOnLoad;

// funcion onLoad

function initOnLoad() {
	var imgDefer = document.getElementsByTagName('img');
	for (var i=0; i<imgDefer.length; i++) {
	  if(imgDefer[i].getAttribute('data-src')) {
  	    imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
	} } 
     downloadJSAtOnload();
}

var deferredJSFiles = ['http://www.googleadservices.com/pagead/conversion.js'];
   
function downloadJSAtOnload() {
    if (!deferredJSFiles.length)
        return;
    var deferredJSFile = deferredJSFiles.shift();
    var element = document.createElement('script');
    element.src = deferredJSFile;
    element.onload = element.onreadystatechange = function() {
        if (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')
            downloadJSAtOnload();
    };
    document.body.appendChild(element);
   }


jQuery(document).ready(function(){
		jQuery('#slide').simpleSlide();
                $('#ticker_logos').vTicker();

	});


jQuery.fn.simpleSlide = function(a){

	a				= a || {};
	a.duration		= a.duration || 6000;
	a.transition	= a.transition || 3000;
	var	c	= jQuery(this);
	jQuery(c).css("position","relative");

	jQuery("img",jQuery(c))
		.css({
			'position'	: 'absolute',
			'top'		: '0px',
			'left'		: '0px',
			'z-index'	: '8'
			})
		.find(":first")
			.addClass("slide-active")
			.css('z-index','10');

	setInterval(function(){


				//	if ($active[0].src!='http://www.cesae.es/images/BANNER_Bienvenidos_2.jpg')
				//		document.getElementById('texto_banner').style.display='none';
				//	else
				//		document.getElementById('texto_banner').style.display='block';

			
			var $active = jQuery("img.slide-active",jQuery(c));

			if($active.length == 0) {
				
				// 20151211 CMM. Protección ante null del elemento.
				
				if(document.getElementById('texto_banner') != null)
					document.getElementById('texto_banner').style.display='none';
			}
			else
			{
				if ($active[0].src!='http://www.cesae.es/images/BANNER_Cursos.jpg')
					document.getElementById('texto_banner').style.display='none';
					
			}
			if($active.length == 0) $active = jQuery("img:last",jQuery(c));

			var $next	= $active.next().length ? $active.next() : jQuery("img:first",jQuery(c));

			

			$active
				.addClass("slide-last-active")
				.css('z-index','9');

			$next
				.css({opacity: 0.0})
				.addClass("slide-active")
				.css('z-index','10')
				.animate({opacity: 1.0}, a.transition, function(){
					if ($active[0].src=='http://www.cesae.es/images/BANNER_Cursos.jpg')
						document.getElementById('texto_banner').style.display='block';
					else
						document.getElementById('texto_banner').style.display='none';

					$active
						.removeClass('slide-active slide-last-active')
						.css('z-index','8');
			

					//alert(	$active.length);		

			
				});
		}, a.duration);

}	



function ChequeaContacto()
{
                
	if (document.formulario.nombre.value=="" || document.formulario.nombre.value=="| Nombre" || document.formulario.mail.value=="" || document.formulario.mail.value.replace("\u00f3","o")=="| Correo electronico" || document.formulario.telefono.value==""  || document.formulario.telefono.value.replace("\u00e9","e")=="| Telefono")
	{
		alert('Su nombre, tel\u00e9fono y direcci\u00f3n de correo electr\u00f3nico, son datos obligatorios. Rellenelos por favor.');
	}
	else
	{
		if (document.formulario.cp.value.replace("\u00f3","o")=="| Codigo postal")
			document.formulario.cp.value="";
			
		//document.formulario.clearAndSubmit();
		document.formulario.submit();
	}
}
function iracampus()
{
	document.forms[0].submit();
}
function iraformulario()
{
}
function cambiarbotonmenuc(elto, opt)
{
	if (opt==1)
		elto.style.backgroundColor='#0073ab';
	if (opt==0)
		elto.style.backgroundColor='#7FBBE2';

}
function markareac(elto)
{
	
	if (document.getElementById("menuhome-" + elto)!=null)
		document.getElementById("menuhome-" + elto).style.backgroundColor="#7FBBE2";
		
		
		
	//document.getElementById("pestanas-" + elto).style.backgroundColor="#0073ab";
	
	
}
function desmarkareac(elto,categoriaid)
{
	if (document.getElementById("menuhome-" + elto)!=null)
		document.getElementById("menuhome-" + elto).style.backgroundColor="#E4F3FA";
		
	
	
	
	if (elto==1)
	{
	
		if (categoriaid=="2")
			document.getElementById("pestanas-" + elto).style.backgroundColor="#005a7c";
		else
			document.getElementById("pestanas-" + elto).style.backgroundColor="#0088c9";
	}
	if (elto==2)
	{
	
		if (categoriaid=="7")
			document.getElementById("pestanas-" + elto).style.backgroundColor="#005a7c";
		else
			document.getElementById("pestanas-" + elto).style.backgroundColor="#0088c9";
	}
	if (elto==3)
	{
	
		if (categoriaid=="8")
			document.getElementById("pestanas-" + elto).style.backgroundColor="#005a7c";
		else
			document.getElementById("pestanas-" + elto).style.backgroundColor="#0088c9";
	}
	if (elto==4)
	{
	
		if (categoriaid=="9")
			document.getElementById("pestanas-" + elto).style.backgroundColor="#005a7c";
		else
			document.getElementById("pestanas-" + elto).style.backgroundColor="#0088c9";
	}
	if (elto==5)
	{
	
		if (categoriaid=="10")
			document.getElementById("pestanas-" + elto).style.backgroundColor="#005a7c";
		else
			document.getElementById("pestanas-" + elto).style.backgroundColor="#0088c9";
	}	
	 
}

function cerrarpopup(elto)
{
                	document.getElementById("modal1").style.display="none";

                if (elto==1)
                                $('#modal1').fadeTo(0,0);
                if (elto==2)
                                $('#modal2').fadeTo(0,0);
}

function buscarblog(loc,elto)
{
                self.location.href=  "/blog/?search=buscar&query1=" + elto.value;
}

function buscarblogv2(loc,elto)
{
                self.location.href=  "/blog/?search=buscar&query1=" + elto.value;
}

function newsletterblog(idelto)
{
                document.forms[idelto].submit();
         
}


/*
 Sticky-kit v1.1.1 | WTFPL | Leaf Corcoran 2014 | http://leafo.net
 */
(function(){var k,e;k=this.jQuery||window.jQuery;e=k(window);k.fn.stick_in_parent=function(d){var v,y,n,p,h,C,s,G,q,H;null==d&&(d={});s=d.sticky_class;y=d.inner_scrolling;C=d.recalc_every;h=d.parent;p=d.offset_top;n=d.spacer;v=d.bottoming;null==p&&(p=0);null==h&&(h=void 0);null==y&&(y=!0);null==s&&(s="is_stuck");null==v&&(v=!0);G=function(a,d,q,z,D,t,r,E){var u,F,m,A,c,f,B,w,x,g,b;if(!a.data("sticky_kit")){a.data("sticky_kit",!0);f=a.parent();null!=h&&(f=f.closest(h));if(!f.length)throw"failed to find stick parent";
    u=m=!1;(g=null!=n?n&&a.closest(n):k("<div />"))&&g.css("position",a.css("position"));B=function(){var c,e,l;if(!E&&(c=parseInt(f.css("border-top-width"),10),e=parseInt(f.css("padding-top"),10),d=parseInt(f.css("padding-bottom"),10),q=f.offset().top+c+e,z=f.height(),m&&(u=m=!1,null==n&&(a.insertAfter(g),g.detach()),a.css({position:"",top:"",width:"",bottom:""}).removeClass(s),l=!0),D=a.offset().top-parseInt(a.css("margin-top"),10)-p,t=a.outerHeight(!0),r=a.css("float"),g&&g.css({width:a.outerWidth(!0),
        height:t,display:a.css("display"),"vertical-align":a.css("vertical-align"),"float":r}),l))return b()};B();if(t!==z)return A=void 0,c=p,x=C,b=function(){var b,k,l,h;if(!E&&(null!=x&&(--x,0>=x&&(x=C,B())),l=e.scrollTop(),null!=A&&(k=l-A),A=l,m?(v&&(h=l+t+c>z+q,u&&!h&&(u=!1,a.css({position:"fixed",bottom:"",top:c}).trigger("sticky_kit:unbottom"))),l<D&&(m=!1,c=p,null==n&&("left"!==r&&"right"!==r||a.insertAfter(g),g.detach()),b={position:"",width:"",top:""},a.css(b).removeClass(s).trigger("sticky_kit:unstick")),
        y&&(b=e.height(),t+p>b&&!u&&(c-=k,c=Math.max(b-t,c),c=Math.min(p,c),m&&a.css({top:c+"px"})))):l>D&&(m=!0,b={position:"fixed",top:c},b.width="border-box"===a.css("box-sizing")?a.outerWidth()+"px":a.width()+"px",a.css(b).addClass(s),null==n&&(a.after(g),"left"!==r&&"right"!==r||g.append(a)),a.trigger("sticky_kit:stick")),m&&v&&(null==h&&(h=l+t+c>z+q),!u&&h)))return u=!0,"static"===f.css("position")&&f.css({position:"relative"}),a.css({position:"absolute",bottom:d,top:"auto"}).trigger("sticky_kit:bottom")},
        w=function(){B();return b()},F=function(){E=!0;e.off("touchmove",b);e.off("scroll",b);e.off("resize",w);k(document.body).off("sticky_kit:recalc",w);a.off("sticky_kit:detach",F);a.removeData("sticky_kit");a.css({position:"",bottom:"",top:"",width:""});f.position("position","");if(m)return null==n&&("left"!==r&&"right"!==r||a.insertAfter(g),g.remove()),a.removeClass(s)},e.on("touchmove",b),e.on("scroll",b),e.on("resize",w),k(document.body).on("sticky_kit:recalc",w),a.on("sticky_kit:detach",F),setTimeout(b,
        0)}};q=0;for(H=this.length;q<H;q++)d=this[q],G(k(d));return this}}).call(this);

/**
 * Created by alvaro on 2/10/14.
 */

/*! vTicker 1.15
 http://richhollis.github.com/vticker/ | http://richhollis.github.com/vticker/license/ | based on Jubgits vTicker http://www.jugbit.com/jquery-vticker-vertical-news-ticker/ */
(function(d){var n={speed:700,pause:4E3,showItems:1,mousePause:!0,height:0,animate:!0,margin:0,padding:0,startPaused:!1},c={moveUp:function(a,b){c.animate(a,b,"up")},moveDown:function(a,b){c.animate(a,b,"down")},animate:function(a,b,e){var c=a.itemHeight,f=a.options,k=a.element,g=k.children("ul"),l="up"===e?"li:first":"li:last";k.trigger("vticker.beforeTick");var m=g.children(l).clone(!0);0<f.height&&(c=g.children("li:first").height());c+=f.margin+2*f.padding;"down"===e&&g.css("top","-"+c+"px").prepend(m);
    if(b&&b.animate){if(a.animating)return;a.animating=!0;g.animate("up"===e?{top:"-="+c+"px"}:{top:0},f.speed,function(){d(g).children(l).remove();d(g).css("top","0px");a.animating=!1;k.trigger("vticker.afterTick")})}else g.children(l).remove(),g.css("top","0px"),k.trigger("vticker.afterTick");"up"===e&&m.appendTo(g)},nextUsePause:function(){var a=d(this).data("state"),b=a.options;a.isPaused||2>a.itemCount||f.next.call(this,{animate:b.animate})},startInterval:function(){var a=d(this).data("state"),b=
    this;a.intervalId=setInterval(function(){c.nextUsePause.call(b)},a.options.pause)},stopInterval:function(){var a=d(this).data("state");a&&(a.intervalId&&clearInterval(a.intervalId),a.intervalId=void 0)},restartInterval:function(){c.stopInterval.call(this);c.startInterval.call(this)}},f={init:function(a){f.stop.call(this);var b=jQuery.extend({},n);a=d.extend(b,a);var b=d(this),e={itemCount:b.children("ul").children("li").length,itemHeight:0,itemMargin:0,element:b,animating:!1,options:a,isPaused:a.startPaused?
    !0:!1,pausedByCode:!1};d(this).data("state",e);b.css({overflow:"hidden",position:"relative"}).children("ul").css({position:"absolute",margin:0,padding:0}).children("li").css({margin:a.margin,padding:a.padding});isNaN(a.height)||0===a.height?(b.children("ul").children("li").each(function(){var a=d(this);a.height()>e.itemHeight&&(e.itemHeight=a.height())}),b.children("ul").children("li").each(function(){d(this).height(e.itemHeight)}),b.height((e.itemHeight+(a.margin+2*a.padding))*a.showItems+a.margin)):
    b.height(a.height);var h=this;a.startPaused||c.startInterval.call(h);a.mousePause&&b.bind("mouseenter",function(){!0!==e.isPaused&&(e.pausedByCode=!0,c.stopInterval.call(h),f.pause.call(h,!0))}).bind("mouseleave",function(){if(!0!==e.isPaused||e.pausedByCode)e.pausedByCode=!1,f.pause.call(h,!1),c.startInterval.call(h)})},pause:function(a){var b=d(this).data("state");if(b){if(2>b.itemCount)return!1;b.isPaused=a;b=b.element;a?(d(this).addClass("paused"),b.trigger("vticker.pause")):(d(this).removeClass("paused"),
    b.trigger("vticker.resume"))}},next:function(a){var b=d(this).data("state");if(b){if(b.animating||2>b.itemCount)return!1;c.restartInterval.call(this);c.moveUp(b,a)}},prev:function(a){var b=d(this).data("state");if(b){if(b.animating||2>b.itemCount)return!1;c.restartInterval.call(this);c.moveDown(b,a)}},stop:function(){d(this).data("state")&&c.stopInterval.call(this)},remove:function(){var a=d(this).data("state");a&&(c.stopInterval.call(this),a=a.element,a.unbind(),a.remove())}};d.fn.vTicker=function(a){if(f[a])return f[a].apply(this,
    Array.prototype.slice.call(arguments,1));if("object"!==typeof a&&a)d.error("Method "+a+" does not exist on jQuery.vTicker");else return f.init.apply(this,arguments)}})(jQuery);


/*
jQuery Fieldtag Plugin
    * Version 1.1
    * 2009-05-07 10:10:35
    * URL: http://ajaxcssblog.com/jquery/fieldtag-watermark-inputfields/
    * Description: jQuery Plugin to dynamically tag an inputfield, with a class and/or text
    * Author: Matthias Jäggli
    * Copyright: Copyright (c) 2009 Matthias Jäggli under dual MIT/GPL license.
	*
	* Changelog
	* 1.1
	* Support for propper clearing while submitting the form of tagged fields
	* 1.0
	* Initial release
*/
(function($){
	$.fn.fieldtag = function(options){
		var opt = $.extend({
				markedClass: "tagged",
				standardText: false
			}, options);
		$(this)
			.focus(function(){
				if(!this.changed){
					this.clear();
				}
			})
			.blur(function(){
				if(!this.changed){
					this.addTag();
				}
			})
			.keyup(function(){
				this.changed = ($(this).val()? true : false);
			})
			.each(function(){
				this.title = $(this).attr("title"); //strange IE6 Bug, sometimes
				if($(this).val() == $(this).attr("title")){
					this.changed = false;
				}
				this.clear = function(){
					if(!this.changed){
						$(this)
							.val("")
							.removeClass(opt.markedClass);						
					}
				}
				this.addTag = function(){
					$(this)
						.val(opt.standardText === false? this.title : opt.standardText )
						.addClass(opt.markedClass);
				}
				if(this.form){
					this.form.tagFieldsToClear = this.form.tagFieldsToClear || [];
					this.form.tagFieldsToClear.push(this);
				
					if(this.form.tagFieldsAreCleared){ return true; }
					this.form.tagFieldsAreCleared = true;
						
					$(this.form).submit(function(){
						$(this.tagFieldsToClear).each(function(){
							this.clear();
						});
					});	
					/* BEGIN-CHANGE: Added Method to form for submitting form but clearing first*/
					this.form.clearAndSubmit = function () {
						$(this.tagFieldsToClear).each(function () {
							this.clear();
							});
						this.submit();
						};
					/* END-CHANGE */

				}
			})
			.keyup()
			.blur();
		return $(this);
	}
})(jQuery);