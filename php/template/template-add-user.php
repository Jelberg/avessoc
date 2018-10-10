
<?php

/* Template Name: Add User */

get_header();
include "menu.php";
include "function-templates/template-add-user-function.php";
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
        <form id="FormAddUser" name="FormAddUser" method="post">
            
            <section class="grid-2">
                <div class="item-0">
                    <section class="grid-rows">
                        <h2>Registrar Datos de Usuario</h2>
                        <div class="item-row-1">
                            <label for="name">Nombre</label><br>
                            <input type="text" name="nombre" id="nombre" class="form-area-two" /><br>
                        </div>
                        <div class="item-row-2">
                            <label for="name">Apellido</label><br>
                            <input type="text" name="apellido" id="apellido" class="form-area-two" /><br>
                        </div>
                        <div class="item-row-3">
                            <label for="name">Seudónimo</label><br>
                            <input type="text" name="seudonimo" id="seudonimo" class="form-area-two" /><br>
                        </div>
                        <div class="item-row-4">
                            <label for="name">Centro de Salud al que pertenece</label><br>
                            <select type="text" name="centro" id="centro" class="select-area-two">
                                <option value=""> >>Selecione opción<< </option>
                            </select>
                        </div>
                        <div class="item-row-5">
                            <label for="name">Password</label><br>
                            <input type="password" name="pass" id="pass" class="form-area-two" /><br>
                        </div>
                        <div class="item-row-6">
                            <label for="name">Repita Password</label><br>
                            <input type="password" name="pass2" id="pass2" class="form-area-two" /><br>
                        </div>
                        <div class="item-row-7">
                            <label for="name">Privilegios</label><br>
                            <select type="text" name="privilegio" id="privilegio" class="select-area-two">
                                <option value=""> >>Selecione opción<< </option>
                                <option value="Administrador">Administrador</option>
                                <option value="Centro de Salud">Centro de Salud</option>
                            </select>
                        </div>
                        <div class="item-row-8">
                            <label for="name">Correo Electrónico</label><br>
                            <input type="email" name="email" id="email" class="form-area-two" /><br>
                        </div>
                    </section>
                </div>
            </section> <!--Fin del grid-2-->
        </form>
    </div><!-- fin  area-3 del grid-container -->
</section> <!-- fin  grid-container-->

</body>