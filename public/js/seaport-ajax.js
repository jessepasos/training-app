

function getValuesSinceLastAction(seaport_id) {
    $.ajax({
        type: "GET",
        url: "valuesSinceLastActionTaken/" + seaport_id,
        success: function(result){
            $("#timeSinceLastAction").empty().append(result['timeSinceLastAction']);
            $("#totalTreasure").empty().append(result['totalTreasure']);
        }
    });

}