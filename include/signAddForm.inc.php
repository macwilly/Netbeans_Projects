<?php
include '../function/getHandshape.php';
$hs = getHandshapes(TRUE);
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
                <form name="signInput" id="signInputId" enctype="multipart/form-data"  method="POST" action="">
                    <div class="col-lg-6">
                        <div class="form-group" id="gloss-container">
                            <label class="control-label">Gloss</label>
                            <input class="form-control" name="inputgloss" id="inputgloss" placeholder="">
                        </div>
                        <div class="form-group" id="english-container">
                            <label class="control-label">English Meaning</label>
                            <input class="form-control" name="inputenglish" id="inputenglish" placeholder="">
                        </div>
                        <div class="form-group" id="asllvd-container">
                            <label class="control-label">ASLLVD Link</label>
                            <input class="form-control" name="inputasllvd" id="inputasllvd" placeholder="">
                        </div>
                        <div class="form-group" id="finished-container">
                            <label class="control-label">Finished</label>
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
                            <label class="control-label">Handedness</label>
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
                        <div class="form-group">
                            <label>Start Dominant Handshape</label>
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
                        <div class="form-group">
                            <label>End Dominant Handshape</label>
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
                            <select multiple class="form-control" name="relatedsigns" id="relatedsigns">
                                <option>Signs</option>
                                <?php
                                    //will add code to add in all of the signs 
                                ?>  
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Attributes will got here. They will be dynamically added on.</p>
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" style="margin-right: 1em;" onclick="return <?php echo $jsCheck; ?>" class="btn btn-primary pull-right"><?php echo $addEdit_button; ?> Manually</button>
                    </div>
                    <input type="hidden" name="csv" value="no"/>
                    <input type="hidden" name="insertEdit" id="insertEdit" value="<?php echo $ie; ?>">
                </form>
            </div>
        </div>
    </div>
</div>