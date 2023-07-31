const increaseBtn = document.querySelectorAll(
  ".product-quantity .increase-btn"
);
const decreaseBtn = document.querySelectorAll(
  ".product-quantity .decrease-btn"
);
const quantityValue = document.querySelectorAll(
  ".product-quantity .quantity-value"
);
increaseBtn.forEach((item, index) => {
  let countProduct = +quantityValue[index].innerText;
  item.addEventListener("click", (e) => {
    countProduct++;
    quantityValue[index].innerText = countProduct;
  });
});
decreaseBtn.forEach((item, index) => {
  let countProduct = +quantityValue[index].innerText;
  item.addEventListener("click", (e) => {
    countProduct--;
    if (countProduct >= 0) {
      quantityValue[index].innerText = countProduct;
    }
  });
});
