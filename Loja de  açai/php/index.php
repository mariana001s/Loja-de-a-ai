<?php include 'dados.php'; ?>

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

    <!-- Simulação de Entrega -->
    <section id="simulacao-entrega">
        <h2>Simule sua entrega</h2>
        <input type="text" id="endereco" placeholder="Digite seu endereço">
        <button onclick="calcularEntrega()">Calcular Entrega</button>
        <p id="resultado"></p>

        <!-- Google Maps Embed -->
        <iframe
            id="mapa"
            width="100%" height="300"
            src="https://www.google.com/maps/embed/v1/place?key=SUA_CHAVE_API&q=-3.0892,-60.0217"
            allowfullscreen>
        </iframe>
    </section>

    <script>
        function calcularEntrega() {
            const endereco = document.getElementById("endereco").value;
            if (endereco === "") {
                alert("Por favor, digite um endereço!");
                return;
            }
            
            // Simulação de tempo de entrega aleatório
            const tempoEstimado = Math.floor(Math.random() * (60 - 20 + 1)) + 20;
            document.getElementById("resultado").innerText = `Tempo estimado de entrega: ${tempoEstimado} minutos.`;
            
            // Atualizar mapa com um ponto fictício
            document.getElementById("mapa").src = `https://www.google.com/maps/embed/v1/directions?key=SUA_CHAVE_API&origin=${encodeURIComponent(endereco)}&destination=-3.0892,-60.0217&mode=driving`;
        }
    </script>

</body>
</html>
