window.addEventListener("user-saved", (event) => {
    if (event.detail.action == 'add') {
        notify('success', 'Uitilisateur ajouter');
        $("#kt_modal_new_user").modal("hide");
    } else if (event.detail.action == 'update') {
        notify('success', 'Uitilisateur mit à jour');
        $("#kt_modal_update_user").modal("hide");
    } else if (event.detail.action == 'delete') {
        notify('', 'Voulez-vous supprimer déffinitivement ?', true);
    } else if (event.detail.action == 'applied') {
        notify('success', 'Mot de passe appliquer');
        $("#kt_modal_update_user").modal("hide");
    }
});

window.addEventListener("openGeneratePasswordModal", (event) => {
    $("#kt_modal_generate_password_user").modal("show");
});

window.addEventListener("openUpdateModalUser", (event) => {
    openUpdateModal('user');
});

window.addEventListener("openAddModalUser", (event) => {
    openAddModal('user');
});

window.addEventListener("openDeleteModalUser", (event) => {
    openDeleteModal('User');
});

window.addEventListener("deleteUsers", (event) => {
    deletes('Users');
});


window.addEventListener("viewUserModal", (event) => {
    let id = "1104";
    let name = "parametre.view.user";
    let title = "Vue de l'utilisateur";
    let link = "parametre/view/user";
    window.history.pushState({ id: id }, name, link);
    document.querySelector('title').textContent = title;
    Livewire.emit('linkChanged', name);
});
