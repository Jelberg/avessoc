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

?>


<!DOCTYPE html>
<html>
<style>
    * {
        margin: 0;
        padding: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto', sans-serif;
        line-height: 18px;
    }

    a {
        text-decoration: none;
        color:#fff;
    }

    .btn-menu {
        display: none;
        padding: 20px;
        background: #0d2c44;
        color:#fff;
    }

    .btn-menu .icono {
        float: right;
    }

    .contenedor-menu {
        width: 20%;
        min-width: 100%;
        display: inline-block;
        font-family: 'Roboto', sans-serif;
        line-height: 18px;
    }

    .contenedor-menu .menu {
        width: 100%;
    }

    .contenedor-menu ul {
        list-style: none;
    }

    .contenedor-menu .menu li a {
        color:#494949;
        display: block;
        padding: 15px 20px;
        background: #e9e9e9;
    }

    .contenedor-menu .menu li a:hover {
        background: #1a95d5;
        color:#fff;
    }

    .contenedor-menu .menu .icono {
        font-size: 12px;
        line-height: 18px;
    }

    .contenedor-menu .menu .icono.izquierda {
        float: left;
        margin-right: 10px;
    }

    .contenedor-menu .menu .icono.derecha {
        float: right;
        margin-left: 10px;
    }

    .contenedor-menu .menu ul {
        display: none;
    }

    .contenedor-menu .menu ul li a {
        background: #424242;
        color:#e9e9e9;
    }

    .contenedor-menu .menu .activado > a {
        background: #1a95d5;
        color:#fff;
    }

    @media screen and (max-width: 450px) {
        body {
            padding-top: 80px;
        }

        .contenedor-menu {
            margin: 0;
            width: 100%;
            position: fixed;
            top:0;
            z-index: 1000;
        }

        .btn-menu {
            display: block;
        }

        .contenedor-menu .menu {
            display: none;
        }
    }
</style>
<head>

</head>

<body>

<?php
function mostrarMenu(){
    echo '
       <div class="contenedor-menu">

		<ul class="menu">
			<li><a href="#"><i class="icono izquierda fa fa-gift"></i>Pacientes<i class="icono derecha fa fa-chevron-down"></i></a>
				<ul>
                     <li><a href="#"><i class="icono izquierda fa fa-arrow-right"></i>Registrar nuevos Pacientes</a>
				     <li><a href="#"><i class="icono izquierda fa fa-arrow-right"></i>Buscar Pacientes</a>
				</ul>
			<li><a href="#"><i class="icono izquierda fa fa-users"></i>Patrocinantes<i class="icono derecha fa fa-chevron-down"></i></a>
				<ul>
					<li><a href="#"><i class="icono izquierda fa fa-arrow-right"></i>Agregar Patrocinantes</a>
                    <li><a href="#"><i class="icono izquierda fa fa-arrow-right"></i>Buscar Patrocinantes</a>
				</ul>
			</li>
			<li><a href="#"><i class="icono izquierda fa fa-university"></i>Centros de Salud<i class="icono derecha fa fa-chevron-down"></i></a>
				<ul>
					<li><a href="#"><i class="icono izquierda fa fa-arrow-right"></i>Agregar Centros</a>
                    <li><a href="#"><i class="icono izquierda fa fa-arrow-right"></i>Buscar Centros de Salud</a>
				</ul>
			<li><a  href="#"><i class="icono izquierda "></i>Examenes en Centros<i class="icono derecha fa fa-chevron-down"></i></a>
			    <ul>
			        <li><a href="#"><i class="icono izquierda fa fa-arrow-right"></i>Buscar examenes en centros</a>
			        <li><a href="#"><i class="icono izquierda fa fa-arrow-right"></i>Registrar examenes en centros</a>
                 </ul>
			<li><a href="#"><i class="icono izquierda fa fa-university"></i>Examenes<i class="icono derecha fa fa-chevron-down"></i></a>
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
</script>

</body>

</html>