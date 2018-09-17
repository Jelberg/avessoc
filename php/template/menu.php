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
                <label class="tree_label" for="c1">Fondo Solidario</label>
                <ul>
                  <li>
                    <input type="checkbox" checked="checked" id="c2" />
                    <label for="c2" class="tree_label">Pacientes</label>
                    <ul>
                      <li><a href="http://dev.avessoc.org.ve/avessoc-registro-paciente/" class="tree_label">Registrar nuevo</a></li>
                      <li><a href=" http://dev.avessoc.org.ve/avessor-buscar-pacientes/" class="tree_label">Buscar paciente</a></li>
                    </ul>
                  </li>
                  <li>
                    <input type="checkbox" id="c3" />
                    <label for="c3" class="tree_label">Patrocinantes</label>
                    <ul>
                      <li><a href="http://dev.avessoc.org.ve/avessoc-registro-patrocinante/" class="tree_label">Registrar nuevo</a></li>
                      <li><a href=" http://dev.avessoc.org.ve/avessos-buscar-patrocinante/" class="tree_label">Buscar patrocinante</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              
              
              <li>
                <input type="checkbox" id="c5" />
                <label class="tree_label" for="c5">Level 0</label>
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