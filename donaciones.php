<!-- donaciones.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Realizar Donación</title>
</head>
<body>
  <h2>Formulario de Donaciones</h2>
  <form action="guardar_donacion.php" method="POST">
    <label for="id_donante">ID Donante:</label>
    <input type="number" name="id_donante" id="id_donante" required><br><br>
    <label for="id_proyecto">ID Proyecto:</label>
    <input type="number" name="id_proyecto" id="id_proyecto" required><br><br>
    <label for="monto">Monto:</label>
    <input type="number" name="monto" id="monto" min="1" required><br><br>
    <button type="submit">Donar</button>
  </form>
</body>
</html>
