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
		<style type="text/css">
			.error {
				color: #FF0000;
            }

            /*https://colorhunt.co/palette/220248 */
            #profile {
                background-color: #e8e8e8;
                position:relative;
                border-radius: 10px 30px;
            }

            /*https://outils-css.aliasdmc.fr/generateur-de-triangles-css.php*/
            #header-fold {
                position:absolute;
                top:0;
                right:0;
                display : inline-block;
                height : 0;
                width : 0;
                border-top : 100px solid #FFF; /*Color of background*/
                border-left : 100px solid transparent;
            }

            #header-fold_2 {
                position:absolute;
                top:0;
                right:0;
                display : inline-block;
                height : 0;
                width : 0;
                border-top : 100px solid transparent;
                border-bottom : 10px solid transparent;
                border-left : 100px solid #3b6b9c;
                transform: rotate(-1deg);
                border-radius: 0 10px;
            }

            #header-fold_3 {
                position:absolute;
                top:10px;
                right:0;
                display : inline-block;
                height : 0;
                width : 0;
                border-top : 82px solid transparent;
                border-bottom : 10px solid transparent;
                border-left : 110px solid #152433;
                transform: rotate(10deg);
                border-radius: 0 10px;
            }
            /*https://blog.logrocket.com/how-to-create-fancy-corners-in-css/*/
            #header-profile {
                background-color: #30475e;
                border-radius: 10px 0 0 0;
            }

            .block {
                background-color: #FFFFFF;
                margin: 2vh 1vw;
                padding: 2vh 3vw;
                border-radius: 10px 10px;
            }
            .header-block {
                font-size: 2em;
                color: #f05454;
                margin: 0 0 2vh;
                font-weight: bold;
            }
            .block div:not(:first-child) {
                border-top: dotted 0.1rem;
            }
            .block div p{
                display : inline-flex;
                flex-direction: row;
            }
		</style>
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
                            <h1 class="text-white">Ma collection</h1>
                            <hr>
                            
                        
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