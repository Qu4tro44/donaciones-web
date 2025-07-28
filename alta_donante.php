<form id="formDonante" action="guardar_donante.php" method="POST">
  <input type="text" name="nombre" placeholder="Nombre" required>
  <input type="email" name="email" placeholder="Email" required>
  <input type="text" name="direccion" placeholder="Dirección" required>
  <input type="tel" name="telefono" placeholder="Teléfono" required>
  <button type="submit">Guardar Donante</button>
</form>
<script>
document.getElementById('formDonante').addEventListener('submit', e => {
  const tel = e.target.telefono.value;
  if (!/^\d{7,15}$/.test(tel)) {
    alert('Teléfono inválido.');
    e.preventDefault();
  }
});
</script>