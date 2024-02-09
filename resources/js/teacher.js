if ($('#teacherForm').length > 0) {
    $('#teacherForm').validate({
        rules: {
            name: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Please enter the teacher's name"
            }
        },
        errorElement: 'span',
        errorClass: 'text-danger',
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        }
    });
}