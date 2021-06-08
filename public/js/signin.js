$(document).ready(function() {
    console.log('App is ready');

    document.getElementById('formlogin').addEventListener('submit', (e) => {
            e.preventDefault();
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
        $.ajax({
            url: 'app/controller/login.php',
            method: 'POST',
            data: {
                email: email,
                password: password
            },// données que tu envoies
            dataType: 'html', // donnée que reçoit par le php
            success: function (datatype) {
                console.log(datatype);
                var success = datatype;
                if (success == 'ok connecté !'){
                    setTimeout(function(){alert("vous êtes connecté");location.replace("index.php");},1000);
                }
                else {
                    console.error('Erreur email ou mdp');
                    alert("Erreur mail ou mdp");
                    $('#email').val('').focus();
                    $('#password').val('');
                }
            },
            error: function (request, status, error) {
                console.log(request);
                console.log(status);
                console.log(error);
                alert(error);
            },
        })
    })
});