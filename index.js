$(document).ready(function () {
    $('#btn').click(function () {
        let email = $("#email").val();
        let password = $("#password").val();

        $.ajax({
            type: 'POST',
            url: '/ready_set_go/api/check_email.php',
            data: {
                email: email
            },
            success: function (res) {
                let response = JSON.parse(res);
                $('#status').text('');
                if (response.status === 200) {
                    $.ajax({
                        type: 'POST',
                        url: '/ready_set_go/api/login.php',
                        data: {
                            email: email,
                            password: password
                        },
                        success: function (loginRes) {
                            let loginResponse = JSON.parse(loginRes);
                            $('#status').text(loginResponse.message).removeAttr('style').addClass('text-success');
                            if(loginResponse.status == 200){
                                setTimeout(function() {
                                    window.location.href = "/ready_set_go/dashboard.php";
                                }, 3000); 
                            }
                        },
                        error: function (loginErr) {
                            let loginResponse = JSON.parse(loginErr.responseText);
                            $('#status').text(loginResponse.message).removeAttr('style').addClass('text-danger');
                        }
                    });
                } else if (response.status == 401){
                        $('#status').text(response.message).removeAttr('style').addClass('text-danger')
                } else {
                        $('#confirmation').show();
                        $('#msg').show();
                        $('#btn2').show();
                        $('#btn').attr('style','display: none;');
                    }
                }
            });
        })
    });
    $('#btn2').click(function () {
        let email = $("#email").val();
        let password = $("#password").val();
        let confirm = $("#confirm").val();
        $.ajax({
            type: 'POST',
            url: '/ready_set_go/api/register.php',
            data: {
                email: email,
                password: password,
                confirm: confirm
            },
            success: function (registerRes) {
                let registerResponse = JSON.parse(registerRes);
                $('#status').text(registerResponse.message).removeAttr('style').addClass('text-success');
                if(registerResponse.status == 200){
                    setTimeout(function() {
                        window.location.href = "/ready_set_go/dashboard.php";
                    }, 3000); 
                }
            },
            error: function (registerErr) {
                let registerResponse = JSON.parse(registerErr.responseText);
                $('#status').text(registerResponse.message).removeAttr('style').addClass('text-danger');
            }
        });
    });
