<?php

    include 'config.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $telefone = $_POST['telefone'];
    $CPF = $_POST['CPF'];

    $editando_cadastro = "UPDATE paciente SET nome = '$nome', email = '$email', idade = '$idade', telefone = '$telefone', CPF = '$CPF' WHERE id = '$id' ";
    $query_cadastros = mysqli_query($connx, $editando_cadastro);

    header('location:listagem.php');

?>