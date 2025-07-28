<?php
session_start();
session_regenerate_id(true);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);

// Manejo de inactividad
if (!isset($_SESSION['LAST_ACTIVITY'])) {
    $_SESSION['LAST_ACTIVITY'] = time();
} elseif (time() - $_SESSION['LAST_ACTIVITY'] > 1800) {
    session_unset();
    session_destroy();
    echo "<p>Tu sesión ha expirado. Por favor vuelve a iniciar.</p>";
    exit;
}
$_SESSION['LAST_ACTIVITY'] = time();

// Inicializar carrito
if (!isset($_SESSION['donation_cart'])) {
    $_SESSION['donation_cart'] = [];
}

// Agregar o finalizar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $monto = floatval($_POST['donation_amount']);
    $nombre = htmlspecialchars($_POST['donor_name']);

    if ($monto > 0 && !empty($nombre)) {
        if (isset($_POST['add'])) {
            $_SESSION['donation_cart'][] = ['nombre' => $nombre, 'monto' => $monto];
        } elseif (isset($_POST['checkout'])) {
            echo "<h3>Resumen de tu donación:</h3><ul>";
            foreach ($_SESSION['donation_cart'] as $item) {
                echo "<li>{$item['nombre']} donó \${$item['monto']}</li>";
            }
            echo "</ul>";
            session_unset();
            session_destroy();
            exit;
        }
    } else {
        echo "Por favor ingresa datos válidos.";
    }
}

// Mostrar carrito actual
echo "<h3>Carrito actual:</h3><ul>";
foreach ($_SESSION['donation_cart'] as $item) {
    echo "<li>{$item['nombre']} donó \${$item['monto']}</li>";
}
echo "</ul><a href='DONACIONES.html'>Volver</a>";
?>
