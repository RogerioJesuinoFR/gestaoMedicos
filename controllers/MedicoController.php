<?php
require_once __DIR__ . '/../models/Medico.php';
require_once __DIR__ . '/../models/Paciente.php';

class MedicoController {
    public function cadastrar_medico() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = $_POST;
            
            if ($this->validarDadosMedico($dados)) {
                if (Medico::cadastrar_medico($dados)) {
                    header('Location: /gestaoMedicos/public/index.php?action=login_medico');
                    exit();
                } else {
                    $_SESSION['error'] = "Erro ao cadastrar médico.";
                }
            } else {
                $_SESSION['error'] = "Preencha todos os campos obrigatórios corretamente.";
            }
        }
        include __DIR__ . '/../views/cadastro_medico.php';
    }

    public function login_medico() {
        if (isset($_SESSION['medico_id'])) {
            header('Location: /gestaoMedicos/public/index.php?action=gestao_pacientes');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $senha = $_POST['senha'];
            if ($email && Medico::autenticar($email, $senha)) {
                header('Location: /gestaoMedicos/public/index.php?action=gestao_pacientes');
                exit();
            } else {
                $_SESSION['error'] = "Credenciais inválidas.";
            }
        }
        include __DIR__ . '/../views/login_medico.php';
    }

    private function validarDadosMedico($dados) {
        return isset($dados['nome'], $dados['cpf'], $dados['email'], $dados['senha']) &&
               preg_match('/^[0-9]{11}$/', $dados['cpf']) &&
               filter_var($dados['email'], FILTER_VALIDATE_EMAIL);
    }  

    public function gestaoPacientes() {
        // Obtenha a lista de pacientes
        $pacientes = Paciente::listarPorMedico($_SESSION['medico_id']);
        include __DIR__ . '/../views/gestao_pacientes.php';
    }    
}