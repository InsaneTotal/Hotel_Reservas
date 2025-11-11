document.addEventListener("DOMContentLoaded", () => {
  const hoy = new Date().toISOString().split("T")[0];
  const checkInFecha = document.getElementById("checkin");
  const checkOutFecha = document.getElementById("checkout");

  if (!checkInFecha || !checkOutFecha) return;

  // helper: suma días a una fecha YYYY-MM-DD y devuelve YYYY-MM-DD
  const addDays = (dateStr, days) => {
    const d = new Date(dateStr);
    d.setDate(d.getDate() + days);
    return d.toISOString().split("T")[0];
  };

  // valores mínimos por defecto
  checkInFecha.min = hoy;
  checkOutFecha.min = addDays(hoy, 1); // checkout al menos un día después de hoy

  // Si cargó una checkin ya seleccionada al abrir, ajustar checkout.min
  if (checkInFecha.value) {
    checkOutFecha.min = addDays(checkInFecha.value, 1);
    if (!checkOutFecha.value || checkOutFecha.value < checkOutFecha.min) {
      checkOutFecha.value = checkOutFecha.min;
    }
  }

  // cuando el usuario cambia checkin, actualizar el mínimo de checkout
  checkInFecha.addEventListener("change", () => {
    const inVal = checkInFecha.value;
    if (!inVal) {
      checkOutFecha.min = addDays(hoy, 1);
      return;
    }
    const minCheckout = addDays(inVal, 1); // mínimo 1 día después del checkin
    checkOutFecha.min = minCheckout;

    // si el checkout actual es anterior al mínimo, ajustarlo automáticamente
    if (!checkOutFecha.value || checkOutFecha.value < minCheckout) {
      checkOutFecha.value = minCheckout;
    }
  });
});
