window.addEventListener("matiereClasse-saved", (event) => {
    saved('matiere_classe', event);
});

window.addEventListener("openUpdateModalMatiereClasse", (event) => {
    openUpdateModal('matiere_classe');
});

window.addEventListener("openAddModalMatiereClasse", (event) => {
    openAddModal('matiere_classe');
});

window.addEventListener("openDeleteModalMatiereClasse", (event) => {
    openDeleteModal('MatiereClasse');
});

window.addEventListener("deleteMatiereClasses", (event) => {
    deletes('MatiereClasses');
});
