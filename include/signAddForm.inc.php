<?php
include '../function/getHandshape.php';
include '../function/getAttribute.php';
include '../function/getSigns.php';
include '../function/util.php';
$hs = getHandshapes(TRUE);
$attr = getAttributes(TRUE);
$passedSign = getSign();
?>

<div class="row">
    <div class="col-lg-5 col-md-6 col-sm-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Import From XML
            </div>
            <div class="panel-body">
                <form name="signXML" id="signXML" enctype="multipart/form-data" method="POST" action="">
                    <div class="form-group">
                        <label>XML File</label>
                        <p class="text-danger">* This will only upload information from the XML and not the manual entry area.</p>
                        <input id="xmlInput" name="xmlFile" type="file">
                    </div>
                    <div class="row">
                        <div>
                            <a id="download" href="#">XML Template</a>
                        </div>
                        <div class="pull-right">
                            <button type="button" id="signXMLButton" style="margin-right: 1em" onclick="return <?php echo $jsCheck1; ?>" class="btn btn-primary">Add Sign With XML</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="xmlError" class="hidden col-lg-7 col-md-6 col-sm-4">
        <div class="panel panel-red">
            <div class="panel-heading">
                Errors from XML
            </div>
            <div class="panel-body">
                <?php
                include '../include/errorText.inc.php';
                
                $print = array();
                //since there can be any number of error signs, using session
                //to check for all
                for($e = 0; $e< sizeof($_SESSION); $e++){
                    if(isset($_SESSION['errorsign' . $e])){
                        array_push($print, $_SESSION['errorsign' . $e]);
                    }
                }
                
                if(sizeof($print) > 0){
                   echo '<ul class="list-unstyled">';
                   foreach($print as $p){
                       echo '<li>' . $p . '</p>';
                   }
                   echo '</ul>';
                }
                
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Add Sign Manually
            </div>
            <div class="panel-body">
                <div class="row">
                    <h4  style="margin-left: 1em;" class="text-danger">* Are required inputs</h4>
                </div>
                <form name="signInput" id="signInputId" enctype="multipart/form-data"  method="POST" action="">
                    <div class="col-lg-6">
                        <div class="form-group" id="gloss-container">
                            <label class="control-label"><span class="text-danger">*</span>Gloss<span id="glossWarning"></span></label>
                            <input class="form-control" name="inputgloss" id="inputgloss" placeholder="" maxlength="30" value="" onkeyup="alertDuplicate(this.value)">
                        </div>
                        <div class="form-group" id="english-container">
                            <label class="control-label"><span class="text-danger">*</span>English Meaning</label>
                            <input class="form-control" name="inputenglish" id="inputenglish" placeholder="" maxlength="100" value="">
                        </div>
                        <div class="form-group" id="asllvd-container">
                            <label class="control-label"><span class="text-danger">*</span>ASLLVD Link</label>
                            <input class="form-control" name="inputasllvd" id="inputasllvd" maxlength="250" placeholder="" value="">
                        </div>
                        <div class="form-group" id="finished-container">
                            <label class="control-label"><span class="text-danger">*</span>Finished</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsFinished" id="optionsFinished1" checked value="1">Yes
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsFinished" id="optionsFinished0" value="0">No
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="handedness-container">
                            <label class="control-label"><span class="text-danger">*</span>Handedness</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsHandedness" id="optionsHandedness1" checked value="1">One Hand
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsHandedness" id="optionsHandedness2" value="2">Two Hand
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>EMBR Text</label>
                            <textarea class="form-control" name="embrtext" id="embrtext" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group" id="dom-hs-container">
                            <label>Start Dominant Handshape <span class="text-danger">(Must not be None)</span></label>
                            <select class="form-control" name="sdh" id="sdh">
                                <option value="none">None</option>
                                <?php
                                foreach ($hs as $printHandshape) {
                                    echo'<option value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                }
                                ?>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Start Nondominant Handshape</label>
                            <select class="form-control" name="sndh" id="sndh">
                                <option value="0">None</option>
                                <?php
                                foreach ($hs as $printHandshape) {
                                    echo'<option value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                }
                                ?>  
                            </select>
                        </div>
                        <div class="form-group" id="dom-hs-end-container">
                            <label>End Dominant Handshape <span class="text-danger">(Must not be None)</span></label>
                            <select class="form-control" name="edh" id="edh">
                                <option value="none">None</option>
                                <?php
                                foreach ($hs as $printHandshape) {
                                    echo'<option value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                }
                                ?>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label>End Nondominant Handshape</label>
                            <select class="form-control" name="endh" id="endh">
                                <option value="0">None</option>
                                <?php
                                foreach ($hs as $printHandshape) {
                                    echo'<option value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                }
                                ?>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Start Image</label>
                            <input name="startImage" type="file">
                        </div>
                        <div class="form-group">
                            <label>End Image</label>
                            <input name="endImage" type="file">
                        </div>
                        <div class="form-group">
                            <label>Related Signs</label>
                            <select multiple class="form-control" name="relatedsigns[]" id="relatedsigns">
                                <?php
                                //will add code to add in all of the signs 
                                 foreach ($passedSign as $printSign){
                                     echo '<option value="' . $printSign->get_gloss() . '">' . $printSign->get_gloss() . '</option>';
                                 }
                                ?>  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12" id="attribute-section">
                        <?php
                        for ($i = 1; $i <= count($attr); $i++) {
                            //create all of the attributes that can be
                            echo '<div class="row">';
                            echo '<div class="col-lg-6">';
                            echo '<div class="form-group" id="attr' . $i . '-container">';
                            echo '<label>Attribute ' . $i . '</label>';
                            echo '<select class="form-control" name="selAttr' . $i . '" id="selAttr' . $i . '">';
                            echo '<option value="none">Select an attribute</option>';
                            foreach ($attr as $printAttribute) {
                                echo '<option value="' . $printAttribute->get_aName() . '">' . $printAttribute->get_aName() . '</option>';
                            }
                            echo '</select>';
                            echo '</div>'; // form-group
                            echo '</div>'; // col-lg-6
                            echo '<div class="col-lg-6">';
                            echo '<div class="form-group" id="attr' . $i . '-prop-container">';
                            echo '<label>Attribute Property ' . $i . '</label>';
                            echo '<input class="form-control" name="attrProp' . $i . '" id="attrProp' . $i . '" value="">';
                            echo '</div>'; // form-group
                            echo '</div>'; // col-lg-6
                            echo '</div>'; // end of row   
                            if ($i != count($attr)) {
                                echo '<div class="row">';
                                echo '<hr>';
                                echo '</div>'; // end of row   
                            }
                        }
                        ?>  
                        <input type="hidden" name="numberOfAttributes" id="numberOfAttributes" value="<?php echo count($attr); ?>">
                    </div>
                    <div class="row">
                        <button type="button" style="margin-right: 1em;" onclick="<?php echo $jsCheck2; ?>" class="btn btn-primary pull-right"><?php echo $addEdit_button; ?> Manually</button>
                    </div>
                    <input type="hidden" name="insertEdit" id="insertEdit" value="<?php echo $ie; ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function alertDuplicate(str) {
        if (str.length == 0) {
            document.getElementById("glossWarning").innerHTML = "";
            $('#gloss-container').removeClass('has-error');
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var text = this.responseText;
                    if (text == "Ok") {
                        document.getElementById("glossWarning").innerHTML = "";
                        $('#gloss-container').removeClass('has-error');
                        $('#gloss-container').removeClass('is-dup');
                    } else {
                        document.getElementById("glossWarning").innerHTML = text;
                        $('#gloss-container').addClass('has-error');
                        $('#gloss-container').addClass('is-dup');
                    }

                }
            };

            xmlhttp.open("GET", "../function/checkGloss.php?q=" + encodeURIComponent(str), true);
            xmlhttp.send();
        }
    }
    
    $('#download').click(function(e){
        
        window.open('../data/template.xml');
    });
    
    $(document).ready(function(){
       var show = 0;
       <?php
            if(checkError($_GET['error'])){
                echo 'show = 1;';
            }
            /**
             * Check the passed error to see if it is a xml error to show
             * the #xmlError
             * @param type $err = GET error values
             */
           function checkError($err){
               $errors = array('dataError','duplicateGloss','load','notxml','xmlDuplicate');
               if(in_array($err, $errors)){
                    return TRUE;
               }else{
                    return FALSE;
                }
           }
       ?>
               if(show == 1){
                   $('#xmlError').removeClass('hidden');
               }
    });
    
    
</script>

<script src="../js/signFormCheck.js" type="text/javascript"></script>