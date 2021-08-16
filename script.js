$(document).ready(function() {
    $('.topic_container').click(function(e) {
        if (!$(e.target).is('input:checkbox')) {
            if ($(this).find('.form-checkbox').is(':checked'))
                $(this).find('.form-checkbox').prop('checked', false);
            else
                $(this).find('.form-checkbox').prop('checked', true);
        } else {
            if ($(this).is(':checked'))
                $(this).prop('checked', false);
            else
                $(this).prop('checked', true);
        }
    });
});