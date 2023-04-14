// jQuery Validation

// Signup validation
$(document).ready(function() {

    $("#sign-up").validate({
        errorClass: 'text-red-500',
        rules: {
            // The key is based on the name attribute in the form from 'public > users > create.php'
            email: {
                required: true,
                email: true,
                maxlength: 320
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 255
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});

// Create note validation
$(document).ready(function() {

    $("#create-note").validate({
        errorClass: 'text-red-500',
        rules: {
            // The key is based on the name attribute in the form from 'public > users > create.php'
            name: {
                required: true,
                maxlength: 255
            },
            course_number: {
                required: true,
                maxlength: 10
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});

// Edit note validation
$(document).ready(function() {

    $("#edit-note").validate({
        errorClass: 'text-pink',
        rules: {
            // The key is based on the name attribute in the form from 'public > users > create.php'
            name: {
                required: true,
                maxlength: 255
            },
            course_number: {
                required: true,
                maxlength: 10
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});