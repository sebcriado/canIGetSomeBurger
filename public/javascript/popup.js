function onClickDeleteBtn(event) {
  event.preventDefault();

  const link = event.currentTarget;
  const message = link.dataset.message;

  deleteItem(message, link.href);
}

const deleteBtns = document.querySelectorAll(".delete-btn");

for (const deleteBtn of deleteBtns) {
  deleteBtn.addEventListener("click", onClickDeleteBtn);
}

function deleteItem(message, redirectUrl) {
  Swal.fire({
    title: message,
    showCancelButton: true,
    cancelButtonText: "Annuler",
    confirmButtonText: "Supprimer",
    confirmButtonColor: "#FFA621",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.assign(redirectUrl);
    }
  });
}
