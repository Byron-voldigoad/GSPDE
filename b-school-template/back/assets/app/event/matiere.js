window.addEventListener("matiere-saved", (event) => {
    saved('matiere', event);
});

window.addEventListener("openUpdateModalMatiere", (event) => {
    openUpdateModal('matiere');
});

window.addEventListener("openAddModalMatiere", (event) => {
    openAddModal('matiere');
});

window.addEventListener("openDeleteModalMatiere", (event) => {
    openDeleteModal('Matiere');
});

window.addEventListener("deleteMatieres", (event) => {
    deletes('Matieres');
});

