

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


function getNumAttacks(seaport_id, ship_id) {
    $.ajax({
        type: "GET",
        url: "/seaport/numAttacks/" + seaport_id + "/" + ship_id,
        success: function(result){
            // $("#timeSinceLastAction").empty().append(result['timeSinceLastAction']);
            $("#numAttacks").empty().append(result['numAttacks']);
        }
    });

}