<?php
require_once __DIR__ . '/../controllers/MedicoController.php';
require_once __DIR__ . '/../controllers/PacienteController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$action = $_GET['action'] ?? 'login_medico';

$controllerMedico = new MedicoController();
$controllerPaciente = new PacienteController();

switch ($action) {
    case 'cadastrar_medico':
        $controllerMedico->cadastrar_medico();
        break;
    case 'login_medico':
        $controllerMedico->login_medico();
        break;
    case 'gestao_pacientes':
        $controllerPaciente->listar(); 
        break;
    case 'cadastrar_paciente':
        $controllerPaciente->cadastrar_paciente();
        break;
    case 'editar_paciente':
        $controllerPaciente->editar_paciente();
        break;
    case 'excluir_paciente':
        $controllerPaciente->excluir_paciente();
        break;
    default:
        echo "Ação não encontrada.";
        break;
}

?>