window.addEventListener("permission-saved", (event) => {
    $(".modal.fade").modal("hide");
    if (event.detail.action == 'add') {
        notify('success', 'Permission ajouter');
        $("#kt_modal_new_permission").modal("hide");
    } else if (event.detail.action == 'update') {
        notify('success', 'Permission modifier');
        $("#kt_modal_update_permission").modal("hide");
    } else if (event.detail.action == 'delete') {
        notify('', 'Avertissement ! En supprimant ce droit, vous risquez de casser \
                    la fonctionnalité des autorisations système. Veuillez vous assurer que vous êtes \
                    absolument certain avant de continuer ?', true);
    }
    // $(".modal-backdrop.fade.show").addClass('dd-none');
});

window.addEventListener("viewPermissionModal", (event) => {
    view('permission');
});

window.addEventListener("openUpdateModalPermission", (event) => {
    openUpdateModal('permission');
});

window.addEventListener("openAddModalPermission", (event) => {
    openAddModal('permission');
});

window.addEventListener("openDeleteModalPermission", (event) => {
    openDeleteModal('Permission', 'Avertissement ! En supprimant ce droit, vous risquez de casser \
    la fonctionnalité des autorisations système. Veuillez vous assurer que vous êtes \
    absolument certain avant de continuer ?');
});

window.addEventListener("deletePermissions", (event) => {
    deletes('Permissions');
});
