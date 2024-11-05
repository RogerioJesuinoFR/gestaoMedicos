<?php
require_once __DIR__ . '/../models/Paciente.php';

class PacienteController {
    public function listar() {
        $pacientes = Paciente::listarPorMedico($_SESSION['medico_id']);
        include __DIR__ . '/../views/gestao_pacientes.php';
    }

    public function cadastrar_paciente() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $idade = $_POST['idade'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];
    
            if (Paciente::cadastrar_paciente($_POST, $_SESSION['medico_id'])) {
                header('Location: /gestaoMedicos/public/index.php?action=gestao_pacientes');
                exit();
            } else {
                $_SESSION['error'] = "Erro ao cadastrar paciente.";
            }
        } else {
            include __DIR__ . '/../views/cadastro_paciente.php';
        }
    }    

    public function editar_paciente() {
        $paciente = Paciente::obterPorId($_GET['id']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (Paciente::atualizar_paciente($_POST)) {
                header('Location: /gestaoMedicos/public/index.php?action=gestao_pacientes');
                exit();
            } else {
                $_SESSION['error'] = "Erro ao atualizar paciente.";
            }
        }
        include __DIR__ . '/../views/editar_paciente.php';
    }

    public function excluir_paciente() {
        if (isset($_GET['id'])) {
            if (Paciente::excluir_paciente($_GET['id'], $_SESSION['medico_id'])) {
                header('Location: /gestaoMedicos/public/index.php?action=gestao_pacientes');
                exit();
            } else {
                $_SESSION['error'] = "Erro ao excluir paciente.";
            }
        }
    }    
}