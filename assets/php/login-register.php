<?php

include('conexao.php');

if(!isset($_SESSION)) {
    session_start();
}

// Verifica se o formulário de registro foi enviado
if (isset($_POST['Nome-register']) && $_POST['Nome-register'] != "") {
    // Se sim, trata-se de um registro de novo usuário

    // Obtém os dados do formulário de registro
    $nome = $_POST['Nome-register'];
    $email = $_POST['Email-register'];
    $password = $_POST['Password-register'];

    if (empty($email) || empty($password)) { // || retorna verdadeiro se pelo menos uma for verdadeira.

        echo "Por favor, preencha todos os campos para o registro.";
    } else if (strlen($password) < 6) {

        echo "Por favor, escolha uma senha com pelo menos 6 caracteres.";
    } else {
        // Se os campos estiverem preenchidos corretamente, verifica se o e-mail já existe na base de dados
        $stmtconfirmar = $mysqli->prepare("SELECT Email FROM user WHERE Email = ?");
        $stmtconfirmar->bind_param("s", $email);
        $stmtconfirmar->execute();
        $result = $stmtconfirmar->get_result();

        if ($result->num_rows > 0) {
            echo "O e-mail fornecido já está em uso. Por favor, escolha outro.";
        } else {

            // Obtém a data atual
            $data = date('Y-m-d');

            // Se o e-mail não existir, insere os novos dados do usuário na base de dados
            $stmt = $mysqli->prepare("INSERT INTO user (Nome, Email, Password, DataRegistro) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nome, $email, $password, $data);
            $stmt->execute();
            $stmt->close();
            $mysqli->close();

            header("Location:/login-register.html");
        }
    }
} else {
    // Se o formulário de registro não foi enviado, trata-se de um login 

    // Se $_POST['Email-login'] estiver definido, $email recebe esse valor.
    // Caso contrário, $email será uma string vazia.
    $email = $_POST['Email-login'] ?? '';
    // A $password é igual.
    $password = $_POST['Password-login'] ?? '';

    if (empty($email) || empty($password)) {

        echo "Por favor, preencha todos os campos para entrar.";
    } else {
        // Se os campos estiverem preenchidos, busca o usuário pelo e-mail na base de dados
        $stmt = $mysqli->prepare("SELECT * FROM user WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute(); 
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Verifica se o usuário existe (email) e se a senha está correta
        if ($result->num_rows > 0 && $password == $user['Password']) {

            $_SESSION['loggedin'] = true;

            $_SESSION['nome'] = $user['Nome'];
            $_SESSION['email'] = $user['Email'];
            $_SESSION['dataregistro'] = $user['DataRegistro'];

            header("Location:/index.php");
        } else {
            echo "Dados de login inválidos. Por favor, tente novamente.";
        }
    }
}

?>
