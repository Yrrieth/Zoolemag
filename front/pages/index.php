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
		<link rel="stylesheet" media="screen" href="../css/style.css">
	</head>

	<body>
		
		<?php require '../component/sticky-header.php';?>

		<div id="wrapper">
			<?php require '../component/header.php';?>

			<div id="navbar" class="container-fluid p-0">
				<nav class="navbar-nav collapse navbar-collapse navbar-expand-lg navbar-dark bg-dark d-flex m-0 py-0 justify-content-around">
					<a href="#" class="nav-link col">Actualité</a>
					<a href="#" class="nav-link col">Interview</a>
					<a href="#" class="nav-link col">Critique</a>
					<a href="#" class="nav-link col bg-danger">Le Mag</a>
				</nav>
			</div>

			<div id="content" class="container">
				<?php 
					if (isset($_SESSION['id']) && isset($_SESSION['role'])) {
						echo 'ID : ' . $_SESSION['id'];
					}
				?>
			</div>

			<div id="footer" class="container-fluid p-0"></div>
		</div>
		
	</body>
 </html>