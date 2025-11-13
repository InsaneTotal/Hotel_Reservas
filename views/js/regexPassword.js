document.getElementById("password").addEventListener("input", function () {
  const password = this.value;
  const regex =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/;
  const messageElement = document.getElementById("passwordMessage");
  if (regex.test(password)) {
    messageElement.style.color = "green";
  } else {
    messageElement.style.color = "gray";
  }
});
