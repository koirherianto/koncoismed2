function filterGlobal_2 () {
    $('#default-fixed').DataTable().search(
        $('#global_filter_2').val()
    ).draw();
}

$(document).ready(function() {
    $('#default').DataTable({
        dom: 'Blfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('#default-fixed').DataTable({
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns: {
            leftColumns: 1,
        },
    });

    // $('input.global_filter_2').on( 'keyup click', function () {
    //     filterGlobal_2();
    // } );

    // $('.dataTables_filter').hide();
    // $('.dataTables_length').hide();

} );

