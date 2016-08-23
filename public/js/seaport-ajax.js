

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


function getNumAttacks(seaport_id) {
    $.ajax({
        type: "GET",
        url: "/numAttacks/" + seaport_id + "/",
        dataType: "json",
        success: function(result){
            console.log(result);
            myDictionary = result;
            for (var key in myDictionary) {
                var value = myDictionary[key];
                // Use `key` and `value`
                $("#" + key).empty().append(value);
            }

            // myStringArray = result;
            // var arrayLength = result.length;
            // for (var i = 0; i < arrayLength; i++) {
            //     console.log(myStringArray[i]);
            //     //Do something
            // }


            // $("#timeSinceLastAction").empty().append(result['timeSinceLastAction']);

            // $("#numAttacks").empty().append(result);
        }
    });

}