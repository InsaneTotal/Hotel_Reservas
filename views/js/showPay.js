document.addEventListener("DOMContentLoaded", function () {
  const nightsInput = document.getElementById("nights");
  const payInput = document.getElementById("pay");

  nightsInput.addEventListener("input", function () {
    const nights = parseInt(nightsInput.value) || 0;
    const pricePerNight = 100; // Example price per night
    payInput.value = nights * pricePerNight;
  });
});
