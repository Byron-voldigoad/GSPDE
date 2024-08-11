window.addEventListener("competence-saved", (event) => {
    saved('competence', event);
});

window.addEventListener("openUpdateModalCompetence", (event) => {
    openUpdateModal('competence');
});

window.addEventListener("openAddModalCompetence", (event) => {
    openAddModal('competence');
});

window.addEventListener("openDeleteModalCompetence", (event) => {
    openDeleteModal('Competence');
});

window.addEventListener("deleteCompetences", (event) => {
    deletes('Competences');
});

