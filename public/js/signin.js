$(document).ready(function() {
    console.log('App is ready');

    document.getElementById('formlogin').addEventListener('submit', (e) => {
            e.preventDefault();
            // alert('coucou');

            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;

        $.ajax({
            url: 'app/controller/login.php',
            method: 'POST',
            data: {
                email: email,
                password: password
            },
            success: function (data) {
                console.table(data);
                var success = data['success']; //défini dans model.php
                if(success == true) {
                    $('#formlogin').submit();
                    console.table(data);
                    alert("vous etes connecté");
                    $(location).attr('href', 'index.php');
                }
                else if(success == false){
                    console.error('Erreur email ou mdp');
                    alert("Erreur mail ou mdp");
                    $('#email').val('').focus();
                    $('#password').val('');
                }
            }
        })
    })
});