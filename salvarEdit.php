<?php

    include_once('config.php');

    if(isset($_POST['update'])){

        $idmedicos = $_POST['idmedicos'];
        $nome = $_POST['nome'];
        $crm = $_POST['crm'];
        $telefone = $_POST['telefone'];
        $especialidades = $_POST['especialidades'];
        $endereco = $_POST['endereco'];

        $sqlInsert = "UPDATE medicos SET idmedicos='$idmedicos',nome='$nome',crm = '$crm',telefone = '$telefone',especialidades = '$especialidades',endereco='$endereco'
        WHERE idmedicos='$idmedicos'";

        $result = $conexao->query($sqlInsert);

    }

    header('Location: listar.php');
?>