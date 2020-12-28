<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta charset="utf-8">
		<title>Bandes dessinées, Manga, Actualités BD sur zoolemag.com</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<link rel="stylesheet" media="screen" href="css/style.css">
	</head>

	<body>
		
		<div id="sticky-header" class="container-fluid p-0 sticky-top">
			
			
			<?php
				if (isset($_SESSION['pseudo']) && isset($_SESSION['email'])) {
					$pseudo = $_SESSION['pseudo'];
					echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-1 justify-content-start" style="box-shadow: 0px 0px 10px;">
					<a href="html/profil.php" class="nav-link btn btn-danger mx-1 py-0" role="button">' . $pseudo . '</a>
					<a href="" class="nav-link btn btn-danger mx-1 py-0" role="button">Ma collection</a>
					<a href="html/deconnexion.php" class="nav-link btn btn-danger mx-1 py-0 ml-auto" role="button">Déconnexion</a>
					</nav>';
				} else {
					echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-1 justify-content-end" style="box-shadow: 0px 0px 10px;">
					<a href="html/inscription.php" class="nav-link btn btn-danger mx-1 py-0" role="button">Inscription</a>
					<a href="html/connexion.php" class="nav-link btn btn-danger mx-1 py-0" role="button">Connexion</a>
					</nav>';
				}
			?>
			
		</div>

		<div id="wrapper">
			<div id="header" class="d-flex container-fluid mb-0 p-0">
				<a href="index.php"><img src="image/logo.png" alt="Logo du site" title="Logo du site Zoolemag"></a>
			</div>

			<div id="navbar" class="container-fluid p-0">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0 justify-content-around">
					<a href="#" class="nav-link">Actualité</a>
					<a href="#" class="nav-link">Interview</a>
					<a href="#" class="nav-link">BD</a>
					<a href="#" class="nav-link">Comic</a>
					<a href="#" class="nav-link">Manga</a>
					<a href="#" class="nav-link">Animation</a>
					<a href="#" class="nav-link">Le Mag</a>
				</nav>
			</div>

			<div id="content" class="container">
				<div>Blablabla</div>
			</div>

			<div id="footer" class="container-fluid p-0"></div>
		</div>
		
	</body>
 </html>