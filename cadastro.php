<?php

    include 'config.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $telefone = $_POST['telefone'];
    $CPF = $_POST['cpf'];

    $recebendo_cadastro = "INSERT INTO pacientes VALUES ('', '$nome', '$email', '$idade', '$CPF', '$telefone')";
    $query_cadastros = mysqli_query($connx, $recebendo_cadastro);

    header('location:listagem.php');

?>