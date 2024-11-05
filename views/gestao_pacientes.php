<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Pacientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Gestão de Pacientes</h2>
    <a href="/gestaoMedicos/public/logout.php" class="btn btn-danger mb-3">Logout</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Idade</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pacientes)): ?>
                <?php foreach ($pacientes as $paciente): ?>
                    <tr>
                        <td><?= htmlspecialchars($paciente['nome']) ?></td>
                        <td><?= htmlspecialchars($paciente['email']) ?></td>
                        <td><?= htmlspecialchars($paciente['idade']) ?></td>
                        <td><?= htmlspecialchars($paciente['cpf']) ?></td>
                        <td><?= htmlspecialchars($paciente['telefone']) ?></td>
                        <td>
                            <a href="/gestaoMedicos/public/index.php?action=editar_paciente&id=<?= $paciente['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="/gestaoMedicos/public/index.php?action=excluir_paciente&id=<?= $paciente['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este paciente?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Nenhum paciente encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="/gestaoMedicos/public/index.php?action=cadastrar_paciente" class="btn btn-success">Cadastrar Novo Paciente</a>
</div>
</body>
</html>