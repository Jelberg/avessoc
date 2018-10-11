<?php
//Path de las direcciones de elproyecto de avessoc

/***************************************
 *
 *                IMAGENES
 *
 ***************************************/

// Icono de eliminacion
define ("PATH_IC_DELETE","http://dev.avessoc.org.ve/wp-content/themes/hestia-child/page-templates/icons/ic-borrar.png");


/***************************************
 *
 *         PATH DE LAS PAGINAS
 *
 ***************************************/

//Pagina de lista de entros de salud
define ("PATH_PAG_SEARCH_MDCENTER"," http://dev.avessoc.org.ve/avessoc-search-mdcenters/");

//Direccion para busquea de pacientes
define ("PATH_PAG_SEARCH_PATIENT","http://dev.avessoc.org.ve/avessor-buscar-pacientes/");

//Direccion para registro de pacientes
define("PATH_PAG_REGISTER_PATIENT","http://dev.avessoc.org.ve/avessoc-registro-paciente/");

//Direccion para registro del sponsor
define("PATH_PAG_ADD_SPONSOR","http://dev.avessoc.org.ve/avessoc-registro-patrocinante/");

//Direccion para busqueda de sponsor
define("PATH_PAG_SEARCH_SPONSOR","http://dev.avessoc.org.ve/avessos-buscar-patrocinante/");

//Direccion de pagina que muestra la informacion del centro de salud
define("PATH_PAG_LOAD_MDCENTER","http://dev.avessoc.org.ve/avessoc-load-mdcenter/");

//Direccion de busqueda de centros de salud
define("PATH_PAG_SEARCH_MDCENTER","http://dev.avessoc.org.ve/avessoc-search-mdcenters/");

//Direccion para Agregar nuevos centros de salud
define("PATH_PAG_ADD_MDCENTER","http://dev.avessoc.org.ve/avessoc-registro-centro-de-salud/");

//Path para registro de examenes en centros, agrega el examen en el centro con disponibilidad y precio
define("PATH_PAG_REGISTER_EXAM_FROM_CENTER","http://dev.avessoc.org.ve/avessoc-registrar-examenes-centros/");

//Direccion done se registra los nuevos examenes
define("PATH_PAG_ADD_NEW_EXAM"," http://dev.avessoc.org.ve/avessoc-agregar-nuevo-examen/");

//Direccion para generar una nueva solicitud
define("PATH_PAG_NEW_REQUEST","http://dev.avessoc.org.ve/avessoc-nueva-solicitud-paciente/");

//Direccion para agregar nueva preOrden
define("PATH_PAG_ADD_PRE_ORDEN"," http://dev.avessoc.org.ve/avessoc-nueva-preorden/");

//Direccion de busqueda de pre-orden
define("PATH_PAG_SEARCH_PRE_ORDER","http://dev.avessoc.org.ve/avessoc-buscar-preorden/");

//Direccion Carga sponsor
define("PATH_PAG_LOAD_SPONSOR","http://dev.avessoc.org.ve/avessoc-load-sponsor/");

//Carag Datos pre-orden
define("PATH_PAG_DATA_PRE_ORDER","http://dev.avessoc.org.ve/avessod-datos-preoren/");

//Direccion para la pagina de agregar usuario
define("PATH_PAG_ADD_USER","http://dev.avessoc.org.ve/avessoc-agregar-usuario/");

//direccion para la carga de os datos de la pre-orden
define("PATH_PAG_LOAD_PRE_ORDEN"," http://dev.avessoc.org.ve/avessoc-carga-preoren/");

//Direccion para la busqueda de ordenes
define("PATH_PAG_SEARCH_ORDER"," http://dev.avessoc.org.ve/avessoc-busca-ordenes/");

define("PATH_PAG_LOAD_ORDEN","http://dev.avessoc.org.ve/avessoc-carga-orden/")
?>


<!DOCTYPE html>
<html>

<head>

</head>

<body>

<?php
function mostrarMenu(){
    echo '
       <div class="contenedor-menu">

		<ul class="menu">
			<li><a href="#"><i class="icono izquierda fa fa-gift"></i>Fondo Solidario<i class="icono derecha fa fa-chevron-down"></i></a>
				<ul>
                     <li><a href="'.PATH_PAG_REGISTER_PATIENT.'"><i class="icono izquierda fa fa-arrow-right"></i>Registrar nuevos Pacientes</a>
				     <li><a href="'.PATH_PAG_SEARCH_PATIENT.'"><i class="icono izquierda fa fa-arrow-right"></i>Buscar Pacientes</a>
				     <li><a href="'.PATH_PAG_SEARCH_PRE_ORDER.'"><i class="icono izquierda fa fa-arrow-right"></i>Buscar Pre-Ordenes</a>
				     <li><a href="'.PATH_PAG_SEARCH_ORDER.'"><i class="icono izquierda fa fa-arrow-right"></i>Buscar Ordenes</a>
				</ul>
			<li><a href="#"><i class="icono izquierda fa fa-users"></i>Patrocinantes<i class="icono derecha fa fa-chevron-down"></i></a>
				<ul>
					<li><a href="'.PATH_PAG_ADD_SPONSOR.'"><i class="icono izquierda fa fa-arrow-right"></i>Agregar Patrocinantes</a>
                    <li><a href="'.PATH_PAG_SEARCH_SPONSOR.'"><i class="icono izquierda fa fa-arrow-right"></i>Buscar Patrocinantes</a>
				</ul>
			</li>
			<li><a href="#"><i class="icono izquierda fa fa-university"></i>Centros de Salud<i class="icono derecha fa fa-chevron-down"></i></a>
				<ul>
					<li><a href="'.PATH_PAG_ADD_MDCENTER.'"><i class="icono izquierda fa fa-arrow-right"></i>Agregar Centros</a>
                    <li><a href="'.PATH_PAG_SEARCH_MDCENTER.'"><i class="icono izquierda fa fa-arrow-right"></i>Buscar Centros de Salud</a>
				</ul>
			<li><a  href="#"><i class="icono izquierda "></i>Examenes<i class="icono derecha fa fa-chevron-down"></i></a>
			    <ul>
			        <li><a href="#"><i class="icono izquierda fa fa-arrow-right"></i>Buscar examenes en centros</a>
			        <li><a href="'.PATH_PAG_REGISTER_EXAM_FROM_CENTER.'"><i class="icono izquierda fa fa-arrow-right"></i>Registrar examenes en centros</a>
			        <li><a href="'.PATH_PAG_ADD_NEW_EXAM.'"><i class="icono izquierda fa fa-arrow-right"></i>Agregar nuevos examenes</a>
                 </ul>
			</li>
			<li><a  href="#"><i class="icono izquierda "></i>Usuarios<i class="icono derecha fa fa-chevron-down"></i></a>
			    <ul>
			        <li><a href="'.PATH_PAG_ADD_USER.'"><i class="icono izquierda fa fa-arrow-right"></i>Registrar Usuarios</a>
			        <li><a href=""><i class="icono izquierda fa fa-arrow-right"></i>Buscar Usuarios</a>
                 </ul>
			</li>
		</ul>
	</div>
    ';
}

?>

<script language="JavaScript">
    jQuery(function($){
        $('.menu li:has(ul)').click(function(e){
            e.preventDefault();

            if ($(this).hasClass('activado')){
                $(this).removeClass('activado');
                $(this).children('ul').slideUp();
            } else {
                $('.menu li ul').slideUp();
                $('.menu li').removeClass('activado');
                $(this).addClass('activado');
                $(this).children('ul').slideDown();
            }
        });

        $('.btn-menu').click(function(){
            $('.contenedor-menu .menu').slideToggle();
        });

        $(window).resize(function(){
            if ($(document).width() > 450){
                $('.contenedor-menu .menu').css({'display' : 'block'});
            }

            if ($(document).width() < 450){
                $('.contenedor-menu .menu').css({'display' : 'none'});
                $('.menu li ul').slideUp();
                $('.menu li').removeClass('activado');
            }
        });

        $('.menu li ul li a').click(function(){
            window.location.href = $(this).attr("href");
        });
    });

    document.onkeydown = function(e){
        tecla = (document.all) ? e.keyCode : e.which;
        // alert(tecla)
        if (tecla == 116) {return false;}
    }

</script>

</body>

</html>