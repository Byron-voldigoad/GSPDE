window.addEventListener("niveau-saved", (event) => {
    saved('niveau', event);
    $(".modal.fade").modal("hide");
});

window.addEventListener("openUpdateModalNiveau", (event) => {
    openUpdateModal('niveau');
});

window.addEventListener("openAddModalNiveau", (event) => {
    openAddModal('niveau');
});

window.addEventListener("openDeleteModalNiveau", (event) => {
    openDeleteModal('Niveau');
});

window.addEventListener("deleteNiveaus", (event) => {
    deletes('Niveaus');
});
