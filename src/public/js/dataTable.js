$(document).ready(function() {
    $('#dt-denuncias').DataTable( {
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No hay datos dispobiles para esta búsqueda - Lo sentimos",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay datos disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales.)",
            "search": "",
            "searchPlaceholder": "Buscar denuncia",
            "paginate": {
                "first":"Primero",
                "previous":"Anterior",
                "next":"Siguiente",
                "last":"Ultimo"
            },
        },
        "order": [[ 4, "desc" ]]
    });

    $('#dt-table').DataTable( {
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No hay datos dispobiles para esta búsqueda - Lo sentimos",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay datos disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales.)",
            "search": "",
            "searchPlaceholder": "Buscar notificación",
            "paginate": {
                "first":"Primero",
                "previous":"Anterior",
                "next":"Siguiente",
                "last":"Ultimo"
            },
        }
    });
} );