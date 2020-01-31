<?php
?>
<div class="col-xs-12 col-sm-9 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar">
                    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>
                Dashboard
            </h3>
        </div>
        <div class="panel-body">
            <div class="content-row">
                <div class="row">
                    <div class="col-md-3">
                        <div class="color-swatches">
                            <div class="swatches">
                                <div class="clearfix">
                                    <?php if ($count_all_notread_cust_message > 0) {
                                        echo '<div style="background-color:#ED5565" class="pull-left light">';
                                        echo '<h4 align="center">' . $count_all_notread_cust_message . ' </h4>';
                                        echo '</div>';
                                        echo '<div style="background-color:#DA4453" class="pull-right light">';
                                        echo '<h4 align="center">' . $count_all_cust_message . '</h4>';
                                        echo '</div>';
                                    } else {
                                        echo '<div style="background-color:#5D9CEC" class="pull-left light">';
                                        echo '<h4 align="center">' . $count_all_notread_cust_message . ' </h4>';
                                        echo '</div>';
                                        echo '<div style="background-color:#4A89DC" class="pull-right light">';
                                        echo '<h4 align="center">' . $count_all_cust_message . '</h4>';
                                        echo '</div>';
                                    } ?>
                                </div>
                                <div class="infos">
                                    <h4 align="center">Cust Message</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="color-swatches">
                            <div class="swatches">
                                <div class="clearfix">
                                    <div style="background-color:#ED5565" class="pull-left light">
                                        <h4 align="center">0 </h4>
                                    </div>
                                    <div style="background-color:#DA4453" class="pull-right dark">
                                        <h4 align="center">0 </h4>
                                    </div>
                                </div>
                                <div class="infos">
                                    <h4 align="center">Dummy</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="color-swatches">
                            <div class="swatches">
                                <div class="clearfix">
                                    <div style="background-color:#5D9CEC" class="pull-left light">
                                        <h4 align="center">0 </h4>
                                    </div>
                                    <div style="background-color:#4A89DC" class="pull-right dark">
                                        <h4 align="center">10 </h4>
                                    </div>
                                </div>
                                <div class="infos">
                                    <h4 align="center">Dummy</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="color-swatches">
                            <div class="swatches">
                                <div class="clearfix">
                                    <div style="background-color:#5D9CEC" class="pull-left light">
                                        <h4 align="center">0 </h4>
                                    </div>
                                    <div style="background-color:#4A89DC" class="pull-right dark">
                                        <h4 align="center">10 </h4>
                                    </div>
                                </div>
                                <div class="infos">
                                    <h4 align="center">Dummy</h4>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="row">
                    <div class="col-md-2">
                        <div class="color-swatches">
                            <div class="swatches">
                                <div class="clearfix">
                                    <div style="background-color:#ED5565" class="pull-left light"></div>
                                    <div style="background-color:#DA4453" class="pull-right dark"></div>
                                </div>
                                <div class="infos">
                                    <h4>GRAPEFRUIT</h4>
                                    <p>#ED5565, #DA4453</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="color-swatches">
                            <div class="swatches">
                                <div class="clearfix">
                                    <div style="background-color:#AC92EC" class="pull-left light"></div>
                                    <div style="background-color:#967ADC" class="pull-right dark"></div>
                                </div>
                                <div class="infos">
                                    <h4>LAVENDER</h4>
                                    <p>#AC92EC, #967ADC</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="color-swatches">
                            <div class="swatches">
                                <div class="clearfix">
                                    <div style="background-color:#EC87C0" class="pull-left light"></div>
                                    <div style="background-color:#D770AD" class="pull-right dark"></div>
                                </div>
                                <div class="infos">
                                    <h4>PINK ROSE</h4>
                                    <p>#EC87C0, #D770AD</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="color-swatches">
                            <div class="swatches">
                                <div class="clearfix">
                                    <div style="background-color:#F5F7FA" class="pull-left light"></div>
                                    <div style="background-color:#E6E9ED" class="pull-right dark"></div>
                                </div>
                                <div class="infos">
                                    <h4>LIGHT GRAY</h4>
                                    <p>#F5F7FA, #E6E9ED</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="color-swatches">
                            <div class="swatches">
                                <div class="clearfix">
                                    <div style="background-color:#CCD1D9" class="pull-left light"></div>
                                    <div style="background-color:#AAB2BD" class="pull-right dark"></div>
                                </div>
                                <div class="infos">
                                    <h4>MEDIUM GRAY</h4>
                                    <p>#CCD1D9, #AAB2BD</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="color-swatches">
                            <div class="swatches">
                                <div class="clearfix">
                                    <div style="background-color:#656D78" class="pull-left light"></div>
                                    <div style="background-color:#434A54" class="pull-right dark"></div>
                                </div>
                                <div class="infos">
                                    <h4>DARK GRAY</h4>
                                    <p>#656D78, #434A54</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

        </div><!-- panel body -->
    </div>
</div><!-- content -->
</div>
</div>