<?php
    session_start();
    require 'sql_connect.php';

    $id = $_SESSION['id'];
    $email = $_SESSION['email'];
    $titre = $_SESSION['titre'];
    $tome = $_SESSION['tome'];

    $star = $_POST['star'];
    $id_bd = $_SESSION['id_bd'];

    /*$sql = "SELECT * FROM notation WHERE id_abonne = '$id' AND id_bd = '$id_bd'";
    if ($result_query = mysqli_query($connection, $sql)) {
        
        if ($result_query->num_rows > 0) {
            $row = $result_query->fetch_assoc();
            $_SESSION['note'] = $row['note'];
            $isInserted = true;
        } else {
            $isInserted = false;
        }
        echo "Suceed select id notation ";
    } else {
        echo "Failed select id notation ";
    }*/
    require 'select_notation.php';

    if ($isInserted) {
        $sql = "UPDATE notation SET note = '$star' WHERE id_abonne = '$id' AND id_bd = '$id_bd'";
        echo "true ";
    } else {
        $sql = "INSERT INTO notation(id_abonne, id_bd, note) VALUES('$id', '$id_bd', '$star')";
        echo "false ";
    }
    
    if ($result_query = mysqli_query($connection, $sql)) {
        echo "Suceed insert/update notation ";
    } else {
        echo "Failed insert/update notation ";
    }

?>