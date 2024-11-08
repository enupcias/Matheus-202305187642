<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $data_chegada = $_POST['data_chegada'];
    $num_noites = $_POST['num_noites'];
    $num_hospedes = $_POST['num_hospedes'];
    $total = $_POST['total'];
    $mensagem = $_POST['mensagem'];
    $newsletter = isset($_POST['newsletter']) ? 'Sim' : 'Não';

    echo "<h1>Reserva Recebida</h1>";
    echo "<p>Nome: $nome</p>";
    echo "<p>Sexo: $sexo</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Data de Chegada: $data_chegada</p>";
    echo "<p>Número de Noites: $num_noites</p>";
    echo "<p>Número de Hóspedes: $num_hospedes</p>";
    echo "<p>Total Estimado: $total</p>";
    echo "<p>Mensagem: $mensagem</p>";
    echo "<p>Inscrito na Newsletter: $newsletter</p>";
}
?>
