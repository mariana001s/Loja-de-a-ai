<?php include 'dados.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulação de Entrega - Loja de Açaí</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_api_key; ?>&libraries=places"></script>
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <div class="menu-toggle">
            <button onclick="toggleMenu()">☰ Menu</button>
        </div>
        <h1>Simule sua Entrega</h1>
    </header>

    <!-- Simulação de Entrega -->
    <section id="simulacao-entrega">
        <h2>Simule sua entrega</h2>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" placeholder="Digite seu endereço">
        
        <label for="cep">CEP:</label>
        <input type="text" id="cep" placeholder="Seu CEP" readonly>

        <button onclick="calcularEntrega()">Calcular Entrega</button>
        <p id="resultado"></p>

        <!-- Google Maps Embed -->
        <iframe
            id="mapa"
            width="100%" height="300"
            src="https://www.google.com/maps/embed/v1/place?key=<?php echo $google_api_key; ?>&q=-22.9246072,-43.3777264&zoom=15"
            allowfullscreen>
        </iframe>
    </section>

    <script>
        let autocomplete;

        // Inicializar o autocomplete do Google Maps
        function initAutocomplete() {
            autocomplete = new google.maps.places.Autocomplete(
                document.getElementById("endereco"),
                { types: ["geocode"] }
            );

            autocomplete.addListener("place_changed", preencherEndereco);
        }

        function preencherEndereco() {
            const place = autocomplete.getPlace();
            const cepField = document.getElementById("cep");

            if (place.address_components) {
                let cep = place.address_components.find(component =>
                    component.types.includes("postal_code")
                );

                cepField.value = cep ? cep.long_name : "Não encontrado";
            }
        }

        function calcularEntrega() {
            const endereco = document.getElementById("endereco").value;
            if (endereco === "") {
                alert("Por favor, digite um endereço!");
                return;
            }

            // Simulação de tempo de entrega aleatório
            const tempoEstimado = Math.floor(Math.random() * (60 - 20 + 1)) + 20;
            document.getElementById("resultado").innerText = `Tempo estimado de entrega: ${tempoEstimado} minutos.`;

            // Atualizar mapa com o endereço digitado
            document.getElementById("mapa").src = `https://www.google.com/maps/embed/v1/directions?key=<?php echo $google_api_key; ?>&origin=${encodeURIComponent(endereco)}&destination=-22.9246072,-43.3777264&mode=driving`;
        }

        window.onload = initAutocomplete;
    </script>
</body>
</html>
