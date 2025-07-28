<?php
// Seguridad con sesiones
session_start();
session_regenerate_id(true); // Prevenir session fixation
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // Solo si tu sitio usa HTTPS

// Verificar tiempo de inactividad
if (!isset($_SESSION['LAST_ACTIVITY'])) {
    $_SESSION['LAST_ACTIVITY'] = time();
} elseif (time() - $_SESSION['LAST_ACTIVITY'] > 1800) { // 30 minutos
    session_unset();
    session_destroy();
    echo "<div class='notification'>Tu sesión ha expirado por inactividad. Por favor, intenta nuevamente.</div>";
    exit;
}
$_SESSION['LAST_ACTIVITY'] = time(); // Actualizar tiempo de actividad

// Procesamiento del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donante = htmlspecialchars($_POST['donor_name']);
    $monto = floatval($_POST['donation_amount']);

    if ($monto > 0 && !empty($donante)) {
        echo "<div class='notification'>Gracias $donante por tu donación de \$$monto a nuestra causa.</div>";
    } else {
        echo "<div class='notification'>Por favor ingresa un nombre válido y un monto mayor a cero.</div>";
    }
}
?>

