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
            <br />
            <font size='1'><table class='xdebug-error xe-uncaught-exception' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
                    <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Fatal error: Uncaught Error: Using $this when not in object context in C:\wamp64\www\projectpool3\social-network\app\controller\login.php on line <i>24</i></th></tr>
                    <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Error: Using $this when not in object context in C:\wamp64\www\projectpool3\social-network\app\controller\login.php on line <i>24</i></th></tr>
                    <tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
                    <tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
                    <tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0006</td><td bgcolor='#eeeeec' align='right'>412552</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp64\www\projectpool3\social-network\app\controller\login.php' bgcolor='#eeeeec'>...\login.php<b>:</b>0</td></tr>
                </table></font>
            <br/>
            <?php
            var_dump($_SESSION);
            ?>
		</main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="public/js/signin.js"></script>
	</body>
</html>