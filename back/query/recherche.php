<?php
    require 'sql_connect.php';

    /*$sql = "SELECT * from bd
            WHERE titre = '$recherche'";*/
            $longueur_mot = strlen($recherche);
            $longueur_scinde = $longueur_mot / 2;
            $longueur_plus_1 = $longueur_mot + 1;
            $longueur_moins_1 = $longueur_mot - 1;
        
            $mot_scinde = array();
            $mot_scinde[0] = substr($recherche, 0, floor($longueur_scinde));
            $mot_scinde[1] = substr($recherche, -ceil($longueur_scinde));

    $sql = "SELECT * FROM bd
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
                OR
                (
                    titre = '$recherche'
                )
            )";
            
    if ($result_query = mysqli_query($connection, $sql)) {
        if ($result_query->num_rows > 0) {

            echo $result_query->num_rows . ' résultats trouvés.';
            $html = '<div>';
            while ($row = $result_query->fetch_assoc()){
                
                $html .= '<div class="d-flex flex-row my-3">';
                $html .= '<div class="col-2"><img src="';

                if ($row['image'] != NULL || $row['image'] != '') {
                    $html .= $row['image'];
                } else {
                    $html .= "../image/image_manquante_512.png";
                }

                $html .= '" width="100" height="100" class="image_recherche" alt="Image recherche" title="Image"></div>';
                $html .= '<div class="px-0 col-9">' .
                    '<a href="bd.php?q='. $row['titre'] . '&auteur='. $row['auteur'] .'&tome='. $row['tome'].'"><h3>' . $row['titre'].
                    '</h3></a><p>' . $row['tome'] . ' - '. $row['auteur'] .
                    '</p></div></div>';
            }
            
            $html .= '</div>';
            echo $html;
        }
    } else {
        echo "Failed select recherche ";
    }
?>