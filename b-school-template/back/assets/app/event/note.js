// window.addEventListener("closeModal", (event) => {
//     $(".modal.fade").modal("hide");
// });

window.addEventListener("newnote", (event) => {
    notify('success', event.detail);
});

window.addEventListener("NoNotEvaluation", (event) => {
    notify('', 'Pas encore de note pour cet évaluation. Voulez-vous enregistrer ?', true, 'createNewEvaluationNote', event.detail, 'Oui', 'Non');
});