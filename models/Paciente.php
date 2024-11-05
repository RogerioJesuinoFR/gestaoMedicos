<?php
require_once __DIR__ . '/../config/config.php';

class Paciente {
    public static function listarPorMedico($medicoId) {
        $conn = getConnection();
        $sql = "SELECT p.* FROM pacientes p
                INNER JOIN medico_paciente mp ON p.id = mp.paciente_id
                WHERE mp.medico_id = :medico_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':medico_id' => $medicoId]);
        return $stmt->fetchAll();
    }

    public static function cadastrar_paciente($dados, $medicoId) {
        $conn = getConnection();
        $sql = "INSERT INTO pacientes (nome, email, idade, cpf, telefone) 
                VALUES (:nome, :email, :idade, :cpf, :telefone)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':nome' => $dados['nome'],
            ':email' => $dados['email'],
            ':idade' => $dados['idade'],
            ':cpf' => $dados['cpf'],
            ':telefone' => $dados['telefone'],
        ]);
    
        $pacienteId = $conn->lastInsertId();
    
        $sql = "INSERT INTO medico_paciente (medico_id, paciente_id, data_atendimento) 
                VALUES (:medico_id, :paciente_id, NOW())";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            ':medico_id' => $medicoId,
            ':paciente_id' => $pacienteId,
        ]);
    }    

    public static function excluir_paciente($pacienteId, $medicoId) {
        $conn = getConnection();
        $sql = "DELETE FROM medico_paciente WHERE medico_id = :medico_id AND paciente_id = :paciente_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':medico_id' => $medicoId, ':paciente_id' => $pacienteId]);

        $sql = "DELETE FROM pacientes WHERE id = :id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([':id' => $pacienteId]);
    }

    public static function obterPorId($id) {
        $conn = getConnection();
        $sql = "SELECT * FROM pacientes WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
    
    public static function atualizar_paciente($dados) {
        $conn = getConnection();
        $sql = "UPDATE pacientes SET nome = :nome, email = :email, idade = :idade, cpf = :cpf, telefone = :telefone 
                WHERE id = :id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            ':nome' => $dados['nome'],
            ':email' => $dados['email'],
            ':idade' => $dados['idade'],
            ':cpf' => $dados['cpf'],
            ':telefone' => $dados['telefone'],
            ':id' => $dados['id']
        ]);
    }
    
}