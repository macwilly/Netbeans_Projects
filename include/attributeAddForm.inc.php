<form name="attributeForm" id="attributeForm"  method="POST" action="">
    <div class="col-lg-6">
        <div class="form-group" id="attribute-name-container">
            <label class="control-label">Name</label>
            <input class="form-control" maxlength="30"  name="attributeName" id="aName" placeholder="Is in study">
        </div>
        <div class="form-group" id="description-container">
            <label class="control-label">Description</label>
            <input class="form-control" maxlength="100" name="description" id="description" placeholder="Short explaination of the attribute">
        </div>
        <div class="form-group" id="active-container">
            <label class="control-label">Active</label>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsActive" id="optionsActive1" checked value="1">Yes
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsActive" id="optionsActive0" value="0">No
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-10 col-md-2 col-md-offset-10 col-sm-3 col-sm-offset-9 col-xs-3 col-xs-9 ">
            <button type="button" onclick="return <?php echo $jsCheck; ?>" class="btn btn-primary"><?php echo $button; ?></button>
        </div>
    </div>
    <input type="hidden" name="insertEdit" id="insertEdit" value="<?php echo $ie; ?>">
    <input type="hidden" name="sentName" id="" value="">
</form>