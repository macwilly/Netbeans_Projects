function doSignCreate(xml) {

    if (xml === 'yes') {
        
        if($('#xmlInput').val() == ""){
            alert("You need to add a file before you submit this.");
            return;
        }
        
        $('#signXML').attr('action', '../classes/signCheckXML.php');
        $("#signXML").submit();
    } else {
        //stopping the checking from progressing if the sign is a duplicate
        if ($('#gloss-container').hasClass('is-dup')) {
            return;
        }
        removeErrors();
        if (check() > 0) {
            return;
        } else {
            $('#signInputId').attr('action', '../classes/signCheck.php');
            $("#signInputId").submit();
        }
    }

}

function doSignEdit() {
    removeErrors();
}

function removeErrors() {
    $("#gloss-container").removeClass("has-error");
    $("#english-container").removeClass("has-error");
    $("#asllvd-container").removeClass("has-error");
    $("#finished-container").removeClass("has-error");
    $("#handedness-container").removeClass("has-error");
    $("#dom-hs-container").removeClass("has-error");
    $("#dom-hs-end-container").removeClass("has-error");
}

function check() {
    var errorCheck = 0;
    var numAt = $('#numberOfAttributes').val();
    //checking the attrubutes
    if (numAt > 0) {
        for (i = 1; i <= numAt; i++) {
            if ($('#selAttr' + i).val() !== 'none' && ($('#attrProp' + i).val() === undefined || $('#attrProp' + i).val() == "")) {
                errorCheck += 1;
                alert("You cannot have an Attribute without a property.");
            }
            if ($('#selAttr' + i).val() === 'none' && ($('#attrProp' + i).val() !== "")) {
                errorCheck += 1;
                alert("You cannot have Propterty infomration without selecting an attribute.");
            }
        }
    }

    var gloss = $('#inputgloss').val();
    var english = $('#inputenglish').val();
    var asllvd = $('#inputasllvd').val();
    var fish1 = $('#optionsFinished1').val();
    var fish0 = $('#optionsFinished0').val();
    var handed1 = $('#optionsHandedness1').val();
    var handed2 = $('#optionsHandedness2').val();
    var embr = $('#embrtext').val();
    var sdh = $('#sdh').val();
    var edh = $('#edh').val();

    if (gloss === "" || gloss === " ") {
        $("#gloss-container").addClass("has-error");
        errorCheck += 1;
    }
    if (english === "" || english === " ") {
        $("#english-container").addClass("has-error");
        errorCheck += 1;
    }
    if (asllvd === "" || asllvd === " ") {
        $("#asllvd-container").addClass("has-error");
        errorCheck += 1;
    }

    if (fish1 === undefined && fish0 === undefined) {
        $("#finished-container").addClass("has-error");
        errorCheck += 1;
    }

    if (handed1 === undefined && handed2 === undefined) {
        $("#handedness-container").addClass("has-error");
        errorCheck += 1;
    }

    if (sdh === 'none') {
        $("#dom-hs-container").addClass("has-error");
        errorCheck += 1;
    }

    if (edh === 'none') {
        $("#dom-hs-end-container").addClass("has-error");
        errorCheck += 1;
    }


    return errorCheck;
}


//add in check that looks at all of the handshapes and makes sure that not
//   all of them are set to none... Do the same thing for PHP