const deletes = document.querySelectorAll(".delete-btn");
deletes.forEach((item) => {
  item.addEventListener("click", (e) => {
    const kq = confirm("Bạn có muốn xoá không?");
    if (!kq) {
      e.preventDefault();
    }
  });
});

const huydonhangBtn = document.querySelector(".huydonhang");
huydonhangBtn.addEventListener("click", (e) => {
  const kq = confirm("Bạn có muốn huỷ đơn hàng này không?");
  if (!kq) {
    e.preventDefault();
  }
});
