window.addEventListener("viewClassModal", (event) => {
    view('classe');
});

window.addEventListener("classe-saved", (event) => {
    saved('classe', event);
});

window.addEventListener("openUpdateModalClasse", (event) => {
    openUpdateModal('classe');
});

window.addEventListener("openAddModalClasse", (event) => {
    openAddModal('classe');
});

window.addEventListener("openDeleteModalClasse", (event) => {
    openDeleteModal('Classe');
});

window.addEventListener("deleteClasses", (event) => {
    deletes('Classes');
});
