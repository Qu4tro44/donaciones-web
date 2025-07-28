<?php
require_once 'Eventos.php';

// Crear algunos eventos de prueba
$eventos = [
    new Evento("Campaña de libros", "recaudación", "Biblioteca Central", "2025-07-15", "10:00"),
    new Evento("Voluntariado ambiental", "voluntariado", "Playa Grande", "2025-06-30", "09:00"),
    new Evento("Charla de sostenibilidad", "voluntariado", "Centro Comunitario", "2025-08-05", "15:00")
];

// Filtro por tipo
$tipoBuscado = "voluntariado";
$resultado = Evento::filtrarPorTipo($eventos, $tipoBuscado);

echo "<h2>Eventos filtrados por tipo: '$tipoBuscado'</h2>";
foreach ($resultado as $evento) {
    echo "<p><strong>Descripción:</strong> $evento->descripcion<br>";
    echo "<strong>Tipo:</strong> $evento->tipo<br>";
    echo "<strong>Lugar:</strong> $evento->lugar<br>";
    echo "<strong>Fecha:</strong> $evento->fecha<br>";
    echo "<strong>Hora:</strong> $evento->hora</p><hr>";
}
?>
