$(document).ready(function () {
    $('#sendMail').on("click", function () {
        let fName = $("#fName").val();
        let lName = $("#lName").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let cPassword = $("#cPassword").val();
        let picture = $("#picture").val();
        if (fName == '') {
            $('#errors').text("Please complete your First Name!");
            return false;
        } else if (lName == '') {
            $('#errors').text('Please complete your Last Name!');
            return false;
        } else if (email == '') {
            $('#errors').text("Please complete your email!");
            return false;
        } else if (password == '') {
            $('#errors').text("Please complete your password");
            return false;
        } else if (cPassword != password) {
            $('#errors').text("Passwords must be the same!");
            return false;
        }
        else if (picture == '') {
            $('#errors').text("Please set Your Profile Picture");
            return false;
        }

        var formData = new FormData();

        formData.append('fName', fName);
        formData.append('lName', lName);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('cPassword', cPassword);
        formData.append('picture', $('#picture')[0].files[0]);

        $.ajax({
            url: "server.php",
            type: 'POST',
            cache: false,
            processData: false,
            contentType: false,
            data: formData,
            beforeSend: function () {
                $("#sendMail").prop("disabled", true);
            },
            success: function (data) {
                alert(data);
                $("#sendMail").prop("disabled", false);
            }
        });
    })
})
