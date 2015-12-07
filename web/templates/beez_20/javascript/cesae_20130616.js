

jQuery(document).ready(function(){
		jQuery('#slide').simpleSlide();

	});
	

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
		elto.style.backgroundColor='#0088c9';

}
function markareac(elto)
{
	
	if (document.getElementById("menuhome-" + elto)!=null)
		document.getElementById("menuhome-" + elto).style.backgroundColor="#0088c9";
		
		
		
	document.getElementById("pestanas-" + elto).style.backgroundColor="#0073ab";
	
	
}
function desmarkareac(elto,categoriaid)
{
	if (document.getElementById("menuhome-" + elto)!=null)
		document.getElementById("menuhome-" + elto).style.backgroundColor="#7fbbe2";
		
	
	
	
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
                self.location.href= loc + "/portada-blog-cesae/?search=buscar&query1=" + elto.value;
}

function newsletterblog(idelto)
{
                document.forms[idelto].submit();
         
}
