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
            <br />
            <font size='1'><table class='xdebug-error xe-uncaught-exception' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
                    <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Fatal error: Uncaught Error: Class 'App\Model\Connect' not found in C:\wamp64\www\projectpool3\social-network\app\controller\Auth.php on line <i>13</i></th></tr>
                    <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Error: Class 'App\Model\Connect' not found in C:\wamp64\www\projectpool3\social-network\app\controller\Auth.php on line <i>13</i></th></tr>
                    <tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
                    <tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
                    <tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0017</td><td bgcolor='#eeeeec' align='right'>411736</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp64\www\projectpool3\social-network\app\controller\register.php' bgcolor='#eeeeec'>...\register.php<b>:</b>0</td></tr>
                    <tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0024</td><td bgcolor='#eeeeec' align='right'>413520</td><td bgcolor='#eeeeec'>App\Controller\Auth->__construct(  )</td><td title='C:\wamp64\www\projectpool3\social-network\app\controller\register.php' bgcolor='#eeeeec'>...\register.php<b>:</b>5</td></tr>
                </table></font>

            <?php //var_dump($_SESSION);

            if(isset($_SESSION['message'])){echo $_SESSION['message'];} ?>
		</main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="public/js/script.js"></script>
	</body>
</html>