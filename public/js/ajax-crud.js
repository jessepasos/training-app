$(document).ready(function() {
    setInterval("ajaxd(seaport_id)",100);
});

function ajaxd(seaport_id) {
    $.ajax({
        type: "GET",
        url: "time/" + seaport_id,
        success: function(result){
            $("#timeSinceLastAction").empty().append(result['timeSinceLastAction']);
        }
    });

}