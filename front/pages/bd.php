<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta charset="utf-8">
		<title><?php if (isset($_GET['q'])) echo $_GET['q'];?> - zoolemag</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" media="screen" href="../css/style.css">
        <link rel="stylesheet" media="screen" href="../css/style_profil.css">
        <style>
            .checked {
                color: orange;
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
                        <?php 
                            if (isset($_GET['q']) || isset($_GET['tome']) || isset($_GET['auteur'])) {
                                require '../../back/query/select_bd.php';
                            }
                        ?>
                        <img src="<?php echo $_SESSION['image']; ?>" width="200" height="200" class="img-thumbnail m-2" alt="Image BD" title="Image de BD">

                        <div class="container flex-column">
                            <h1 class="text-white"><?php if (isset($_GET['q'])) echo htmlspecialchars(html_entity_decode($_GET['q'])) ?></h1>
                            <hr>
                            <div>
                                <h3 class="text-white">
                                    <?php 
                                        if (isset($_GET['tome']) && isset($_GET['auteur'])) {
                                            echo htmlspecialchars(html_entity_decode($_GET['tome'])) . ' - ' . htmlspecialchars(html_entity_decode($_GET['auteur']));
                                        }
                                    ?>
                                </h3>
                            </div>
                            
                        
                        </div>
                        
                        
                            
                    </div>

                    <div class="my-4 d-flex flex-column" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="block">
                            <div class="row">
                                <div class="col-10">
                                    <h3>Sypnosis</h3>
                                    <?php 
                                        echo $_SESSION['description'];
                                    ?>
                                    <hr>
                                    <h5>Genre</h5>
                                </div>
                                <div class="px-0 col-8">
                                    
                                </div>
                            </div>

                            <div class="row">
                                <!--<style>
                                    var star = document.getElementsByClassName('')
                                </style>-->
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
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