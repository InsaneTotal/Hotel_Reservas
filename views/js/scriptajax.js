document.getElementById("tipoHabitacion").addEventListener("change", (e) => {
  // e.preventDefault();
  const typeRoom = e.target.value;

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?action=getAvailableRooms", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("nameRoom=" + encodeURIComponent(typeRoom));
  xhr.onload = () => {
    if (xhr.status === 200) {
      document.getElementById("habitacion").innerHTML = xhr.responseText;
    }
  };
});
