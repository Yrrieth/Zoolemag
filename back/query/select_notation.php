<?php
    $id = $_SESSION['id'];
    $id_bd = $_SESSION['id_bd'];

    $sql = "SELECT * FROM notation WHERE id_abonne = '$id' AND id_bd = '$id_bd'";
    if ($result_query = mysqli_query($connection, $sql)) {
        
        if ($result_query->num_rows > 0) {
            $row = $result_query->fetch_assoc();
            $_SESSION['note'] = $row['note'];
            $isInserted = true;
        } else {
            $isInserted = false;
        }
        //echo "Suceed select id notation ";
    } else {
        //echo "Failed select id notation ";
    }

?>