!function() {
    let activeForm = null;
    //show warning message
    $(document).on('click touchstart', '.fa-trash-alt', function (e) {
        $('#warningMessage').modal();
        activeForm = $(e.target).closest('.form_delete');
    });

    //submit removal form
    $(document).on('click touchstart', '.company_delete', function () {
        activeForm.submit();
        $('#warningMessage').modal('hide');
    });
}();