
$(function() {
    $("#datepicker").datepicker({firstDay: 1});
    $("#datepicker").datepicker("option", "minDate", 0);
    $.datepicker.setDefaults({dateFormat: 'yy-mm-dd'});
});

// $(function() {
    // $('#date').datepicker({ minDate: 0 });
    // $("#datepicker").datepicker({ 
    //     firstDay: 1
    // });

    // let dateToday = new Date();
    // var dates = $.datepicker({
    // defaultDate: "+1w",
    // changeMonth: true,
    // numberOfMonths: 3,
    // minDate: dateToday,
    // onSelect: function(selectedDate) {
    //     var option = this.id == "from" ? "minDate" : "maxDate",
    //         instance = $(this).data("datepicker"),
    //         date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
    //     dates.not(this).datepicker("option", option, date);
    // }

    // var today = new Date();

    // $("#datepicker").datepicker({
    //     changeMonth: true,
    //     changeYear: true,
    //     minDate: today // set the minDate to the today's date
    //     // you can add other options here
    // });

    // $("#datepicker").datepicker({ minDate: +0 });

    // $("#datepicker").datepicker({startDate: new Date() });

    // var dateToday = new Date();
    // $("#datepicker").datepicker({
    //     minDate: dateToday,
    //     onSelect: function(selectedDate) {
    //     var option = this.id == "datepicker" ? "minDate" : "maxDate",
    //     instance = $(this).data("datepicker"),
    //     date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
    //     dates.not(this).datepicker("option", option, date);
    //     }
    // });

    // $("#datepicker").datepicker({
    //     beforeShowDay: function(date) {
    //         var day = date.getDay();
    //         return [(day != 0), ''];
    //     }
    // });

// });
