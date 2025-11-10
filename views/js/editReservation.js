document.addEventListener("DOMContentLoaded", () => {
  const editarBtns = document.querySelectorAll(".btnEdit");
  const modalEl = document.getElementById("editarModal");
  if (!modalEl || !editarBtns) return;

  const editarModal = new bootstrap.Modal(modalEl);

  // delegación: añadir listener a cada botón
  editarBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();

      const nameUser = btn.dataset.nameuser;
      const reservaId = btn.dataset.id;
      console.log(btn.dataset);
      if (!reservaId) {
        alert("Id de reserva inválido");
        return;
      }

      // petición AJAX para traer datos de la reserva
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "index.php?action=reservaData", true);
      xhr.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded;charset=UTF-8"
      );
      xhr.timeout = 10000;

      xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
          try {
            const data = JSON.parse(xhr.responseText);

            // rellenar campos del modal según la estructura devuelta
            // ajusta los selectores a los ids reales dentro del modal
            document.getElementById("id_reserva").value = reservaId;
            document.getElementById("nombre").value = nameUser;
            document.getElementById("habitacion").value = data.habitacion ?? "";
            document.getElementById("checkIn").value = data.checkin ?? "";
            document.getElementById("checkOut").value = data.checkout ?? "";
            document.getElementById("pay").value = data.pay ?? "";
            document.getElementById("recomendaciones").value =
              data.specialrequest ?? "";

            // mostrar modal
            editarModal.show();
          } catch (err) {
            alert("Respuesta inválida del servidor");
            console.error(err, xhr.responseText);
          }
        } else {
          alert("Error del servidor: " + xhr.status);
        }
      };

      xhr.onerror = function () {
        alert("Error de red al solicitar datos de la reserva.");
      };

      xhr.ontimeout = function () {
        alert("Tiempo de espera agotado al solicitar datos de la reserva.");
      };

      const body =
        "reserva_id=" +
        encodeURIComponent(reservaId) +
        "&csrf=" +
        encodeURIComponent(window.CSRF_TOKEN || "");
      xhr.send(body);
    });
  });
});
