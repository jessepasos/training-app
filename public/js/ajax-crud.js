$(document).ready(function() {
    setInterval("ajaxd(seaport_id)",100);
});

function ajaxd() {
    $.ajax({
        type: "GET",
        url: "time/" + seaport_id,
        // data: "user=success",
        success: function(result){
            $("#div1").empty().append(result['timeSinceLastAction']);
            // console.log(result['updated_at']);
            // console.log(result['timeSinceLastAction']);
        }
    });

}