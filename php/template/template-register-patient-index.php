<!DOCTYPE html>
<html>
<head>
 <script language="javascript">
        var codMunicipios = new Array();
        var idEstado =  new Array();
        var municipios = new Array();

        var codParroquias =  new Array();
        var idMunicipio =  new Array();
        var parroquias = new Array();

        function limpiarMunicipios() {
            var reference = document.formPaciente.cmbMunicipios;
            var largo = reference.options.length;
            for ( j = 0; j < 8; j++ )
                for ( i = 0; i < largo; i++ )
                    document.formPaciente.cmbMunicipios.remove(i);
        }

        function cargarMunicipios(valor) {
            var longitud = idEstado.length;
            var reference = document.formPaciente.cmbMunicipios;
            var i = 0;
            var j = 0;

            limpiarMunicipios();
            limpiarParroquia();

            for ( i = 0; i < longitud; i++ ) {
                if ( idEstado[i] == valor ) {
                    var newOption = new Option(municipios[i], codMunicipios[i]);
                    reference.options[j] = newOption;
                    j++;
                }
            }
            document.formPaciente.totalMunicipios.value = j + ' municipios';
        }


        /*AQUI PARROQUIA*/

        function limpiarParroquia() {
            var reference = document.formPaciente.cmbParroquias;
            var largo = reference.options.length;
            for ( j = 0; j < 10; j++ )
                for ( i = 0; i < largo; i++ )
                    document.formPaciente.cmbParroquias.remove(i);
        }

        function cargarParroquias(valor) {
            var longitud = idMunicipio.length;
            var reference = document.formPaciente.cmbParroquias;
            var i = 0;
            var j = 0;

            limpiarParroquia();

            for ( i = 0; i < longitud; i++ ) {
                if ( idMunicipio[i] == valor ) {
                    var newOption = new Option(parroquias[i], codParroquias[i]);
                    reference.options[j] = newOption;
                    j++;
                }
            }
            document.formPaciente.totalParroquias.value = j + ' parroquias';
        }



    </script>
</head>
<body>
<script language="JavaScript">

    if (document.getElementById("familia-tipo").value != "0" ){
        document.getElementById("otro").style.display = "none";
    }

    function muestraInfo(){
        var fam = document.getElementById("familia-tipo").value;
        if (fam == "0"){
            document.getElementById("otro").style.display = "block"; //Es el div
            document.getElementById("otro-tipo").required = true; //Es el textField
            document.getElementById("demo").innerHTML = "Debe especificar el tipo de familia";
        }else {
            document.getElementById("otro").style.display = "none";
            document.getElementById("otro-tipo").required = false;//es el text Field
        }
    }

    function validaTelefono(){
        var local = document.getElementById("local").value;
        var movil = document.getElementById("movil").value;
        if (local.length == 0 && movil.length == 0) {
            alert("Debe llenar al menos un número telefónico");
            return false;
        }else return true;
    }


</script>
</body>
</html>