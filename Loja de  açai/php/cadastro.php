<?php
// processar_cadastro.php

// Recebe os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];

// Conectar ao banco de dados (substitua com as informações corretas)
$host = 'localhost';
$dbname = 'loja_acai';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar se o e-mail já existe
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
    $stmt->execute(['email' => $email]);
    $usuarioExistente = $stmt->fetch();

    if ($usuarioExistente) {
        echo 'E-mail já cadastrado!';
    } else {
        // Inserir dados do novo usuário no banco de dados
        $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, senha, telefone) VALUES (:nome, :email, :senha, :telefone)');
        $stmt->execute([
            'nome' => $nome,
            'email' => $email,
            'senha' => password_hash($senha, PASSWORD_DEFAULT), // Senha criptografada
            'telefone' => $telefone
        ]);
        echo 'Cadastro realizado com sucesso!';
    }
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>



