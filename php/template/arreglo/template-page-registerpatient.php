<?php

/* Template Name: Register patient */

get_header();

?>

<head>

<?php
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

$TdocErr = $titularErr = $numerodocErr = $nombre1Err = $apellido1Err =$profesionErr =$nacionalidadErr = $graffar1Err = $g2Err = $g3Err =$g4Err = $sexoErr = $EcivilErr= $numperErr=$ingresoErr="";
$tdoc=$titular=$nameuno = $apellidouno = $profesion= $nacionalidad = $numerodoc = $graffar1 = $g2 =  $g3= $g4 = $sexo=$Ecivil== $numper=$ingresr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cont =0;
    if (empty($_POST["name-uno"])) {
        $nombre1Err = "Requerido";
    } else {
        $nameuno = test_input($_POST["name-uno"]);

    }

    if (empty($_POST["apellido-uno"])) {
        $apellido1Err = "Requerido";
    } else {
        $apellidouno = test_input($_POST["apellido-uno"]);

    }

    if (empty($_POST["oficio"])) {
        $profesionErr = "Requerido";
    } else {
        $profesion = test_input($_POST["oficio"]);

    }

    if (empty($_POST["nacionalidad"])) {
        $nacionalidadErr = "Requerido";
    } else {
        $nacionalidad = test_input($_POST["nacionalidad"]);

    }

    if (empty($_POST["numero-doc"])) {
        $numerodocErr = "Requerido";
    } else {
        $numerodoc = test_input($_POST["numero-doc"]);

    }

    if (empty($_POST["UNO"])) {
        $graffar1Err = "Requerido";
    } else {
        $graffar1 = test_input($_POST["UNO"]);

    }

    if (empty($_POST["DOS"])) {
        $g2Err = "Requerido";
    } else {
        $g2 = test_input($_POST["DOS"]);

    }

    if (empty($_POST["TRES"])) {
        $g3Err = "Requerido";
    } else {
        $g3 = test_input($_POST["TRES"]);

    }

    if (empty($_POST["CUATRO"])) {
        $g4Err = "Requerido";
    } else {
        $g4 = test_input($_POST["CUATRO"]);

    }
    
    if (($_POST["sexo"]) == "-1") {
        $sexoErr = "Requerido";
    } else {
        $sexo = test_input($_POST["sexo"]);
    }
    if (($_POST["estado-civil"]) == "-1") {
        $EcivilErr = "Requerido";
    } else {
        $Ecivil = test_input($_POST["estado-civil"]);
    }
    if (empty($_POST["num-personas"])) {
        $numperErr = "Requerido";
    } else {
        $numper = test_input($_POST["num-personas"]);
    }
    if (empty($_POST["ingreso-promedio"])) {
        $ingresoErr = "Requerido";
    } else {
        $ingresr = test_input($_POST["ingreso-promedio"]);
    }
    if (($_POST["tipo-documento"]) == "-1") {
        $TdocErr = "Requerido";
    } else {
        $tdoc = test_input($_POST["tipo-documento"]);
    }
    if (($_POST["titular"]) == "-1") {
        $titularErr = "Requerido";
    } else {
        $titular = test_input($_POST["titular"]);
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
        <form name="formulario" id="formulario" method="post" action="">
        <section class="grid-2">

            <div class="item1">
                <div class="item-grid-2-border">
                <h3>Datos Personales</h3>
                    <section class="grid-columns">
                                                    <!-- DATOS PERSONALES -->
                        <div class ="item1">
                            <label for="name">Tipo de Documento</label><span class="required">* <?php echo $TdocErr;?></span><br>
                            <select class="form-area" id="tipo-documento" name="tipo-documento">
                                <option value="-1"> >>Seleccione opción<< </option>
                                <option value="V">V</option>
                                <option value="E">E</option>
                                <option value="P">Passaporte</option>
                                <option value="RIF">RIF</option>
                            </select>
                        </div>
                        <div class ="item2">
                            <label for="name">Titular</label><span class="required">* <?php echo $titularErr;?></span><br>
                            <select class="form-area" id="titular" name="titular">
                                <option value="-1"> >>Seleccione opción<< </option>
                                <option value="PR">Propio</option>
                                <option value="M">Madre</option>
                                <option value="P">Padre</option>
                                <option value="R">Representante</option>
                            </select>
                        </div>
                        <div class ="item3">
                            <label for="name">Numero del documento</label><span class="required">* <?php echo $numerodocErr;?></span><br>
                            <input type="text" class="form-area" name="numero-doc" id="numero-doc" value="<?php echo $_POST['numero-doc'] ?>"/>
                        </div>

                        <div class = "item4">
                            <label for="name">Primer Nombre</label><span class="required">* <?php echo $nombre1Err;?></span><br>
                            <input type="text" class="form-area" name="name-uno" id="name-uno" value="<?php echo $_POST['name-uno'] ?>"/>
                        </div>
                        <div class = "item5">
                            <label for="name">Segundo Nombre</label><br>
                            <input type="text" class="form-area" name="name-dos" id="name-dos" value="<?php echo $_POST['name-dos'] ?>"/>
                        </div>

                        <div class = "item6"></div>

                        <div class = "item7">
                            <label for="name">Primer Apellido</label><span class="required">* <?php echo $apellido1Err;?></span><br>
                            <input type="text" class="form-area" name="apellido-uno" id="apellido-uno" value="<?php echo $_POST['apellido-uno'] ?>"/>
                        </div>
                        <div class = "item8">
                            <label for="name">Segundo Apellido</label><br>
                            <input type="text" class="form-area" name="apellido-dos" id="apellido-dos" value="<?php echo $_POST['apellido-dos'] ?>"/>
                        </div>
                        <div class = "item9"></div>
                        <div class = "item10">
                            <label for="name">Fecha de Nacimiento</label><br>
                            <input type="date"  class="form-area" name="birth-date" id="birth-date" value="<?php echo $_POST['birth-date'] ?>"/>
                        </div>

                        <div class = "item11">
                            <label for="name">Sexo</label><span class="required">* <?php echo $sexoErr;?></span><br>
                            <select id="Sexo" class="form-area" name="sexo">
                                <option value="-1"> >>Seleccione opción<< </option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>

                        <div class = "item12"></div>

                        <div class = "item13">
                            <label for="name">Estado Civil</label><span class="required">* <?php echo $EcivilErr;?></span><br>
                            <select id="estado-civil" class="form-area" name="estado-civil" >
                                <option value="-1"> >>Seleccione opción<< </option>
                                <option value="S">Soltero</option>
                                <option value="C">Casado</option>
                                <option value="D">Divorciado</option>
                                <option value="V">Viudo</option>
                            </select>
                        </div>

                        <div class = "item14"></div>

                        <div class = "item-span-two">
                            <label for="name">Profesión u Oficio</label><span class="required">* <?php echo $profesionErr;?></span><br>
                            <input type="text" class="form-area-two"  name="oficio" id="oficio" value="<?php echo $_POST['oficio'] ?>"/>
                        </div>
                        <div class = "item-span-two">
                            <label for="name">Nacionalidad</label><span class="required">* <?php echo $nacionalidadErr;?></span><br>
                            <input type="text" class="form-area-two"  name="nacionalidad" id="nacionalidad" value="<?php echo $_POST['nacionalidad'] ?>"/>
                        </div>

                    <!-- FIN DATOS PERSONALES -->
                    </section> <!--fin section grid-columns-->
                </div>
            </div>
            
            <div class="item3">
                <div class="item-grid-2-border">
                <h3>Detalles de Contacto</h3>
                    <section class="grid-columns">
                    <!-- CONTACTO -->
                        <div class ="item1">
                            <label for="name">Teléfono Local</label><br>
                            <input type="tel" class="form-area-number" name="local" id="local" value="<?php echo $_POST['local'] ?>"/>
                        </div>
                        <div class ="item2">
                            <label for="name">Teléfono Móvil</label><br>
                            <input type="number" class="form-area-number" name="movil" id="movil" value="<?php echo $_POST['movil'] ?>"/>
                        </div>
                            
                        <div class ="item3">
                            <label for="name">Correo</label><br>
                            <input type="email"  class="form-area" name="correo" id="correo" value="<?php echo $_POST['correo'] ?>" placeholder="Ej.: ejemplo@correo.com"/>
                        </div>

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
                            <label for="name">Número de personas que viven en el hogar</label><span class="required">**  <?php echo $numperErr;?> </span><br>
                            <input type="number" class="form-area-number" name="num-personas" id="num-personas" value="<?php echo $_POST['num-personas'] ?>"/>
                        </div>
                        <div class = "item2">
                            <label for="name">Ingreso Promedio Mensual</label><span class="required">**  <?php echo $ingresoErr;?></span><br>
                            <input type="number" class="form-area-number" name="ingreso-promedio" id="ingreso-promedio" value="<?php echo $_POST['ingreso-promedio'] ?>"/>
                        </div>

                        <div class = "item3"></div>

                        <div class = "item-span-two">
                            <label for="name">Tipo de familia con la que convive</label><br>
                            <select id="familia-tipo" name ="familia-tipo"  class="form-area-two">
                                <option value="-1"> >>Seleccione opción<< </option>
                                <option value="Una sola persona">Una sola persona</option>
                                <option value="Pareja sin hijos">Pareja sin hijos</option>
                                <option value="Madre/Padre solo, con hijos">Madre/Padre solo, con hijos</option>
                                <option value="Madre y Padre con hijos y otros parientes">Madre y Padre con hijos y otros parientes</option>
                                <option value="Madre/Padre solo, hijos y otros parientes">Madre/Padre solo, hijos y otros parientes</option>
                                <option value="Niño/a o adolence en entidad de atencion">Niño/a o adolence en entidad de atencion </option>
                                <option value="0">Otro</option>
                            </select>
                        </div>
                        
                        <div class = "item-span-two" id="otro">
                            <label for="name">En caso de ser otro especifique</label><br>
                            <input type="text" class="form-area-two" name="otro-tipo" id="otro-tipo" value="<?php echo $_POST['otro-tipo'] ?>"/>
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
                            <label for="name">Condicion laboral</label><br>
                            <select id="condicion-laboral" name="condicion-laboral" class ="form-area-three">
                                <option value="-1"> >>Seleccione opción<< </option>
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
                        <section>
                            <label>Profesion del jefe del hogar</label><span class="required">** <?php echo $graffar1Err;?></span>
                            <dd><input type="radio" name="UNO" id="UNO" /><label for="uno-1">Profesion Universitaria</label></dd>
                            <dd><input type="radio" name="UNO" id="UNO" /><label for="uno-2">Profesion Tecnica superior o medianos comerciantes o productores</label></dd>
                            <dd><input type="radio" name="UNO" id="UNO" /><label for="uno-3">Empleados sin profesion universitaria. Bachiller tecnico, pequeños comerciantes o propietarios</label></dd>
                            <dd><input type="radio" name="UNO" id="UNO" /><label for="uno-4">Obreros especializados, parte de los trabajadores del sector informal de la economia </label></dd>
                            <dd><input type="radio" name="UNO" id="UNO" /><label for="uno-5">Obreros no especializados y otra parte del sector informal de la economia</label></dd>
                        </section>
                    </li>
                    <li>

                        <section>
                            <label>Nivel de instruccion de la esposa o conyugue</label><span class="required">** <?php echo $g2Err;?></span>
                            <dd><input type="radio" name="DOS" id="DOS" /><label for="dos-1">Enseñanza universitaria o su equivalente</label></dd>
                            <dd><input type="radio" name="DOS" id="DOS" /><label for="dos-2">Enseñan secundaria completa</label></dd>
                            <dd><input type="radio" name="DOS" id="DOS" /><label for="dos-3">Enseñanza secundaria incompleta</label></dd>
                            <dd><input type="radio" name="DOS" id="DOS" /><label for="dos-4">Enseñanza primaria o alfabeta (Algun grado de instruccion primaria)</label></dd>
                            <dd><input type="radio" name="DOS" id="DOS" /><label for="dos-5">Analfabeta</label></dd>
                        </section>
                    </li>
                    <li>
                        <section>
                            <label>Principal fuente de ingreso</label><span class="required">** <?php echo $g3Err;?></span>
                            <dd><input type="radio" name="TRES" id="TRES" /><label for="tres-1">Fortuna heredada o adquirida</label></dd>
                            <dd><input type="radio" name="TRES" id="TRES" /><label for="tres-2">Ganancia, beneficios, honorarios profesionales</label></dd>
                            <dd><input type="radio" name="TRES" id="TRES" /><label for="tres-3">Sueldo mensual</label></dd>
                            <dd><input type="radio" name="TRES" id="TRES" /><label for="tres-4">Sueldo semanal, por dia. Entrada a destajo</label></dd>
                            <dd><input type="radio" name="TRES" id="TRES" /><label for="tres-5">Donaciones de origen público o privado</label></dd>
                        </section>
                    </li>
                    <li>
                        <section>
                            <label>Condiciones de alojamiento</label><span class="required">** <?php echo $g4Err;?></span>
                            <dd><input type="radio" name="CUATRO" id="CUATRO" /><label for="cuatro-1">Vivienda con optimas condiciones sanitarias y ambientales de gran lujo</label></dd>
                            <dd><input type="radio" name="CUATRO" id="CUATRO" /><label for="cuatro-2">Vivienda con óptimas condiciones sanitarias, en ambientes con lujo, sin excesos y suficientes espacios.</label></dd>
                            <dd><input type="radio" name="CUATRO" id="CUATRO" /><label for="cuatro-3">Vivienda con buenas condiciones sanitarias en espacios reducidos o no, pero siempre menores que en la viviendas 1 y 2</label></dd>
                            <dd><input type="radio" name="CUATRO" id="CUATRO" /><label for="cuatro-4">Viviendas con ambientes espaciosos o reducidos y/o con deficiencias en algunas condiciones sanitarias</label></dd>
                            <dd><input type="radio" name="CUATRO" id="CUATRO" /><label for="cuatro-5">Rancho o vivienda con espacios insuficientes y condiciones sanitarias marcadamente inadecuadas</label></dd>
                        </section>
                    </li>

                    <!-- FIN CLASIFICACION GRAFFAR -->
                    </ol>
                </div>
            </div>


                <button type="submit" name="submit" id="submit" onclick="<?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["name-uno"]) or empty($_POST["apellido-uno"]) or empty($_POST["oficio"]) or empty($_POST["nacionalidad"]) or
                    empty($_POST["numero-doc"]) or empty($_POST["UNO"]) /*or empty($_POST["DOS"]) or empty($_POST["TRES"]) or empty($_POST["CUATRO"])*/ or
                    ($_POST["sexo"] == "-1") or ($_POST["estado-civil"] == "-1") or (empty($_POST["num-personas"])) or (empty($_POST["ingreso-promedio"])) or
                    (($_POST["tipo-documento"]) == "-1") or (($_POST["titular"]) == "-1")) {
                        //Debera entrar aqui si cualquier campo obligatorio es vacio
                        //echo"<script>alert('Existen campos vacios')</script>";
                    }
                       else {
                insert_patient($_POST['name-uno'],$_POST['apellido-uno'],$_POST['name-dos'],$_POST['apellido-dos'],
                                                                            $_POST['birth-date'],$_POST['numero-doc'],$_POST['nacionalidad'],$_POST['estado-civil'],$_POST['oficio'],
                                                                            $_POST['sexo'],$_POST['tipo-documento'],$_POST['titular'], $_POST['local'],
                    $_POST['movil'], $_POST['correo'], $_POST['num-personas'], $_POST['ingreso-promedio'], $_POST['familia-tipo'], $_POST['otro-tipo'], $_POST['condicion-laboral']);
                
                    unset($_POST['apellido-uno']);
                    unset($_POST['name-uno']);
                    unset($_POST['name-dos']);
                    unset($_POST['apellido-dos']);
                    unset($_POST['birth-date']);
                    unset($_POST['numero-doc']);
                    unset($_POST['nacionalidad']);
                    unset($_POST['estado-civil']);
                    unset($_POST['oficio']);
                    unset($_POST['sexo']);
                    unset($_POST['tipo-documento']);
                    unset($_POST['titular']); 
                    unset($_POST['local']);
                    unset($_POST['movil']); 
                    unset($_POST['correo']); 
                    unset($_POST['num-personas']); 
                    unset($_POST['ingreso-promedio']); 
                    unset($_POST['familia-tipo']); 
                    unset($_POST['otro-tipo']); 
                    unset($_POST['condicion-laboral']);
                }
            }
                    ?>">Submit</button>
             

        </section><!-- fin  grid-2-->
        </form>
    </div><!-- fin  area-3 del grid-1 -->

</section> <!-- fin  grid-1-->


</body>
