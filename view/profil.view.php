<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Profil</title>
		<link href="public/css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<main class="mainprofil">
            <?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} ?>
			<form class="exit" method="post">
				<input class="quit" name="quit" type="submit" value="Déconnexion"/>
			</form>
			<form class="replace" method="post">
				<label for="login">Login : </label>
					<input name="login" type="text" value="<?php if(isset($_SESSION['login'])){echo $_SESSION['login'];} ?>"/>
				<label for="password">Mot de passe : </label>
					<input name="password" type="password"/>
				<input class="submit" name="change" type="submit" value="modifier"/>
			</form>
			<div>
				<h2>Réservations</h2>
				<table class="table-booking">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Type</th>
							<th>Début</th>
							<th>Fin</th>
						</tr>
					</thead>
					<tbody>
							<?php
								echo '<tr><td>'.$_SESSION['name'].'</td>';
								echo '<td>'.$_SESSION['type'].'</td>';
								echo '<td>'.$_SESSION['date_debut'].'</td>';
								echo '<td>'.$_SESSION['date_fin'].'</td></tr>';
							?>
					</tbody>
				</table>
			</div>
		</main>
	</body>
</html>