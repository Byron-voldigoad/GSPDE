window.addEventListener("evaluationMatiere-saved", (event) => {
    saved('evaluation_matiere', event);
});

window.addEventListener("openUpdateModalEvaluationMatiere", (event) => {
    openUpdateModal('evaluation_matiere');
});

window.addEventListener("openAddModalEvaluationMatiere", (event) => {
    openAddModal('evaluation_matiere');
});

window.addEventListener("openDeleteModalEvaluationMatiere", (event) => {
    openDeleteModal('EvaluationMatiere');
});

window.addEventListener("deleteEvaluationMatieres", (event) => {
    deletes('EvaluationMatieres');
});

