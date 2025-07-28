<?php
require 'conexion.php';

$sql = "
SELECT p.id_proyecto, p.nombre,
       COUNT(d.id_donacion) AS num_donaciones,
       SUM(d.monto) AS total_recaudado
FROM PROYECTO p
JOIN DONACION d ON p.id_proyecto = d.id_proyecto
GROUP BY p.id_proyecto
HAVING COUNT(d.id_donacion) > 2
ORDER BY total_recaudado DESC";

$stmt = $pdo->query($sql);
$proyectos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Proyectos con más de 2 Donaciones</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <section>
    <h2>Proyectos con más de 2 Donaciones</h2>

    <?php if (count($proyectos) > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Nombre del Proyecto</th>
        <th>Nº de Donaciones</th>
        <th>Total Recaudado</th>
      </tr>
      <?php foreach ($proyectos as $p): ?>
      <tr>
        <td><?= $p['id_proyecto'] ?></td>
        <td><?= htmlspecialchars($p['nombre']) ?></td>
        <td><?= $p['num_donaciones'] ?></td>
        <td>$<?= number_format($p['total_recaudado'], 2) ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
    <?php else: ?>
      <p>No hay proyectos con más de 2 donaciones.</p>
    <?php endif; ?>
  </section>
</body>
</html>

