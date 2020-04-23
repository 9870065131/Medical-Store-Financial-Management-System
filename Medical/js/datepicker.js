$( document ).ready(function() {
    $('#daterange').daterangepicker();
      $('#daterange').on('apply.daterangepicker', function(ev, picker) {
        console.log(picker.startDate.format('YYYY-MM-DD'));
        console.log(picker.endDate.format('YYYY-MM-DD'));
});