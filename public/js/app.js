// jQuery Validation

// Sign up validation
$(document).ready(function() {

    $("#sign-up").validate({
        errorClass: 'text-pink',
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
            },
            retype_password: {
                required: true,
                minlength: 6,
                maxlength: 255,
                // retype_password must be equal to the original password
                equalTo: "#user_password"
            }
        },
        // if the passwords are not the same, display message
        messages: {
            retype_password: {
                equalTo: "Please enter the same password as above"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});

// Login validation
$(document).ready(function() {

    $("#log-in").validate({
        errorClass: 'text-pink',
        rules: {
            // The key is based on the name attribute in the form from 'public > users > login.php'
            email: {
                required: true,
                email: true,
                maxlength: 320
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 255
            },
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});

// Create note validation
$(document).ready(function() {

    $("#create-note").validate({
        errorClass: 'text-pink',
        rules: {
            // The key is based on the name attribute in the form from 'public > notes > create.php'
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
            // The key is based on the name attribute in the form from 'public > notes > edit.php'
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