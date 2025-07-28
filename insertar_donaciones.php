<?php
require 'conexion.php';

for ($i = 1; $i <= 10; $i++) {
    $stmt = $pdo->prepare("INSERT INTO DONACION(monto, fecha, id_proyecto, id_donante)
                           VALUES(:m, :f, :p, :d)");
    $stmt->execute([
      ':m' => rand(1000, 5000), // monto aleatorio
      ':f' => date('Y-m-d', strtotime("-$i days")),
      ':p' => rand(1, 3), // asume 3 proyectos
      ':d' => rand(1, 3)  // asume 3 donantes
    ]);
}
echo "10 donaciones insertadas correctamente.";
?>
