// Este evento é acionado quando o documento HTML inicial (DOM) for completamente carregado e analisado
document.addEventListener('DOMContentLoaded', function() {

    // Obtem o elemento com o id 'dropdownMenuButton'
    var dropdown = document.getElementById('dropdownMenuButton');

    // Adiciona um evento de clique ao botão de dropdown
    dropdown.onclick = function() {
        
        // Obtem o elemento com a classe 'dropdown-menu'
        var menu = document.querySelector('.dropdown-menu');

        // Verifica se o menu está sendo exibido
        if (menu.style.display === 'block') { 
            // Se estiver sendo exibido, muda para 'none', escondendo o menu
            menu.style.display = 'none';
        } else {
            // Se não estiver sendo exibido, muda para 'block', mostrando o menu
            menu.style.display = 'block';
        }
    };
});
