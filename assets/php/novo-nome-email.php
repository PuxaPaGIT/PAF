<?php

include('conexao.php');

if(!isset($_SESSION)) {
    session_start(); 
}

if (isset($_POST['Nome'])) { 

    // UPDATE user SET Nome = ? vai fazer uma atualização na tabela user onde vai definir o valor da coluna 'Nome' para um novo valor (?)
    // WHERE Email = ? vai atualizar o nome na tabela user do mysql so onde o e-mail corresponde ao valor ($_SESSION['email']

    $stmt = $mysqli->prepare("UPDATE user SET Nome = ? WHERE Email = ?");
    $stmt->bind_param("ss", $_POST['Nome'], $_SESSION['email']);
    $stmt->execute();

    $_SESSION['nome'] = $_POST['Nome']; // Atualiza o nome na sessão.

    echo "Nickname foi actualizado com sucesso!";
}

if (isset($_POST['novoEmail'], $_POST['confirmarEmail'], $_POST['senhaAtual'])) { 

    $stmt = $mysqli->prepare("SELECT * FROM user WHERE Email = ?");
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc(); // Busca o usuário na base de dados.

    if ($_POST['senhaAtual'] != $user['Password']) {
        echo "Palavra-passe errada"; 

    } else if ($_POST['novoEmail'] != $_POST['confirmarEmail']) {
        echo "Os e-mails não correspondem";

    } else {
        
        $stmt = $mysqli->prepare("SELECT * FROM user WHERE Email = ?");
        $stmt->bind_param("s", $_POST['novoEmail']);
        $stmt->execute(); 
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Este e-mail já está a ser utilizado";

        } else {

        // Set Email = ? esta a defenir o valor da coluna Email para um novo valor (?) que vai ser o que o utilizador escrever no place holder
        // WHERE Email = ? garante que a atualização seja feita apenas às linhas onde o valor da coluna Email corresponde ao valor da $_SESSION['email'].

        $stmt = $mysqli->prepare("UPDATE user SET Email = ? WHERE Email = ?");
        $stmt->bind_param("ss", $_POST['novoEmail'], $_SESSION['email']);
        $stmt->execute();

        $_SESSION['email'] = $_POST['novoEmail']; // Atualiza o e-mail na sessão.

            echo "O seu e-mail foi alterado";
        }
    }
}

?>
