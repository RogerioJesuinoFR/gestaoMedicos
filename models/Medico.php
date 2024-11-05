<?php
require_once __DIR__ . '/../config/config.php';

class Medico {
    public static function cadastrar_medico($dados) {
        $conn = getConnection();
        $sql = "INSERT INTO medicos (nome, cpf, data_nascimento, sexo, crm, email, telefone, senha) 
                VALUES (:nome, :cpf, :data_nascimento, :sexo, :crm, :email, :telefone, :senha)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            ':nome' => $dados['nome'],
            ':cpf' => $dados['cpf'],
            ':data_nascimento' => $dados['data_nascimento'],
            ':sexo' => $dados['sexo'],
            ':crm' => $dados['crm'],
            ':email' => $dados['email'],
            ':telefone' => $dados['telefone'],
            ':senha' => password_hash($dados['senha'], PASSWORD_DEFAULT),
        ]);
    }

    public static function autenticar($email, $senha) {
        $conn = getConnection();
        $sql = "SELECT * FROM medicos WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        $medico = $stmt->fetch();

        if ($medico && password_verify($senha, $medico['senha'])) {
            $_SESSION['medico_id'] = $medico['id'];
            return true;
        }
        return false;
    }
}