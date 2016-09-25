$( document ).ready( function() {

    $( 'body' ).css( 'display', 'none' );
    $( 'body' ).fadeIn( 1000 );

    $( '.link' ).click( function( event ) {
        event.preventDefault();
        newLocation = this.href;
        $( 'body' ).fadeOut( 1000, newpage );
    } );

    function newpage() {
        window.location = newLocation;
    }

} );

/* Form Validation */
$().ready( function() {

    $( "#loginForm" ).validate( {
        rules: {
            email: {
                required: true,
                email: true
            },
            password: "required"
        },
        messages: {
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address"
            },
            password: "Please enter a password"
        }
    } );

    $( "#registerForm" ).validate( {
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            }
        },
        messages: {
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address"
            },
            password: "Please enter a password",
            password_confirmation: {
                equalTo: "Passwords do not match"
            }
        }
    } );


    /**
     * Handles the ship-stats modal. The modal is populated with data associated with the ship instance that the
     * user has selected.
     *
     */
    $( '#ship-stats' ).on( 'show.bs.modal', function( event ) {
        var shipData = $( event.relatedTarget ).data( 'ship' );

        $( '#js_shipName' ).html( shipData.name );
        $( '#js_shipCaptain' ).html( shipData.captain );
        $( '#js_shipDisplacement' ).html( shipData.displacement );
        $( '#js_shipLength' ).html( shipData.length );
        $( '#js_shipDraft' ).html( shipData.draft );
        $( '#js_shipSaltiness' ).html( shipData.saltiness );
        $( '#js_shipCannons' ).html( shipData.cannons );
    } );


    /**
     * Handles the pirate-stats modal. The modal is populated with data associated with the pirate instance that the
     * user has selected.
     *
     */
    $( '#pirate-stats' ).on( 'show.bs.modal', function( event ) {
        var pirateData = $( event.relatedTarget ).data( 'pirate' );

        // Handle ship select:
        $( "#ship_id option[value='" + pirateData.ship_id + "']" ).attr( 'selected', 'selected' );
        if ( pirateData.ship_id ) {
            $( "#js_shipName option[value='" + pirateData.ship_id + "']" ).attr( 'selected', 'selected' );
        }
        else {
            $( "#js_shipName option[value='NA']" ).attr( 'selected', 'selected' );
        }

        // Handle rank select:
        $( "#rank option:contains('" + pirateData.rank + "')" ).attr( 'selected', 'selected' );

        var strPirateName = pirateData.name;
        $( '#pirate_id' ).val( pirateData.id );
        $( '#pirate_name' ).val( strPirateName );
        $( '#js_pirateManage' ).html( 'Manage ' + strPirateName );
        $( '#js_pirateName' ).html( strPirateName );
        $( '#js_pirateRank' ).html( pirateData.rank );
    } );
} );