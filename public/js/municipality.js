$('#tablaMunicipio').DataTable({

    "paging":   false,
    "info":     false,
    "searching": false,
    
    "language" : {
        "sEmptyTable": "No hay datos en la tabla",
        "sInfo": "_START_ a _END_ de _TOTAL_ entradas",
        "sInfoEmpty": "0 a 0 de 0 entradas",
        "sInfoFiltered": "(filtrado por entradas _MAX_)",
        "sInfoPostFix": "",
        "infoThousands": ".",
        "sLengthMenu": "Mostrar _MENU_ Entradas",
        "sLoadingRecords": "Cargando ...",
        "sProcessing": "Por favor espere ...",
        "sSearch": "Buscar",
        "sZeroRecords": "No hay entradas disponibles",
        "oPaginate": {
            "sFirst": "Primero",
            "sPrevious": "Atrás",
            "sNext": "Siguiente",
            "sLast": "Último"
        },
        "OAria": {
            "sSortAscending": ": permite ordenar la columna en orden ascendente",
            "sSortDescending": ": permite ordenar la columna en orden descendente"
        }
    }
});

// console.log('executed...')