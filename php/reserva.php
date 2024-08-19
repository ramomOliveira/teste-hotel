<?php
  include 'conexao-hotel.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_reserva = $_POST['data_reserva'];
    $hora_reserva = $_POST['hora_reserva'];
    $servico = $_POST['servico'];
    
    $sql = "INSERT INTO reservas (nome, email, data_reserva, hora_reserva, servico ) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {

      $stmt->bind_param("sssss", $nome, $email, $data_reserva, $hora_reserva, $servico);

      $msg = $stmt->execute() ? "Reserva criada com sucesso!" : "Erro ao inserir reserva: " . $stmt->error;

      $stmt->close();

    } else {

      $msg = "Erro na preparação da consulta: " . $conn->error;

    }

    $conn->close();
    echo $msg;

    }
?>

<!-- CREATE TABLE reservas (
    id char(36) NOT NULL DEFAULT uuid(),
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    data DATE NOT NULL,
    hora TIME NOT NULL,
    servico VARCHAR(255) NOT NULL
); -->