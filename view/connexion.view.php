<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>connexion</title>
		<link href="public/css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<main class="mainconnexion">
			<form method='post'>
                <label for="login">Login</label>
                    <input required type="text" name="login" maxlength="255"/>
                <label for="password">Mot de passe</label>
                    <input required type="password" name="password" maxlength="255"/>
                <input class="submit" name="submit" type="submit" value="Connexion"/>
            </form>
            <?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} ?>
		</main>
	</body>
</html>