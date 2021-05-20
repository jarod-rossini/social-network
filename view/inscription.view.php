<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Inscription</title>
		<link href="public/css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<main class="maininscription">
			<form method='post'>
                <label for="login">Login</label>
                    <input required type="text" name="login" maxlength="255"/>
                <label for="password">Mot de passe</label>
                    <input required type="password" name="password" maxlength="255"/>
                <label for="password_conf">Confirmer Mot de passe</label>
                    <input required type="password" name="password_conf" maxlength="255"/>
                <input class="submit" type="submit" value="Inscription"/>
            </form>
            <?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} ?>
		</main>
	</body>
</html>