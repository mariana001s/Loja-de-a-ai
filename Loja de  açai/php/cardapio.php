<?php include 'header.php'; ?>

<h2>Nosso Cardápio</h2>

<?php
// Dados dos produtos
$produtos = [
    ["nome" => "Açaí Tradicional", "preco" => 14.90, "descricao" => "Açaí puro com acompanhamentos variados"],
    ["nome" => "Açaí com Morango", "preco" => 19.90, "descricao" => "Açaí com morangos frescos e granola"],
    ["nome" => "Açaí com Paçoca", "preco" => 17.50, "descricao" => "Açaí com pedaços de paçoca e mel"]
];

// Template do produto
function exibirProduto($produto) {
    echo "
    <div class='produto'>
        <h3>{$produto['nome']}</h3>
        <p><em>{$produto['descricao']}</em></p>
        <p><strong>Preço: R$ " . number_format($produto['preco'], 2, ',', '.') . "</strong></p>
        <a href='#' class='btn btn-comprar'>Comprar</a>
    </div>
    ";
}

// Exibir os produtos
foreach ($produtos as $produto) {
    exibirProduto($produto);
}
?>

<?php include 'footer.php'; ?>


<link rel="stylesheet" href="endereco.php">
<?php
// Definindo o cardápio como um array associativo
$menu_items = [
    ['nome' => 'Copo de Açaí Puro', 'descricao' => 'Delicioso açaí puro servido no copo.', 'preco' => 10.00, 'imagem' => 'açaipuro.png'],
    ['nome' => 'Açaí com Frutas', 'descricao' => 'Açaí com morango, banana e leite em pó.', 'preco' => 15.00, 'imagem' => 'Açai1frutas.png'],
    ['nome' => 'Açaí Natural', 'descricao' => 'Açaí natural 500ml com leite em pó e morango.', 'preco' => 20.00, 'imagem' => 'açainatural.png'],
];
?>
