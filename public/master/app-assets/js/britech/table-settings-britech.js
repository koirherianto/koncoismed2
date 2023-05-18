function filterGlobal_2 () {
    $('#default-fixed').dataTable().search(
        $('#global_filter_2').val()
    ).draw();
}

// Custom Table Export & Search
// Editing By Britech
// ---------------------------------------------------->
// ---------------------------------------------------->
$(document).ready(function() {
    // Full Attribute No Export Data
    $('.default').DataTable();

    // With Export Table
    $('#exportFirst').dataTable({
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
    });

    // With Export Table Expan
    $('#exportExpand').dataTable({
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        responsive: true

    });

    $('#exportSecone').dataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],

        paging: true,
        ordering: true,
        searching: false,
        info:true
    });

    $('.buttons-copy').addClass('btn btn-sm mb-1 ml-1');
    $('.buttons-csv').addClass('btn btn-sm mb-1');
    $('.buttons-excel').addClass('btn btn-sm mb-1');
    $('.buttons-pdf').addClass('btn btn-sm mb-1');
    $('.buttons-print').addClass('btn btn-sm mb-1');

} );

