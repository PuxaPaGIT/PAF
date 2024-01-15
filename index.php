<?php

if(!isset($_SESSION)) {
    session_start();
}

include('assets/php/conexao.php');

?>

<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <title>Chef Virtual - Receitas Deliciosas</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<header id="header-opacidade" class="header">

    <div class="logo">
        <a href="index.php">
            <img src="assets/Imagens/Logo.png">
        </a>
    </div>

    <div class="icone-perfil">
    <!-- Verifica se o utilizador está logado e muda o ícone de perfil -->
    <!--  && se ambas as condições forem verdadeiras, o resultado será verdadeiro. Se pelo menos 1 for falsa o resultado sera falso -->
    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>

        <div class="dropdown">

            <i class="bi bi-person-fill icone-perfil-logado" id="dropdownMenuButton"></i>
            <div class="dropdown-menu">
                <a href="minha-conta.php">Perfil</a>
                <a href="configurações.php">Configurações</a>
                <a href="assets/php/logout.php">Sair</a>
            </div>
        </div>
        <?php else: ?>
            <a href="login-register.html"><i class="bi bi-person"></i></a>
        <?php endif; ?>
    </div>

    <script src="assets/js/header.js"></script>

    <script src="assets/js/menu.js"></script>

</header>

<main class="main_content">

    <div class="main_img"> 

        <a href="receita.php?nome=Bacalhau+com+natas">
            <img class="Imagem1" src="assets/Imagens/Img.png"   >
            <img class="Imagem2" src="assets/Imagens/Img 2.png" >
            <img class="Imagem3" src="assets/Imagens/Img 3.png" >
        </a>
        
    </div>
    
    <div class="receitas">
        
        <div class="receitas-container">

        <h2>Receitas em Destaque</h2>

        <a href="receita.php?nome=Carne+de+porco+à+alentejana"> 
            <img src="assets/Imagens Receitas/carne-alentejana.jpg">
        </a>
        <p>Carne de porco à alentejana</p>

        <a href="receita.php?nome=Bacalhau+à+narcisa"> 
            <img src="assets/Imagens Receitas/Bacalhau-narcisa.jpg">
        </a>
        <p>Bacalhau à Narcisa</p>

        <a href="receita.php?nome=Bitoque+á+Portuguesa"> 
            <img src="assets/Imagens Receitas/Bitoque.jpg">
        </a>
        <p>Bitoque á Portuguesa</p>

        <a href="receita.php?nome=Cabrito+assado+no+forno"> 
            <img src="assets/Imagens Receitas/cabrito-assado.jpg">
        </a>
        <p>Cabrito assado no forno</p>
        
        </div>
    </div>

    <div class="todas_receitas">
        <a href="pesquisar.php">Ver todas as receitas</a>
    </div>


</main>

<!---------------------------------- FOOTER ---------------------------------->

<footer>
    <div class="footer_content">

        <div class="footer_logo">

            <a href="index.php">
                <img src="assets/Imagens/Logo.png">
            </a>

        </div>
        
        <ul class="footer_list"> <!--ul = lista não ordenada -->

            <li>  <!-- cria os itens na lista não ordenada -->
                <h3>Sobre o Chef Virtual</h3>
            </li>

            <li>
                <a href="sobre-nos.php" class="footer_link">Sobre nós</a>
            </li>
        </ul>

        <ul class="footer_list">
            <li>
                <h3>A minha conta</h3>
            </li>

            <li>
                <a href="minha-conta.php" class="footer_link">Informações da conta</a>
            </li>
        </ul>

        <ul class="footer_list">
            <li>
                <h3>Ajuda</h3>
            </li>

            <li>
                <a href="contacta-nos.php" class="footer_link">Contacta-nos</a>
            </li>
        </ul>

        <div class="footer_social_media">

                <h3>Siga-nos</h3>


                <a href="https://www.facebook.com/profile.php?id=61551832712919" target="_blank" class="footer_link_social">
                    <i class="bi bi-facebook" id="facebook"></i>
                </a>

                <a href="https://twitter.com/ChefVirtualPT" target="_blank" class="footer_link_social">
                    <i class="bi bi-twitter" id="twitter"></i>
                </a>
        
                <a href="https://www.instagram.com/chefvirtualpt/?next=%2F" target="_blank" class="footer_link_social">
                    <i class="bi bi-instagram" id="instagram"></i>
                </a>
        
                <a href="https://www.youtube.com/channel/UClxRSJYtTKPkrL_ZEBECT7w" target="_blank" class="footer_link_social">
                    <i class="bi bi-youtube" id="youtube"></i>
                </a>
            
        </div>

        <div class="footer_copyright">
            <hr class="hr"> <!--linha horizontal-->
            <p>Chef Virtual &copy; José Morais 2023</p>
        </div>

</footer>

</html>