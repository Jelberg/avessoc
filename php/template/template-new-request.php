<?php

/* Template Name: New Request from patients*/

get_header();
include "menu.php";
include "function-templates/template-new-request-function.php";
?>

<head>

</head>

<body>

<section class="grid-container">

    <div class="area-2">
        <?php
        mostrarMenu();
        ?>
    </div> <!-- fin area 2-->

    <div class="area-3">
        <form method="post" id="Solicitud paciente" action="<?php echo PATH_PAG_ADD_PRE_ORDEN;?>">
        <section class="grid-2">
            <!-- COMPOSICION FAMILIAR -->
            <div class="item4">
                <h3>Nueva solicitud paciente: <?php echo nombrePaciente();?></h3>

                <div class="item-grid-2-border">
                    <h3>Composición Familiar</h3>
                    <section class="grid-columns">
                        <div class = "item1">
                            <label for="name">Número de personas que viven en el hogar</label><span class="required">**   </span><br>
                            <input type="number" class="form-area-number" name="num-personas" id="num-personas"  min="1" pattern="^[0-9]+"  required/>
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

        </section>
            <section class="right">
                <button class="button-just" type="submit" name="submit" id="submit" onsubmit=" <?php registraSolicitud(); ?> ">REGISTRAR Y GENERAR PRE-ORDEN</button>
            </section>
        </form>
    </div><!-- fin  area-3 del grid-container -->
</section> <!-- fin  grid-container-->

</body>