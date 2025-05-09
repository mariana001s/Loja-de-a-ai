<?php
// processar_login.php

// Recebe os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Conectar ao banco de dados (substitua com as informações corretas)
$host = 'localhost';
$dbname = 'loja_acai';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar se o e-mail existe no banco de dados
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
    $stmt->execute(['email' => $email]);
    $usuario = $stmt->fetch();

    if ($usuario) {
        // Verificar se a senha está correta
        if (password_verify($senha, $usuario['senha'])) {
            // A senha está correta, o usuário pode ser autenticado
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            header('Location: minhaconta.html'); // Redireciona para "minhaconta.html"
            exit();
        } else {
            echo 'Email ou senha incorretos. Tente novamente.';
        }
    } else {
        echo 'Email ou senha incorretos. Tente novamente.';
    }
} catch (PDOException $e) {
    // Log de erros, para não expor dados sensíveis ao usuário
    error_log('Erro ao conectar ao banco de dados: ' . $e->getMessage());
    echo 'Ocorreu um erro. Tente novamente mais tarde.';
}
?>
