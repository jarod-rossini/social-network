$(document).ready(function(){
    console.log('App is ready');


    // REGEX PASSWORD
    $( "#password" ).focus(function() {
        $("#restriction").append("<li id=\"pwd-restriction-length\">Doit contenir au moins 8 charactères</li>\n" +
            "<li id=\"pwd-restriction-upperlower\">Doit contenir au moins une lettre en majuscule et une lettre en minuscule</li>\n" +
            "<li id=\"pwd-restriction-number\">Doit contenir au moins un chiffre (0–9)</li>\n" +
            "<li id=\"pwd-restriction-special\">Doit contenir au moin sun charactère spécial (!@#$%^&()'[]\"?+-/*)</li>");
    });
    var pwdLength = /^.{8,255}$/;
    var pwdUpper = /[A-Z]+/;
    var pwdLower = /[a-z]+/;
    var pwdNumber = /[0-9]+/;
    var pwdSpecial = /[!@#$%^&()'[\]"?+-/*={}.,;:_]+/;



    document.getElementById('formreg').addEventListener('submit', (e) => {
        e.preventDefault();
        //  récupérer la valeur des input
        let name = document.getElementById('name').value;
        let surname = document.getElementById('surname').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let cpass = document.getElementById('password_conf').value;
        let birthdate = document.getElementById('birthdate').value;

        const allowedEmailDomain = 'laplateforme.io';
        if (email.split('@')[1] === allowedEmailDomain) {
            if ( password === cpass) {
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
                })
            }
            else {
                alert('Mots de passes différents !');
            }
        } else {
            // return an error or do nothing
            alert('Vous devez vous connecté avec votre email de la plateforme ! ');
        }
    });
});