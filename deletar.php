<?php

    if(!empty($_GET['idmedicos'])){
        include_once('config.php');

        $idmedicos = $_GET['idmedicos'];

        $sqlSelect = "SELECT * FROM medicos WHERE idmedicos=$idmedicos";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){
            $sqlDelete = "DELETE FROM medicos WHERE idmedicos=$idmedicos";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: listar.php');

?>