window.addEventListener("viewUserModal", (event) => {
    view('role');
});

window.addEventListener("role-saved", (event) => {
    saved('role', event);
});

window.addEventListener("openUpdateModalRole", (event) => {
    openUpdateModal('role');
});

window.addEventListener("openAddModalRole", (event) => {
    openAddModal('role');
});

window.addEventListener("openDeleteModalRole", (event) => {
    openDeleteModal('Role');
});

window.addEventListener("deleteRoles", (event) => {
    deletes('Roles');
});

