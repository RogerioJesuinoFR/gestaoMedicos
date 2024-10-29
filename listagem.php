<!doctype html>
<html lang="pt-br">
  <head>
    <title>CRUD-Pacientes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="7">Pacientes</th>
                </tr>
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

                <?php
                    include 'config.php';
                    $buscar_cadastros = "SELECT * FROM paciente";
                    $query_cadastros = mysqli_query($connx, $buscar_cadastros);

                    while ($receber_cadastros = mysqli_fetch_array($query_cadastros)) {
                        $id = $receber_cadastros['id'];
                        $nome = $receber_cadastros['nome'];
                        $email = $receber_cadastros['email'];
                        $idade = $receber_cadastros['idade'];
                        $cpf = $receber_cadastros['CPF'];
                        $telefone = $receber_cadastros['telefone'];
                ?>

                <tr>
                    <form action="editar.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <td><input type="text" name="nome" value="<?php echo $nome; ?>"></td>
                        <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
                        <td><input type="number" name="idade" value="<?php echo $idade; ?>"></td>
                        <td><input type="text" name="CPF" value="<?php echo $cpf; ?>"></td>
                        <td><input type="text" name="telefone" value="<?php echo $telefone; ?>"></td>
                        <td><input type="submit" value="Editar"></td>
                    </form>
                    <td>
                        <form action="excluir.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>

                <?php } ?>

                <tr>
                    <form action="cadastro.php" method="post">
                        <td><input type="text" name="nome" required></td>
                        <td><input type="email" name="email" required></td>
                        <td><input type="number" name="idade" required></td>
                        <td><input type="text" name="CPF" required></td>
                        <td><input type="text" name="telefone" required></td>
                        <td><input type="submit" value="Cadastrar"></td>
                    </form>
                </tr>

            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
