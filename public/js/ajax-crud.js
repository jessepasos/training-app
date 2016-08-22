$(document).ready(function() {
    setInterval("ajaxd()",100);
});

function ajaxd() {
    $.ajax({
        type: "GET",
        url: "time/1",
        // data: "user=success",
        success: function(result){
            $("#div1").empty().append(result['timeSinceLastAction']);
            // console.log(result['updated_at']);
            console.log(result['timeSinceLastAction']);
        }
    });

}