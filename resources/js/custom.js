
$(document).ready(function(){
    $('.select2').select2();

    $('.delete-form').on('submit', function (e) {
        e.preventDefault();

        if (confirm('Do you want to delete this data?')) {
            this.submit();
        }
    });
});
