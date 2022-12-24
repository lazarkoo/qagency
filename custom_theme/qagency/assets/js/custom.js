
$(document).ready(function () {
    
    //API LOGIN FORM
    $("#api-login").submit(function(e){
        
        e.preventDefault();

        var captchResponse = $('#api-login .g-recaptcha-response').val();
        if(captchResponse != ""){

            var email = $("#emailLogin").val();
            var password = $("#passwordLogin").val();
            var action = "api_login_form";


            if(email != "" && password != ""){

                var formData = {
                    'action' : action,
                    'email': email,
                    'password': password
                };

                $.ajax({
                    url : '/wp-admin/admin-ajax.php',
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    success: function(data, textStatus, jqXHR)
                    {
                        if(data){
                            window.location.replace("/profile");
                        } else{
                            $("form#api-login input").addClass('is-invalid');
                        }

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        $("form#api-login input").addClass('is-invalid');
                    }
                });	
            } else{
                return false;
            }
        }
        
    });	

});