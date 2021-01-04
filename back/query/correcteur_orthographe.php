<?php
    require 'sql_connect.php';

    // Pour faire échapper les apostrophes, guillemets et antislash
    $recherche = addslashes($recherche);

    $longueur_mot = strlen($recherche);
    $longueur_scinde = $longueur_mot / 2;
    $longueur_plus_1 = $longueur_mot + 1;
    $longueur_moins_1 = $longueur_mot - 1;

    $mot_scinde = array();
    $mot_scinde[0] = substr($recherche, 0, floor($longueur_scinde));
    $mot_scinde[1] = substr($recherche, -ceil($longueur_scinde));

    $sql = "SELECT * from bd
            WHERE 
            (
                (
                    ((titre LIKE '$mot_scinde[0]%') OR (titre LIKE '%$mot_scinde[1]'))
                    AND
                    (LENGTH(titre) <= '$longueur_plus_1' AND LENGTH(titre) >= '$longueur_moins_1')
                )
                OR 
                (
                    (titre LIKE '$recherche%') OR (titre LIKE '%$recherche') OR (titre LIKE '%$recherche%')
                )
            )
            GROUP BY titre";

    if ($result_query = mysqli_query($connection, $sql)) {
        if ($result_query->num_rows > 0) {
            echo 'Cherchez-vous plutôt : ';
            while ($row = $result_query->fetch_assoc()){
                echo '<a href="./rechercher.php?q=' . $row['titre'] . '">' .  $row['titre'] . '</a>, ';
            }
            echo '<br>';
        }
    } else {
        echo "Failed select correcteur auto ";
    }
?>