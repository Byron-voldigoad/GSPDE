Livewire.on("deleteSuccess", (event) => {
    Swal.fire('Suppression terminer', '', 'success')
});

Livewire.on("AnneeNonConfiguer", (event) => {
    Swal.fire('L\'année en cour n\'a pas encore été definie', '', 'error')
});

window.addEventListener("entretient-saved", (event) => {
    saved('entretient', event);
});

window.addEventListener("openDeleteModalEntretient", (event) => {
    openDeleteModal('Entretient');
});

window.addEventListener("deleteEntretients", (event) => {
    deletes('Entretients');
});
