let cart = [];
let total = 0;

// Função para alternar a visibilidade do menu
function toggleMenu() {
    const menu = document.getElementById('menu');
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
}

// Função para adicionar itens ao carrinho
function addToCart(item, price) {
    const cartItem = cart.find(i => i.item === item);
    if (cartItem) {
        cartItem.quantity += 1; // Incrementa a quantidade se o item já estiver no carrinho
    } else {
        cart.push({ item, price, quantity: 1 });
    }
    total += price;
    updateCart();
}

// Função para atualizar o carrinho de compras
function updateCart() {
    const cartItems = document.getElementById('cart-items');
    const totalElement = document.getElementById('total');

    cartItems.innerHTML = cart.map((c, index) => `
        <li>${c.item} - R$ ${c.price.toFixed(2)}
            <button class="remover" onclick="removeFromCart(${index})">Remover</button>
        </li>
    `).join('');

    totalElement.textContent = total.toFixed(2);
}

// Função para remover itens do carrinho de compras
function removeFromCart(index) {
    total -= cart[index].price * cart[index].quantity;
    cart.splice(index, 1);
    updateCart();
}

// Função para limpar o carrinho de compras
function clearCart() {
    cart = [];
    total = 0;
    updateCart();
}

// Função para finalizar a compra
function checkout() {
    alert('Compra finalizada! Obrigado pelo pedido.');
    clearCart();
}

// Selecionando os itens de menu e botões
const menuItems = document.querySelectorAll('.menu-item');
const buttons = document.querySelectorAll('.menu-item button, .cart button');

// Função para adicionar efeito de hover
function addHoverEffect(element) {
    element.addEventListener('mouseover', function() {
        element.style.transform = 'scale(1.05)'; // Aumenta o tamanho
    });

    element.addEventListener('mouseout', function() {
        element.style.transform = 'scale(1)'; // Restaura ao tamanho original
    });
}

// Adicionando o efeito de hover para os itens de menu e botões
menuItems.forEach(item => addHoverEffect(item));
buttons.forEach(button => addHoverEffect(button));

// Adicionando eventos de clique aos botões "Adicionar ao carrinho"
document.querySelectorAll('.menu-item button').forEach(button => {
    button.addEventListener('click', function() {
        const itemName = button.previousElementSibling.querySelector('h3').textContent;
        const itemPrice = parseFloat(button.previousElementSibling.querySelector('p strong').textContent.replace('R$ ', ''));
        addToCart(itemName, itemPrice);
    });
});

// Expor funções globalmente para o HTML
window.toggleMenu = toggleMenu;
window.clearCart = clearCart;
window.checkout = checkout;
window.removeFromCart = removeFromCart;

// Adicionando efeito de hover aos itens do menu
document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.menu ul li a');

    menuItems.forEach(menuItem => {
        menuItem.addEventListener('mouseover', function () {
            menuItem.style.backgroundColor = '#ffd700'; // Cor ao passar o mouse
            menuItem.style.color = '#000000'; // Cor do texto ao passar o mouse
            menuItem.style.transform = 'scale(1.1)'; // Aumenta o tamanho
        });

        menuItem.addEventListener('mouseout', function () {
            menuItem.style.backgroundColor = ''; // Voltar à cor original
            menuItem.style.color = ''; // Voltar à cor do texto original
            menuItem.style.transform = 'scale(1)'; // Restaura ao tamanho original
        });
    });
});
