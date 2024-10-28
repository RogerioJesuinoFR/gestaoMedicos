<?php

    include 'config.php';

    $id = $_POST['id'];

    $excluindo_cadastro = "DELETE FROM paciente WHERE id = '$id'";
    $query_cadastros = mysqli_query($connx,$excluindo_cadastro);

    header('location:listagem.php');

?>