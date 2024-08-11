Livewire.on("deleteSuccess", (event) => {
    Swal.fire('Suppression terminer', '', 'success')
});

Personnelwindow.addEventListener("viewPersonnelModal", (event) => {
    view('personnel');
});

window.addEventListener("personnel-saved", (event) => {
    saved('personnel', event);
});

window.addEventListener("openUpdateModalPersonnel", (event) => {
    openUpdateModal('personnel');
});

window.addEventListener("openAddModalPersonnel", (event) => {
    openAddModal('personnel');
});

window.addEventListener("openDeleteModalPersonnel", (event) => {
    openDeleteModal('Personnel');
});

window.addEventListener("deletePersonnels", (event) => {
    deletes('Personnels');
});

