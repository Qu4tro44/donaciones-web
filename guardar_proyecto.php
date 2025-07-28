<?php
require 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sql = "INSERT INTO PROYECTO(nombre, descripcion, presupuesto, fecha_inicio, fecha_fin)
          VALUES (:n,:d,:p,:fi,:ff)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':n' => $_POST['nombre'],
    ':d' => $_POST['descripcion'],
    ':p' => $_POST['presupuesto'],
    ':fi'=> $_POST['fecha_inicio'],
    ':ff'=> $_POST['fecha_fin']
  ]);
  echo "Proyecto registrado.";
}
?>