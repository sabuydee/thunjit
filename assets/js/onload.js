/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {

    getView("Employee/Navigate", "#navigate");
    $("#myModal").draggable();
});


function alert_modal_sm(data) {

    $("#my_modal_sm").html(data);
    $("#modal_sm").modal("show");
}

function alert_modal(data) {

    $("#my_modal_content").html(data);
    $("#myModal").modal("show");
}

function getView(request, container) {

    $.post(request, function(ans) {

        $(container).html(ans);
    });
}

function getViewParam(request, container, data) {

    $.post(request, data, function(ans) {

        $(container).html(ans);
    });
}

// --- สำหรับลบ refresh modal
$(document).on('hidden.bs.modal', function(e) {
    
    $(e.target).removeData('bs.modal');    
});