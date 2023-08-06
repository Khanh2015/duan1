const deletes = document.querySelectorAll(".delete-btn");
deletes.forEach((item) => {
  item.addEventListener("click", (e) => {
    const kq = confirm("Bạn có muốn xoá không?");
    if (!kq) {
      e.preventDefault();
    }
  });
});
