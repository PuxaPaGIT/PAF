<?php

include 'assets/php/conexao.php';

include 'assets/php/paginacao.php';

?>

<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <title>Chef Virtual - Receitas Deliciosas</title>
    <link rel="stylesheet" href="assets/css/receita.css">
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

    <?php
    if(isset($_GET['nome'])) {
         // A função urlencode codifica uma string para ser usada numa URL. 
        // Caso a string tenha algum carcter especial ou espaços ira ser substituida por "+" ou "%".
        // Assim não causara problemas na url com outros caracteres especiais.
        $nome = urldecode($_GET['nome']);

        $sql = "SELECT * FROM receitas WHERE nome = '$nome'";

        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <div class="receita-detalhes">

                <h2> <?php echo $row['nome']; ?> </h2>

                <p> <i class="bi bi-alarm icon"> </i> <?php echo $row['tempo_preparo']; ?> m <i class="bi bi-people-fill icon"> </i> <?php echo $row['pessoas']; ?> pessoas </p>

                <img src="<?php echo $row['img']; ?>" >
                <p class="descricao"> <?php echo $row['img_descricao']; ?> </p>

                <h3>Ingredientes:</h3>

                <div class="ingre">
                <p> <?php echo $row['ingredientes']; ?> </p>
                </div>

                <h3>Instruções:</h3>

                <div class="instru">
                <p> <?php echo $row['instrucoes']; ?> </p>
                </div>

            </div>
            <?php
        } else {
            echo "<p style='color:white;'> Nenhuma receita encontrada </p>";
        }
    }
    ?>


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