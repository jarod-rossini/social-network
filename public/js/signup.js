$(document).ready(function(){
    console.log('App is ready');

    document.getElementById('formreg').addEventListener('submit', (e) => {
        e.preventDefault();
        //  récupérer la valeur des input
        let name = document.getElementById('name').value;
        let surname = document.getElementById('surname').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let birthdate = document.getElementById('birthdate').value;

        const allowedEmailDomain = 'laplateforme.io';
        if (email.split('@')[1] === allowedEmailDomain) {
            // do something, we accept this email
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
                dataType: 'html',

                success: function (datatype){
                    var success = datatype;
                    if(success == 'vous êtes inscrit') {
                        setTimeout(function(){alert("vous êtes inscrit");location.replace("index.php");},1000);
                    }
                    else if (success == 'Email déjà prit') {
                        alert("Email déjà enregistrer");
                        $('#email').val('').focus();
                        $('#password').val('');
                    }
                    else {
                        alert('Veuillez remplir tous les champs');
                    }
                },
                error: function (request, status, error) {
                    console.log(request);
                    console.log(status);
                    console.log(error);
            }
        })} else {
            // return an error or do nothing
            alert('Vous devez vous connecté avec votre email de la plateforme ! ');
        }
    });
});