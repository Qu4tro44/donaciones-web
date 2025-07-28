<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Alta Proyecto</title>
</head>
<body>
  <h2>Registrar Proyecto</h2>
  <form id="formProyecto" action="guardar_proyecto.php" method="POST">
    <input type="text" name="nombre" placeholder="Nombre del proyecto" required><br><br>
    <textarea name="descripcion" placeholder="Descripción" required></textarea><br><br>
    <input type="number" name="presupuesto" min="0" placeholder="Presupuesto" required><br><br>
    <input type="date" name="fecha_inicio" required><br><br>
    <input type="date" name="fecha_fin" required><br><br>
    <button type="submit">Guardar Proyecto</button>
  </form>

  <script>
    document.getElementById('formProyecto').addEventListener('submit', e => {
      const fi = new Date(e.target.fecha_inicio.value);
      const ff = new Date(e.target.fecha_fin.value);
      if (ff < fi) {
        alert('La fecha fin no puede ser anterior a inicio.');
        e.preventDefault();
      }
    });
  </script>
</body>
</html>