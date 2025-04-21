jQuery(document).ready(function($) {
    $('input[name="project_deadline"]').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0 // disables past dates
    });
});
