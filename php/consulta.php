<?php
  include 'conexao-hotel.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Lista de Reservas</title>

      <style>
        .container {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
          padding: 16px;
        }
        .headerList {
          display: grid;
          grid-template-columns: repeat(6, 1fr);
          padding: 8px 16px;
          font-size: 18px;
          font-weight: 700;
        }
        .mainList {
          display: grid;
          grid-template-columns: repeat(6, 1fr);
          padding: 8px 16px;
          color: gray;
        }
      </style>
  </head>

  <body>
    <div class="container">
      <?php
      $sql = "SELECT id, nome, email, data_reserva, hora_reserva, servico FROM reservas";
      if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            echo "
                  <div class='headerList'>
                      <div>ID</div>
                      <div>Nome</div>
                      <div>Email</div>
                      <div>Data da Reserva</div>
                      <div>Hora da Reserva</div>
                      <div>Serviço</div>
                  </div>";
            while ($row = $result->fetch_assoc()) {
              echo "<div class='mainList'>
                      <div>" . htmlspecialchars($row["id"]) . "</div>
                      <div>" . htmlspecialchars($row["nome"]) . "</div>
                      <div>" . htmlspecialchars($row["email"]) . "</div>
                      <div>" . htmlspecialchars($row["data_reserva"]) . "</div>
                      <div>" . htmlspecialchars($row["hora_reserva"]) . "</div>
                      <div>" . htmlspecialchars($row["servico"]) . "</div>
                    </div>";
            }
          } else {
            echo "<p class='no-results'>Nenhuma reserva encontrada.</p>";
          }
          $result->free();
        } else {
          echo "<p class='no-results'>Erro na consulta: " . $conn->error . "</p>";
        }
        $conn->close();
      ?>
    </div>
  </body>
</html>