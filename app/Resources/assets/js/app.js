$(function () {
    $.fn.datepicker.defaults.format = "yyyy-mm-dd";
    $('.datepicker').datepicker({
        autoclose: true
    })

});

// function initAjaxForm() {
//     $('body').on('submit', '.ajaxForm', function (e) {
//
//         e.preventDefault();
//
//
//         $.ajax({
//             type: $(this).attr('method'),
//             url: $(this).attr('action'),
//             data: $(this).serialize()
//         })
//         .done(function (data) {
//             if (typeof data.message !== 'undefined') {
//                 alert(data.message);
//             }
//
// console.log("appenddddd");
//
//             $('#alertdiv').append(' ' +
//                 '<div class="col-sm-3"></div>\n' +
//                 '        <div class="col-sm-6">\n' +
//                 '            <div id="alertSuccess" class="alert alert-success alert-dismissible">\n' +
//                 '                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
//                 '                <h4><i class="icon fa fa-check"></i> Oharra!</h4>\n' +
//                 '                Datuak ongi grabatuak izan dira.\n' +
//                 '            </div>\n' +
//                 '        </div>\n' +
//                 '        <div class="col-sm-3">' +
//                 '</div>').delay(1500).fadeOut();
//
//         })
//         .fail(function (jqXHR, textStatus, errorThrown) {
//             if (typeof jqXHR.responseJSON !== 'undefined') {
//                 if (jqXHR.responseJSON.hasOwnProperty('form')) {
//                     $('#form_body').html(jqXHR.responseJSON.form);
//                 }
//
//                 $('.form_error').html(jqXHR.responseJSON.message);
//
//             } else {
//
//                 alert(errorThrown);
//             }
//
//         });
//     });
// }

