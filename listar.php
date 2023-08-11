<?php
    /*
        A página listar mostra uma tabela com os dados de todos médicos que foram cadastrados
        antesta a edição desejada. Além do botão de enviar e um de voltar para
        a lista.
    */

    include_once('config.php');

    $sql = "SELECT * FROM medicos ORDER BY nome DESC";

    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Lista de médicos</title>
    <style>
        @charset "UTF-8";
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

        *{
            margin: 0px;
            padding: 0px;
            font-family: 'Inter', sans-serif;
            font-size: 16px;
        }

        body{
            background-color: #ECE8DD;
        }

        .table-bg{
            background: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .navbar{
            margin: 20px 50px 0px 50px;
        }

        #titulo{
            color: #146C94;
            font-size: larger;
            text-decoration: none;
        }

        #bt-voltar{
            width: auto;
            padding: 10px;
            background-color: #146C94;
            border-radius: 10px;
            border: 1px solid #ECE8DD;
        }

        #voltar{
            color: #ECE8DD;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav>
        <div class="navbar">
            <a id="titulo" href="#">Lista de médicos</a>
            <button id="bt-voltar"><a id="voltar" href="cadastro.php">Voltar</a></button>
        </div>
    </nav>

    <div class="m-4">
        <table class="table text-black table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CRM</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Especialidade</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$user_data['idmedicos']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['crm']."</td>";
                        echo "<td>".$user_data['telefone']."</td>";
                        echo "<td>".$user_data['especialidades']."</td>";
                        echo "<td>".$user_data['endereco']."</td>";
                        echo "<td>
                            <a class='btn btn-sm btn-primary' href='editar.php?idmedicos=$user_data[idmedicos]' title='Alterar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                </svg>
                            </a>
                            <a class='btn btn-sm btn-danger' href='deletar.php?idmedicos=$user_data[idmedicos]' title='Excluir'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                        </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>