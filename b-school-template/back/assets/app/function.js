function notify(icon, message, confirm = false, eventName = '', eventValue = '', confirmButtonText = 'Supprimer', cancelButtonText = 'Pas supprimer') {
    if (confirm == false) {
        Swal.fire({
            icon: icon,
            title: 'Succès !',
            text: message,
        });
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Attention !',
            text: message,
            showCancelButton: true,
            confirmButtonText: confirmButtonText,
            cancelButtonText: cancelButtonText,
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit(eventName, eventValue);
            }
        });
        // Swal.fire({
        //     icon: 'warning',
        //     title: 'Attention !',
        //     text: message,
        //     confirmButtonText: 'Oui',
        //     showDenyButton: true,
        //     denyButtonText: `Non`,
        // }).then((result) => {
        //     if (result.isConfirmed) {
        //         Livewire.emit(eventName, eventValue);
        //     }
        // });
    }
}

function error(icon, message) {
    Swal.fire({
        icon: icon,
        title: 'Erreur !',
        text: message,
    });
}

window.addEventListener("error", (event) => {
    error('error', event.detail.error);
    $(".modal.fade").modal("hide");
});

window.addEventListener("closeModal", (event) => {
    $(".modal.fade").modal("hide");
});

function openUpdateModal(modal) {
    $("#kt_modal_update_" + modal).modal("show");
}

function openAddModal(modal) {
    $("#kt_modal_new_" + modal).modal("show");
}

function view(modal) {
    $("#kt_modal_show_" + modal).modal("show");
}

function regeter(modal) {
    $("#kt_modal_regeter_" + modal).modal("show");
}

function openDeleteModal(name, text = null) {
    notify('', text ?? 'Voulez-vous supprimer déffinitivement ?', true, 'delete' + name);
}

function deletes(name) {
    notify('', 'Voulez-vous supprimer déffinitivement ?', true, 'delete' + name);
}

function saved(modal, event) {
    if (event.detail.action == 'add') {
        notify('success', 'Opération éffectuée');
        $("#kt_modal_new_" + modal).modal("hide");
    } else if (event.detail.action == 'update') {
        notify('success', 'Opération éffectuée');
        $("#kt_modal_update_" + modal).modal("hide");
    } else if (event.detail.action == 'delete') {
        notify('', 'Voulez-vous supprimer déffinitivement ?', true);
    }
}

