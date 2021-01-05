<?php
    require 'sql_connect.php';

    $id_bd = $_SESSION['id_bd'];

    $sql = "UPDATE bd SET note = (SELECT AVG(note) FROM notation WHERE id_bd='$id_bd') WHERE id_bd='$id_bd'";

    if ($result_query = mysqli_query($connection, $sql)) {
        //echo "Succeed update moyenne notation ";
    } else {
        //echo "Failed moyenne notation ";
    }

?>