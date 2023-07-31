var image = document.getElementById("product-image");
image.addEventListener("mouseenter", function () {
  image.classList.add("scale-110");
});
image.addEventListener("mouseleave", function () {
  image.classList.remove("scale-110");
});

var number = 1; // Initial number
function increment() {
  number += 1; // Increment the number by 1
  updateNumber();
}
function decrement() {
  if (number > 1) {
    number -= 1; // Decrement the number by 1, if it's greater than 0
    updateNumber();
  }
}
function updateNumber() {
  document.getElementById("number-display").textContent = number; // Update the number display
}
