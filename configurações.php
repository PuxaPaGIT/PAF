<?php

include('assets/php/impedimento.php');

?>

<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <title>Chef Virtual - Configurações</title>
    <link rel="stylesheet" href="assets/css/configurações.css">
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


<main class="main">

    <div class="main-conted">

    <div class="avatar"><i class="bi bi-person-fill"></i></div>

    <div class="nome"><?php echo $_SESSION['nome']; ?></div>

    <div class="data"> Membro desde: <?php echo $_SESSION['dataregistro']; ?></div>

    <div class="links">
        <a href="minha-conta.php">Pefil</a>
        <a href="configurações.php" class="confg"> <i class="bi bi-gear" style="color: #9F0B07;"> </i> Configurações</a>
    </div>

    <hr class="hr-perfil"> <!--linha horizontal-->

    <div class="form-configuracoes">

    <h2>Nickname</h2>

    <form action="assets/php/novo-nome-email.php" method="post">
        <input name="Nome" type="text" placeholder="Nome de utilizador" value="<?php echo $_SESSION['nome']; ?>">
        <button type="submit">Enviar</button>
    </form>

    <form action="assets/php/novo-nome-email.php" method="post">
        
        <h2>Segurança da Conta</h2>
        <p><?php echo $_SESSION['email']; ?></p>

        <h2>Muda o teu E-mail</h2>

        <input name="novoEmail" type="email" placeholder="Novo E-mail">
        <input name="confirmarEmail" type="email" placeholder="Confirma o teu novo E-mail">
        <input name="senhaAtual" type="password" placeholder="Senha Atual">
        <button type="submit">Enviar</button>
    </form>

    </div>

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