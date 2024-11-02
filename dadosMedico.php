<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebendo os dados do formulário
    $nome_completo = $_POST['nome_completo'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];
    $crm = $_POST['crm'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT); // Criptografa a senha

    // Conexão com o banco de dados
    $host = "localhost";
    $dbname = "web-servidor";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insere os dados na tabela 'medicos' usando uma instrução preparada
        $sql = "INSERT INTO medicos (nome, cpf, data_nascimento, sexo, crm, email, telefone, senha) 
                VALUES (:nome_completo, :cpf, :data_nascimento, :sexo, :crm, :email, :telefone, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome_completo', $nome_completo);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':crm', $crm);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':senha', $senha);

        // Executa a query e exibe uma mensagem de sucesso
        if ($stmt->execute()) {
            echo "Médico cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar médico.";
        }
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
}
?>
