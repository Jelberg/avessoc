
<?php

/* Template Name: Register Medical Centers */

get_header();
include "menu.php";
include "function-templates/template-register-medical-centers-function.php";
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
        <form id="formSaludCenter" name="formSaludCenter">
        <section class="grid-2">
            <h2>Centro de Salud</h2>

                <div class="item1">

                <section class="grid-columns">
                    <div class="item-0">
                        <label for="name">Marque la casilla si el Centro de Salud  a registrar es Centro de Referencia: </label><input type="checkbox" id="salud"><br>
                    </div>
                    <div></div>
                    <div></div>
                    <div class="item-1">
                        <label for="legal-name">Nombre del Centro</label><span class="required">*</span><br>
                        <input type="text" name="name-center" id="name-center" class="form-area-two"><br><br>
                    </div>
                    <div class="item-2">
                        <label for="legal-name">Siglas</label><br>
                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" name="siglas" id="siglas" class="form-area">
                    </div>
                    <div></div>
                    <div class="item-3">
                        <label for="name">Nombre de la congregación</label><br>
                        <input type="text" name="congregacion" id="congregacion" class="form-area-two"><br>
                    </div>
                    <div class="item-4">
                        <label for="name">Naturaleza de la institución</label><span class="required">*</span><br>
                        <input type="text" name="naturaleza" id="naturaleza" class="form-area"><br>
                    </div>
                    <div></div>
                    <div class="item-5">
                        <label for="name">Dias laborales</label><span class="required">*</span><br>
                        <select id="flaborday" name="flaborday" class="select-area" required>
                            <option value="" selected> >>Seleccione opción<< </option>
                            <option value="Lunes" selected>Lunes</option>
                            <option value="Martes" selected>Martes</option>
                            <option value="Miércoles" selected>Miércoles</option>
                            <option value="Jueves" selected>Jueves</option>
                            <option value="Viernes" selected>Viernes</option>
                            <option value="Sábado" selected>Sábado</option>
                            <option value="Domingo" selected>Domingo</option>
                        </select> <label for="name"> A </label>
                        <select id="lastlaborday" name="lastlaborday" class="select-area" required>
                            <option value="" selected> >>Seleccione opción<< </option>
                            <option value="Lunes" selected>Lunes</option>
                            <option value="Martes" selected>Martes</option>
                            <option value="Miércoles" selected>Miércoles</option>
                            <option value="Jueves" selected>Jueves</option>
                            <option value="Viernes" selected>Viernes</option>
                            <option value="Sábado" selected>Sábado</option>
                            <option value="Domingo" selected>Domingo</option>
                        </select><br>
                    </div>
                    <div></div>
                    <div></div>
                    <div class="item6">
                        <label for="name">Primer Turno</label><br>
                        Inicio: <input type="time" id="tunoinicio" style="width: 244px">  Fin: <input type="time" id="tunofin" style="width: 268px"><br>
                    </div>
                    <div></div>
                    <div></div>
                    <div class="item7">
                        <label for="name">Segundo Turno</label><br>
                        Inicio: <input type="time" id="tdosinicio" style="width: 244px">  Fin: <input type="time" id="tdosfin" style="width: 268px"><br>
                    </div>
                    <div></div>
                    <div></div>
                    <div class="item8">
                        <label for="legal-name">Nombre del Responsable</label><br>
                        <input type="text" name="responsable" id="responsable" class="form-area-two">
                    </div>
                    <div></div>
                    <div></div>
                    <div class ="item9">
                        <label for="name">Correo del Responsable</label><br>
                        <input type="email"  class="form-area-two" name="correo" id="correo" placeholder="Ej.: ejemplo@correo.com"/><br>
                    </div>
                </section>
                </div><!--fin del item1 del grid-2-->

            <h4>Detalles de Dirección</h4>
            <div class="item2">
                <section class="grid-columns">
                    <?php
                    mostrarFormulario();
                    ?>
                </section>
            </div> <!--fin item2-->

            <h4>Contacto</h4>
            <div class="item2">
                <section class="grid-columns">
                    <div class="item-1">
                        <label for="name">Cantidad de números de teléfono a registrar</label><br>
                        <span class="required"> Sólo hasta 5 números</span><br>
                        <select id="flaborday" name="flaborday" class="select-area" required>
                            <option value="" selected> >>Seleccione opción<< </option>
                            <option value="1" selected>1</option>
                            <option value="2" selected>2</option>
                            <option value="3" selected>3</option>
                            <option value="4" selected>4</option>
                            <option value="5" selected>5</option>
                        </select>
                    </div>
                    <div></div>
                    <div></div>
                    <div class="numero-1" id="numero-1">
                        <label for="name">Teléfono Local 1</label><br>
                        <input type="number" class="form-area-number" name="local1" id="local1"  min="2000000000" max="2999999999" pattern="^[0-9]+" placeholder="Ej.: 2121234567" title="Min 10 digítos. Máx 10 digítos. Debe incluir el código de área"/><br>
                    </div>
                    <div class="numero-2" id="numero-2">
                        <label for="name">Teléfono Local 2</label><br>
                        <input type="number" class="form-area-number" name="local2" id="local2"  min="2000000000" max="2999999999" pattern="^[0-9]+" placeholder="Ej.: 2121234567" title="Min 10 digítos. Máx 10 digítos. Debe incluir el código de área"/><br>

                    </div>
                    <div class="numero-3" id="numero-3">
                        <label for="name">Teléfono Local 3</label><br>
                        <input type="number" class="form-area-number" name="local3" id="local3"  min="2000000000" max="2999999999" pattern="^[0-9]+" placeholder="Ej.: 2121234567" title="Min 10 digítos. Máx 10 digítos. Debe incluir el código de área"/><br>

                    </div>
                    <div class="numero-4" id="numero-4">
                        <label for="name">Teléfono Local 4</label><br>
                        <input type="number" class="form-area-number" name="local4" id="local4"  min="2000000000" max="2999999999" pattern="^[0-9]+" placeholder="Ej.: 2121234567" title="Min 10 digítos. Máx 10 digítos. Debe incluir el código de área"/><br>

                    </div>

                    <div class="numero-5" id="numero-5">
                        <label for="name">Teléfono Local 5</label><br>
                        <input type="number" class="form-area-number" name="loca5" id="loca5"  min="2000000000" max="2999999999" pattern="^[0-9]+" placeholder="Ej.: 2121234567" title="Min 10 digítos. Máx 10 digítos. Debe incluir el código de área"/><br>
                    </div>
                    <div class="item2">
                        <label for="name">Website</label><br>
                        <input type="url" class="form-area" name="web" id="web" placeholder="Ej.: http://www.sitioweb.ft"/><br>
                    </div>
                </section>
            </div> <!--fin item2-->

        </section><!--fin grid- 2-->
            <section class="right">
                <button class="button-just" type="submit" name="submit" id="submit" onsubmit="">REGISTRAR</button>
            </section>

    </div><!-- fin  area-3 del grid-container -->
    </form>
</section> <!-- fin  grid-container-->

</body>
