$(document).ready(function(){
    console.log('App is ready');


    /**
     * Register, app -> controller -> register.php + Auth.php
     * verifier si les input sont mis correctement
     */

    /**
    document.getElementById('formreg').addEventListener('submit', (e) => {
    e.preventDefault();
    //  récupérer la valeur des input
    let name = document.getElementById('name');
    let surname = document.getElementById('surname');
    let email = document.getElementById('email');
    let password = document.getElementById('password');
    let birthdate = document.getElementById('birthdate');

    if (name.value == '' || surname.value == '' || email.value == '' || password.value == '' || birthdate.value == '') {
        alert('remplir tous les champs');
    }
    else {
        if (password.value !== password_conf.value) {
            alert('Les mots de passes ne correspondent pas mdr');
            password.value = '';
            password_conf.value = '';
        } else {
            console.log('ok champs remplis et password correct');
            // ^-------ça marche jusque là

        }
    }

})**/

    document.getElementById('formreg').addEventListener('submit', (e) => {
        e.preventDefault();
        alert('coucou');
        //  récupérer la valeur des input
        let name = document.getElementById('name').value;
        let surname = document.getElementById('surname').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let birthdate = document.getElementById('birthdate').value;
        $.ajax({
            url: 'app/controller/register.php',
            type: 'POST',
            data: {
                name: name,
                surname: surname,
                email: email,
                password:password,
                birthdate:birthdate
            },
            dataType: 'text',

            success: function (data){
                console.log(data);
                var success = data['success'];
                if(success == true) {
                    console.table(data);
                    alert("vous etes inscrit");
                    $('#formreg').submit();
                }
                else if(success == false){
                    console.error('Email déjà enregistrer');
                    alert("Email déjà enregistrer");
                    $('#email').val('').focus();
                    $('#password').val('');
                }
            },
            error: function () {
                console.log('error wsh');
            }
        })
    });
});
