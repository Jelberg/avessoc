<?php

/* Template Name: Add Pre-Orden */

get_header();
include "menu.php";
include "function-templates/template-pre-order-function.php"
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
        <h3>Nueva Pre-Orden</h3>
        <h6>Datos del Paciente</h6>
        <section class="grid-2">
            <div class="item-0">
                <section class="grid-rows">
                          <div class="item-row-1">
                              <label for="identificacion">Ducumento de Identificación</label><br>
                              <input type="text" name="legal-name" id="legal-name" class="form-area-two" readonly="readonly"/><br>
                          </div>
                        <div class="item-row-2">
                            <section class="grid-columns">
                                <div class="item-column-1">
                                    <label for="legal-name">Apellidos y Nombres</label><br>
                                    <input type="text" name="legal-name" id="legal-name" class="form-area-two" readonly="readonly"/><br>
                                </div>
                                <div class="item-column-1">
                                    <label for="identificacion">Edad</label><br>
                                    <input type="text" name="edad" id="edad" readonly="readonly"/><br>
                                </div>
                            </section>
                        </div>
                        <div class="item-row-3">
                            <label for="legal-name">Centro Solicitante</label><br>
                            <input type="text" name="solicitante" id="solicitante" class="form-area-two" readonly="readonly"/><br>
                        </div>
                        <div class="item-row-4">
                            <label for="name">Procedencia del Paciente</label><span class="required">*</span><br>
                            <select id="procedencia" name="procedencia" class="select-area-two" required>
                                <option value="" selected> >>Seleccione opción<< </option>
                                <option value="Barrio Adentro" selected>Barrio Adentro </option>
                                <option value=" C.D.I" selected> C.D.I </option>
                                <option value="Clinicas Privadas" selected> Clinicas Privadas</option>
                                <option value="Hospital Público" selected> Hospital Público</option>
                                <option value="Hospital Seguro Social" selected> Hospital Seguro Social</option>
                                <option value="Paciente Interno (Procedencia Interna)" selected>Paciente Interno (Procedencia Interna) </option>
                                <option value="Otros" selected> Otros</option>
                            </select>
                        </div>
                    <div class="item-row-4">
                        <label for="name">Causa del Examen</label><span class="required">*</span><br>
                        <select id="procedencia" name="procedencia" class="select-area-two" required>
                            <option value="" selected> >>Seleccione opción<< </option>
                            <?php
                            //AQUI FUNCION EN PHP
                            ?>
                        </select>
                    </div>
                    <div class="item-row-5">
                        <label for="name">Clasificación Graffar estimado</label><br>
                        <input type="text" name="clasificacion" id="clasificacion" class="form-area-two" readonly="readonly"/><br>
                    </div>
                </section>
            </div>
            <h6>Detalles del Examen</h6>
            <div class="item-1">
                <span id="addRow" style="background: none; color: darkcyan"><strong>AGREGAR OTRO EXAMEN</strong></span>
                <span id="eliminafila"  style="background: none; color: firebrick" title="Seleciona un item de la lista para poder eliminar"><strong>ELIMINAR FILA</strong></span>
                <?php
                    echo llenaTablaExamenes();
                ?>
            </div>

        </section>

    </div><!-- fin  area-3 del grid-container -->
</section> <!-- fin  grid-container-->

</body>
