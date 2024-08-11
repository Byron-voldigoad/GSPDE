Livewire.on("deleteSuccess", (event) => {
    Swal.fire('Suppression terminer', '', 'success')
});

window.addEventListener("viewPostulantModal", (event) => {
    view('postulant');
});

window.addEventListener("postulant-saved", (event) => {
    saved('postulant', event);
});

window.addEventListener("openUpdateModalPostulant", (event) => {
    openUpdateModal('postulant');
});

window.addEventListener("openAddModalPostulant", (event) => {
    openAddModal('postulant');
});

window.addEventListener("openDeleteModalPostulant", (event) => {
    openDeleteModal('Postulant');
});

window.addEventListener("deletePostulants", (event) => {
    deletes('Postulants');
});
