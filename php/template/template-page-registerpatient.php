<?php

/* Template Name: Register patient */

get_header();

?>

<head>

<?php

/**
 * Funcion llena el combobox
 * @param $results
 */
function llenaComboBox($results)
 {  // Funcion llena combobox pasando como parrametro un array de la forma
     $cont = 0;
     $key = "";
     foreach ($results as $llave => $valor) {
         foreach ($valor as $value => $option) {
             if ($cont == 0) {
                 $key = $option;
                 $cont += 1;
             } else {
                 echo '<option value ="' . $key . '">' . $option . '</option>';
                 $cont = 0;
             }

         }
     }
 }

?> 

</head>

<body>

<section class="grid-1">

    <div class="area-2">
        <p><?php $hola = read_state();
                  echo print_r($hola);  ?>
        </p>
    </div>

    <div class="area-3">
        <form name="formulario" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <section class="grid-2">
        
            <div class="item1">
                <div class="item-grid-2-border">
                <h3>Datos Personales</h3>
                    <section class="grid-columns">
                                                    <!-- DATOS PERSONALES -->
                        <div class ="item1">
                            <label for="name">Tipo de Documento</label><span class="required">* </span><br>
                            <select class="form-area" id="tipo-documento" name="tipo-documento">
                                <option value="-1"><< Seleccione tipo de documento >></option>
                                <option value="V">V</option>
                                <option value="E">E</option>
                                <option value="P">Passaporte</option>
                                <option value="RIF">RIF</option>
                            </select>
                        </div>
                        <div class ="item2">
                            <label for="name">Titular</label><span class="required">* </span><br>
                            <select class="form-area" id="titular" name="titular">
                                <option value="-1"><< Seleccione titular del documento >></option>
                                <option value="PR">Propio</option>
                                <option value="M">Madre</option>
                                <option value="P">Padre</option>
                                <option value="R">Representante</option>
                            </select>
                        </div>
                        <div class ="item3">
                            <label for="name">Numero del documento</label><span class="required">* </span><br>
                            <input type="text" class="form-area" name="numero-doc" id="numero-doc"  />
                        </div>

                        <div class = "item4">
                            <label for="name">Primer Nombre</label><span class="required">* </span><br>
                            <input type="text" class="form-area" name="name-uno" id="name-uno" />
                        </div>
                        <div class = "item5">
                            <label for="name">Segundo Nombre</label><br>
                            <input type="text" class="form-area" name="name-dos" id="name-dos" />
                        </div>

                        <div class = "item6"></div>  
                        
                        <div class = "item7">
                            <label for="name">Primer Apellido</label><span class="required">* </span><br>
                            <input type="text" class="form-area" name="apellido-uno" id="apellido-uno" />
                        </div>
                        <div class = "item8">
                            <label for="name">Segundo Apellido</label><br>
                            <input type="text" class="form-area" name="apellido-dos" id="apellido-dos" />
                        </div>
                        <div class = "item9"></div>
                        <div class = "item10">
                            <label for="name">Fecha de Nacimiento</label><span class="required">* </span><br>
                            <input type="date"  class="form-area" name="birth-date" id="birth-date" />
                        </div>

                        <div class = "item11">
                            <label for="name">Sexo</label><span class="required">* </span><br>
                            <select id="Sexo" class="form-area" name="sexo">
                                <option value="-1"><< Seleccione sexo >></option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>

                        <div class = "item12"></div>

                        <div class = "item13">
                            <label for="name">Estado Civil</label><span class="required">* </span><br>
                            <select id="estado-civil" class="form-area" name="estado-civil" >
                                <option value="-1"><< Seleccione estado civil >></option>
                                <option value="S">Soltero</option>
                                <option value="C">Casado</option>
                                <option value="D">Divorciado</option>
                                <option value="V">Viudo</option>
                            </select>
                        </div>

                        <div class = "item14"></div>
                        
                        <div class = "item-span-two">
                            <label for="name">Profesion u Oficio</label><span class="required">* </span><br>
                            <input type="text" class="form-area-two"  name="oficio" id="oficio" />
                        </div>
                        <div class = "item-span-two">
                            <label for="name">Nacionalidad</label><span class="required">* </span><br>
                            <input type="text" class="form-area-two"  name="nacionalidad" id="nacionalidad" />
                        </div>
                    
                    <!-- FIN DATOS PERSONALES -->
                    </section> <!--fin section grid-columns-->
                </div>
            </div>


           
            <div class="item2">
                <div class="item-grid-2-border">
                 <h3>Detalles de Direccion</h3>
                  <section class="grid-columns">
                    <!-- DIRECCION -->
                   <div class = "item1">
                        <label for="name">Estado</label><span class="required">* </span><br>
                            <select id="estado" name="estado" class = "form-area">
                                <option value="-1"><< Seleccione un Esatdo >></option>
                                <?php
                                    $results = read_state();
                                    llenaComboBox($results);
                                ?> 

                            <select id="estado" class = "form-area">

                            </select>
                        </div>

                        <div class="item2">                  
                                <label for="name">Municipio</label><br>
                                <select id="municipio" class="form-area">
                                    <option value="-1"><< Seleccione un municipio >></option>
                                </select>
                        </div>

                        <div class ="item3">
                                <label for="name">Parroquia</label><br>
                                <select id="parroquia" class="form-area">
                                    <option value="-1"><< Seleccione una parroquia >></option>
                                </select>
                        </div>

                        <div class ="item-span-three">
                                <label for="name">Direccion</label><br>
                                <input type="text" class="form-area-three" name="direccion" id="direccion" />        
                        </div>
                
                    <!-- FIN DIRECCION -->
                    </section>
                </div>
            </div>


            
            <div class="item3">
                <div class="item-grid-2-border">
                <h3>Detalles de Contacto</h3>
                    <section class="grid-columns">

                    <!-- CONTACTO -->
                        <div class ="item1">
                            <label for="name">Teléfono Local</label><span class="required">* </span><br>
                            <input type="number" class="form-area-number" name="local" id="local" /><br>

                            <br><br>
                        </div>
                        <div class ="item2">
                            <label for="name">Teléfono Móvil</label><span class="required">* </span><br>
                            <input type="number" class="form-area-number" name="movil" id="movil" /><br>

                            <br><br>
                        </div>
                            
                        <div class ="item3">
                            <label for="name">Correo</label><br>
                            <input type="text"  class="form-area" name="correo" id="correo" /><br>

                            <br><br>
                        </div>
                        <span class="required"> Ingresar al menos un número telefónico </span><br>
                    <!-- FIN CONTACTO -->
                    </section>
                </div>
            </div>



                
            <div class="item4">
                <div class="item-grid-2-border">
                <h3>Composición Familiar</h3>
                    <!-- COMPOSICION FAMILIAR -->
                    <section class="grid-columns">
                        <div class = "item1">
                            <label for="name">Número de personas que viven en el hogar</label><span class="required">** </span><br>
                            <input type="number" class="form-area-number" name="num-personas" id="num-personas" />
                        </div>
                        <div class = "item2">
                            <label for="name">Ingreso Promedio Mensual</label><span class="required">** </span><br>
                            <input type="number" class="form-area-number" name="ingreso-promedio" id="ingreso-promedio" />
                        </div>

                        <div class = "item3"></div>

                        <div class = "item-span-two">
                            <label for="name">Tipo de familia con la que convive</label><br>
                            <select id="familia-tipo" class="form-area-two" name ="familia-tipo">
                                <option value="-1"><< Seleccione tipo de familia >></option>
                                <option value="Una sola persona">Una sola persona</option>
                                <option value="Pareja sin hijos">Pareja sin hijos</option>
                                <option value="Madre/Padre solo, con hijos">Madre/Padre solo, con hijos</option>
                                <option value="Madre y Padre con hijos y otros parientes">Madre y Padre con hijos y otros parientes</option>
                                <option value="Madre/Padre solo, hijos y otros parientes">Madre/Padre solo, hijos y otros parientes</option>
                                <option value="Niño/a o adolence en entidad de atencion ">Niño/a o adolence en entidad de atencion </option>
                                <option value="0">Otro</option>
                            </select>
                        </div>
                        
                        <div class = "item-span-two" id="otro">
                            <label for="name">En caso de ser otro especifique</label><br>
                            <input type="text" class="form-area-two" name="otro-tipo" id="otro-tipo" />
                        </div>

                    </section>
                    <!-- FIN COMPOSICION FAMILIAR -->
                </div>
            </div>

                
            <div class="item5">
                
                <div class="item-grid-2-border">
                <h3>Detalles Laborales</h3> 
                    <!-- DETALLE LABORAL -->
                    <section class="grid-columns">
                        <div class = "item-span-three">
                            <label for="name">Condición laboral</label><br>
                            <select id="condicion-laboral" name="condicion-laboral" class ="form-area-three">
                                <option value="-1"><< Seleccione condición laboral >></option>
                                <option value="Desocupado/ Sin trabajo">Desocupado/ Sin trabajo</option>
                                <option value="Oficios del hogar">Oficios del hogar</option>
                                <option value="Trabajo formal (Empresas, Organismos de estados, etc.)">Trabajo formal (Empresas, Organismos de estados, etc.)</option>
                                <option value="Trabajo informal a destajo, trabajo temporal)">Trabajo informal a destajo, trabajo temporal)</option>
                            </select>
                    </div>
                    </section>
                    <!-- FIN DETALLE LABORAL -->
                </div>
            </div>


                
            <div class="item6">
            
                <div class="item-grid-2-border">
                <h3>Clasificación Graffar</h3>
                    <ol>
                    <!-- CLASIFICACION GRAFFAR -->
                    <li>
                        <form>
                            <label>Profesion del jefe del hogar</label><span class="required">** </span>
                            <dd><input type="radio" name="UNO" id="uno-1" /><label for="uno-1">Profesión Universitaria</label></dd>
                            <dd><input type="radio" name="UNO" id="uno-2" /><label for="uno-2">Profesión Tecnica superior o medianos comerciantes o productores</label></dd>
                            <dd><input type="radio" name="UNO" id="uno-3" /><label for="uno-3">Empleados sin profesion universitaria. Bachiller tecnico, pequeños comerciantes o propietarios</label></dd>
                            <dd><input type="radio" name="UNO" id="uno-4" /><label for="uno-4">Obreros especializados, parte de los trabajadores del sector informal de la economia </label></dd>
                            <dd><input type="radio" name="UNO" id="uno-5" /><label for="uno-5">Obreros no especializados y otra parte del sector informal de la economia</label></dd>
                        </form>
                    </li>
                    <li>

                        <form>
                            <label>Nivel de instruccion de la esposa o conyugue</label><span class="required">** </span>
                            <dd><input type="radio" name="DOS" id="dos-1" /><label for="dos-1">Enseñanza universitaria o su equivalente</label></dd>
                            <dd><input type="radio" name="DOS" id="dos-2" /><label for="dos-2">Enseñan secundaria completa</label></dd>
                            <dd><input type="radio" name="DOS" id="dos-3" /><label for="dos-3">Enseñanza secundaria incompleta</label></dd>
                            <dd><input type="radio" name="DOS" id="dos-4" /><label for="dos-4">Enseñanza primaria o alfabeta (Algun grado de instruccion primaria)</label></dd>
                            <dd><input type="radio" name="DOS" id="dos-5" /><label for="dos-5">Analfabeta</label></dd>
                        </form>
                    </li>
                    <li>
                        <form>
                            <label>Principal fuente de ingreso</label><span class="required">** </span>
                            <dd><input type="radio" name="TRES" id="tres-1" /><label for="tres-1">Fortuna heredada o adquirida</label></dd>
                            <dd><input type="radio" name="TRES" id="tres-2" /><label for="tres-2">Ganancia, beneficios, honorarios profesionales</label></dd>
                            <dd><input type="radio" name="TRES" id="tres-3" /><label for="tres-3">Sueldo mensual</label></dd>
                            <dd><input type="radio" name="TRES" id="tres-4" /><label for="tres-4">Sueldo semanal, por dia. Entrada a destajo</label></dd>
                            <dd><input type="radio" name="TRES" id="tres-5" /><label for="tres-5">Donaciones de origen público o privado</label></dd>
                        </form>
                    </li>
                    <li>
                        <form>
                            <label>Condiciones de alojamiento</label><span class="required">** </span>
                            <dd><input type="radio" name="CUATRO" id="cuatro-1" /><label for="">Vivienda con optimas condiciones sanitarias y ambientales de gran lujo</label></dd>
                            <dd><input type="radio" name="CUATRO" id="cuatro-2" /><label for="">Vivienda con óptimas condiciones sanitarias, en ambientes con lujo, sin excesos y suficientes espacios.</label></dd>
                            <dd><input type="radio" name="CUATRO" id="cuatro-3" /><label for="">Vivienda con buenas condiciones sanitarias en espacios reducidos o no, pero siempre menores que en la viviendas 1 y 2</label></dd>
                            <dd><input type="radio" name="CUATRO" id="cuatro-4" /><label for="">Viviendas con ambientes espaciosos o reducidos y/o con deficiencias en algunas condiciones sanitarias</label></dd>
                            <dd><input type="radio" name="CUATRO" id="cuatro-5" /><label for="">Rancho o vivienda con espacios insuficientes y condiciones sanitarias marcadamente inadecuadas</label></dd>
                        </form>
                    </li>

                    <!-- FIN CLASIFICACION GRAFFAR -->
                    </ol>
                </div>
            </div>

            <section class="right">
                <button class="button-just" type="submit" name="submit" id="submit" onclick="<?php
                if (    !(  (empty($_GET["correo"])) && (empty($_GET["local"])) && (empty($_GET["movil"]))  )   ) {
                    insert_patient($_GET['name-uno'], $_GET['apellido-uno'], $_GET['name-dos'], $_GET['apellido-dos'], $_GET['birth-date'], $_GET['numero-doc'], $_GET['nacionalidad'], $_GET['estado-civil'], $_GET['oficio'], $_GET['sexo'], $_GET['tipo-documento'], $_GET['titular'], $_GET['local'], $_GET['movil'], $_GET['correo'], $_GET['num-personas'], $_GET['ingreso-promedio'], $_GET['familia-tipo'], $_GET['otro-tipo'], $_GET['condicion-laboral']);
                }
                ?>">REGISTRAR USUARIO</button>

                <button class="button-comp" type="submit" name="submit" id="submit" onclick="<?php

                ?>">REGISTRAR Y CREAR PRE-ORDEN</button>
            </section>

        </section><!-- fin  grid-2-->
        </form>
    </div><!-- fin  area-3 del grid-1 -->

</section> <!-- fin  grid-1-->

</body>
