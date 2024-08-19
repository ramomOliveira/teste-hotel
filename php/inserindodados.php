<?php
  include 'conexao1.php';

  $nome = "MAria Eduarda";
  $email = "maria.silva@exemplo.com";
  $senha = password_hash("senha123", PASSWORD_DEFAULT);

  $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";

  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sss", $nome, $email, $senha);
    $msg = $stmt->execute() ? "Usuário inserido com sucesso!" : "Erro ao inserir usuário: " . $stmt->error;
    $stmt->close();
  } else {
    $msg = "Erro na preparação da consulta: " . $conn->error;
  }

  $conn->close();
  echo $msg;
?>

<!-- 
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=nome_do_banco_de_dados', 'usuario', 'senha');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  

  $nome="José Maria";
  $email="joao.silva@exemplo.com";
  $senha=password_hash("senha123", PASSWORD_DEFAULT);
  $sql="INSERT INTO usuario (nome,email,senha)VALUES(:nome,:email,:senha)";
  $stmt=$pdo->prepare($sql);

  $stmt->bindParam(":nome",$nome);
  $stmt->bindParam(":email",$email);
  $stmt->bindParam(":senha",$senha);
  

  $stmt->execute();
  echo "Usuário inserido com sucesso!!!"

  } catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
  }
?> -->

<!-- // $uuid = com_create_guid(); // ou use uma biblioteca para gerar UUID
  // $nome = 'João Silva';
  // $email = 'joao.silva@example.com';
  // $senha = 'senha123'; -->