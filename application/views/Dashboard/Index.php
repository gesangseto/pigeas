<?php
$total_project = 0;
$total_running_project = 0;
foreach ($all_project as $row_project) {
    $total_project = $total_project + 1;
}
foreach ($all_running_project as $row_running_project) {
    $total_running_project = $total_running_project + 1;
}
?>
<div class="col-xs-12 col-sm-9 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Dashboard Home
            </h3>
        </div>
        <div class="panel-body">
            <div class="content-row">
                <div class="row">
                    <div class="col-md-3">
                        <div class="alert alert-info">
                            <h4>Running Project</h4>
                            <h1><?= $total_running_project ?> </h1>
                            <p><a class="btn btn-success" href="#">Solve this action</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="alert alert-info">
                            <h4>Project Finish</h4>
                            <h1>12 </h1>
                            <p><a class="btn btn-success" href="#">Solve this action</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="alert alert-info">
                            <h4>Total Project</h4>
                            <h1><?= $total_project ?> </h1>
                            <p><a class="btn btn-success" href="#">Solve this action</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="alert alert-info">
                            <h4>Total Customers</h4>
                            <h1>12 </h1>
                            <p><a class="btn btn-success" href="#">Solve this action</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="alert alert-info">
                            <h4>Pending Approval</h4>
                            <h1>12 </h1>
                            <p><a class="btn btn-success" href="#">Solve this action</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="alert alert-info">
                            <h4>Pending Payment</h4>
                            <h1>12 </h1>
                            <p><a class="btn btn-success" href="#">Solve this action</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="alert alert-info">
                            <h4>Total SDM</h4>
                            <h1>120 </h1>
                            <p><a class="btn btn-success" href="#">Solve this action</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="alert alert-info">
                            <h4>Total SDM Standbye</h4>
                            <h1>12 </h1>
                            <p><a class="btn btn-success" href="#">Solve this action</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div><!-- panel body -->
    </div>
</div><!-- content -->
</div>
</div>
<!--footer-->