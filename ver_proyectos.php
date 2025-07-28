<?php
require 'conexion.php';

$sql = "SELECT * FROM PROYECTO";
$stmt = $pdo->query($sql);
$proyectos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Proyectos</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <section>
    <h2>Proyectos Registrados</h2>
    <?php if (count($proyectos) > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Presupuesto</th>
        <th>Inicio</th>
        <th>Fin</th>
      </tr>
      <?php foreach ($proyectos as $p): ?>
      <tr>
        <td><?= $p['id_proyecto'] ?></td>
        <td><?= htmlspecialchars($p['nombre']) ?></td>
        <td><?= htmlspecialchars($p['descripcion']) ?></td>
        <td>$<?= number_format($p['presupuesto'], 2) ?></td>
        <td><?= $p['fecha_inicio'] ?></td>
        <td><?= $p['fecha_fin'] ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
    <?php else: ?>
      <p>No hay proyectos registrados.</p>
    <?php endif; ?>
  </section>
</body>
</html>
