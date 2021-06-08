<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>connexion</title>
		<link href="public/css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<main class="mainconnexion">
			<form method='post' id="formlogin">
                <label for="email">Email</label>
                    <input type="text" id="email" name="email" maxlength="255" autofocus/>
                <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" maxlength="255"/>
                <input class="submit" name="submit" type="submit" value="Connexion"/>
            </form>
            <br/>
            <?php
            var_dump($_SESSION);
            ?>
		</main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="public/js/signin.js"></script>
	</body>
</html>