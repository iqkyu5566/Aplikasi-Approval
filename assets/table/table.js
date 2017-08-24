$(document).ready(function() {
    $('#example').DataTable( {
        // "paging":   false,
        // "ordering": false,
        "info":     false,
        "order": [[ 1, "desc" ]]
    } );
} );