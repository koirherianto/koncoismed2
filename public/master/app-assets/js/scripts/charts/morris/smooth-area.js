/*=========================================================================================
    File Name: smooth-area.js
    Description: Morris area chart
    ----------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Template
    Version: 2.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Area chart
// ------------------------------
$(window).on("load", function(){

    Morris.Area({
        element: 'smooth-area-chart',
        data: [{
            year: '2010',
            pasien_inap: 0,
            rawat_jalan: 0
        }, {
            year: '2011',
            pasien_inap: 1241,
            rawat_jalan: 1539
        }, {
            year: '2012',
            pasien_inap: 354,
            rawat_jalan: 120
        }, {
            year: '2013',
            pasien_inap: 504,
            rawat_jalan: 240
        }, {
            year: '2014',
            pasien_inap: 190,
            rawat_jalan: 140
        }, {
            year: '2015',
            pasien_inap: 230,
            rawat_jalan: 900
        },{
            year: '2016',
            pasien_inap: 270,
            rawat_jalan: 190
        }],
        xkey: 'year',
        ykeys: ['pasien_inap', 'rawat_jalan'],
        labels: ['pasien_inap', 'rawat_jalan'],
        behaveLikeLine: true,
        ymax: 2000,
        resize: true,
        pointSize: 0,
        pointStrokeColors:['#BABFC7', '#5175E0'],
        smooth: true,
        gridLineColor: '#e3e3e3',
        numLines: 6,
        gridtextSize: 14,
        lineWidth: 0,
        fillOpacity: 0.8,
        hideHover: 'auto',
        lineColors: ['#BABFC7', '#5175E0']
    });
});