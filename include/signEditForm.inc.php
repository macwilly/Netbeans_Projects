
<?php
include '../classes/signClass.php';
include '../function/getAttribute.php';
include '../function/getEmbrHistory.php';
include '../function/getHandshape.php';
include '../function/getRelatedSigns.php';
include '../function/getSigns.php';
include '../function/util.php';

$hs = getHandshapes(TRUE);
$attr = getAttributes(TRUE);

$signsList = getSignsForEdit();
$passedSign = filter_input(INPUT_POST, 'signGloss');
$sc = new sign($passedSign);
$sc->getSignInformation();
$rs = getRelatedSignArray($passedSign);
$attrs = getAttributeArray($passedSign);
?>

<div class="row">
    <div class="col-lg-12">
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <button onclick="" type="button" class="btn btn-warning">Edit All</button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#sign" data-toggle="tab">Sign</a></li>
                    <li><a href="#embr" data-toggle="tab">Embr</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="sign">
                        <form name="signInput" id="signInputId" enctype="multipart/form-data"  method="POST" action="">
                            <div class="col-lg-6">
                                <div class="form-group" id="gloss-container">
                                    <label class="control-label"><span class="text-danger">*</span>Gloss <span id="glossWarning"></span></label>
                                    <input class="form-control" name="inputgloss" id="inputgloss" placeholder="" maxlength="30" value="<?php echo $passedSign ?>" onkeyup="alertDuplicate(this.value)">
                                </div>
                                <div class="form-group" id="english-container">
                                    <label class="control-label"><span class="text-danger">*</span>English Meaning</label>
                                    <input class="form-control" name="inputenglish" id="inputenglish" placeholder="" maxlength="100" value="<?php echo $sc->get_english_meaning(); ?>">
                                </div>
                                <div class="form-group" id="asllvd-container">
                                    <label class="control-label"><span class="text-danger">*</span>ASLLVD Link</label>
                                    <input class="form-control" name="inputasllvd" id="inputasllvd" maxlength="250" placeholder="" value="<?php echo $sc->get_asllvd_link(); ?>">
                                </div>
                                <div class="form-group" id="finished-container">
                                    <label class="control-label"><span class="text-danger">*</span>Finished</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsFinished" id="optionsFinished1" value="1">Yes
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
                                            <input type="radio" name="optionsHandedness" id="optionsHandedness1" value="1">One Hand
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsHandedness" id="optionsHandedness2" value="2">Two Hand
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group" id="dom-hs-container">
                                    <label><span class="text-danger">*</span>Start Dominant Handshape</label>
                                    <select class="form-control" name="sdh" id="sdh">
                                        <option value="none">None</option>
                                        <?php
                                        $dh = $sc->get_dominant_start_HS();
                                        foreach ($hs as $printHandshape) {
                                            if ($dh == $printHandshape->get_id()) {
                                                echo'<option selected value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                            } else {
                                                echo'<option value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                            }
                                        }
                                        ?>  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Start Nondominant Handshape</label>
                                    <select class="form-control" name="sndh" id="sndh">
                                        <option value="0">None</option>
                                        <?php
                                        $nd = $sc->get_nondominant_start_HS();
                                        foreach ($hs as $printHandshape) {
                                            if ($nd == $printHandshape->get_id()) {
                                                echo'<option selected value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                            } else {
                                                echo'<option value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                            }
                                        }
                                        ?>  
                                    </select>
                                </div>
                                <div class="form-group" id="dom-hs-end-container">
                                    <label><span class="text-danger">*</span>End Dominant Handshape</label>
                                    <select class="form-control" name="edh" id="edh">
                                        <option value="none">None</option>
                                        <?php
                                        $ed = $sc->get_dominant_end_HS();
                                        foreach ($hs as $printHandshape) {
                                            if ($ed == $printHandshape->get_id()) {
                                                echo'<option selected value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                            } else {
                                                echo'<option value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                            }
                                        }
                                        ?>  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>End Nondominant Handshape</label>
                                    <select class="form-control" name="endh" id="endh">
                                        <option value="0">None</option>
                                        <?php
                                        $en = $sc->get_nondominant_end_HS();
                                        foreach ($hs as $printHandshape) {
                                            if ($en == $printHandshape->get_id()) {
                                                echo'<option selected value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                            } else {
                                                echo'<option value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                            }
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
                                    <label>Related Signs <span class="text-danger">If Adding a new sign make sure to hold the control button to not lose other signs.</span></label>
                                    <select multiple class="form-control" name="relatedsigns[]" id="relatedsigns">
                                        <?php
                                        //will add code to add in all of the signs 
                                        foreach ($signsList as $printSign) {
                                            if (in_array($printSign, $rs)) {
                                                echo '<option selected value="' . $printSign . '">' . $printSign . '</option>';
                                            } else {
                                                echo '<option value="' . $printSign . '">' . $printSign . '</option>';
                                            }
                                        }
                                        ?>  
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12" id="attribute-section">
                                <?php
                                $a = 0;
                                for ($i = 1; $i <= count($attr); $i++) {
                                    //create all of the attributes that can be
                                    echo '<div class="row">';
                                    echo '<div class="col-lg-6">';
                                    echo '<div class="form-group" id="attr' . $i . '-container">';
                                    echo '<label>Attribute ' . $i . '</label>';
                                    echo '<select class="form-control" name="selAttr' . $i . '" id="selAttr' . $i . '">';
                                    echo '<option value="none">Select an attribute</option>';
                                    foreach ($attr as $printAttribute) {

                                        if ($attrs[$a] == str_replace(" ", "_", $printAttribute->get_aName())) {
                                            echo '<option selected value="' . str_replace(" ", "_", $printAttribute->get_aName()) . '">' . $printAttribute->get_aName() . '</option>';
                                        } else {
                                            echo '<option value="' . str_replace(" ", "_", $printAttribute->get_aName()) . '">' . $printAttribute->get_aName() . '</option>';
                                        }
                                    }
                                    echo '</select>';
                                    echo '</div>'; // form-group
                                    echo '</div>'; // col-lg-6
                                    echo '<div class="col-lg-6">';
                                    echo '<div class="form-group" id="attr' . $i . '-prop-container">';
                                    echo '<label>Attribute Property ' . $i . '</label>';
                                    echo '<input class="form-control" name="attrProp' . $i . '" id="attrProp' . $i . '" value="' . getAttributeDesc($passedSign, $attrs[$a]) . '">';
                                    echo '</div>'; // form-group
                                    echo '</div>'; // col-lg-6
                                    echo '</div>'; // end of row   
                                    if ($i != count($attr)) {
                                        echo '<div class="row">';
                                        echo '<hr>';
                                        echo '</div>'; // end of row   
                                    }
                                    $a += 1;
                                }
                                ?>  

                            </div>
                            <div class="row">
                                <button type="button" style="margin-right: 1em;" onclick="<?php echo $jsCheckSign; ?>" class="btn btn-primary pull-right"><?php echo $addEdit_button; ?> </button>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="embr">
                        <div class="form-group">
                            <label>EMBR Text</label>
                            <textarea class="form-control" rows="30" name="embrtext" id="embrtext" ><?php echo $sc->get_embr(); ?></textarea>
                        </div>
                        <div class="row">
                            <button type="button" style="margin-right: 1em;" onclick="<?php echo $jsCheckEmbr; ?>" class="btn btn-primary pull-right">Edit Embr </button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="numberOfAttributes" id="numberOfAttributes" value="<?php echo count($attr); ?>">
            <input type="hidden" name="insertEdit" id="insertEdit" value="<?php echo $ie; ?>">
            <input type="hidden" name="startSign" id="startSign" value="<?php echo $passedSign; ?>">
            </form>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<script>

<?php echo '$("#optionsFinished' . $sc->get_finished() . '").prop("checked",true);'; ?>
<?php echo '$("#optionsHandedness' . $sc->get_handedness() . '").prop("checked",true);'; ?>

                                        function alertDuplicate(str) {
                                            var startSign = $('#startSign').val();
                                            startSign = startSign.toUpperCase();
                                            if (str.length == 0) {
                                                document.getElementById("glossWarning").innerHTML = "";
                                                $('#gloss-container').removeClass('has-error');
                                            } else {
                                                if (str.toUpperCase() === startSign) {
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
                                        }

                                        $('#download').click(function (e) {

                                            window.open('../data/template.xml');
                                        });

                                        $(document).ready(function () {
                                            var show = 0;
<?php
if (checkError($_GET['error'])) {
    echo 'show = 1;';
}

/**
 * Check the passed error to see if it is a xml error to show
 * the #xmlError
 * @param type $err = GET error values
 */
function checkError($err) {
    $errors = array('dataError', 'duplicateGloss', 'load', 'notxml', 'xmlDuplicate');
    if (in_array($err, $errors)) {
        return TRUE;
    } else {
        return FALSE;
    }
}
?>
                                            if (show == 1) {
                                                $('#xmlError').removeClass('hidden');
                                            }
                                        });


</script>

<script src="../js/signFormCheck.js" type="text/javascript"></script>