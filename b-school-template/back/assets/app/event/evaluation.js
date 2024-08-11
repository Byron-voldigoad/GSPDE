window.addEventListener("evaluation-saved", (event) => {
    saved('evaluation', event);
});

window.addEventListener("openUpdateModalEvaluation", (event) => {
    openUpdateModal('evaluation');
});

window.addEventListener("openAddModalEvaluation", (event) => {
    openAddModal('evaluation');
});

window.addEventListener("openDeleteModalEvaluation", (event) => {
    openDeleteModal('Evaluation');
});

window.addEventListener("deleteEvaluations", (event) => {
    deletes('Evaluations');
});
