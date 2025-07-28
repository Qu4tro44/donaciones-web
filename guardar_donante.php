<?php
require 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sql = "INSERT INTO DONANTE(nombre,email,direccion,telefono)
          VALUES(:n,:e,:dir,:tel)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':n' => $_POST['nombre'],
    ':e' => $_POST['email'],
    ':dir'=> $_POST['direccion'],
    ':tel'=> $_POST['telefono']
  ]);
  echo "Donante registrado.";
}
?>