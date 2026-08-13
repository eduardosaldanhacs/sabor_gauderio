// Compatibility for legacy menu markup still used by older views.
const conteudo = document.getElementById("cardapio-menu");
const contentMenu = document.getElementById("cardapio-dropdown");

if (conteudo && contentMenu && typeof showMenu === "function") {
    conteudo.addEventListener("mouseenter", showMenu);
    contentMenu.addEventListener("mouseleave", showMenu);
}
