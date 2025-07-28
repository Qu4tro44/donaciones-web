<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Evento</title>
</head>
<body>
    <h2>Registrar Nuevo Evento</h2>
    <form action="procesar_evento.php" method="POST">
        <label>Descripción:</label>
        <input type="text" name="descripcion" required><br><br>

        <label>Tipo:</label>
        <select name="tipo" required>
            <option value="voluntariado">Voluntariado</option>
            <option value="recaudación">Recaudación</option>
        </select><br><br>

        <label>Lugar:</label>
        <input type="text" name="lugar" required><br><br>

        <label>Fecha:</label>
        <input type="date" name="fecha" required><br><br>

        <label>Hora:</label>
        <input type="time" name="hora" required><br><br>

        <button type="submit">Guardar Evento</button>
    </form>
</body>
</html>
