<?php

/* Template Name: Load Patient */

get_header();
include "menu.php";
include "function-templates/template-load-patient-function.php";


?>

<!DOCTYPE html>
<html>
<head>


</head>
<body>
<div class="grid-container">
    <div class="item2">
        <?php
        mostrarMenu();
        ?>
    </div>
    <div class="item3"> <!--empieza formulario-->
        <form name="formPaciente" id="" method="post" action=""> <!--Inicio de formulario-->
            <section class="grid-2">

                <div class="item1">  <!--Revisaarrr-->

                    <div class="item-grid-2-border"><!-- Establece margen del borde del grid 2 que realmente se hace con padding-->
                        <h3>Datos Personales</h3>
                        <!--Inicio de datos personales-->
                        <section class="grid-columns"><!-- Columnas del formulario-->
                            <div class ="item1">
                                <label for="name">Tipo de Documento</label><span class="required">*</span><br>
                                <input type="text" maxlength="25"  class="form-area" name="tipo-documento" id="tipo-documento" readonly="readonly" required/><br>
                            </div>
                            <div class ="item2">
                                <label for="name">Titular</label><span class="required">*</span><br>
                                <input type="text" maxlength="25"  class="form-area" name="titular" id="titular"  readonly="readonly" required/><br>
                            </div>
                            <div class ="item3">
                                <label for="name">Número del documento</label><span class="required">* </span><br>
                                <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-area" name="numero-doc" id="numero-doc"  readonly="readonly" required/><br>
                            </div>
                            <div class = "item4">
                                <label for="name">Primer Nombre</label><span class="required">* </span><br>
                                <input type="text" maxlength="25" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="<?php echo $ErrmsjOnlyLetters ?>" class="form-area" name="name-uno" id="name-uno" value="<?php echo htmlentities($nameuno) ?>" readonly="readonly" required/><br>
                            </div>
                            <div class = "item5">
                                <label for="name">Segundo Nombre</label><br>
                                <input type="text" maxlength="25" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="<?php echo $ErrmsjOnlyLetters ?>" class="form-area" name="name-dos" id="name-dos"  readonly="readonly" value="<?php echo htmlentities($nombre2) ?>"/><br>
                            </div>
                            <div class = "item6"></div>

                            <div class = "item7">
                                <label for="name">Primer Apellido</label><span class="required">* </span><br>
                                <input type="text" maxlength="25" class="form-area" name="apellido-uno" id="apellido-uno" value="<?php echo htmlentities($apellidouno) ?>" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="<?php echo $ErrmsjOnlyLetters ?>"  readonly="readonly" required/><br>

                            </div>
                            <div class = "item8">
                                <label for="name">Segundo Apellido</label><br>
                                <input type="text" maxlength="25" class="form-area" name="apellido-dos" id="apellido-dos" value="<?php echo htmlentities($apellido2) ?>" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"  readonly="readonly" title="<?php echo $ErrmsjOnlyLetters ?>"/><br>

                            </div>
                            <div class = "item9"></div>
                            <div class = "item10">
                                <label for="name">Fecha de Nacimiento</label><span class="required">*</span><br>
                                <input type="date"  class="form-area" name="birth-date" id="birth-date" value="<?php echo $fnac ?>"  readonly="readonly" required/>
                            </div>

                            <div class = "item11">
                                <label for="name">Sexo</label><span class="required">* <?php echo $sexoErr;?></span><br>
                                <input type="text" maxlength="25"  class="form-area" name="sexo" id="sexo"  readonly="readonly" required/><br>
                            </div>

                            <div class = "item12"></div>

                            <div class = "item13">
                                <label for="name">Estado Civil</label><span class="required">* </span><br>
                                <input type="text" maxlength="25"  class="form-area" name="estado-civil" id="estao-civil"  readonly="readonly" required/><br>
                            </div>

                            <div class = "item14"></div>

                            <div class = "item-span-two">
                                <label for="name">Profesión u Oficio</label><span class="required">* </span><br>
                                <input type="text" maxlength="25" class="form-area-two"  name="oficio" id="oficio" value="<?php echo $profesion ?>"  readonly="readonly" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="<?php echo $ErrmsjOnlyLetters ?>" required/><br>

                            </div>
                            <div class = "item-span-two">
                                <label for="name">Nacionalidad</label><span class="required">* </span><br>
                                <input type="text" maxlength="25" class="form-area-two"  name="nacionalidad" id="nacionalidad" value="<?php echo $nacionalidad?>" readonly="readonly"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="<?php echo $ErrmsjOnlyLetters ?>" required/><br>

                            </div>

                        </section><!--fin Columnas del formulario-->
                    </div>
                </div>
                <!--fin de datos personales-->


                <!--Detalles de direccion-->
                <div class="item2">
                    <div class="item-grid-2-border">
                        <h3>Detalles de Dirección</h3>
                        <section class="grid-columns">
                            <div class="item1" style="display: none|block" id="cmbsE">
                                <label for="name">Estado</label><span class="required">*  </span><br>
                                <input type="text" class="form-area" name="muestraEstado" id="muestraEstado"  readonly="readonly"/>

                            </div>
                            <div class="item2" style="display: none|block" id="cmbsM">
                                <label for="name">Municipio</label><span class="required">* </span><br>
                                <input type="text" class="form-area" name="muestraMunicipio" id="muestraMunicipio"  readonly="readonly"/>

                            </div>
                            <div class="item3" style="display: none|block" id="cmbsP">
                                <label for="name">Parroquia</label><span class="required">* </span><br>
                                <input type="text" class="form-area" name="muestraParroquia" id="muestraParroquia"  readonly="readonly"/>

                            </div>
                            <div class="item-span-three">
                                <label for="name">Direccion</label><br>
                                <input type="text" class="form-area-three"  readonly="readonly" name="direccion" id="direccion" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"  title="<?php echo $ErrmsjOnlyLetters ?>" /><br>
                            </div>
                        </section>
                    </div><!--fin border grid 2-->
                </div> <!--fin item2-->
                <!--fin de detalles de direccion-->

                <!--Contacto-->
                <div class="item3">
                    <div class="item-grid-2-border">
                        <h3>Detalles de Contacto</h3>
                        <section class="grid-columns">
                            <!-- CONTACTO -->
                            <div class ="item1">
                                <label for="name">Teléfono Local</label><br>
                                <input type="number" class="form-area-number" name="local"  readonly="readonly" min="2000000000" max="2999999999" pattern="^[0-9]+" placeholder="Ej.: 2121234567" id="local" title="Min 10 digítos. Máx 10 digítos. Debe incluir el código de área" value="<?php echo $local ?>"/><br>
                            </div>
                            <div class ="item2">
                                <label for="name">Teléfono Móvil</label><br>
                                <input type="number" class="form-area-number" name="movil" id="movil"  readonly="readonly" min="4000000000" max="4999999999" pattern="^[0-9]+" placeholder="Ej.: 4149876543" title="Min 10 digítos. Máx 10 digítos. Debe incluir el código de la línea telefónica" value='<?php echo htmlentities($movil) ?>' /><br>
                            </div>

                            <div class ="item3">
                                <label for="name">Correo</label><br>
                                <input type="email"  class="form-area" name="correo" id="correo" readonly="readonly" value="<?php echo htmlentities($email) ?>" placeholder="Ej.: ejemplo@correo.com"/><br>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- FIN CONTACTO -->

            </section> <!-- fin de grid-2 -->

        </form><!--fin de formulario-->

    </div>

</div>
<script language="JavaScript">
    llenaDatosPaciente();
</script>

</body>
</html>