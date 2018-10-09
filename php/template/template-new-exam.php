
<?php

/* Template Name: Add New Exam */

get_header();
include "menu.php";
include "function-templates/template-new-exam-function.php";

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
        <form id="form-new-exam" name="form-new-exam" METHOD="post">
        <section class="grid-2">
            <h3>Agregar Nuevo Examen</h3>
            <div class="item1">
                    <section class="grid-rows">
                        <div class="item-1">
                            <label for="name">Nombre del examen</label><span class="required">*</span><br>
                            <input type="text" name="examen" id="examen" class="form-area-two">
                        </div>
                        <div class="item-2">
                            <?php
                            echo muestraCategorias();
                            ?>
                        </div>
                        <div class="item-3" style="display: none|block" id="otra-categoria">
                            <label for="name">En caso de ser otro especifique la Categoría:</label><span class="required">*</span><br>
                            <input type="text" name="nueva-categoria" id="nueva-categoria" class="form-area-two"><br>
                        </div>
                        <div class="item-4">
                            <?php
                            echo muestraPatologias();
                            ?>
                        </div>
                        <div class="item-5" style="display: none|block" id="otra-patologia">
                            <label for="name">En caso de ser otro especifique la Patologia:</label><span class="required">*</span><br>
                            <input type="text" name="nueva-patologia" id="nueva-patologia" class="form-area-two"><br>
                        </div>
                    </section>
            </div><!--fin del item 1 de grid-2 -->
        </section>
            <section class="right">
                <button class="button-just" type="submit" name="submit" id="submit" onsubmit="">REGISTRAR EXAMEN</button>
            </section>
        </form>
    </div><!-- fin  area-3 del grid-container -->
</section> <!-- fin  grid-container-->
<script language="JavaScript">
    document.getElementById("tipo-categoria").value="";
    document.getElementById("tipo-patologia").value="";
    muestraTextAreaPatologia();
    muestraTextAreaCategoria();
</script>
</body>

