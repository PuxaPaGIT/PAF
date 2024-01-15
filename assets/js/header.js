// Obtem o elemento com o id 'header-opacidade'
var header = document.getElementById("header-opacidade");

// Criei a função 'atualizarOpacidadeHeader'
function atualizarOpacidadeHeader() {
    // Verifica se a posição do scroll Y é menor que a altura do cabeçalho
    var estaNoTopo = window.scrollY < header.offsetHeight;

    // Se a posição do scroll Y for menor que a altura do cabeçalho
    if (estaNoTopo) {
        // Define a cor de fundo do cabeçalho como transparente
        header.style.backgroundColor = 'transparent';
    } else {
        // Se a posição do scroll Y for maior que a altura do cabeçalho, define a cor de fundo do cabeçalho como '#101010'
        header.style.backgroundColor = "#101010";
    }
}

// Adiciona um evento de scroll que chama a função 'atualizarOpacidadeHeader' sempre que o usuário der scroll
window.addEventListener("scroll", atualizarOpacidadeHeader);

// Chama a função 'atualizarOpacidadeHeader' para definir a cor de fundo inicial do cabeçalho
atualizarOpacidadeHeader();
