<?php
/* Template Name: PRINT Order */
include "menu.php";
include "function-templates/template-print-order-function.php";
?>

<html>
<head>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            padding: 10px;
        }
        .grid-item {
            padding: 5px;
        }
        .item1 {
            padding: 20px;
            grid-column-start: 1;
            grid-column-end: 4;
        }
        body {
            padding: 80px;
            font-family: "Bitstream Charter";
            font-size: 16px;
        }


    </style>

</head>

<body>


<div class="grid-container">
    <div class="item1" style="text-align: center">
        <img src="http://dev.avessoc.org.ve/wp-content/uploads/2017/06/cropped-Logo-Avessoc-peque.png" alt="AVESSOC"><br>
        <h3>Referencia Fondo Solidario Diagnostico</h3>
    </div>
    <div class="grid-item">
        <h2 type="text" id="orden" style="border: none; size:60px"></h2>
    </div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item">
        <strong>Apellidos y Nombre: </strong><br>
        <input type="text" readonly="readonly" id="nombre" style="border: none">
    </div>
    <div class="grid-item">
        <strong>Identificacion: </strong><br>
        <input type="text" readonly="readonly"  id="identificacion" style="border: none">
    </div>
    <div class="grid-item">
        <strong>Edad: </strong><br>
        <input type="text" readonly="readonly"  id="edad" style="border: none">
    </div>
    <div class="grid-item">
        <label>Fecha e Nacimiento: </label><br>
        <input type="text" readonly="readonly"  id="fechaNac" style="border: none">
    </div>
    <div class="grid-item">
        <label>Peso: </label><br>
        <input type="text" readonly="readonly"  id="peso" style="border: none">
    </div>
    <div class="item1" style="text-align: center;">
        <?php
        echo llenaListaExamenes();
        ?>
    </div>
    <div class="grid-item">
        <strong>Total Examenes</strong><br>
        <input type="text" readonly="readonly"  id="totaltotal"  style="border: none"><br>
        <strong>Total Financiado</strong><br>
        <input type="text" readonly="readonly"  id="totalfinanciado"  style="border: none"><br>
        <strong>Total monto a pagar:</strong><br>
        <input type="text" readonly="readonly"  id="total" style="border: none"><br>
    </div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item">
        <strong>Observaciones:</strong><br>
        <strong>Causa del examen:</strong><br>
        <input type="text" readonly="readonly"  id="causa"  style="border: none; width: 400px">
    </div>
    <div class="item1" style="text-align: center;">
    <strong>NOTA: Las ordenes aprobadas caducan a los 30 dias desde su frecha de aprobacion</strong>
    </div>
    <div class="item1">
        <label>Centro Referente :</label><br>
        <input type="text" readonly="readonly"  id="referente" style="border: none;  width: 600px"><br>
        <label>Referido a :</label><br>
        <input type="text" readonly="readonly"  id="referido" style="border: none; width: 600px">
    </div>
    <div class="item1" style="text-align: center;">
        <input type="text" readonly="readonly"  id="graffar" style="border: none; width: 600px"><br>
        <input type="text" readonly="readonly"  id="sponsor" style="border: none; width: 600px">
    </div>

    <div class="grid-item">
        <?php if(function_exists('pf_show_link')){echo pf_show_link();} ?>
    </div>
</div>

<script language="JavaScript">
    cargaDatosOrden();
</script>

</body>
</html>