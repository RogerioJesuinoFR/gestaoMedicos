<?php

    include 'config.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $telefone = $_POST['telefone'];
    $CPF = $_POST['CPF'];

    $recebendo_cadastro = "INSERT INTO paciente VALUES ('', '$nome', '$email', '$idade', '$CPF', '$telefone')";
    $query_cadastros = mysqli_query($connx, $recebendo_cadastro);

    header('location:listagem.php');

?>