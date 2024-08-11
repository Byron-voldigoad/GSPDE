window.addEventListener("personnelClasse-saved", (event) => {
    saved('personnel_classe', event);
});

window.addEventListener("openUpdateModalPersonnelClasse", (event) => {
    openUpdateModal('personnel_classe');
});

window.addEventListener("openAddModalPersonnelClasse", (event) => {
    openAddModal('personnel_classe');
});

window.addEventListener("openDeleteModalPersonnelClasse", (event) => {
    openDeleteModal('PersonnelClasse');
});

window.addEventListener("deletePersonnelClasses", (event) => {
    deletes('PersonnelClasses');
});

