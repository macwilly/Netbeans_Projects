<?php
include '../function/getHandshape.php';
include '../function/getAttribute.php';
include '../function/util.php';
$hs = getHandshapes(TRUE);
$attr = getAttributes(TRUE);
?>

<div class="row">
    <div class="col-lg-5 col-md-6 col-sm-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Import From CSV
            </div>
            <div class="panel-body">
                <form name="signCSV" id="signCSV" enctype="multipart/form-data" method="POST" action="">
                    <div class="form-group">
                        <label>CSV File</label>
                        <p class="text-danger">* This will only upload information from the CSV and not the manual entry area.</p>
                        <input name="csvFile" type="file">
                    </div>
                    <input type="hidden" name="csv" value="yes"/>
                    <div class="row">
                        <div class="pull-right">
                            <button type="button" id="signCSVButton" style="margin-right: 1em" onclick="return <?php echo $jsCheck; ?>" class="btn btn-primary">Add Sign With CVS</button>
                        </div>
                    </div>
                </form>
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
                            <label class="control-label"><span class="text-danger">*</span>Gloss</label>
                            <input class="form-control" name="inputgloss" id="inputgloss" placeholder="" maxlength="30" value="">
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
                            <label><span class="text-danger">*</span>Start Dominant Handshape</label>
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
                                <option value="none">None</option>
                                <?php
                                foreach ($hs as $printHandshape) {
                                    echo'<option value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                }
                                ?>  
                            </select>
                        </div>
                        <div class="form-group" id="dom-hs-end-container">
                            <label><span class="text-danger">*</span>End Dominant Handshape</label>
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
                                <option value="none">None</option>
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
                                <option value="sign1">Sign1</option>
                                <option value="sign2">Sign2</option>
                                <option value="sign3">Sign3</option>
                                <?php
                                //will add code to add in all of the signs 
                                ?>  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12" id="attribute-section">
                        <?php
                        for ($i = 1; $i <= count($attr); $i++) {
                            echo '<div class="row">';
                            echo '<div class="col-lg-6">';
                            echo '<div class="form-group" id="attr' . $i . '-container">';
                            echo '<label>Attribute ' . $i . '</label>';
                            echo '<select class="form-control" name="selAttr' . $i . '" id="selAttr' . $i . '">';
                            echo '<option value="none">Select an attribute</option>';
                            foreach ($attr as $printAttribute) {
                                echo '<option value="' . str_replace(" ", "_", $printAttribute->get_aName()) . '">' . $printAttribute->get_aName() . '</option>';
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
                        <button type="button" style="margin-right: 1em;" onclick="<?php echo $jsCheck; ?>" class="btn btn-primary pull-right"><?php echo $addEdit_button; ?> Manually</button>
                    </div>
                    <input type="hidden" name="csv" value="no"/>
                    <input type="hidden" name="insertEdit" id="insertEdit" value="<?php echo $ie; ?>">
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../js/signFormCheck.js" type="text/javascript"></script>