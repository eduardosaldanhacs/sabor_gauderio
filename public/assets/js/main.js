// main.js

const conteudo = document.getElementById("cardapio-menu");

conteudo.addEventListener("mouseenter", function () {
    showMenu();
});

const contentMenu = document.getElementById("cardapio-dropdown");
contentMenu.addEventListener("mouseleave", function () {
    // aqui você chama sua função
    showMenu();
});

