<?php
$host = '127.0.0.1'; // o localhost
$db   = 'ORGANIZACION'; // nombre exacto de tu base de datos
$user = 'root';
$pass = ''; // sin contraseña en XAMPP
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
  echo 'Error de conexión: ' . htmlspecialchars($e->getMessage());
  exit;
}
