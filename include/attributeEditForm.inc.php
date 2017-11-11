<?php include '../classes/attributeClass.php'; ?>
<?php
$sa = filter_input(INPUT_POST, 'attributeName', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$attr = new attributeClass($sa);
$attr->getAttributeInfo();

$aName = $attr->get_aName();
$sName = $attr->get_aName();
$descr = $attr->get_desc();
$act = $attr->get_active();
?>

<form name="attributeForm" id="attributeForm"  method="POST" action="">
    <div class="col-lg-6">
        <div class="form-group" id="attribute-name-container">
            <label class="control-label">Name</label>
            <input class="form-control" maxlength="30"  name="attributeName" id="aName" placeholder="Is in study" value="<?php echo $aName; ?>">
        </div>
        <div class="form-group" id="description-container">
            <label class="control-label">Description</label>
            <input class="form-control" maxlength="100" name="description" id="description" placeholder="Short explaination of the attribute" value="<?php echo $descr; ?>" >
        </div>
        <div class="form-group" id="active-container">
            <label class="control-label">Active</label>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsActive" id="optionsActive1" value="1">Yes
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
        <div class="col-lg-12">

            <button type="button" onclick="return <?php echo $jsCheck; ?>" style="margin-right: 1;" class="btn btn-primary pull-right"><?php echo $button; ?></button>
            <button type="button" onclick="doDelete()" style="margin-right: 1em;" class="btn btn-danger pull-right">Delete Attribute</button>
        </div>
    </div>
    <input type="hidden" name="insertEdit" id="insertEdit" value="<?php echo $ie; ?>">
    <input type="hidden" name="sentName" id="" value="<?php echo $aName; ?>">
</form>
<script type="text/javascript">
<?php echo '$("#optionsActive' . $act . '").prop("checked",true);'; ?>

                function doDelete() {
                    $('#attributeForm').attr('action', '../function/deleteAttribute.php');
                    $("#attributeForm").submit();
                }

</script>