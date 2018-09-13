<!DOCTYPE html>
<html>
<head>

</head>

<body>
<script language="JavaScript">

    $(document).ready(function() {
        $('#example').DataTable( {
            "language": {
                "loadingRecords": "Cargando...",
                "decimal": ",",
                "thousands": ".",
                "processing":     "Procesando...",
                "lengthMenu": "Mostrar _MENU_ entradas ",
                "zeroRecords": "No se encontró nada",
                "search":         "Buscar:",
                "info": "pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "first":      "Primera",
                    "last":       "Ultima",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                }
            }
        } );
    } );

</script>

</body>
</html>