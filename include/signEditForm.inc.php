<?php
include '../function/getHandshape.php';
$hs = getHandshapes(TRUE);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic Tabs
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab"><?php echo 'Gloss Information'; ?></a>
                    </li>
                    <li><a href="#EMBR" data-toggle="tab">EMBR History</a>
                    </li>
                    <li><a href="#signHistory" data-toggle="tab">Sign History</a>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                        <h4>Edit &lt;Gloss&gt;</h4>
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
                                            <input type="radio" name="optionsHandedness" id="optionsHandedness1" value="1">One Hand
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
                                            echo'<option id="' . $printHandshape->get_id() . '" value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
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
                    <div class="tab-pane fade" id="EMBR">
                        <h4>EMBR History</h4>
                        <ul class="list-unstyled">
                            <?php
                            // PHP code to print out all of the Ember history. 
                            // Will be from the sign_history table
                            ?>
                            <li>10/22/2017 4:26 AM - Mackenzie Willard <pre>&lt;ember&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation&lt;/embr&gt;</pre></li>
                            <li>10/23/2017 4:26 PM - John Testington <pre>&lt;ember&gt;Lorem ipsum dolor sit ametddfsd, ddsda consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation&lt;/embr&gt;</pre></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="signHistory">
                        <h4>Sign History</h4>
                        <?php
                        // PHP code to print out all of the Ember history. 
                        // Will be from the audit trail table
                        ?>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>