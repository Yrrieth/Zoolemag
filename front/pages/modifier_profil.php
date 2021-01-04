<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta charset="utf-8">
		<title>Modifier le profil - zoolemag</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" media="screen" href="../css/style.css">
        <link rel="stylesheet" media="screen" href="../css/style_profil.css">
	</head>

	<body>
        <?php
			// define variables and set to empty values
			$pseudo = $email = $pass = "";
			$pseudoErr = $emailErr = $passErr = $newPassErr = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (empty($_POST["pseudo"])) {
					$pseudoErr = "Pseudo requis.";
					$pseudoBool = false;
				} else {
					$pseudo = test_input($_POST["pseudo"]);
					$pseudoBool = true;
					// check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z-' ]*$/",$pseudo)) {
						$pseudoErr = "Le pseudo ne peut contenir que des lettres et les caractères [-] et ['].";
						$pseudoBool = false;
					}
				}

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

                
				if (empty($_POST["ancien_mot_de_passe"]) && empty($_POST["nouveau_mot_de_passe"])) {
                    $passErr = "Mot de passe requis.";
					$passBool = false;
				} else {
					$pass = test_input($_POST["ancien_mot_de_passe"]);
					$passBool = true;
					if (!preg_match("/^[a-zA-Z0-9]*$/",$pass)) {
						$passErr = "Le mot de passe ne peut contenir que des lettres et des chiffres.";
						$passBool = false;
					}
				}

				if ($pseudoBool && $emailBool) {
					require '../../back/sql_connect.php';

					$email = $_POST["email"];
					//$motDePasse = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
                    $pseudo = $_POST["pseudo"];
                    $id = $_SESSION['id'];

                    //$sql = "SELECT * FROM abonne WHERE id_abonne = '$id'";
                    $sql = "UPDATE abonne SET email = '$email'
                            WHERE NOT EXISTS (
                                SELECT email from abonne WHERE email = '$email'
                            )
                            ";

					if ($result = mysqli_query($connection, $sql)) {
                        echo "Succeed update.";
					} else {
						echo "Failed update.";
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
                
                <div id="profile" class="d-flex flex-column">
                    <div id="header-fold_3"></div>
                    <div id="header-fold_2"></div>
                    <div id="header-fold"></div>

                    <div id="header-profile" class="d-flex flex-row align-items-center">
                        <img src="../image/default_user_icon_256.png" width="200" height="200" class="img-thumbnail m-2" alt="Icône de profile" title="Icône de l'utilisateur">
                        <div class="container flex-column">
                            <h1 class="text-white"><?php echo $_SESSION['pseudo'];?></h1>
                            <hr>
                        
                        </div>
                        
                        
                            
                    </div>

                    <div>
                        <form class="my-4 d-flex flex-column" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="block">
                                <div class="form-group row">
                                    <label for="pseudo" class="col">Pseudo</label>
                                    <div class="col column">
                                        <input name="pseudo" type="text" class="form-control col" id="pseudo" aria-describedby="pseudo" placeholder="Pseudonyme" value="<?php echo $_SESSION['pseudo'];?>">
                                        <?php echo '<span class="error">'. $pseudoErr .'</span>'; ?>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="email" class="col">Adresse E-mail</label>
                                    <div class="col column">
                                        <input name="email" type="email" class="form-control col" id="email" aria-describedby="email" placeholder="E-mail" value="<?php echo $_SESSION['email'];?>">
                                        <small id="emailHelp" class="form-text text-muted">Exemple : adresse@mail.fr</small>
                                        <?php echo '<span class="error">'. $emailErr .'</span>'; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ancien_mot_de_passe" class="col">Ancien mot de passe</label>
                                    <div class="col">
                                        <input name="ancien_mot_de_passe" type="password" class="form-control" id="ancienMotDePasse" placeholder="Mot de passe">
                                        <?php echo '<span class="error">'. $passErr .'</span>'; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nouveau_mot_de_passe" class="col">Nouveau mot de passe</label>
                                    <div class="col">
                                        <input name="nouveau_mot_de_passe" type="password" class="form-control" id="nouveauMotDePasse" placeholder="Mot de passe">
                                        <?php echo '<span class="error">'. $newPassErr .'</span>'; ?>

                                    </div>
                                </div>
                            </div>

                            <div class="block">
                                <div class="form-group row">
                                    <label for="mot_de_passe" class="col">Genre</label>
                                    <div class="col row">
                                        <div class="form-check form-check-inline col">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">Homme</label>
                                        </div>
                                        <div class="form-check form-check-inline col">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">Femme</label>
                                        </div>
                                        <div class="form-check form-check-inline col">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                            <label class="form-check-label" for="inlineRadio3">Autre</label>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="form-group row">
                                    <label for="description" class="col">Description</label>
                                    <div class="col">
                                        <textarea name="description" class="form-control" id="description" placeholder="Description" maxlength="128" rows="5" style="resize:none;"></textarea>
                                        <small id="descriptionHelp" class="form-text text-muted">Nombre de caractère restant : 128/128</small>
                                        <script>
                                            //https://stackoverflow.com/questions/14086398/count-textarea-characters
                                            document.getElementById('description').onkeyup = function() {
                                                document.getElementById('descriptionHelp').innerHTML = "Nombre de caractère restant : " + (128 - this.value.length) + "/128";
                                            }
                                        </script>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col">Image de profil</label>
                                    <div class="col">
                                        <input type="file" class="form-control-file" id="image">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-danger align-self-center">Mettre à jour</button>
                            
                        </form>
                    </div>
                    
                </div>
                
            </div>
                

			<div id="footer" class="container-fluid p-0">
				
			</div>
		</div>		
	</body>
 </html>