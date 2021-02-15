function messages(elem, elemClass, msg){
    elem.html(`<div class="alert mt-3 ${elemClass}" role="alert">${msg}</div>`)
}
function removePeople(peopleId){
    if(confirm('Deseja excluir esta pessoa?')){
        $(`#people-${peopleId}`).html('<th colspan="12" class="cols-12"></th>')
        $.ajax({
            type: "GET",
            url: "/destroy/"+peopleId,
            beforeSend: function () {
                messages($(`#people-${peopleId} th`), 'alert-info', 'Removendo...')
            },
            success: function (result) {
                messages($(`#people-${peopleId} th`), 'alert-success', result.message)
                document.location.reload(true)
            },
            error: function (result) {
                let arr = result.responseJSON.errors;
                let msgError = '';
                $.each(arr, function (index, value) {
                    if (value.length !== 0) {
                        msgError += value + '<br />';
                    }
                });
                messages($(`#people-${peopleId} th`), 'alert-danger', result.message)
            }
        });
        return false
    }
}
function getPeople(peopleId){
    messages($("#modalEdit .modal-body"), 'alert-info', 'Carregando...')
    $.ajax({
        type: "GET",
        url: "/show/"+peopleId,
        beforeSend: function () {
            messages($(`#people-${peopleId} th`), 'alert-info', 'Removendo...')
        },
        success: function (result) {
            $("#modalEdit .modal-body").html(result)
            edit()
        }
    });
    return false
}
function edit(){
    $('#fEdit').submit(function(){
        let route = $(this).attr('action')
        $.ajax({
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            url: route,
            beforeSend: function () {
                messages($('#fEdit .box-alert'), 'alert-info', 'Enviando...')
            },
            success: function (result) {
                messages($('#fEdit .box-alert'), 'alert-success', result.message)
                window.location.href = "#people-"+result.id;
                document.location.reload(true)
            },
            error: function (result) {
                let arr = result.responseJSON.errors;
                let msgError = '';
                $.each(arr, function (index, value) {
                    if (value.length !== 0) {
                        msgError += value + '<br />';
                    }
                });
                messages($('#fEdit .box-alert'), 'alert-danger', msgError)
            }
        });
        return false
    })
}
function cleanTable(){
    $.ajax({
        type: "GET",
        url: "/clear",
        beforeSend: function () {
        },
        success: function (result) {
            document.location.reload(true)
        }
    });
    return false
}
$(document).ready(function () {

    if(window.location.hash.length && $(window.location.hash).length) {
        $(window.location.hash).addClass('active-tr')
        $('html, body').animate({scrollTop: $(window.location.hash).offset().top - 160}, 600);
    }

    $('#fRegister').submit(function(){
        let route = $(this).attr('action')
        $.ajax({
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            url: route,
            beforeSend: function () {
                messages($('#fRegister .box-alert'), 'alert-info', 'Enviando...')
            },
            success: function (result) {
                messages($('#fRegister .box-alert'), 'alert-success', result.message)
                window.location.href = "#people-"+result.id;
                document.location.reload(true)
            },
            error: function (result) {
                let arr = result.responseJSON.errors;
                let msgError = '';
                $.each(arr, function (index, value) {
                    if (value.length !== 0) {
                        msgError += value + '<br />';
                    }
                });
                messages($('#fRegister .box-alert'), 'alert-danger', msgError)
            }
        });
        return false
    })

})
