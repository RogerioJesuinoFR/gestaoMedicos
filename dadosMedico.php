<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome_completo = $_POST['nome_completo'];
            $cpf = $_POST['cpf'];
            $data_nascimento = $_POST['data_nascimento'];
            $sexo = $_POST['sexo'];
            $crm = $_POST['crm'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];

        }
        $recebendo_cadastro = "INSERT INTO medico (nome_completo, cpf, data_nascimento, sexo, crm, email, telefone, senha) VALUES ('$nome_completo', '$cpf', '$data_nascimento', '$sexo', '$crm', '$email', '$telefone', '$senha')";
    ?>