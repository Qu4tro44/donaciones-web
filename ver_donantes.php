<?php
require 'conexion.php';

$sql = "SELECT * FROM DONANTE";
$stmt = $pdo->query($sql);
$donantes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Donantes</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <section>
    <h2>Donantes Registrados</h2>
    <?php if (count($donantes) > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Dirección</th>
        <th>Teléfono</th>
      </tr>
      <?php foreach ($donantes as $d): ?>
      <tr>
        <td><?= $d['id_donante'] ?></td>
        <td><?= htmlspecialchars($d['nombre']) ?></td>
        <td><?= htmlspecialchars($d['email']) ?></td>
        <td><?= htmlspecialchars($d['direccion']) ?></td>
        <td><?= htmlspecialchars($d['telefono']) ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
    <?php else: ?>
      <p>No hay donantes registrados.</p>
    <?php endif; ?>
  </section>
</body>
</html>
