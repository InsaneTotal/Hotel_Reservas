const hoy = new Date().toISOString().split("T")[0];
const checkInFecha = document.getElementById("checkin");
const checkOutFecha = document.getElementById("checkout");
checkOutFecha.min = hoy;
checkInFecha.min = hoy;
