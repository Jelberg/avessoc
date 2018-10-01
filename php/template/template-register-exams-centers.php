
<?php

/* Template Name: Register Exams from Centers */

get_header();
include "menu.php";
include "function-templates/template-register-exams-centers-function.php";
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
        <form id="ExamenCentroForm" name="ExamenCentroForm" method="post">
            <h3>Registrar Examen en Centros de Salud</h3>
            <section class="grid-2">
                <div class="item1"> <!--item coloreado-->
                    <section class="grid-rows" style="text-align: center">
                        <div class="algodistinto">
                            <?php
                            $i=1;
                                echo $_POST['centro'.$i];
                                //echo "HOLAAAA";
                            ?>
                        </div>
                        <div class="item-1">
                            <?php
                            echo mostrarExamenes();
                            ?>
                        </div><br>
                    </section>
                        <div id="item-2">
                            <span id="addRow" style="background: none; color: darkcyan"><strong>AGREGAR OTRO CENTRO</strong></span>
                            <span id="eliminafila"  style="background: none; color: firebrick" title="Seleciona un item de la lista para poder eliminar"><strong>ELIMINAR FILA</strong></span>


                            <section class="grid-rows" style="text-align: center">

                                <?php
                                echo llenaTabla();
                                ?>

                            </section>


                        </div>

                </div> <!--fin item coloreado-->
            </section>
            <div class="right">
                <button class="button-just" id="pruebaenvio" onsubmit="<?php agregarExamenenCentro();?>">REGISTRAR</button>
            </div>
        </form>


    </div><!-- fin  area-3 del grid-container -->
</section> <!-- fin  grid-container-->

<script language="JavaScript">
  document.getElementById("tipo-examen").value="";

</script>

</body>

