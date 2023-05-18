/*=========================================================================================
    File Name:datatable-extensions-api.js
    Description: Api Datatables.
    ----------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Template
    Version: 2.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


$(document).ready(function() {

/**********************************
*       js of Print button        *
**********************************/

var tableDisable = $('.dataex-aip-enable-disable').DataTable( {
    dom: 'Bfrtip',
    select: true,
    buttons: [
        {
            text: 'Row selected data',
            action: function ( e, dt, node, config ) {
                alert(
                    'Row data: '+
                    JSON.stringify( dt.row( { selected: true } ).data() )
                );
            },
            enabled: false
        },
        {
            text: 'Count rows selected',
            action: function ( e, dt, node, config ) {
                alert( 'Rows: '+ dt.rows( { selected: true } ).count() );
            },
            enabled: false
        }
    ]
} );

tableDisable.on( 'select', function () {
    var selectedRows = tableDisable.rows( { selected: true } ).count();

    tableDisable.button( 0 ).enable( selectedRows === 1 );
    tableDisable.button( 1 ).enable( selectedRows > 0 );
} );

/**********************************
*       js of Print button        *
**********************************/

$('.dataex-aip-dynamic').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'My button',
            action: function ( e, dt, node, config ) {
                this.text( 'My button ('+config.counter+')' );
                config.counter++;
            },
            counter: 1
        }
    ]
} );

/*******************************************************
*       Adding and removing buttons dynamically        *
*******************************************************/

var counter = 1;

$('.dataex-aip-dynamically').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Add new button',
            action: function ( e, dt, node, config ) {
                dt.button().add( 1, {
                    text: 'Button '+(counter++),
                    action: function () {
                        this.remove();
                    }
                } );
            }
        }
    ]
} );

/******************************************
*       Adding and Group selection        *
******************************************/

var table = $('.dataex-aip-group').DataTable();

new $.fn.dataTable.Buttons( table, {
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    buttons: [
        {
            text: 'copy'

        },
        {
            text: 'Button 2',
            action: function ( e, dt, node, config ) {
                alert( 'Rows: '+ dt.rows( { selected: true } ).count() );
            },
        }
    ]
} );

table.buttons( 0, null ).container().prependTo(
    table.table().container()
);

    // $('.dataex-aip-group').DataTable({
    //     "pagingType": "full_numbers",
    //     dom: 'lBfrtip',
    //     // buttons: [
    //     //     'copy', 'csv', 'excel', 'pdf', 'print'
    //     // ],
    //
    //     buttons: [
    //     'copy', 'csv', 'excel', 'pdf', 'print'
    //     ],
    //     buttons: [
    //         {
    //             text: 'copy'
    //         },
    //         {
    //             text: 'Button 2',
    //             action: function ( e, dt, node, conf ) {
    //                 console.log( 'Button 2 clicked on' );
    //             }
    //         }
    //     ]
    //
    //     // paging: true,
    //     // ordering: true,
    //     // searching: true,
    //     // info:true
    // });
    // // $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-sm btn-outline-danger mr-0');
    // $('.buttons-copy').addClass('btn btn-sm btn-outline-secondary mr-1');
    // $('.buttons-csv').addClass('btn btn-sm btn-outline-primary mr-1');
    // $('.buttons-excel').addClass('btn btn-sm btn-outline-success mr-1');
    // $('.buttons-pdf').addClass('btn btn-sm btn-outline-info mr-1');
    // $('.buttons-print').addClass('btn btn-sm btn-outline-danger mr-0');
    //
    // /** TAMBAHAN **/
    //
    // $('input.global_filter').on( 'keyup click', function () {
    //     filterGlobal();
    // } );



} );