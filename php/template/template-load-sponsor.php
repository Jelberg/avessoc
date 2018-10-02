
<?php

/* Template Name: Load Sponsor */

get_header();
include "menu.php";
include "notifications.php";
include "function-templates/template-load-sponsor-function.php";
?>



<head>
    <script language="JavaScript">
        cargarInformacion();

    </script>


</head>


<body>

<section class="grid-container">

    <div class="itemm1">

    </div>
    <div id="item0">
        <button class="button-delete" name="delete" id="delete" onclick="eliminar()"><strong>ELIMINAR</strong></button>
        <button class="button-edit" style="display: none|block" name="edit" id="edit" onclick="editSponsor()"><strong>EDITAR</strong></button>
        <button class="button-deshabilitar-edit" name="edit-null" style="display: none|block" id="edit-null" onclick="deshabilitar()"><strong>DESHABILITAR EDICIÓN</strong></button>

    </div>
    <div class="item2">
        <!--Area del menu para navegacion-->
        <?php
        mostrarMenu();
        ?>
    </div> <!-- fin area 2-->

    <div class="item3">
        <form name="formSponsorLoad" id="formSponsorLoad" method="post" action=""> <!--Inicio de formulario-->
            <section class="grid-2">

                <div class="item1">


                    <h2>Patrocinante</h2>

                    <section class="grid-rows"><!--la informacion se ordena en filas-->

                        <div class="item-1" ><!--fila 1-->
                            <label for="legal-name">Nombre Legal</label><span class="required">*</span><br>
                            <input type="text" name="legal-name" id="legal-name" class="form-area-two" value="<?php echo $legal?>"
                                   pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"  title="Max. 40 carácteres. Solo Letras" maxlength="40" required/><br>
                        </div>

                        <div class="item-2" ><!--fila 2-->
                            <label for="name">Tipo de Documento</label><span class="required">*</span><br>
                            <select id="tipo-documento" name="tipo-documento" onchange="cambioTipoDocumento()" class="select-area-two" required>
                                <option value="" selected> >>Seleccione opción<< </option>
                                <?php

                                $datos = array("V","E","Passaporte","RIF");
                                $valor = array("V","E","Passaporte","RIF");

                                for($i=0; $i<count($datos); $i++)
                                {
                                    if($valor[$i]==$tdoc) // Compara si el valor que se guarda en tdoc se encuentra dentro del arreglo
                                    {
                                        echo "<option value='".$valor[$i]."' selected>".$datos[$i]."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$valor[$i]."'>".$datos[$i]."</option>";
                                    }
                                }

                                ?>
                            </select><br>
                        </div>

                        <div class="item-3" ><!--fila 3-->
                            <label for="name">Número del documento de identidad</label><span class="required">*</span><br>
                            <input type="text" name="numero-doc" id="numero-doc" class="form-area-number-row" required/><br>
                        </div>

                        <div class="item-4" ><!--fila 4-->
                            <label for="logo">Logo</label><span class="required">*</span><br>
                            <p>Sólo archivos .jpeg y .png</p>
                            <input type="file" id="logo" name="logo" accept="image/png, image/jpeg" class="input-file" required/>
                            <!--img src="http://dev.avessoc.org.ve/wp-content/themes/hestia-child/page-templates/images/<?php //echo obtieneValor(loadSponsor(1),"SPONSOR_LOGO"); ?>"-->
                            <img alt="Imagen" src="data:image/png, base64, <?php echo base64_encode( obtieneValor(loadSponsor(1),"SPONSOR_LOGO"));?>" />
                        </div>
                    </section><!--Grid de filas -->

                </div>
            </section>
            <section class="right" id="boton-derecho">
                <button class="button-just" style="margin-right: 0px;" type="submit" name="updateSponsor" id="updateSponsor" onsubmit=" <?php
                ?> ">GUARDAR CAMBIOS</button>
            </section>

        </form><!--fin de formulario-->
    </div><!-- fin  area-3 del grid-1 -->
</section> <!-- fin  grid-1-->

<script language="JavaScript">

    deshabilitar();

</script>


</body>
