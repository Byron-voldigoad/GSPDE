Livewire.on("deleteSuccess", (event) => {
    Swal.fire('Suppression terminer', '', 'success')
});

window.addEventListener("viewEleveInscriptModal", (event) => {
    view('eleve_inscript');
});

window.addEventListener("eleve-saved", (event) => {
    saved('eleve_inscript', event);
});

window.addEventListener("openUpdateModalEleveInscript", (event) => {
    openUpdateModal('eleve_inscript');
});

window.addEventListener("openAddModalEleveInscript", (event) => {
    openAddModal('eleve_inscript');
});

window.addEventListener("openDeleteModalEleveInscript", (event) => {
    openDeleteModal('EleveInscript');
});

window.addEventListener("deleteEleveInscripts", (event) => {
    deletes('EleveInscripts');
});
