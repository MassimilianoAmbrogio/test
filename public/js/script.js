function open_edit_modal(resourceId, modalClass, modalId) {
    var dataUrl = $("." + modalClass + resourceId).attr('data-href');
    console.log($('#' + modalId + '.modal-content'));
    $('#' + modalId + ' .modal-content').html('');
    $('#' + modalId + ' .modal-content').load(dataUrl, function () {
        console.log(dataUrl)
        $('#'+ modalId).modal('show');
    });
}

// Visualizza / Nascondi Div al click del button radio
function mostra() {
    document.getElementById("content").style.display="block";
}

function nascondi() {
    document.getElementById("content").style.display="none";
}