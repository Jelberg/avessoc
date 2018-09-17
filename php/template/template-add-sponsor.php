<?php

/* Template Name: Register Sponsor */

get_header();
include "menu.php";
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
    <div class="item3">
        <form name="formSponsor" id="formSponsor" method="post" action=""> <!--Inicio de formulario-->
            <section class="grid-2">

                <div class="item">
                    <h3>Registrar Patrocinante</h3>
                    <div class="required">* Campos obligatorios</div>

                    <section class="grid-rows"><!--la informacion se ordena en filas-->

                        <div class="item-1" ><!--fila 1-->
                            <label for="legal-name">Nombre Legal</label><span class="required">*</span><br>
                            <input type="text" name="legal-name" id="legal-name" class="form-area-row" value="<?php echo $legal?>"
                                   pattern="[a-zA-Z ]+"  title="<?php echo $legalErrmsj ?>" maxlength="25" required/><br>
                        </div>

                        <div class="item-2" ><!--fila 2-->
                            <label for="name">Tipo de Documento</label><span class="required">*</span><br>
                            <select id="tipo-documento" name="tipo-documento" class="form-area-row" required>
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
                            <input type="number" title="<?php echo $msjNumero?>" name="numero-doc" id="numero-doc" class="form-area-number-row" min="0" value="<?php echo $numedoc?>" required/><br>
                        </div>

                        <div class="item-4" ><!--fila 4-->
                            <label for="logo">Logo</label><span class="required">*</span><br>
                            <p>Sólo archivos .jpeg y .png</p>
                            <input type="file" id="logo" name="logo" accept="image/png, image/jpeg" class="input-file" required/>

                        </div>

                        <div class="item-5" ><!--fila 5-->
                            <label for="name">Aporte Inicial</label><br>
                            <input type="number" name="aporte" id="aporte" class="form-area-number-row"  min="0" value="<?php echo $aporte ?>"/>
                        </div>


                    </section><!--Grid de filas -->

                </div>
            </section>
            <div class ="right">
                <button class="button-just" name="registrar" id="registrar" onclick="registro(this.form, this.form.logo.value)">REGISTRAR PATROCINANTE</button>
            </div>
        </form><!--fin de formulario-->
    </div>

</div>

<script language="JavaScript">

    function registro(formulario, archivo) {
        extensiones_permitidas = new Array(".png", ".jpeg");
        mierror = "";
        if (archivo) { // Si existe el archivo
            //recupero la extensión de este nombre de archivo
            extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
            //compruebo si la extensión está entre las permitidas
            permitida = false;
            document.cookie = "valid= false";
            for (var i = 0; i < extensiones_permitidas.length; i++) {
                if (extensiones_permitidas[i] == extension) {
                    permitida = true;
                    document.cookie = "valid= true";
                    break;
                }
            }
            if (!permitida) {
                mierror = "Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join();
            }else
            if(permitida) {
                //submito!
                <?php
                // Funcion registra al patrocinante
                $permitido = $_COOKIE["valid"];
                if (preg_match("/^[a-zA-Z ]*$/", $legal) and !empty($legal) and $permitido=="true" and sizeof(search_sponsor_id() == 0)) {
                    add_sponsor();
                    global $msjSuccess;
                    $msjSuccess =" OK";

                }
                ?>

                alert("Patrocinante registrado exitosamente");

                return 1;
            }

            alert (mierror);
        }

        return 0;
    }


</script>

</body>
</html>