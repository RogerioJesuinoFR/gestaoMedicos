<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome_completo = $_POST['nome_completo'];
            $cpf = $_POST['cpf'];
            $data_nascimento = $_POST['data_nascimento'];
            $sexo = $_POST['sexo'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
        }
        $recebendo_cadastro = "INSERT INTO paciente (nome_completo, cpf, data_nascimento, sexo, email, telefone) VALUES ('$nome_completo', '$cpf', '$data_nascimento', '$sexo', '$email', '$telefone')";
    ?>