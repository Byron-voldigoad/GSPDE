window.addEventListener("annee-saved", (event) => {
    if (event.detail.action == 'add') {
        notify('success', 'Année ajouter avec succès!');
        $(".modal-backdrop.fade.show").addClass('dd-none');
    } else {
        notify('success', 'Année modifier avec succès!');
        $(".modal-backdrop.fade.show").addClass('dd-none');
    }
    $("#kt_modal_edit_year").modal("hide");
});
window.addEventListener("etablissement-saved", (event) => {
    notify('success', 'Etablissement modifier avec succès!');
    $(".modal-backdrop.fade.show").addClass('dd-none');
    $("#kt_modal_edit_ets").modal("hide");
});
window.addEventListener("etablissement-photo-saved", (event) => {
    if (event.detail.action == 'add') {
        notify('success', 'Photo ajouter avec succès!');
        $(".modal-backdrop.fade.show").addClass('dd-none');
    } else {
        notify('success', 'Photo modifier avec succès!');
        $(".modal-backdrop.fade.show").addClass('dd-none');
    }
    $("#kt_modal_edit_ets").modal("hide");
});
window.addEventListener("etablissement-photo-deleted", (event) => {
    notify('success', 'Photo supprimer avec succès!');
    $(".modal-backdrop.fade.show").addClass('dd-none');
    $("#kt_modal_edit_ets").modal("hide");
});
