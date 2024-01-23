'use strict';
$(document).ready(function () {

    $('input[name="single-date-picker"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
    
	 $('input[name="r2_meeting_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	 $('input[name="dispatch_to_factory"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	
	$('input[name="required_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	$('input[name="pd2r_recommendation_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	
	$('input[name="pd2r_plan_date_trails"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	
	$('input[name="pd2r_etd"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	
	$('input[name="pd3r_dev_start_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	
	$('input[name="pd3r_dev_end_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	
	$('input[name="r3_etd_feedback"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	
	/*$('input[name="r4_result_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });*/
	
	$('input[name="r4_trail_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	$('input[name="r5_roe_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	
	$('input[name="r6_next_o_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	
	$('input[name="r5_so_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	
	
	$('input[name="r6_so_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
    
    
    $('input[name="dispatch_to_factory"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
    
     $('input[name="required_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
    
    
    
     /*$('input[name="rf_reporting_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });*/
    
     $('input[name="rf_r_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	

    
    var datefilter_c = $('input[name="simple-date-range-picker"]');
    datefilter_c.daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
    
    datefilter_c.on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });  
    
     var datefilter_rank2 = $('input[name="rank2"]');
    datefilter_rank2.daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
 
    datefilter_rank2.on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });      
    

 var datefilter_pd4 = $('input[name="pd4"]');
    datefilter_pd4.daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
 
    datefilter_pd4.on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });    

    
    $('input[name="simple-date-range-picker-callback"]').daterangepicker({
        opens: 'left'
    }, function (start, end, label) {
        swal("A new date selection was made", start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'), "success")
    });

    $('input[name="datetimes"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
            format: 'M/DD hh:mm A'
        }
    });

    /**
     * datefilter
     */
    var datefilter = $('input[name="datefilter"]');
    datefilter.daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    datefilter.on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });

    $('input.create-event-datepicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        autoUpdateInput: false
    }).on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY'));
    });

});