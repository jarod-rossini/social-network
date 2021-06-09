<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Inscription</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
		<link href="public/css/style.css" rel="stylesheet"/>
	</head>
	<body>
        <main class="maininscription">
            <img class="wave" src="public/image/wave3.png">
            <div class="container-inscription">
                <div class="img">
                    <img src="public/image/fall-is-coming.svg">
                </div>
                <div class="reg-container">
                    <form method='post' id="formreg">
                        <img class="avatar" src="public/image/avatarfemale.svg"><br/>

                        <h2>Bienvenue</h2>

                        <label for="name">Prénom</label>
                        <input type="text" name="name" id="name" maxlength="255" autofocus/> <br>

                        <label for="surname">Nom</label>
                        <input type="text" name="surname" id="surname" maxlength="255"/> <br>

                        <label for="email">e-Mail</label>
                        <input type="email" name="email" id="email" maxlength="255"/> <br>

                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" maxlength="255"/>
                         <br>

                        <label for="password_conf">Confirmation</label>
                        <input type="password" name="password_conf" id="password_conf" maxlength="255"/> <br>

                        <label for="birthdate">Date de Naissance</label>
                        <input type="date" name="birthdate" id="birthdate"/> <br>

                        <input class="submit" type="submit" id="register" value="Inscription"/>
                    </form>
                </div>
            </div>


            <?php //var_dump($_SESSION);

            if(isset($_SESSION['message'])){echo $_SESSION['message'];} ?>
		</main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="public/js/signup.js"></script>
	</body>
</html>