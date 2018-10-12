
<?php

/* Template Name: Register Sponsor */

get_header();
include "menu.php";
include "function-templates/template-add-sponsor-function.php";
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
        <form name="formSponsor" id="formSponsor" method="post" action=""> <!--Inicio de formulario-->
            <section class="grid-2">

                <div class="item1">


                        <h2>Registrar Patrocinante</h2>
                        <div class="required">* Campos obligatorios</div>

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
                                <input type="text" name="numero-doc" id="numero-doc" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-area-number-row" required/><br>
                            </div>

                            <div class="item-4" ><!--fila 4-->
                                <label for="logo">Logo</label><span class="required">*</span><br>
                                <p>Sólo archivos .jpeg y .png</p>
                                <input type="file" id="logo" name="logo" accept="image/png, image/jpeg" class="input-file" required/>

                            </div>

                            <div class="item-5" ><!--fila 5-->
                                <?php if(function_exists('pf_show_link')){echo pf_show_link();} ?>
                                <label for="name">Aporte Inicial</label><br>
                                <input type="number" name="aporte" id="aporte" step="0.01"  min="0"  placeholder="Sólo hasta dos(2) decimales Ej.: 123,45" class="form-area-number-row"  min="0" value="<?php echo $aporte ?>"/>
                            </div>


                        </section><!--Grid de filas -->

                </div>
            </section>


        </form><!--fin de formulario-->
        <div class ="right">
            <button class="button-just" name="registrar" id="registrar" >REGISTRAR PATROCINANTE</button>
        </div>


    </div><!-- fin  area-3 del grid-1 -->
</div> <!-- fin  grid-1-->

<script language="JavaScript">
   /* var alerta = */<?php
       /* $messageIdent = md5($_POST["legal-name"].$_POST["tipo-documento"].$_POST["numero-doc"]); // Se hace hash sobre los valoes de los parametros

        $sessionMessageIdent = isset($_SESSION['messageIdent'])?$_SESSION['messageIdent']:''; // si la variable de sesion esta definida entonces se asigna a la variable el valor de la sesion si no se asigna ''

        if($messageIdent!=$sessionMessageIdent) {
            echo 1;
        }
        else{ echo 0;}
                   */ ?>;

   /* if (alerta ==1){
        console.log(alerta);
        swal("Pactrocinante redistrado correctamente!", "Click en el botón!", "success");
        alerta ="";
    }*/
</script>


</body>

