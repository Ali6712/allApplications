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
	
	$('input[name="r4_result_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
	
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
	
    $('input[name="simple-date-range-picker"]').daterangepicker();

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