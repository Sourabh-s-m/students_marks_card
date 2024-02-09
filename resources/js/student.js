if ($('#studentForm').length > 0) {
    $('#studentForm').validate({
        rules: {
            name: {
                required: true
            },
            class: {
                required: true,
                digits: true,
                max: 12,
                min: 1
            },
            teacher_id: {
                required: true
            },
            subject: {
                required: true
            },
            marks: {
                required: true,
                digits: true,
                max: 100
            }
        },
        messages: {
            name: {
                required: "Please enter student's name"
            },
            class: {
                required: "Please enter student's class",
                digits: "Please enter a valid class number"
            },
            teacher_id: {
                required: "Please select a teacher"
            },
            subject: {
                required: "Please enter subject"
            },
            marks: {
                required: "Please enter student's marks",
                digits: "Please enter a valid marks number"
            }
        },
        errorElement: 'span',
        errorClass: 'text-danger',
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
        },
    });
}
$(document).on('click', '#detailsLink', function (e) {
    e.preventDefault();
    $('#studentId').val('');
    var selectedIds = [];
    $('input[type="checkbox"]:checked', '#student-table').each(function () {
        var studentId = $(this).closest('tr').attr('id');
        if (studentId) {
            selectedIds.push(studentId);
        }
    });

    if (selectedIds.length > 0) {
        $('#studentId').val(selectedIds.join(','));
        console.log($('#studentId').val());
        $('#detailsForm').submit();
    } else {
        alert('Please select at least one student.');
    }
});

