'use strict';
$(document).ready(function () {

    /*$('#example1').DataTable({
        responsive: true
    });*/

$('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );


    $('#example2').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true,
        "paging": false
    });

});