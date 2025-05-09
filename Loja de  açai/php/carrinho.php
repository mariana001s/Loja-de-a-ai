<?php
// Definindo o cardápio como um array associativo
$menu_items = [
    ['nome' => 'Copo de Açaí Puro', 'descricao' => 'Delicioso açaí puro servido no copo.', 'preco' => 10.00, 'imagem' => 'açaipuro.png'],
    ['nome' => 'Açaí com Frutas', 'descricao' => 'Açaí com morango, banana e leite em pó.', 'preco' => 15.00, 'imagem' => 'Açai1frutas.png'],
    ['nome' => 'Açaí Natural', 'descricao' => 'Açaí natural 500ml com leite em pó e morango.', 'preco' => 20.00, 'imagem' => 'açainatural.png'],
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja virtual de Açaí</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <div class="menu-toggle">
            <button onclick="toggleMenu()">☰ Menu</button>
        </div>
        <h1>Bem-vindo à Loja Virtual de Açaí</h1>
    </header>

    <!-- Menu Lateral -->
    <div class="menu" id="menu">
        <button class="close-btn" onclick="toggleMenu()">×</button>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="perfilusuario.php">Minha Conta</a></li>
            <li><a href="contato/index.php">Contato</a></li>
            <li><a href="endereco/index.php">Endereço</a></li>
            <li><a href="redes-sociais/index.php">Redes Sociais</a></li>
            <li><a href="email/index.php">E-mail</a></li>
        </ul>
    </div>

    <!-- Cardápio -->
    <div class="container">
        <h2>Cardápio</h2>
        <?php foreach ($menu_items as $item): ?>
            <div class="menu-item">
                <img src="<?php echo $item['imagem']; ?>" alt="Imagem de <?php echo $item['nome']; ?>">
                <div>
                    <h3><?php echo $item['nome']; ?></h3>
                    <p><?php echo $item['descricao']; ?></p>
                    <p><strong>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></strong></p>

                </div>
                <button onclick="addToCart('<?php echo $item['nome']; ?>', <?php echo $item['preco']; ?>)">Adicionar</button>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Carrinho -->
    <div class="cart">
        <h2>Carrinho de Compras</h2>
        <ul id="cart-items"></ul>
        <p><strong>Total: R$ <span id="total"></span></strong></p>
        <button onclick="checkout()">Finalizar Compra</button>
        <button onclick="clearCart()">Cancelar Pedido</button>
    </div>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2025 Loja de Açaí - Todos os direitos reservados.</p>
    </footer>

</body>
</html>




