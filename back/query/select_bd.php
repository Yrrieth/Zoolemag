<?php

    require 'sql_connect.php';

    $recherche = addslashes($_GET['q']);
    $tome = addslashes($_GET['tome']);
    $auteur = addslashes($_GET['auteur']);

    $sql = "SELECT * FROM bd
            WHERE titre = '$recherche' AND tome = '$tome'";

    if ($result_query = mysqli_query($connection, $sql)) {
        if ($result_query->num_rows > 0) {

            $row = $result_query->fetch_assoc();
            if ($row['image'] != NULL || $row['image'] != '') {
                $_SESSION['image'] = $row['image'];
            } else {
                $_SESSION['image'] = "../image/image_manquante_512.png";
            }

            if ($row['description'] != NULL || $row['image'] == '') {
                $_SESSION['description'] = $row['description'];
            } else {
                $_SESSION['description'] = "Description vide, à compléter !";
            }
        }
    } else {
        echo "Failed select bd ";
    }
?>