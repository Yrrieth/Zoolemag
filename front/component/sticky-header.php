<div id="sticky-header" class="container-fluid p-0 sticky-top">					
    <?php
        if (isset($_SESSION['pseudo']) && isset($_SESSION['email'])) {
            $pseudo = $_SESSION['pseudo'];
            echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-1 justify-content-start" style="box-shadow: 0px 0px 10px;">
            <a href="profil.php" class="nav-link btn btn-danger mx-1 py-0" role="button">' . $pseudo . '</a>
            <a href="collection.php" class="nav-link btn btn-danger mx-1 py-0" role="button">Ma collection</a>
            <a href="../component/deconnexion.php" class="nav-link btn btn-danger mx-1 py-0 ml-auto" role="button">Déconnexion</a>
            </nav>';
        } else {
            echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-1 d-flex justify-content-end" style="box-shadow: 0px 0px 10px;">
            <a href="inscription.php" class="nav-link btn btn-danger mx-1 py-0" role="button">Inscription</a>
            <a href="connexion.php" class="nav-link btn btn-danger mx-1 py-0" role="button">Connexion</a>
            </nav>';
        }
    ?>
</div>