jQuery(document).ready(function($) {
    // Add a new row
    $('.custom-add-row').on('click', function() {
        var row = $('<div class="custom-meta-row">' +
            '<input type="text" name="custom_meta_key[]">' +
            '<button type="button" class="button custom-remove-row">Remove</button>' +
            '</div>');
        $('#custom-meta-box-container').append(row);
    });

    // Remove a row
    $('#custom-meta-box-container').on('click', '.custom-remove-row', function() {
        $(this).closest('.custom-meta-row').remove();
    });
});
