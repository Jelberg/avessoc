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



// Variables de Error campos de texto vacio
$TdocErr =$localErr=$correoErr =$titularErr=$movilErr = $numerodocErr = $nombre1Err = $nombre2Err = $apellido1Err =$apellido2Err =$profesionErr =$nacionalidadErr = $graffar1Err = $g2Err = $g3Err =$g4Err = $sexoErr = $EcivilErr= $numperErr=$ingresoErr="";

 //Variables de error de mensajes paar campos de texto
$nombre1Errmsj=$nombre2Errmsj=$apellido1Errmsj=$apellido2Errmsj=$profesionErrmsj=$nacionalidadErrmsj=$numerodocErrmsj=$tipofamiliamsj="";

//Variables con los valores que toman con el array $_POST
$tdoc=$titular=$nameuno =$namedos= $apellidouno = $apellidodos= $condicion = $tipofamilia= $profesion= $nacionalidad = $numerodoc = $graffar1 = $g2 =  $g3= $g4 = $sexo=$Ecivil= $numper=$ingresr="";
$apellido2=$nombre2=$local=$movil=$email=$otrof="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $tipofamilia = test_input($_POST["familia-tipo"]);
    $otrof = test_input($_POST["otro-tipo"]);
    $condicion = test_input($_POST["condicion-laboral"]);
    $apellido2 = test_input($_POST["apellido-dos"]);
    $nombre2 = test_input($_POST["name-dos"]);
    $profesion = test_input($_POST["oficio"]);
    $email = test_input($_POST["correo"]);
    $local = test_input($_POST["local"]);
    $movil = test_input($_POST["movil"]);
    $nameuno = test_input($_POST["name-uno"]);
    $apellidouno = test_input($_POST["apellido-uno"]);
    $apellidodos = test_input($_POST["apellido-dos"]);
    $namedos = test_input($_POST["name-dos"]);
    $nacionalidad = test_input($_POST["nacionalidad"]);
    $numerodoc = test_input($_POST["numero-doc"]);
    //

    //Regla nombre
    if (empty($_POST['name-uno'])) {
        $nombre1Err = "Requerido";
    } elseif (!preg_match("/^[a-zA-Z ]*$/",$nameuno)) {
        $nombre1Errmsj = "Sólo se permiten letras y espacios en blanco.";
    } else {  //Caso verdadero obtenemos datos.
        $nameuno = test_input($_POST['name-uno']);
    }

    if (empty($_POST["apellido-uno"])) {
        $apellido1Err = "Requerido";
        }
        elseif (!preg_match("/^[a-zA-Z ]*$/",$apellidouno)){
            $apellido1Errmsj = "Sólo se permiten letras y espacios en blanco.";
            }
     else {
        $apellidouno = test_input($_POST["apellido-uno"]);
     }


    if (empty($_POST["apellido-dos"])) {
        $apellido2Err = "Requerido";
        }
        elseif (!preg_match("/^[a-zA-Z ]*$/",$apellidodos)){
            $apellido2Errmsj = "Sólo se permiten letras y espacios en blanco.";
            }
     else {
        $apellidodos = test_input($_POST["apellido-dos"]);
     }

    if (empty($_POST["name-dos"])) {
        $nombre2Err = "Requerido";
    }
        elseif (!preg_match("/^[a-zA-Z ]*$/",$namedos)){
            $nombre2Errmsj = "Sólo se permiten letras y espacios en blanco.";
            }
     else {
        $namedos = test_input($_POST["name-dos"]);
     }

    if (empty($_POST["oficio"])) {
        $profesionErr = "Requerido";
    }
        elseif (!preg_match("/^[a-zA-Z ]*$/",$profesion)){
        $profesionErrmsj = "Sólo se permiten letras y espacios en blanco.";
    } else {
        $profesion = test_input($_POST["oficio"]);
    }

    if (empty($_POST["nacionalidad"])) {
        $nacionalidadErr = "Requerido";
    } elseif (!preg_match("/^[a-zA-Z ]*$/",$nacionalidad)) {
        $nacionalidadErrmsj = "Sólo se permiten letras y espacios en blanco.";
    }else {
        $nacionalidad = test_input($_POST["nacionalidad"]);

    }
/*
    if (empty($_POST["numero-doc"])) {
        $numerodocErr = "Requerido";
    } elseif (!preg_match("/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/", $numerodoc)) {
        $numerodocErrmsj = "\n Número de documento no valido";
    } else {
        $numerodoc = test_input($_POST["numero-doc"]);
    }
*/
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

    if (($_POST["sexo"]) == "") {
        $sexoErr = "Requerido";
    } else {
        $sexo = test_input($_POST["sexo"]);
    }
    if (($_POST["estado-civil"]) == "") {
        $EcivilErr = "Requerido";
    } else {
        $Ecivil = test_input($_POST["estado-civil"]);
    }

    //Regla para el tipo de familia
    if (($_POST["familia-tipo"]) == "0" and empty($_POST["otro-tipo"]) ) {
        $tipofamiliamsj = "Tiene que especificar el tipo de familia";
    }else {
        $otrof = test_input($_POST["otro"]);
    }

    //Regla numero de personas que habitan en el hogar
    if (empty($_POST["num-personas"])) {
        $numperErr = "Requerido";
    } else {
        $numper = test_input($_POST["num-personas"]);
    }

    //Regla ingreso promedio
    if (empty($_POST["ingreso-promedio"])) {
        $ingresoErr = "Requerido";
    } else {
        $ingresr = test_input($_POST["ingreso-promedio"]);
    }

    if (($_POST["tipo-documento"]) == "") {
        $TdocErr = "Requerido";
    } else {
        $tdoc = test_input($_POST["tipo-documento"]);
    }

    if (($_POST["titular"]) == "") {
        $titularErr = "Requerido";
    } else {
        $titular = test_input($_POST["titular"]);
    }

     //Regla telefono movil.
 /* if (empty($_POST['movil'])) {
  } elseif (!preg_match("/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/", $movil)) {
    $movilErr = "\n Número teléfono móvil no valido";
  } else { //Caso verdadero obtenemos datos.  
    $movil = test_input($_POST['movil']);
  }

       //Regla telefono local.
       if (empty($_POST['local'])) {
      } elseif (!preg_match("/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/", $local)) {
        $localErr = "\n Número teléfono local no valido";
      } else { //Caso verdadero obtenemos datos.  
        $local = test_input($_POST['local']);
      }*/

}

//Function -> Salida de datos.
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
                            <select class="form-area" id="tipo-documento" name="tipo-documento" required>
                                <option value="" selected> >>Seleccione opción<< </option>
                                <?php
            
                                        $datos = array("V","E","Passaporte","RIF");
                                        $valor = array("V","E","Passaporte","RIF");
                                        
                                        for($i=0; $i<count($datos); $i++)
                                        {
                                            if($valor[$i]==$tdoc) // Compara si el valor que se guarda en tdoc se encuentra dentro del arreglo
                                            {
                                                echo "<option value='".$valor[$i]."' selected>".$datos[$i]."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='".$valor[$i]."'>".$datos[$i]."</option>";
                                            }
                                        }

                                ?>
                            </select>
                        </div>



                        <div class ="item2">
                            <label for="name">Titular</label><span class="required">* <?php echo $titularErr;?></span><br>
                            <select class="form-area" id="titular" name="titular" required>
                                <option value="" selected> >>Seleccione opción<< </option>
                                <?php
                                        
                                        $datos = array("Propio","Madre","Padre","Representante");
                                        $valor = array("PR","M","P","R");
                                        
                                        for($i=0; $i<count($datos); $i++)
                                        {
                                            if($valor[$i]==$titular) // Compara si el valor que se guarda en tdoc se encuentra dentro del arreglo
                                            {
                                                echo "<option value='".$valor[$i]."' selected>".$datos[$i]."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='".$valor[$i]."'>".$datos[$i]."</option>";
                                            }
                                        }

                                ?>
                            </select>
                        </div>
                        <div class ="item3">
                            <label for="name">Número del documento</label><span class="required">* <?php echo $numerodocErr;?></span><br>
                            <input type="number" class="form-area-number" name="numero-doc" id="numero-doc" min="1" pattern="^[0-9]+" value="<?php echo $numerodoc ?>"required/><br>
                            <?php //if (!empty($numerodocErrmsj)) {  echo "<span class=estiloError>$numerodocErrmsj</span>";  }  ?>
                        </div>

                        <div class = "item4">
                            <label for="name">Primer Nombre</label><span class="required">* <?php echo $nombre1Err;?></span><br>
                            <input type="tel" class="form-area" name="name-uno" id="name-uno" value="<?php echo htmlentities($nameuno) ?>" required/><br>
                            <?php if (!empty($nombre1Errmsj)) {  echo "<span class=estiloError>$nombre1Errmsj</span>";  }  ?>

                        </div>
                        <div class = "item5">
                            <label for="name">Segundo Nombre</label><br>
                            <input type="text" class="form-area" name="name-dos" id="name-dos" value="<?php echo htmlentities($nombre2) ?>"/><br>
                            <?php if (!empty($nombre2Errmsj)) {  echo "<span class=estiloError>$nombre2Errmsj</span>";  }  ?>
                        </div>

                        <div class = "item6"></div>

                        <div class = "item7">
                            <label for="name">Primer Apellido</label><span class="required">* <?php echo $apellido1Err;?></span><br>
                            <input type="text" class="form-area" name="apellido-uno" id="apellido-uno" value="<?php echo htmlentities($apellidouno) ?>" required/><br>
                            <?php if (!empty($apellido1Errmsj)) {  echo "<span class=estiloError>$apellido1Errmsj</span>";  }  ?>
                        </div>
                        <div class = "item8">
                            <label for="name">Segundo Apellido</label><br>
                            <input type="text" class="form-area" name="apellido-dos" id="apellido-dos" value="<?php echo htmlentities($apellido2) ?>"/><br>
                            <?php if (!empty($apellido2Errmsj)) {  echo "<span class=estiloError>$apellido2Errmsj</span>";  }  ?>
                        </div>
                        <div class = "item9"></div>
                        <div class = "item10">
                            <label for="name">Fecha de Nacimiento</label><br>
                            <input type="date"  class="form-area" name="birth-date" id="birth-date" value="<?php echo $fnac ?>"/>
                        </div>

                        <div class = "item11">
                            <label for="name">Sexo</label><span class="required">* <?php echo $sexoErr;?></span><br>
                            <select id="Sexo" class="form-area" name="sexo" required>
                                <option value="" selected> >>Seleccione opción<< </option>
                                <?php
                                        
                                        $datos = array("Masculino","Femenino");
                                        $valor = array("M","F");
                                        
                                        for($i=0; $i<count($datos); $i++)
                                        {
                                            if($valor[$i]==$sexo) // Compara si el valor que se guarda en tdoc se encuentra dentro del arreglo
                                            {
                                                echo "<option value='".$valor[$i]."' selected>".$datos[$i]."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='".$valor[$i]."'>".$datos[$i]."</option>";
                                            }
                                        }

                                ?>
                            </select>
                        </div>

                        <div class = "item12"></div>

                        <div class = "item13">
                            <label for="name">Estado Civil</label><span class="required">* <?php echo $EcivilErr;?></span><br>
                            <select id="estado-civil" class="form-area" name="estado-civil" required>
                                <option value="" selected> >>Seleccione opción<< </option>
                            <?php
                                        
                                        $datos = array("Soltero","Casado","Divorciado","Viudo");
                                        $valor = array("S","C","D","V");
                                        
                                        for($i=0; $i<count($datos); $i++)
                                        {
                                            if($valor[$i]==$Ecivil) 
                                            {
                                                echo "<option value='".$valor[$i]."' selected>".$datos[$i]."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='".$valor[$i]."'>".$datos[$i]."</option>";
                                            }
                                        }

                                ?>
                            </select>
                        </div>

                        <div class = "item14"></div>

                        <div class = "item-span-two">
                            <label for="name">Profesión u Oficio</label><span class="required">* <?php echo $profesionErr;?></span><br>
                            <input type="text" class="form-area-two"  name="oficio" id="oficio" value="<?php echo $profesion ?>" required/><br>
                            <?php if (!empty($profesionErrmsj)) {  echo "<span class=estiloError>$profesionErrmsj</span>";  }  ?>
                        </div>
                        <div class = "item-span-two">
                            <label for="name">Nacionalidad</label><span class="required">* <?php echo $nacionalidadErr;?></span><br>
                            <input type="text" class="form-area-two"  name="nacionalidad" id="nacionalidad" value="<?php echo $nacionalidad?>" required/><br>
                            <?php if (!empty($nacionalidadErrmsj)) {  echo "<span class=estiloError>$nacionalidadErrmsj</span>";  }  ?>
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
                            <input type="number" class="form-area-number" name="local"  min="1" pattern="^[0-9]+" id="local" value="<?php echo $local ?>"/><br>
                            <?php //if (!empty($localErr)) {  echo "<span class=estiloError>$localErr</span>";  }  ?>
                        </div>
                        <div class ="item2">
                            <label for="name">Teléfono Móvil</label><br>
                            <input type="number" class="form-area-number" name="movil" id="movil"  min="1" pattern="^[0-9]+" value='<?php echo htmlentities($movil) ?>' /><br>
                            <?php //if (!empty($movilErr)) {  echo "<span class=estiloError>$movilErr</span>";  }  ?>
                        </div>

                        <div class ="item3">
                            <label for="name">Correo</label><br>
                            <input type="email"  class="form-area" name="correo" id="correo" value="<?php echo htmlentities($email) ?>" placeholder="Ej.: ejemplo@correo.com"/><br>
                            <?php if (!empty($correoErr)) {  echo "<span class=estiloError>$correoErr</span>";  }  ?>
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
                            <input type="number" class="form-area-number" name="num-personas" id="num-personas"  min="1" pattern="^[0-9]+" value="<?php echo $numper ?>" required/>
                        </div>
                        <div class = "item2">
                            <label for="name">Ingreso Promedio Mensual</label><span class="required">**  <?php echo $ingresoErr;?></span><br>
                            <input type="number" class="form-area-number" name="ingreso-promedio" id="ingreso-promedio"  min="1" pattern="^[0-9]+" value="<?php echo $ingresr ?>" required/>
                        </div>

                        <div class = "item3"></div>

                        <div class = "item-span-two">
                            <label for="name">Tipo de familia con la que convive</label><br>
                            <select id="familia-tipo" name ="familia-tipo"  class="form-area-two" onchange="muestraInfo()">
                                <option value="" selected> >>Seleccione opción<< </option>
                                <?php
                                        
                                        $datos = array("Una sola persona","Pareja sin hijos","Madre/Padre solo, con hijos","Madre y Padre con hijos y otros parientes","Madre/Padre solo, hijos y otros parientes","Niño/a o adolence en entidad de atencion","Otro");
                                        $valor = array("Una sola persona","Pareja sin hijos","Madre/Padre solo, con hijos","Madre y Padre con hijos y otros parientes","Madre/Padre solo, hijos y otros parientes","Niño/a o adolence en entidad de atencion","0");
                                                                  
                                        for($i=0; $i<count($datos); $i++)
                                        {
                                            if($valor[$i]==$tipofamilia) 
                                            {
                                                echo "<option value='".$valor[$i]."' selected>".$datos[$i]."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='".$valor[$i]."'>".$datos[$i]."</option>";
                                            }
                                        }

                                ?>
                            </select>
                        </div>
                        
                        <div class = "item-span-two" id="otro" style="display: block|none;">
                            <label for="name">En caso de ser otro especifique</label><br>
                            <input type="text" class="form-area-two" name="otro-tipo" id="otro-tipo" value="<?php echo $otrof ?>" /><br>
                            <?php if (!empty($tipofamiliamsj)) {  echo "<span class=estiloError>$tipofamiliamsj</span>";  }  ?>
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
                                <option value="" selected> >>Seleccione opción<< </option>
                                <?php
                                        
                                        $datos = array("Desocupado/ Sin trabajo","Oficios del hogar","Trabajo formal (Empresas, Organismos de estados, etc.)","Trabajo informal a destajo, trabajo temporal)");
                                        $valor = array("Desocupado/ Sin trabajo","Oficios del hogar","Trabajo formal (Empresas, Organismos de estados, etc.)","Trabajo informal a destajo, trabajo temporal)");
                                                                  
                                        for($i=0; $i<count($datos); $i++)
                                        {
                                            if($valor[$i]==$condicion) 
                                            {
                                                echo "<option value='".$valor[$i]."' selected>".$datos[$i]."</option>";
                                            }
                                            else
                                            {
                                                echo "<option value='".$valor[$i]."'>".$datos[$i]."</option>";
                                            }
                                        }

                                ?>
                            
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
                            <dd><input type="radio" name="UNO" id="UNO" required/><label for="uno-1">Profesion Universitaria</label></dd>
                            <dd><input type="radio" name="UNO" id="UNO" /><label for="uno-2">Profesion Tecnica superior o medianos comerciantes o productores</label></dd>
                            <dd><input type="radio" name="UNO" id="UNO" /><label for="uno-3">Empleados sin profesion universitaria. Bachiller tecnico, pequeños comerciantes o propietarios</label></dd>
                            <dd><input type="radio" name="UNO" id="UNO" /><label for="uno-4">Obreros especializados, parte de los trabajadores del sector informal de la economia </label></dd>
                            <dd><input type="radio" name="UNO" id="UNO" /><label for="uno-5">Obreros no especializados y otra parte del sector informal de la economia</label></dd>
                        </section>
                    </li>
                    <li>

                        <section>
                            <label>Nivel de instruccion de la esposa o conyugue</label><span class="required">** <?php echo $g2Err;?></span>
                            <dd><input type="radio" name="DOS" id="DOS" required/><label for="dos-1">Enseñanza universitaria o su equivalente</label></dd>
                            <dd><input type="radio" name="DOS" id="DOS" /><label for="dos-2">Enseñan secundaria completa</label></dd>
                            <dd><input type="radio" name="DOS" id="DOS" /><label for="dos-3">Enseñanza secundaria incompleta</label></dd>
                            <dd><input type="radio" name="DOS" id="DOS" /><label for="dos-4">Enseñanza primaria o alfabeta (Algun grado de instruccion primaria)</label></dd>
                            <dd><input type="radio" name="DOS" id="DOS" /><label for="dos-5">Analfabeta</label></dd>
                        </section>
                    </li>
                    <li>
                        <section>
                            <label>Principal fuente de ingreso</label><span class="required">** <?php echo $g3Err;?></span>
                            <dd><input type="radio" name="TRES" id="TRES" required/><label for="tres-1">Fortuna heredada o adquirida</label></dd>
                            <dd><input type="radio" name="TRES" id="TRES" /><label for="tres-2">Ganancia, beneficios, honorarios profesionales</label></dd>
                            <dd><input type="radio" name="TRES" id="TRES" /><label for="tres-3">Sueldo mensual</label></dd>
                            <dd><input type="radio" name="TRES" id="TRES" /><label for="tres-4">Sueldo semanal, por dia. Entrada a destajo</label></dd>
                            <dd><input type="radio" name="TRES" id="TRES" /><label for="tres-5">Donaciones de origen público o privado</label></dd>
                        </section>
                    </li>
                    <li>
                        <section>
                            <label>Condiciones de alojamiento</label><span class="required">** <?php echo $g4Err;?></span>
                            <dd><input type="radio" name="CUATRO" id="CUATRO" required/><label for="cuatro-1">Vivienda con óptimas condiciones sanitarias y ambientales de gran lujo</label></dd>
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


                    if ((!preg_match("/^[a-zA-Z ]*$/",$nameuno) or !preg_match("/^[a-zA-Z ]*$/",$apellidouno)) or !preg_match("/^[a-zA-Z ]*$/",$namedos) or
                        !preg_match("/^[a-zA-Z ]*$/",$apellidodos) or !preg_match("/^[a-zA-Z ]*$/",$profesion) or !preg_match("/^[a-zA-Z ]*$/",$nacionalidad) ){

                        //Debera entrar si los campos no son vacios o no tienen ningun caracter invalido

                    } elseif (($_POST["familia-tipo"]) == "0" and (empty($_POST["otro-tipo"])  )) {
                        //No hace insercion si el tipo de familia es otro y no se a llenado la especificacion
                    }
                       else {

                insert_patient($_POST['name-uno'],$_POST['apellido-uno'],$_POST['name-dos'],$_POST['apellido-dos'],
                                                                            $_POST['birth-date'],$_POST['numero-doc'],$_POST['nacionalidad'],$_POST['estado-civil'],$_POST['oficio'],
                                                                            $_POST['sexo'],$_POST['tipo-documento'],$_POST['titular'], $_POST['local'],
                    $_POST['movil'], $_POST['correo'], $_POST['num-personas'], $_POST['ingreso-promedio'], $_POST['familia-tipo'], $_POST['otro-tipo'], $_POST['condicion-laboral']);
                
                    //Limpio el arreglo $_POST
                    unset($_POST["name-uno"]);
                    unset($_POST["apellido-uno"]);
                    unset($_POST["name-dos"]);
                    unset($_POST["apellido-dos"]);
                    unset($_POST["birth-date"]);
                    unset($_POST["numero-doc"]);
                    unset($_POST["nacionalidad"]);
                    unset($_POST["estado-civil"]);
                    unset($_POST["oficio"]);
                    unset($_POST["sexo"]);
                    unset($_POST["tipo-documento"]);
                    unset($_POST["titular"]); 
                    unset($_POST["local"]);
                    unset($_POST["movil"]); 
                    unset($_POST["correo"]); 
                    unset($_POST["num-personas"]); 
                    unset($_POST["ingreso-promedio"]); 
                    unset($_POST["familia-tipo"]); 
                    unset($_POST["otro-tipo"]); 
                    unset($_POST["condicion-laboral"]);

                    $tdoc=$titular=$nameuno = $apellidouno = $condicion = $tipofamilia= $profesion= $nacionalidad = $numerodoc = $graffar1 = $g2 =  $g3= $g4 = $sexo=$Ecivil= $numper=$ingresr="";
                    $apellido2=$nombre2=$local=$movil=$email="";
                           echo "<script type='text/javascript>alert('Paciente Registrado')' </script>";
                
                }
            }
                    ?>">Submit</button>
             

        </section><!-- fin  grid-2-->
        </form>
    </div><!-- fin  area-3 del grid-1 -->

</section> <!-- fin  grid-1-->


<script language="JavaScript">

    if (document.getElementById("familia-tipo").value != "0" ){
        document.getElementById("otro").style.display = "none";
    }

    var email = document.getElementById("correo");


    // validacion de correo
    email.addEventListener("keyup", function (event) {
        if (email.validity.typeMismatch) {
            email.setCustomValidity("Correo Inválido");
        } else {
            email.setCustomValidity("");
        }
    });

    function muestraInfo(){
    var fam = document.getElementById("familia-tipo").value;
        if (fam == "0"){
            document.getElementById("otro").style.display = "block";
        }else {
            document.getElementById("otro").style.display = "none";
        }
    }


</script>


</body>
