window.addEventListener("viewDemandeAbsModal", (event) => {
    view('demande_abs');
});

window.addEventListener("demandeAbs-saved", (event) => {
    saved('demande_abs', event);
});

window.addEventListener("openUpdateModalDemandeAbs", (event) => {
    openUpdateModal('demande_abs');
});

window.addEventListener("openAddModalDemandeAbs", (event) => {
    openAddModal('demande_abs');
});

window.addEventListener("openDeleteModalDemandeAbs", (event) => {
    openDeleteModal('DemandeAbs');
});

window.addEventListener("deleteDemandeAbss", (event) => {
    deletes('DemandeAbss');
});

