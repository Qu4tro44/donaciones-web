<?php
require 'conexion.php';

$sql = "
SELECT d.id_donacion, d.monto, d.fecha,
       p.nombre AS proyecto, a.nombre AS donante
FROM DONACION d
JOIN PROYECTO p ON d.id_proyecto = p.id_proyecto
JOIN DONANTE a ON d.id_donante = a.id_donante
ORDER BY d.fecha DESC
";

$stmt = $pdo->query($sql);
$donaciones = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Donaciones Registradas</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <section>
    <h2>Donaciones Realizadas</h2>
    <?php if (count($donaciones) > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Donante</th>
        <th>Proyecto</th>
        <th>Monto</th>
        <th>Fecha</th>
      </tr>
      <?php foreach ($donaciones as $don): ?>
      <tr>
        <td><?= $don['id_donacion'] ?></td>
        <td><?= htmlspecialchars($don['donante']) ?></td>
        <td><?= htmlspecialchars($don['proyecto']) ?></td>
        <td>$<?= number_format($don['monto'], 2) ?></td>
        <td><?= $don['fecha'] ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
    <?php else: ?>
      <p>No hay donaciones registradas.</p>
    <?php endif; ?>
  </section>
</body>
</html>
