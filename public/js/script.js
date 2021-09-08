// Visualizza / Nascondi Div al click del button radio
$(document).ready(function() {
    $("div#content").hide();
    $('#flexRadioDefault1').prop('checked',false);
    $('#flexRadioDefault2').prop('checked',false);
    $("input[name='flexRadioDefault']").click(function() {
        if ($('#flexRadioDefault1').is(':checked')) {
            $("div#content").show();
        }
        if ($('#flexRadioDefault2').is(':checked')) {
            $("div#content").hide();
        }
    });
    $('#room_type1').click(function(){
        $("#price").attr("value", 50.99)
    });
    $('#room_type2').click(function(){
        $("#price").attr("value", 150)
    });
});


function open_edit_modal(resourceId, modalClass, modalId) {
    var dataUrl = $("." + modalClass + resourceId).attr('data-href');
    console.log($('#' + modalId + '.modal-content'));
    $('#' + modalId + ' .modal-content').html('');
    $('#' + modalId + ' .modal-content').load(dataUrl, function () {
        console.log(dataUrl)
        $('#'+ modalId).modal('show');
    });
}

// Visualizza / Nascondi Div al click del button radio (JavaScript)
/*
function mostra() {
    document.getElementById("content").style.display="block";
}

function nascondi() {
    document.getElementById("content").style.display="none";
}*/