<?php

/* Template Name: Load Patient */

get_header();
include "menu.php";
include "notifications.php";
include "function-templates/template-load-sponsor-function.php";
?>

<!DOCTYPE html>
<html>
<head>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        notificationSuccess("Success!","Paciente registrado exitosamente.");
    }

    ?>

</head>
<body>
<div class="grid-container">
    <div class="item2">
        <?php
        mostrarMenu();
        ?>
    </div>
    <div class="item3"> <!--empieza formulario-->
        <form name="formPaciente" id="" method="post" action=""> <!--Inicio de formulario-->
            <section class="grid-2">

                <div class="item1">  <!--Revisaarrr-->

                    <div class="item-grid-2-border"><!-- Establece margen del borde del grid 2 que realmente se hace con padding-->
                        <h3>Datos Personales</h3>
                        <div class="required">* Campos obligatorios</div>
                        <div class="required">** Campos obligatorios y necesarios para la clasificación Graffar</div>

                        <!--Inicio de datos personales-->
                        <section class="grid-columns"><!-- Columnas del formulario-->
                            <div class ="item1">
                                <label for="name">Tipo de Documento</label><span class="required">*</span><br>
                                <select class="select-area" id="tipo-documento" name="tipo-documento" onchange="cambioTipoDocumento()" required>
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
                                <label for="name">Titular</label><span class="required">*</span><br>
                                <select class="select-area" id="titular" name="titular" required>
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
                                <label for="name">Número del documento</label><span class="required">* </span><br>
                                <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-area" name="numero-doc" id="numero-doc" required/><br>
                            </div>
                            <div class = "item4">
                                <label for="name">Primer Nombre</label><span class="required">* </span><br>
                                <input type="text" maxlength="25" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="<?php echo $ErrmsjOnlyLetters ?>" class="form-area" name="name-uno" id="name-uno" value="<?php echo htmlentities($nameuno) ?>" required/><br>
                            </div>
                            <div class = "item5">
                                <label for="name">Segundo Nombre</label><br>
                                <input type="text" maxlength="25" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="<?php echo $ErrmsjOnlyLetters ?>" class="form-area" name="name-dos" id="name-dos" value="<?php echo htmlentities($nombre2) ?>"/><br>
                            </div>
                            <div class = "item6"></div>

                            <div class = "item7">
                                <label for="name">Primer Apellido</label><span class="required">* </span><br>
                                <input type="text" maxlength="25" class="form-area" name="apellido-uno" id="apellido-uno" value="<?php echo htmlentities($apellidouno) ?>" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="<?php echo $ErrmsjOnlyLetters ?>" required/><br>

                            </div>
                            <div class = "item8">
                                <label for="name">Segundo Apellido</label><br>
                                <input type="text" maxlength="25" class="form-area" name="apellido-dos" id="apellido-dos" value="<?php echo htmlentities($apellido2) ?>" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="<?php echo $ErrmsjOnlyLetters ?>"/><br>

                            </div>
                            <div class = "item9"></div>
                            <div class = "item10">
                                <label for="name">Fecha de Nacimiento</label><span class="required">*</span><br>
                                <input type="date"  class="form-area" name="birth-date" id="birth-date" value="<?php echo $fnac ?>" required/>
                            </div>

                            <div class = "item11">
                                <label for="name">Sexo</label><span class="required">* <?php echo $sexoErr;?></span><br>
                                <select id="Sexo" class="select-area" name="sexo" required>
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
                                <label for="name">Estado Civil</label><span class="required">* </span><br>
                                <select id="estado-civil" class="select-area" name="estado-civil" required>
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
                                <label for="name">Profesión u Oficio</label><span class="required">* </span><br>
                                <input type="text" maxlength="25" class="form-area-two"  name="oficio" id="oficio" value="<?php echo $profesion ?>" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="<?php echo $ErrmsjOnlyLetters ?>" required/><br>

                            </div>
                            <div class = "item-span-two">
                                <label for="name">Nacionalidad</label><span class="required">* </span><br>
                                <input type="text" maxlength="25" class="form-area-two"  name="nacionalidad" id="nacionalidad" value="<?php echo $nacionalidad?>" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="<?php echo $ErrmsjOnlyLetters ?>" required/><br>

                            </div>

                        </section><!--fin Columnas del formulario-->
                    </div>
                </div>
                <!--fin de datos personales-->


                <!--Detalles de direccion-->
                <div class="item2">
                    <div class="item-grid-2-border">
                        <h3>Detalles de Dirección</h3>
                        <?php
                        mostrarFormulario();
                        ?>
                    </div><!--fin border grid 2-->
                </div> <!--fin item2-->
                <!--fin de detalles de direccion-->

                <!--Contacto-->
                <div class="item3">
                    <div class="item-grid-2-border">
                        <h3>Detalles de Contacto</h3>
                        <section class="grid-columns">
                            <!-- CONTACTO -->
                            <div class ="item1">
                                <label for="name">Teléfono Local</label><br>
                                <input type="number" class="form-area-number" name="local"  min="2000000000" max="2999999999" pattern="^[0-9]+" placeholder="Ej.: 2121234567" id="local" title="Min 10 digítos. Máx 10 digítos. Debe incluir el código de área" value="<?php echo $local ?>"/><br>
                            </div>
                            <div class ="item2">
                                <label for="name">Teléfono Móvil</label><br>
                                <input type="number" class="form-area-number" name="movil" id="movil"  min="4000000000" max="4999999999" pattern="^[0-9]+" placeholder="Ej.: 4149876543" title="Min 10 digítos. Máx 10 digítos. Debe incluir el código de la línea telefónica" value='<?php echo htmlentities($movil) ?>' /><br>
                            </div>

                            <div class ="item3">
                                <label for="name">Correo</label><br>
                                <input type="email"  class="form-area" name="correo" id="correo" value="<?php echo htmlentities($email) ?>" placeholder="Ej.: ejemplo@correo.com"/><br>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- FIN CONTACTO -->


                <!-- COMPOSICION FAMILIAR -->
                <div class="item4">
                    <div class="item-grid-2-border">
                        <h3>Composición Familiar</h3>
                        <section class="grid-columns">
                            <div class = "item1">
                                <label for="name">Número de personas que viven en el hogar</label><span class="required">**   </span><br>
                                <input type="number" class="form-area-number" name="num-personas" id="num-personas"  min="1" pattern="^[0-9]+" value="<?php echo $numper ?>" required/>
                            </div>
                            <div class = "item2">
                                <label for="name">Ingreso Promedio Mensual</label><span class="required">**  </span><br>
                                <input type="number" class="form-area-number" name="ingreso-promedio" id="ingreso-promedio" step="0.01"  min="1"  placeholder="Sólo hasta dos(2) decimales Ej.: 123,45" value="<?php echo $ingresr ?>" required/>
                            </div>

                            <div class = "item3"></div>

                            <div class = "item-span-two">
                                <label for="name">Tipo de familia con la que convive</label><br>
                                <select id="familia-tipo" name ="familia-tipo"  class="select-area-two" onchange="muestraInfo()">
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
                                <input type="text" class="form-area-two" name="otro-tipo" id="otro-tipo" value="<?php echo $otrof ?>" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"  title="<?php echo $ErrmsjOnlyLetters ?>" /><br>
                                <p id="demo" maxlength="25" class="required"></p>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- FIN COMPOSICION FAMILIAR -->



                <!-- DETALLE LABORAL -->
                <div class="item5">
                    <div class="item-grid-2-border">
                        <h3>Detalles Laborales</h3>

                        <section class="grid-columns">
                            <div class = "item-span-three">
                                <label for="name">Condicion laboral</label><br>
                                <select id="condicion-laboral" name="condicion-laboral" class ="select-area-three">
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
                    </div>
                </div>
                <!-- FIN DETALLE LABORAL -->


                <!-- Clasificacion graffar -->

                <div class="item6">
                    <div class="item-grid-2-border">
                        <h3>Clasificación Graffar</h3>
                        <section class="grid-columns">

                            <div class = "item-span-three">
                                <div class = "item1">
                                    <label for="name">Profesion del jefe del hogar</label><span class="required">** </span><br>
                                    <select id="graffar-1" name="graffar-1"  class ="select-area-three" required>
                                        <option value=""> >>Seleccione Opción<< </option>
                                        <?php
                                        $results = search_answer("1");
                                        llenaComboBox($results); ?>
                                    </select>
                                </div>
                            </div><!--span item-->

                            <div class = "item-span-three">
                                <div class = "item2">
                                    <label for="name">Nivel de instruccion de la esposa o conyugue</label><span class="required">** </span><br>
                                    <select id="graffar-2" name="graffar-2"  class ="select-area-three" required>
                                        <option value=""> >>Seleccione Opción<< </option>
                                        <?php
                                        $results = search_answer("2");
                                        llenaComboBox($results); ?>
                                    </select>
                                </div>
                            </div><!--span item-->

                            <div class = "item-span-three">
                                <div class = "item3">
                                    <label for="name">Principal fuente de ingreso</label><span class="required">** </span><br>
                                    <select id="graffar-3" name="graffar-3"  class ="select-area-three" required>
                                        <option value=""> >>Seleccione Opción<< </option>
                                        <?php
                                        $results = search_answer("3");
                                        llenaComboBox($results); ?>
                                    </select>
                                </div>
                            </div><!--span item-->

                            <div class = "item-span-three">
                                <div class = "item4">
                                    <label for="name">Condiciones de alojamiento</label><span class="required">** </span><br>
                                    <select id="graffar-4" name="graffar-4"  class ="select-area-three" required>
                                        <option value=""> >>Seleccione Opción<< </option>
                                        <?php
                                        $results = search_answer("4");
                                        llenaComboBox($results); ?>
                                    </select>
                                </div>
                            </div><!--span item-->
                        </section><!--fin rows grid-->
                    </div>
                </div>
                <!-- fin Clasificacion graffar -->

                <section class="right">
                    <button class="button-just" type="submit" name="submit" id="submit" onsubmit=" <?php
                    if (!empty($_POST['name-uno']) or !empty($_POST['name-dos']) or !empty($_POST['apellido-uno']) or !empty($_POST['apellido-dos']) or !empty($_POST['nacionalidad'])
                        or !empty($_POST['oficio']) or !empty($_POST['tipo-documento']) or !empty($_POST['numero-doc']) or !empty($_POST['titular'])) {
                        insert_patient();
                    }?> ">REGISTRAR PACIENTE</button>
                </section>

    </div> <!--FIN grid area 3-->




    </section> <!-- fin de grid-2 -->

    </form><!--fin de formulario-->

</div>

</div>


</body>
</html>