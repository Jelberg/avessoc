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

<head>
</head>

<body>

<?php
function mostrarMenu(){
    echo '
          <div>
            <ul class="tree">
              <li>
                <input type="checkbox" checked="checked" id="c1" />
                <label style="color: #85c1e9" class="tree_label" for="c1">Fondo Solidario</label>
                <ul>
                  <li>
                    <input type="checkbox" checked="checked" id="c2" />
                    <label for="c2" class="tree_label">Pacientes</label>
                    <ul>
                      <li><a style="color: black"href="'.PATH_PAG_SEARCH_PATIENT.'" class="tree_label">Buscar paciente</a></li>
                      <li><a style="color: black" href="'.PATH_PAG_REGISTER_PATIENT.'" class="tree_label">Registrar</a></li>
                    </ul>
                  </li>
                  <li>
                    <input type="checkbox" id="c3" />
                    <label for="c3" class="tree_label">Patrocinantes</label>
                    <ul>
                      <li><a style="color: black" href="'.PATH_PAG_ADD_SPONSOR.'" class="tree_label">Agregar</a></li>
                      <li><a style="color: black" href="'.PATH_PAG_SEARCH_SPONSOR.'" class="tree_label">Buscar patrocinante</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              
              
              <li>
                <input type="checkbox" id="c5" />
                <label style="color: #85c1e9" class="tree_label" for="c5">Level 0</label>
                <ul>
                  <li>
                    <input type="checkbox" id="c6" />
                    <label for="c6" class="tree_label">Level 1</label>
                    <ul>
                      <li><span class="tree_label">Level 2</span></li>
                    </ul>
                  </li>
                  <li>
                    <input type="checkbox" id="c7" />
                    <label for="c7" class="tree_label">Level 1</label>
                    <ul>
                      <li><span class="tree_label">Level 2</span></li>
                      <li>
                        <input type="checkbox" id="c8" />
                        <label for="c8" class="tree_label">Level 2</label>
                        <ul>
                          <li><span class="tree_label">Level 3</span></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
         </div>
    ';
}
?>


</body>

</html>