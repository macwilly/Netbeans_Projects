<form name="signInput" id="signInputId" enctype="multipart/form-data"  method="POST" action="">
    <div class="col-lg-6">
        <div class="form-group" id="gloss-container">
            <label class="control-label">Gloss</label>
            <input class="form-control" name="inputHSDescription" id="inputgloss" placeholder="">
        </div>
        <div class="form-group" id="EMBR-description-container">
            <label class="control-label">EMBR Description</label>
            <input class="form-control" name="inputHSEMBRDescription" id="inputHSEMBRDescription" placeholder="">
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
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>File input</label>
            <input name="handshapeImage" type="file">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-10 col-md-2 col-md-offset-10 col-sm-3 col-sm-offset-9 col-xs-3 col-xs-9 ">
            <button type="button" onclick="return <?php echo $jsCheck; ?>" class="btn btn-primary"><?php echo $handshapeAddEdit; ?></button>
        </div>
    </div>
    <input type="hidden" name="insertEdit" id="insertEdit" value="<?php echo $ie; ?>">
</form>