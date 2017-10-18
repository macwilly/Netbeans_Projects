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
                            <button type="button" id="signCSVButton" style="margin-right: 1em" onclick="return <?php echo $jsCheck; ?>" class="btn btn-primary"><?php echo $addEdit_button; ?></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
                Or Add Manually 
            </div>
        </div>
    </div>
</div>

<form name="signInput" id="signInputId" enctype="multipart/form-data"  method="POST" action="">
    <div class="col-lg-6">
        <div class="form-group" id="gloss-container">
            <label class="control-label">Gloss</label>
            <input class="form-control" name="inputgloss" id="inputgloss" placeholder="">
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
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Start Image</label>
            <input name="startImage" type="file">
        </div>
        <div class="form-group">
            <label>End Image</label>
            <input name="endImage" type="file">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-10 col-md-2 col-md-offset-10 col-sm-3 col-sm-offset-9 col-xs-3 col-xs-9 ">
            <button type="button" onclick="return <?php echo $jsCheck; ?>" class="btn btn-primary"><?php echo $addEdit_button; ?></button>
        </div>
    </div>
    <input type="hidden" name="csv" value="no"/>
    <input type="hidden" name="insertEdit" id="insertEdit" value="<?php echo $ie; ?>">
</form>