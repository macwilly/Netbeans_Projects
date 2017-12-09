<?php
include '../classes/signClass.php';
include '../function/getAttribute.php';
include '../function/getEmbrHistory.php';
include '../function/getHandshape.php';
include '../function/getRelatedSigns.php';
include '../function/getSigns.php';
include '../function/util.php';

$passedSign = filter_input(INPUT_POST, 'signGloss');
$sc = new sign($passedSign);
$sc->getSignInformation();
$rs = getRealtedSigns($passedSign);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button onclick="doB()" type="button" class="btn btn-danger">Back To List</button>
                <?php
                if ($secLevel >= 2) {
                    echo '<td><button onclick="editS(\'' . $passedSign . '\',2)" type="button" class="btn btn-primary">Edit Sign</button></td>';
                }
                ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#sign" data-toggle="tab">Sign</a></li>
                    <li><a href="#embr" data-toggle="tab">Embr</a></li>
                    <li><a href="#attributes" data-toggle="tab">Attributes</a></li>
                    <li><a href="#embrHistory" data-toggle="tab">Embr History</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="sign">
                        <div class="row" style="margin-top: 1em;">
                            <div class="col-lg-12">
                                <p><span style="font-weight: bold;">English Meaning: </span><?php echo $sc->get_english_meaning(); ?></p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 1em;">
                            <div class="col-lg-4 col-md-5">
                                <figure>
                                    <figcaption style="font-weight: bold;">Start Photo</figcaption>
                                    <img src="../images/sign/startImg/<?php echo getPhoto($sc->get_start_photo()); ?>" width="224px" height="225px" alt="<?php echo $sc->get_start_photo() ?>"/>
                                </figure>
                            </div>
                            <div class="col-lg-4 col-md-5">
                                <figure>
                                    <figcaption style="font-weight: bold;">End Photo</figcaption>
                                    <img src="../images/sign/endImg/<?php echo getPhoto($sc->get_end_photo()); ?>"  width="224px" height="225px" alt="<?php echo $sc->get_end_photo(); ?>"/>
                                </figure>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 1em;">
                            <div class="col-lg-3 col-md-3">
                                <figure>
                                    <figcaption style="font-weight: bold;">Dominant Starting Handshape: <?php echo getDescription($sc->get_dominant_start_HS()); ?></figcaption>
                                    <img src="../images/handshape/<?php echo getHandShapeImg($sc->get_dominant_start_HS()); ?>" alt="<?php echo getHandShapeImg($sc->get_dominant_start_HS()); ?>"/>
                                </figure>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <figure>
                                    <figcaption style="font-weight: bold;">Nondominant Starting Handshape: <?php echo getDescription($sc->get_nondominant_start_HS()); ?></figcaption>
                                    <img src="../images/handshape/<?php echo getHandShapeImg($sc->get_nondominant_start_HS()); ?>" alt="<?php echo getHandShapeImg($sc->get_nondominant_start_HS()); ?>"/>
                                </figure>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <figure>
                                    <figcaption style="font-weight: bold;">Dominant Ending Handshape: <?php echo getDescription($sc->get_dominant_end_HS()); ?></figcaption>
                                    <img src="../images/handshape/<?php echo getHandShapeImg($sc->get_dominant_end_HS()); ?>" alt="<?php echo getHandShapeImg($sc->get_dominant_end_HS()); ?>"/>
                                </figure>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <figure>
                                    <figcaption style="font-weight: bold;">Nondominant Ending Handshape: <?php echo getDescription($sc->get_nondominant_end_HS()); ?></figcaption>
                                    <img src="../images/handshape/<?php echo getHandShapeImg($sc->get_nondominant_end_HS()); ?>" alt="<?php echo getHandShapeImg($sc->get_nondominant_end_HS()); ?>"/>
                                </figure>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 2em;">
                            <div class="col-lg-3">
                                <p><span style="font-weight: bold;">Handedness: </span><?php echo handTextConvert($sc->get_handedness()); ?></p>
                            </div>
                            <div class="col-lg-3">
                                <p><span style="font-weight: bold;">Finished: </span><?php echo finshTextConvert($sc->get_finished()); ?></p>
                            </div>
                            <div class="col-lg-3">
                                <p><span style="font-weight: bold;">ASLLVD Link: </span><a target="_blank" href="<?php echo $sc->get_asllvd_link(); ?>">View</a></p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 1em;">
                            <div class="col-lg-12">
                                <p><span style="font-weight: bold;">Related Signs:</p>
                                <?php
                                foreach ($rs as $printRelated) {

                                    echo '<a href="#" onclick="editS(\'' . $printRelated->get_r_sign() . '\',3)">' . $printRelated->get_r_sign() . '</a>  ';
                                }
                                ?>  
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="embr">
                        <pre>
                            <?php
                            echo $sc->get_embr();
                            ?> 
                        </pre>
                    </div>
                    <div class="tab-pane fade" id="attributes">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Attribute</th>
                                                    <th>Information</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sa = getSignAttributes($passedSign);
                                                foreach ($sa as $pa) {
                                                    echo '<tr>';
                                                    echo '<td>' . str_replace("_", " ", $pa->get_attribute()) . '</td>';
                                                    echo '<td>' . $pa->get_description() . '</td>';
                                                    echo '</tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="embrHistory">
                        <div class="panel-group" id="accordion">
                            <?php
                            $i = 1;

                            $sh = getEmberHistory($passedSign);
                            foreach ($sh as $ph) {
                                echo '<div class="panel panel-primary">';
                                echo '<div class="panel-heading">';
                                echo '<h4 class="panel-title">';
                                echo '<a data-toggle="collapse" data-parent="#accordion" href="#collapse' . $i . '">' . $ph->get_first_name() . ' ' . $ph->get_last_name()
                                . ' ' . $ph->get_date() . '</a>';
                                echo '</h4>';
                                echo '</div>';
                                if ($i == 1) {
                                    echo '<div id="collapse' . $i . '" class="panel-collapse collapse in">';
                                } else {
                                    echo '<div id="collapse' . $i . '" class="panel-collapse collapse">';
                                }
                                echo '<div class="panel-body">';
                                echo '<pre>' . $ph->get_embr() . '</pre>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                $i++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
            <form method="POST" id="pageChange" name="editSign" action="./sign.php?type=2">
                <input type="hidden" name="signGloss" id="signGloss">
            </form>

        </div>
        <!-- /.panel -->
    </div>
</div>
<script>
    function doB() {
        window.location.href = './signList.php';
    }
    function editS(_gloss, _page) {
        if (_page == 2) {
            $('#pageChange').attr('action', './sign.php?type=2');
        } else if (_page == 3) {
            $('#pageChange').attr('action', './sign.php?type=3');
        }
        $("#signGloss").val(_gloss);
        $("form").submit();
    }

    
</script>