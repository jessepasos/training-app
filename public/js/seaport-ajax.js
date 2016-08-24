function getValuesSinceLastAction(seaport_id) {
    $.ajax({
        type: "GET",
        url: "/valuesSinceLastActionTaken/" + seaport_id,
        success: function (result) {
            console.log('running getvaluessincelastation');
            $("#timeSinceLastAction").empty().append(result['timeSinceLastAction']);
            $("#totalTreasure").empty().append(result['totalTreasure']);
        }
    });
    $.ajax({
        type: "GET",
        url: "/numAttacks/" + seaport_id,
        dataType: "json",
        success: function (result) {
            console.log(result);
            myDictionary = result;
            for (var key in myDictionary) {
                var value = myDictionary[key];
                // Use `key` and `value`
                $("#" + key).empty().append(value);
            }
        }
    });

}


function getNumAttacks(seaport_id) {
    $.ajax({
        type: "GET",
        url: "/numAttacks/" + seaport_id,
        dataType: "json",
        success: function (result) {
            console.log(result);
            myDictionary = result;
            for (var key in myDictionary) {
                var value = myDictionary[key];
                // Use `key` and `value`
                $("#" + key).empty().append(value);
            }
        }
    });
}