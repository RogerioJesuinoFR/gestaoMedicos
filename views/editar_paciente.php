<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Paciente</h2>
    <form action="/gestaoMedicos/public/index.php?action=editar_paciente&id=<?= $paciente['id'] ?>" method="POST">
        <input type="hidden" name="id" value="<?= $paciente['id'] ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($paciente['nome']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($paciente['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" class="form-control" id="idade" name="idade" value="<?= htmlspecialchars($paciente['idade']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= htmlspecialchars($paciente['cpf']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?= htmlspecialchars($paciente['telefone']) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
    <p class="mt-3"><a href="/gestaoMedicos/public/index.php?action=gestao_pacientes">Voltar à gestão de pacientes</a></p>
</div>
</body>
</html>