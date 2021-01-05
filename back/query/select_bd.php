<?php
    require 'sql_connect.php';

    $titre = addslashes($_GET['q']);
    $tome = addslashes($_GET['tome']);
    $auteur = addslashes($_GET['auteur']);
    $_SESSION['titre'] = $titre;
    $_SESSION['tome'] = $tome;
    $_SESSION['auteur'] = $auteur;

    $sql = "SELECT * FROM bd
            WHERE titre = '$titre' AND tome = '$tome'";

    if ($result_query = mysqli_query($connection, $sql)) {
        if ($result_query->num_rows > 0) {

            $row = $result_query->fetch_assoc();

            $_SESSION['id_bd'] = $row['id_bd'];
            if ($row['image'] != NULL || $row['image'] != '') {
                $_SESSION['image'] = $row['image'];
            } else {
                $_SESSION['image'] = "../image/image_manquante_512.png";
            }

            if ($row['description'] != NULL || $row['image'] != '') {
                $_SESSION['description'] = $row['description'];
            } else {
                $_SESSION['description'] = "Description vide, à compléter !";
            }

            $_SESSION['note'] = $row['note'];
        }
    } else {
        echo "Failed select bd ";
    }
?>