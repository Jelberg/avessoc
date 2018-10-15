
<?php

/* Template Name: Config Email */

get_header();
include "menu.php";
include "function-templates/template-config-function.php";
?>

<head>

</head>

<body>

<div class="grid-container">

    <div class="item2">
        <!--Area del menu para navegacion-->
        <?php
        mostrarMenu();
        ?>
    </div> <!-- fin area 2-->

    <div class="item3">

                <section class="grid-2">
                    <div class="item2">
                        <h2>Configuración</h2>
                        <form method="post" id="configForm" name="configForm">
                            <div class="item-row-8">
                                <label for="name">Correo Electrónico</label><span class="required">*</span><br>
                                <input type="email" name="email" id="email" class="form-area-two"/><br>
                            </div>
                            <button id="submit" name="submit">GUARDAR CAMBIOS</button>
                        </form>
                    </div> <!--fin div 3 grid-3-->

                </section> <!--fin section grid-3-->


    </div><!-- fin  area-3 del grid-1Show _MENU_ entries -->
</div> <!-- fin  grid-1-->

<script type="text/javascript">
  cargaemail();
</script>
</body>