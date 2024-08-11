Livewire.on("deleteSuccess", (event) => {
    Swal.fire('Suppression terminer', '', 'success')
});

window.addEventListener("viewClassModal", (event) => {
    view('contrat');
});

window.addEventListener("contrat-saved", (event) => {
    saved('contrat', event);
});

window.addEventListener("openUpdateModalContrat", (event) => {
    openUpdateModal('contrat');
});

window.addEventListener("openAddModalContrat", (event) => {
    openAddModal('contrat');
});

window.addEventListener("openDeleteModalContrat", (event) => {
    openDeleteModal('Contrat');
});

window.addEventListener("deleteContrats", (event) => {
    deletes('Contrats');
});

