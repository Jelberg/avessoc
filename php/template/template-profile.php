
<?php

/* Template Name: Profile User */

get_header();
include "menu.php";
include "function-templates/template-profile-function.php";
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
        <form id="FormProfile" name="FormProfile" method="post">

            <section class="grid-2">
                <div class="item-0">
                    <section class="grid-rows">
                        <h2>Registrar Datos de Usuario</h2>
                        <div class="item-row-1">
                            <label for="name">Nombre</label><span class="required">*</span><br>
                            <input type="text" name="nombre" id="nombre" class="form-area-two" required/><br>
                        </div>
                        <div class="item-row-2">
                            <label for="name">Apellido</label><span class="required">*</span><br>
                            <input type="text" name="apellido" id="apellido" class="form-area-two" require/><br>
                        </div>
                        <div class="item-row-3">
                            <label for="name">Seudónimo</label><span class="required">*</span><br>
                            <input type="text" name="seudonimo" id="seudonimo" class="form-area-two" disabled/><br>
                        </div>
                        <div class="item-row-4">
                            <label for="name">Centro de Salud al que pertenece</label><span class="required">*</span><br>
                            <input type="text" name="centro" id="centro" class="form-area-two" disabled/><br>
                        </div>
                        <div class="item-row-5">
                            <label for="name">Password</label><span class="required">*</span><br>
                            <input type="password" name="pass" id="pass" class="form-area-two" /><br>
                        </div>
                        <div class="item-row-6">
                            <label for="name">Repita Password</label><span class="required">*</span><br>
                            <input type="password" name="pass2" id="pass2" class="form-area-two" /><br>
                        </div>
                        <div class="item-row-7">
                            <label for="name">Privilegios</label><span class="required">*</span><br>
                            <input type="text" name="privilegio" id="privilegio" class="form-area-two" disabled/><br>
                        </div>
                        <div class="item-row-8">
                            <label for="name">Correo Electrónico</label><span class="required">*</span><br>
                            <input type="email" name="email" id="email" class="form-area-two" require/><br>
                        </div>
                    </section>
                </div>
            </section> <!--Fin del grid-2-->
        </form>
        <section class="rigth">
            <button id="RegistrarUsuario" name="RegistrarUsuario" onsubmit=""></button>
        </section>
    </div><!-- fin  area-3 del grid-container -->
</section> <!-- fin  grid-container-->

<script language="JavaScript">
    muestraData();
</script>

</body>