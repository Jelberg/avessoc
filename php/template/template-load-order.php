<?php

/* Template Name: Load ORDER */

get_header('single');
include "menu.php";
include "function-templates/template-load-order-function.php"
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
                        <h2>Orden</h2>
                        <h4>Datos del Paciente</h4>
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
                        <div class="item-row-4">
                            <label for="name">Causa del Examen</label><span class="required">*</span><br>
                            <input type="text" name="causa" id="causa" class="form-area-two" disabled/><br>
                        </div>
                        <div class="item-row-5">
                            <label for="name">Peso</label><span class="required">*</span><br>
                            <input type="number" name="peso" id="peso" class="form-area-number-two" min="0" step="0.01" placeholder="En Kg" disabled/><br>
                        </div>
                        <div class="item-row-6">
                            <label for="name">Porcentaje descuento</label><br>
                            <input type="text" name="porc" id="porc" class="form-area-two" disabled/><br>
                        </div>
                        <div class="item-row-7">
                            <label for="name">Patrocinante</label><br>
                            <input type="text" name="sponsor" id="sponsor" class="form-area-two" disabled/><br>
                        </div>
                    </section>
                </div>
                <h4>Examenes</h4>
                <div class="item-1">
                    <?php
                    echo llenaTablaExamenes();
                    ?>
                </div>
                <div>
                    ['wp_objects_pdf']
                </div>
            </section>
        </form>
    </div><!-- fin  area-3 del grid-container -->
</section> <!-- fin  grid-container-->
<script language="JavaScript">
    cargaInformacionOrden();

</script>

</body>
