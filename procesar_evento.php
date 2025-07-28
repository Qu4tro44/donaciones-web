<?php
// Seguridad con sesiones
session_start();
session_regenerate_id(true); // Previene session fixation
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // Habilita solo si usas HTTPS

// Control de tiempo de inactividad (30 minutos)
if (!isset($_SESSION['LAST_ACTIVITY'])) {
    $_SESSION['LAST_ACTIVITY'] = time();
} elseif (time() - $_SESSION['LAST_ACTIVITY'] > 1800) {
    session_unset();
    session_destroy();
    echo "<div class='notification'>Tu sesión ha expirado por inactividad. Por favor vuelve a ingresar los datos.</div>";
    exit;
}
$_SESSION['LAST_ACTIVITY'] = time();

include 'Eventos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $evento = new Evento(
        htmlspecialchars($_POST['descripcion']),
        htmlspecialchars($_POST['tipo']),
        htmlspecialchars($_POST['lugar']),
        htmlspecialchars($_POST['fecha']),
        htmlspecialchars($_POST['hora'])
    );

    echo "<h2>Evento registrado correctamente:</h2>";
    echo "<ul>";
    echo "<li><strong>Descripción:</strong> " . $evento->descripcion . "</li>";
    echo "<li><strong>Tipo:</strong> " . $evento->tipo . "</li>";
    echo "<li><strong>Lugar:</strong> " . $evento->lugar . "</li>";
    echo "<li><strong>Fecha:</strong> " . $evento->fecha . "</li>";
    echo "<li><strong>Hora:</strong> " . $evento->hora . "</li>";
    echo "</ul>";
}
?>

