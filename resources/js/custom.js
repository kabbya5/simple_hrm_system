
$(document).ready(function(){
    $('.delete-form').on('submit', function (e) {
        e.preventDefault();

        if (confirm('Do you want to delete this data?')) {
            this.submit();
        }
    });

    if ($.fn.select2) {
        $('.select2').select2({
            placeholder: "Select skills",
            allowClear: true,
            width: '100%'
        });
    } else {
        console.error("Select2 is not loaded!");
    }
});
