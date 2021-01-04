<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta charset="utf-8">
		<title>Connection - zoolemag</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" media="screen" href="../css/style.css">
		<style type="text/css">
			.error {
				color: #FF0000;
			}
		</style>
	</head>

	<body>

		<?php
			// define variables and set to empty values
			$pseudo = $email = $pass = "";
			$pseudoErr = $emailErr = $passErr = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				if (empty($_POST["email"])) {
					$emailErr = "Email requis.";
					$emailBool = false;
				} else {
					$email = test_input($_POST["email"]);
					$emailBool = true;
					// check if e-mail address is well-formed
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$emailErr = "Format d'email invalide. Ex : monadresse@email.com .";
						$emailBool = false;
					}
				}

				if (empty($_POST["mot_de_passe"])) {
					$passErr = "Mot de passe requis.";
					$passBool = false;
				} else {
					$pass = test_input($_POST["mot_de_passe"]);
					$passBool = true;
				}

				if ($emailBool && $passBool) {
					require '../../back/query/sql_connect.php';

					$email = $_POST["email"];
					$pass = $_POST["mot_de_passe"];

					$sql = "SELECT * FROM abonne WHERE email = '$email'";

					if ($result = mysqli_query($connection, $sql)) {
						if ($result->num_rows == 1) {
							$row = $result->fetch_assoc();
							if (password_verify($pass, $row['mot_de_passe'])) {
								$_SESSION['pseudo'] = $row['pseudo'];
								$_SESSION['email'] = $row['email'];
								$_SESSION['id'] = $row['id_abonne'];
								$_SESSION['role'] = $row['role'];
								//echo $_SESSION['pseudo'] . " " . $_SESSION['email'];
								header("Location: index.php");
								exit();
							} else {
								$emailErr = "Saisie incorrecte.";
								$passErr = "Saisie incorrecte.";
							}
						} else {
							$emailErr = "Saisie incorrecte.";
							$passErr = "Saisie incorrecte.";
						}
					} else {
						echo "Failed sign in.";
					}
				}
			}

			//https://www.w3schools.com/php/php_form_validation.asp
			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>
		
		<?php require '../component/sticky-header.php';?>

		<div id="wrapper">
			<?php require '../component/header.php';?>


			<div id="content" class="container">
				<div>
					<form class="my-4" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<h1>Connexion</h1>
                        <div class="form-group">
                        	<label for="email">Adresse E-mail</label>
                        	<input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="E-mail" value="<?php echo $email; ?>">
                        	<small id="emailHelp" class="form-text text-muted">Exemple : adresse@mail.fr</small>
							<?php echo '<span class="error">'. $emailErr .'</span>'; ?>
                        </div>
                        <div class="form-group">
                    		<label for="mot_de_passe">Mot de passe</label>
                        	<input name="mot_de_passe" type="password" class="form-control" id="motDePasse" placeholder="Mot de passe">
							<?php echo '<span class="error">'. $passErr .'</span>'; ?>
                        </div>
                        <button type="submit" class="btn btn-danger">Se connecter</button>
                      </form>
                </div>
			</div>

			<div id="footer" class="container-fluid p-0">
				
			</div>
		</div>		
	</body>
 </html>