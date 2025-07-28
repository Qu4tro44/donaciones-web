<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_donante = $_POST['id_donante'];
  $id_proyecto = $_POST['id_proyecto'];
  $monto = $_POST['monto'];

  $sql = "INSERT INTO DONACION (id_donante, id_proyecto, monto, fecha) 
          VALUES (:don, :pro, :mon, NOW())";

  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':don' => $id_donante,
    ':pro' => $id_proyecto,
    ':mon' => $monto
  ]);

  echo "<p>Donación registrada correctamente.</p>";
  echo "<a href='donaciones.php'>Volver</a>";
}
?>
