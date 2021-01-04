<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta charset="utf-8">
		<title><?php if (isset($_SESSION['pseudo'])) echo $_SESSION['pseudo'];?> - zoolemag</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" media="screen" href="../css/style.css">
		<link rel="stylesheet" media="screen" href="../css/style_profil.css">
	</head>

	<body>
		
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
                            <div>
                                <a href="modifier_profil.php" class="btn btn-secondary">Modifier le profil</a>
                            </div>
                            
                        
                        </div>
                        
                        
                            
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="block flex-column">
                                <div class="header-block">Votre profil</div>
                                <hr>
                                <div>
                                    <p>Pseudo : </p>
                                    <p><?php echo $_SESSION['pseudo'];?></p>
                                </div>
                                <div>
                                    <p>Email  :  </p>
                                    <p><?php echo $_SESSION['email'];?></p>
                                </div>
                            </div>
                            <div class="block flex-column">
                                <div class="header-block">Vos commentaires</div>
                                <hr>
                                <div>
                                    <p>Pseudo : </p>
                                    <p><?php echo $_SESSION['pseudo'];?></p>
                                </div>
                                <div>
                                    <p>Email  :  </p>
                                    <p><?php echo $_SESSION['email'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="block flex-column">
                                <div class="header-block">Votre articles favoris</div>
                                <hr>
                                <div>
                                    <p>Pseudo : </p>
                                    <p><?php echo $_SESSION['pseudo'];?></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
                

			<div id="footer" class="container-fluid p-0">
				
			</div>
		</div>		
	</body>
 </html>