<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Inscription</title>
		<link href="public/css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<main class="maininscription">
			<form method='post' id="formreg">
                <label for="name">Prénom</label>
                <input type="text" name="name" id="name" maxlength="255" autofocus/> <br>

                <label for="surname">Nom</label>
                <input type="text" name="surname" id="surname" maxlength="255"/> <br>

                <label for="email">e-Mail</label>
                <input type="email" name="email" id="email" maxlength="255"/> <br>

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" maxlength="255"/> <br>

                <label for="password_conf">Confirmation</label>
                <input type="password" name="password_conf" id="password_conf" maxlength="255"/> <br>

                <label for="birthdate">Date de Naissance</label>
                <input type="date" name="birthdate" id="birthdate"/> <br>

                <input class="submit" type="submit" id="register" value="Inscription"/>
            </form>


            <?php //var_dump($_SESSION);

            if(isset($_SESSION['message'])){echo $_SESSION['message'];} ?>
		</main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="public/js/signup.js"></script>
	</body>
</html>