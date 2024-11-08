<?php

include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $full_name = $_POST['full-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    
    if (empty($full_name) || empty($email) || empty($password) || empty($dob) || empty($phone)) {
        die('Todos os campos são obrigatórios.');
    }

   
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        die('Este e-mail já está registrado.');
    }

    
    $senha_hash = password_hash($password, PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO usuarios (full_name, email, password, dob, phone) 
            VALUES (:full_name, :email, :password, :dob, :phone)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $senha_hash);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':phone', $phone);

   
    if ($stmt->execute()) {
        echo '
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cadastro Concluído</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #ffc800;
                    color: #333;
                    text-align: center;
                    padding: 50px;
                }
                .container {
                    background: white;
                    border-radius: 10px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    padding: 30px;
                    max-width: 600px;
                    margin: auto;
                }
                h1 {
                    color: #007BFF;
                    font-size: 2.5em;
                }
                p {
                    font-size: 1.2em;
                    line-height: 1.5;
                }
                .btn {
                    background-color: #007BFF;
                    color: white;
                    padding: 10px 20px;
                    text-decoration: none;
                    border-radius: 5px;
                    margin-top: 20px;
                    display: inline-block;
                }
                .btn:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Seja Bem-vindo(a)!</h1>
                <p>Seu cadastro foi concluído com sucesso.</p>
                <p>Agora você faz parte da nossa comunidade e está a um passo de transformar seu corpo e sua saúde.</p>
                <p>Verifique seu e-mail para mais informações sobre como começar e aproveitar todos os benefícios que oferecemos.</p>
                <a href="index2.html" class="btn">Acessar Minha Conta</a>
            </div>
        </body>
        </html>
        ';
    } else {
        echo 'Erro ao registrar usuário. Tente novamente.';
    }
}
?>