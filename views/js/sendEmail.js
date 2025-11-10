document.addEventListener("DOMContentLoaded", function () {
  document.addEventListener("click", (e) => {
    const btn = e.target.closest(".btnEmail");
    if (!btn) return;
    if (btn.tagName === "A") e.preventDefault();
    //   console.log(e.currentTarget.dataset.id);
    const user_id = btn.dataset.id;
    Swal.fire({
      title: "Enviando correo...",
      text: "Por favor espera unos segundos.",
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading(); // Muestra el spinner de carga
      },
    });

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php?action=enviarEmail", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("user_id=" + encodeURIComponent(user_id));

    xhr.onload = () => {
      console.log(xhr.status);
      if (xhr.status >= 200 && xhr.status < 300) {
        Swal.fire({
          title: "Correo enviado con exito!",
          icon: "success",
          draggable: true,
        });
      } else {
        Swal.fire({
          title: "Correo no enviado!",
          icon: "error",
          draggable: true,
        });
      }
    };
  });
});
