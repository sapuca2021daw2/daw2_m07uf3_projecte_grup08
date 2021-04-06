$(document).ready(function () {
    var buttonSend = $('<input id="btnSend" type="submit" value="Envia" class="btn btn-primary" style="margin-left:10px " />');
    $("#btnSoci").click(function () {
        if ($('.hide').length) {
            $('.editSoci').prop('disabled', false);
            $('#nif').prop('disabled', true);
            $(this).text('Desfés').removeClass('hide btn-primary').addClass('btn-danger');
            $('#nom').focus();
            $(".btns").append(buttonSend);
            $('.ong').slideUp();
        } else {
            $('.editSoci').prop('disabled', true);
            $(this).text('Edita').removeClass('btn-danger').addClass('btn-primary hide');
            $("#btnSend").remove();
            $('#formEditSoci').trigger('reset');
            $('.ong').slideDown();
        }
    });

});
