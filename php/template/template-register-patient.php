<?php

/* Template Name: Register Patient */

get_header();
?>

<head>
    <script language="javascript">
        var codMunicipios = new Array();
        var idEstado =  new Array();
        var municipios = new Array();

        var codParroquias =  new Array();
        var idMunicipio =  new Array();
        var parroquias = new Array();

        function limpiarMunicipios() {
            var reference = document.formPaciente.cmbMunicipios;
            var largo = reference.options.length;
            for ( j = 0; j < 8; j++ )
                for ( i = 0; i < largo; i++ )
                    document.formPaciente.cmbMunicipios.remove(i);
        }

        function cargarMunicipios(valor) {
            var longitud = idEstado.length;
            var reference = document.formPaciente.cmbMunicipios;
            var i = 0;
            var j = 0;

            limpiarMunicipios();

            for ( i = 0; i < longitud; i++ ) {
                if ( idEstado[i] == valor ) {
                    var newOption = new Option(municipios[i], codMunicipios[i]);
                    reference.options[j] = newOption;
                    j++;
                }
            }
            document.formPaciente.totalMunicipios.value = j + ' municipios';
        }


        /*AQUI PARROQUIA*/

        function limpiarParroquia() {
            var reference = document.formPaciente.cmbParroquias;
            var largo = reference.options.length;
            for ( j = 0; j < 10; j++ )
                for ( i = 0; i < largo; i++ )
                    document.formPaciente.cmbParroquias.remove(i);
        }

        function cargarParroquias(valor) {
            var longitud = idMunicipio.length;
            var reference = document.formPaciente.cmbParroquias;
            var i = 0;
            var j = 0;

            limpiarParroquia()

            for ( i = 0; i < longitud; i++ ) {
                if ( idMunicipio[i] == valor ) {
                    var newOption = new Option(parroquias[i], codParroquias[i]);
                    reference.options[j] = newOption;
                    j++;
                }
            }
            document.formPaciente.totalParroquias.value = j + ' parroquias';
        }



    </script>

</head>


<body>

<section class="grid-1">

    <div class="area-2">
        <!--Area del menu para navegacion-->
    </div> <!-- fin area 2-->

    <div class="area-3">
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
                            <select class="form-area" id="tipo-documento" name="tipo-documento"  required>
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
                            <label for="name">Número del documento</label><span class="required">* </span><br>
                            <input type="number" class="form-area-number" name="numero-doc" id="numero-doc" min="1000000" max="999999999" pattern="^[0-9]+" title="<?php echo $msjNumero ?>" value="<?php echo $numerodoc ?>"required/><br>
                        </div>            
                        <div class = "item4">
                            <label for="name">Primer Nombre</label><span class="required">* </span><br>
                            <input type="text" maxlength="25" pattern="[a-zA-Z ]+" title="<?php echo $ErrmsjOnlyLetters ?>" class="form-area" name="name-uno" id="name-uno" value="<?php echo htmlentities($nameuno) ?>" required/><br>
                        </div>
                        <div class = "item5">
                            <label for="name">Segundo Nombre</label><br>
                            <input type="text" maxlength="25" pattern="[a-zA-Z ]+" title="<?php echo $ErrmsjOnlyLetters ?>" class="form-area" name="name-dos" id="name-dos" value="<?php echo htmlentities($nombre2) ?>"/><br>
                        </div>      
                        <div class = "item6"></div>

                        <div class = "item7">
                            <label for="name">Primer Apellido</label><span class="required">* </span><br>
                            <input type="text" maxlength="25" class="form-area" name="apellido-uno" id="apellido-uno" value="<?php echo htmlentities($apellidouno) ?>" pattern="[a-zA-Z ]+" title="<?php echo $ErrmsjOnlyLetters ?>" required/><br>
                            
                        </div>
                        <div class = "item8">
                            <label for="name">Segundo Apellido</label><br>
                            <input type="text" maxlength="25" class="form-area" name="apellido-dos" id="apellido-dos" value="<?php echo htmlentities($apellido2) ?>" pattern="[a-zA-Z ]+" title="<?php echo $ErrmsjOnlyLetters ?>"/><br>
                           
                        </div>
                        <div class = "item9"></div>
                        <div class = "item10">
                            <label for="name">Fecha de Nacimiento</label><span class="required">*</span><br>
                            <input type="date"  class="form-area" name="birth-date" id="birth-date" value="<?php echo $fnac ?>" required/>
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
                            <label for="name">Estado Civil</label><span class="required">* </span><br>
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
                            <label for="name">Profesión u Oficio</label><span class="required">* </span><br>
                            <input type="text" maxlength="25" class="form-area-two"  name="oficio" id="oficio" value="<?php echo $profesion ?>" pattern="[a-zA-Z ]+" title="<?php echo $ErrmsjOnlyLetters ?>" required/><br>
                           
                        </div>
                        <div class = "item-span-two">
                            <label for="name">Nacionalidad</label><span class="required">* </span><br>
                            <input type="text" maxlength="25" class="form-area-two"  name="nacionalidad" id="nacionalidad" value="<?php echo $nacionalidad?>" pattern="[a-zA-Z ]+" title="<?php echo $ErrmsjOnlyLetters ?>" required/><br>
                           
                        </div>

                        </section><!--fin Columnas del formulario-->
                       </div>
                    </div>
                    <!--fin de datos personales-->


                    <!--Detalles de direccion-->
                <div class="item2">
                    <div class="item-grid-2-border">
                        <h3>Detalles de Direccion</h3>
                        <?php
                        if ( isset($_REQUEST['rutear']) ) {
                            echo "Estado: " . $_REQUEST['cmbEstados'] . "<br>";
                            echo "Total: " . $_REQUEST['totalMunicipios'] . "<br>";
                            echo "Municipio: " . $_REQUEST['cmbMunicipios'] . "<br>";
                        } else
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
                                    <input type="number" class="form-area-number" name="local"  min="1000000" max="999999999" pattern="^[0-9]+" id="local" title="<?php echo $msjContacto ?>" value="<?php echo $local ?>"/><br>
                                </div>
                                <div class ="item2">
                                    <label for="name">Teléfono Móvil</label><br>
                                    <input type="number" class="form-area-number" name="movil" id="movil"  min="1000000" max="99999999999" pattern="^[0-9]+" title="<?php echo $msjContacto ?>" value='<?php echo htmlentities($movil) ?>' /><br>
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
                            <input type="text" class="form-area-two" name="otro-tipo" id="otro-tipo" value="<?php echo $otrof ?>" pattern="[a-zA-Z ]+"  title="<?php echo $ErrmsjOnlyLetters ?>" /><br>
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
                                    <select id="graffar-1" name="graffar-1"  class ="form-area-three" required>
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
                                    <select id="graffar-2" name="graffar-2"  class ="form-area-three" required>
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
                                    <select id="graffar-3" name="graffar-3"  class ="form-area-three" required>
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
                                    <select id="graffar-4" name="graffar-4"  class ="form-area-three" required>
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
                         echo "<script type='text/javascript'>alert('Lo estamos redireccionando'); </script>";
                     }?> ">REGISTRAR PACIENTE</button>
                </section>

                </div> <!--FIN grid area 3-->




</section> <!-- fin de grid-2 -->

        </form><!--fin de formulario-->
    </div><!-- fin  area-3 del grid-1 -->
</section> <!-- fin  grid-1-->


<script language="JavaScript">

    if (document.getElementById("familia-tipo").value != "0" ){
        document.getElementById("otro").style.display = "none";
    }

    function muestraInfo(){
        var fam = document.getElementById("familia-tipo").value;
        if (fam == "0"){
            document.getElementById("otro").style.display = "block"; //Es el div
            document.getElementById("otro-tipo").required = true; //Es el textField
            document.getElementById("demo").innerHTML = "Debe especificar el tipo de familia";
        }else {
            document.getElementById("otro").style.display = "none";
            document.getElementById("otro-tipo").required = false;//es el text Field
        }
    }

    function validaTelefono(){
        var local = document.getElementById("local").value;
        var movil = document.getElementById("movil").value;
        if (local.length == 0 && movil.length == 0) {
            alert("Debe llenar al menos un número telefónico");
            return false;
        }else return true;
    }


</script>


</body>

