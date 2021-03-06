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

            #starRating>button,input{
                border : none;
                padding: 0;
                background: none;
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

                    <div class="container my-4 d-flex flex-column" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="row">
                            <div class="block col-9">
                                <div class="">
                                    <h3>Sypnosis</h3>
                                    <?php 
                                        echo $_SESSION['description'];
                                    ?>
                                    <hr>
                                    <h5>Genre</h5>
                                </div>
                                
                            </div>

                            <div class="block mx-auto column">
                                <div class="flex-column mb-5 column">
                                    <div>
                                        <iframe name="dontLoadAnotherPage" style="display:none;"></iframe>
                                        <h5>Note globale</h5>
                                        <h1 id="note">
                                        <?php 
                                            //require "../../back/query/insert_update_notation.php";
                                            require "../../back/query/moyenne_notation.php";
                                            
                                            echo number_format($_SESSION['note'], 2, ',', ' ');
                                        ?>/5</h1>
                                        <!--https://stackoverflow.com/questions/2866063/submit-form-without-page-reloading-->
                                        <form id="starRating" action="../../back/query/insert_update_notation.php"  method="POST" target="dontLoadAnotherPage">
                                            <input type="hidden" name="star"/>
                                            <button type="submit" name="star" value="1">
                                                <span class="fa fa-star" data-star="1"></span>
                                            </button>
                                            <button type="submit" name="star" value="2">
                                                <span class="fa fa-star" data-star="2"></span>
                                            </button>
                                            <button type="submit" name="star" value="3">
                                                <span class="fa fa-star" data-star="3"></span>
                                            </button>
                                            <button type="submit" name="star" value="4">
                                                <span class="fa fa-star" data-star="4"></span>
                                            </button>
                                            <button type="submit" name="star" value="5">
                                                <span class="fa fa-star" data-star="5"></span>
                                            </button>
                                        </form>

                                        <?php require "../../back/query/select_notation.php";?>
                                        <script type="text/javascript">
                                            //https://gomakethings.com/showing-star-based-ratings-on-hover-or-focus-with-vanilla-javascript/
                                            var starRating = document.getElementById("starRating");
                                            var stars = Array.from(document.getElementsByClassName("fa-star"));
                                            var note = document.getElementById("note");
                                            var star; // Current star clicked
                                            var isClicked = false;
                                            var clickedValue;
                                            var isConnected;
                                            var isNoted = false;

                                            if (<?php echo isset($_SESSION['id']) || isset($_SESSION['email']) ? 'true' : 'false';?>) {
                                                isConnected = true;
                                            } else {
                                                isConnected = false;
                                            }

                                            if (<?php echo isset($_SESSION['note']) ? 'true' : 'false';?>) {
                                                isNoted = true;
                                            } else {
                                                isNoted = false;
                                            }

                                            function noteAtbeginning () {
                                                // Quand on arrive sur la page et qu'on avait déjà noté, colorise le bon nombre d'étoile
                                                stars.forEach(function(element) {
                                                    if (isNoted) {
                                                        if (element.getAttribute("data-star") == <?php echo $_SESSION['note'];?>) {
                                                            element.style.border = "solid";
                                                        } else {
                                                            element.style.border = null;
                                                        }

                                                        if (element.getAttribute("data-star") <= <?php echo $_SESSION['note'];?>) {
                                                            element.classList.add("checked");
                                                        } else {
                                                            element.classList.remove("checked");
                                                        }
                                                    }
                                                });
                                            }
                                            
                                            noteAtbeginning();
                                            
                                            starRating.addEventListener("click", function(event) {
                                                /**
                                                 * Si on appuie sur les étoiles et qu'on n'est pas connecté
                                                 * Redirige vers la page d'inscription
                                                 */
                                                if (!isConnected) {
                                                    window.location.href = "inscription.php";
                                                }

                                                star = event.target.closest('.fa-star');
                                                
                                                stars.forEach(function(element) {
                                                    element.style.border = null;
                                                });
                                                star.style.border = "solid";
                                                isClicked = true;
                                                clickedValue = star.getAttribute("data-star");

                                                note.innerHTML = "<?php 
                                                    //require "../../back/query/insert_update_notation.php";
                                                    require "../../back/query/moyenne_notation.php";
                                            
                                            echo number_format($_SESSION['note'], 2, ',', ' ');
                                        ?>" + "/5";
                                            });

                                            

                                            starRating.addEventListener("mouseover", function(event){
                                                star = event.target.closest('.fa-star');
                                            
                                                stars.forEach(function(element) {
                                                    if (element.getAttribute("data-star") <= star.getAttribute("data-star")) {
                                                        element.classList.add("checked");
                                                    } else {
                                                        element.classList.remove("checked");
                                                    }
                                                });
                                            });

                                            starRating.addEventListener("mouseout", function(event){    
                                                stars.forEach(function(element) {
                                                    if (!isClicked && !isNoted) {
                                                        element.classList.remove("checked");
                                                    } else {
                                                        if (!isClicked) {
                                                            noteAtbeginning();
                                                        }
                                                        if (element.getAttribute("data-star") <= clickedValue) {
                                                            element.classList.add("checked");
                                                        } else {
                                                            element.classList.remove("checked");
                                                        }
                                                        
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>

                                <div class="btn btn-danger">Je le possède !</div>
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