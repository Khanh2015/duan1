const rangeInput = document.querySelector("#price");
rangeInput.value = rangeInput.max;
const styleElement = document.createElement("style");
document.head.appendChild(styleElement);

rangeInput.addEventListener("input", () => {
  const percent =
    (rangeInput.value - rangeInput.min) / (rangeInput.max - rangeInput.min);
  styleElement.textContent = `
                    #price::-webkit-slider-runnable-track {
                        background: linear-gradient(to right, black 0%, black ${
                          percent * 100
                        }%, #ccc ${percent * 100}%, #ccc 100%);
                    }
                `;
});
