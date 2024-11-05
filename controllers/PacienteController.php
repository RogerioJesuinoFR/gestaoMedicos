<?php
require_once __DIR__ . '/../models/Paciente.php';

class PacienteController {
    public function listar() {
        if (!$this->verificarSessao()) return;
        $pacientes = Paciente::listarPorMedico($_SESSION['medico_id']);
        include __DIR__ . '/../views/gestao_pacientes.php';
    }

    public function cadastrar_paciente() {
        if (!$this->verificarSessao()) return;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = $_POST;

            if ($this->validarDadosPaciente($dados)) {
                if (Paciente::cadastrar_paciente($dados, $_SESSION['medico_id'])) {
                    header('Location: /gestaoMedicos/public/index.php?action=gestao_pacientes');
                    exit();
                } else {
                    $_SESSION['error'] = "Erro ao cadastrar paciente.";
                }
            } else {
                $_SESSION['error'] = "Preencha todos os campos corretamente.";
            }
        }
        include __DIR__ . '/../views/cadastro_paciente.php';
    }

    private function verificarSessao() {
        if (!isset($_SESSION['medico_id'])) {
            header('Location: /gestaoMedicos/public/index.php?action=login_medico');
            exit();
        }
        return true;
    }

    private function validarDadosPaciente($dados) {
        return isset($dados['nome'], $dados['cpf'], $dados['email']) &&
               preg_match('/^[0-9]{11}$/', $dados['cpf']) && 
               filter_var($dados['email'], FILTER_VALIDATE_EMAIL);
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