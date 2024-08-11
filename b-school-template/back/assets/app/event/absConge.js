window.addEventListener("absConge-saved", (event) => {
    if (event.detail.action == 'regeter') {
        notify('success', 'Demande '+event.detail.type+' regeter');
        $(".modal.fade").modal("hide");
    } else if (event.detail.action == 'validate') {
        notify('success', 'Demande '+event.detail.type+' valider');
    }
});

window.addEventListener("viewAbsCongeModal", (event) => {
    $("#kt_modal_show_abs_conge").modal("show");
});

window.addEventListener("regeterAbsCongeModal", (event) => {
    $("#kt_modal_regeter_abs_conge").modal("show");
});
