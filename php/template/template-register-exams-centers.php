
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
        <form id="FormCenterExam">
            <h3>Registrar Examen en Centros de Salud</h3>
            <section class="grid-2">
                <div class="item1"> <!--item coloreado-->
                    <section class="grid-rows" style="text-align: center">
                        <div class="item-1">
                            <?php
                            echo mostrarExamenes();
                            ?>
                        </div><br><br>

                        <div class="item-2">
                            <div class="accordion"><strong style="color: white"><h6>Agregar a Centro de Salud</h6></strong></div>
                            <div class="panel">
                                <section class="grid-columns">
                                    <div class="item-1">
                                        <?php
                                            echo llenaCentroCombo1();
                                        ?>
                                    </div>

                                <div class="item-2">
                                    <label for="name">Precio</label><span class="required">* </span><br>
                                    <input type="number" name="precio" id="precio" step="0.01"  min="0"  placeholder="Sólo hasta dos(2) decimales Ej.: 123,45" class="form-area-number"  min="0" required/>
                                </div>
                                <div class="item-3">
                                    <label for="name">Disponibilidad del Examen</label><br>
                                    <input type="radio" name="disp" value="S"> Si<br>
                                    <input type="radio" name="disp" value="N"> No
                                </div><br>
                                </section>
                           </div>

                            <div class="accordion"><strong style="color: white"><h6>Agregar a Centro de Salud</h6></strong></div>
                            <div class="panel">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>

                        </div>
                    </section>
                    <!--section class="grid-columns">
                        <?php
                        // desplegarCentros();
                        ?>
                    </section-->
                </div> <!--fin item coloreado-->
            </section>
        </form>
    </div><!-- fin  area-3 del grid-container -->
</section> <!-- fin  grid-container-->

<script language="JavaScript">
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>

</body>

