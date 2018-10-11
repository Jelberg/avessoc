<?php

/* Template Name: Load Pre-Orden */

get_header();
include "menu.php";
include "function-templates/template-load-pre-order-function.php"
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
        <h4 id="preordennumero" style="color: dodgerblue"></h4>

        <form id="FormPreOrden" name="FormPreOrden" method="post" action="">
            <section class="grid-2">

                <div class="item-0">
                    <section class="grid-rows">
                        <h6>Datos del Paciente</h6>
                        <div class="item-row-o">
                            <input type="text" name="paciente-id" id="paciente-id" style="display: none" readonly="readonly"/><br>
                        </div>
                        <div class="item-row-1">
                            <label for="identificacion">Documento de Identificación</label><br>
                            <input type="text" name="identificacion" id="identificacion" class="form-area-two" disabled/><br>
                        </div>
                        <div class="item-row-2">
                            <section class="grid-columns">
                                <div class="item-column-1">
                                    <label for="legal-name">Apellidos y Nombres</label><br>
                                    <input type="text" name="legal-name" id="legal-name" class="form-area-two" disabled/><br>
                                </div>
                                <div class="item-column-1">
                                    <label for="identificacion">Edad</label><br>
                                    <input type="text" name="edad" id="edad" disabled/><br>
                                </div>
                            </section>
                        </div>
                        <div class="item-row-3">
                            <label for="legal-name">Centro Solicitante</label><br>
                            <input type="text" name="solicitante" id="solicitante" class="form-area-two" disabled/><br>
                        </div>
                        <div class="item-row-4">
                            <label for="name">Procedencia del Paciente</label><br>
                            <input type="text" name="procedencia" id="procedencia" class="form-area-two" disabled/><br>
                        </div>
                        <div class="item-row-4">
                            <label for="name">Causa del Examen</label><span class="required">*</span><br>
                            <input type="text" name="causa" id="causa" class="form-area-two" disabled/><br>
                        </div>
                        <div class="item-row-5">
                            <label for="name">Peso</label><span class="required">*</span><br>
                            <input type="number" name="peso" id="peso" class="form-area-number-two" min="0" step="0.01" placeholder="En Kg" disabled/><br>
                        </div>
                        <div class="item-row-6">
                            <label for="name">Porcentaje en base a clasificación Graffar estimado</label><br>
                            <select id="poncentaje" name="porcentaje" class="select-area" disabled>
                                <option value="0">0%</option>
                                <option value="25">25%</option>
                                <option value="50">50%</option>
                                <option value="75">75%</option>
                                <option value="100">100%</option>
                            </select>
                        </div>
                        <div class="item-row-7">
                            <h6>Composición Familiar</h6>
                            <label for="name">Número de presonas que viven en el hogar: </label><br>
                            <input type="text" name="convivencia" id="convivencia" class="form-area-two"  disabled/><br>
                            <label for="name">Ingreso Promedio: </label><br>
                            <input type="text" name="ingreso" id="ingreso" class="form-area-two"  disabled/><br>
                            <label for="name">Tipo de familia con la que convive: </label><br>
                            <input type="text" name="tipo" id="tipo" class="form-area-two"  disabled/><br>
                        </div>
                        <div class="item-row-8">
                            <h6>Detalles laborales</h6>
                            <label for="name">Condición laboral: </label><br>
                            <input type="text" name="condicion" id="condicion" class="form-area-two"  disabled/><br>
                        </div>
                        <div class="item-row-9">
                            <h6>Clasificación Graffar</h6>
                            <label for="name">Profesión del jefe del hogar: </label><br>
                            <input type="text" name="g-1" id="g-1" class="form-area-two"  disabled/><br>
                            <label for="name">Nivel de instruccion del conyugue</label><br>
                            <input type="text" name="g-2" id="g-2" class="form-area-two"  disabled/><br>
                            <label for="name">Fuente de ingreso</label><br>
                            <input type="text" name="g-3" id="g-3" class="form-area-two"  disabled/><br>
                            <label for="name">Condiciones de alojamiento</label><br>
                            <input type="text" name="g-4" id="g-4" class="form-area-two"  disabled/><br>
                        </div>
                    </section>
                </div>
                <h6>Detalles del Examen</h6>
                <div class="item-1">
                    <?php
                    echo llenaTablaExamenes();
                    ?>
                </div>

                </div>
            </section>
        </form>
    </div><!-- fin  area-3 del grid-container -->
</section> <!-- fin  grid-container-->
<script language="JavaScript">
    cargaInformacionPaciente();

</script>

</body>
