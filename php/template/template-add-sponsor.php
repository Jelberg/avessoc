
<?php

/* Template Name: Register Sponsor */

get_header();
?>

<head>
    <?php

    //Variable para mensaje
    $legalErrmsj="Sólo se permiten mayúsculas, minusculas y espacios en blanco.";
    $msjNumero="";

    //Variable para mantener selecciones
    $legal=$numedoc=$aporte=$tdoc="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $legal = test_input($_POST['legal-name']);
        $numedoc = test_input($_POST['numero-doc']);
        $aporte = test_input($_POST['aporte']);
        $tdoc = test_input($_POST['tipo-documento']);

    }

    if (($_POST["tipo-documento"]) == "") {
        $TdocErr = "Requerido";
    } else {
        $tdoc = test_input($_POST["tipo-documento"]);
    }

    if ( sizeof(search_sponsor_id($_POST["numero-doc"],$_POST["tipo-documento"])) != 0){
        $msjNumero ="Identificaion de usuario ya exiaste";
    }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>
</head>


<body>

<section class="grid-1">

    <div class="area-2">
        <!--Area del menu para navegacion-->
    </div> <!-- fin area 2-->

    <div class="area-3">
        <form name="formSponsor" id="formSponsor" method="post" action=""> <!--Inicio de formulario-->
            <section class="grid-2">

                <div class="item1">

                    <div class="item-grid-2-border">

                        <h2>Registrar Patrocinante</h2>
                        <div class="required">* Campos obligatorios</div>

                        <section class="grid-rows"><!--la informacion se ordena en filas-->

                            <div class="item1" ><!--fila 1-->
                                <label for="legal-name">Nombre Legal</label><span class="required">*</span><br>
                                <input type="text" name="legal-name" id="legal-name" class="form-area-row" value="<?php echo $legal?>"
                                       pattern="[a-zA-Z ]+"  title="<?php echo $legalErrmsj ?>" required/><br>
                            </div>

                            <div class="item2" ><!--fila 2-->
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
                                </select>
                            </div>

                            <div class="item3" ><!--fila 3-->
                                <label for="name">Numero del documento</label><span class="required">*</span><br>
                                <input type="number" name="numero-doc" id="numero-doc" class="form-area-number-row" min="0" value="<?php echo $numedoc?>" required/>
                                <?php if (!empty($msjNumero)) {  echo "<span class=estiloError>$msjNumero</span>"; }  ?>
                            </div>

                            <div class="item4" ><!--fila 4-->
                                <label for="logo">Logo</label><span class="required">*</span><br>
                                <p>Sólo archivos .jpeg y .png</p>
                                <input type="file" id="logo" name="logo" accept="image/png, image/jpeg" class="input-file" required/>

                            </div>

                            <div class="item5" ><!--fila 5-->
                                <label for="name">Aporte Inicial</label><br>
                                <input type="number" name="aporte" id="aporte" class="form-area-number-row"  min="0" value="<?php $aporte ?>"/>
                            </div>

                        </section><!--Grid de filas -->
                    </div>
                </div>
            </section>
            <div class ="right">
                <button class="button-just" name="registrar" id="registrar" onclick="registro(this.form, this.form.logo.value)">REGISTRAR PATROCINANTE</button>
            </div>
        </form><!--fin de formulario-->
    </div><!-- fin  area-3 del grid-1 -->
</section> <!-- fin  grid-1-->

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
                    if (preg_match("/^[a-zA-Z ]*$/", $legal) and !empty($_POST["legal-name"]) and $permitido=="true" and sizeof(search_sponsor_id($_POST["numero-doc"],$_POST["tipo-documento"])) == 0) {
                            add_sponsor($_POST["legal-name"], $_POST["tipo-documento"], $_POST["numero-doc"], $_POST["logo"], $_POST["aporte"]);
                        echo "<script languaje='javascript'>alert('Material en depósito : ')</script>";
                    }
                    ?>
                    //alert("Usuario Registrado correctamente");

                    return 1;
                }

            //si estoy aqui es que no se ha podido submitir
            alert (mierror);
        }

        return 0;
    }

</script>

</body>

