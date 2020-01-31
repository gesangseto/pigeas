<!-- data table -->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<!-- SWAL Fire -->
<script src="<?= base_url('asset_app/sweetalert/sweetalert.min.js') ?>"></script>
<!-- Body Here -->
<div class="col-xs-12 col-sm-9 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Mapping System</h3>
        </div>
        <div class="panel-body">

            <div class="content-row">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <ul id="myTab1" class="nav nav-tabs nav-justified">
                                <li class="active"><a href="#parent_map" data-toggle="tab"><b>Parent Map</b></a></li>
                                <li><a href="#access_map" data-toggle="tab"><b>Access Map</b></a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade active in" id="parent_map">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a data-toggle="modal" data-target="#new_parent_map" class="btn btn-info"></i>Create New</a>
                                        </div>
                                        <div class="col-md-8">
                                            <?php if (isset($message)) {
                                                if ($status == 0) {
                                                    echo '<div class="alert alert-block alert-danger">';
                                                    echo '<button type="button" class="close" data-dismiss="alert">';
                                                    echo '<i class="ace-icon fa fa-times"></i>';
                                                    echo '</button>';
                                                    echo $message;
                                                    echo '</div>';
                                                } else {
                                                    echo '<div class="alert alert-block alert-success">';
                                                    echo '<button type="button" class="close" data-dismiss="alert">';
                                                    echo '<i class="ace-icon fa fa-times"></i>';
                                                    echo '</button>';
                                                    echo $message;
                                                    echo '</div>';
                                                }
                                            } ?>
                                        </div>

                                        <div class="col-md-12">
                                            <table id="example1" class="table table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Parent Map</th>
                                                        <th>Child Map total</th>
                                                        <th>Icon</th>
                                                        <th>Create Time</th>
                                                        <th>Last Update</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    @$no = 1;
                                                    @$count = 0;
                                                    foreach ($parent_map as $row_parent) {
                                                        echo '<tr>';
                                                        echo '<td>' . $no . '</td>';
                                                        echo '<td><b>' . $row_parent['parent_map'] . '</b></td>';
                                                        foreach ($access_map as $row_access) {
                                                            if ($row_parent['parent_map'] == $row_access['parent_map']) {
                                                                $count++;
                                                            }
                                                        }
                                                        echo '<th>' . $count . '</th>';
                                                        echo '<td>' . $row_parent['icon'] . '</td>';
                                                        echo '<td>' . $row_parent['create_time'] . '</td>';
                                                        echo '<td>' . $row_parent['update_time'] . '</td>';
                                                        echo '<td>';
                                                        echo '<a onclick="hapus_parent(' . $row_parent['id'] . ')" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
                                                        echo '<a data-toggle="modal" data-target="#parent_' . $row_parent['id'] . '" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
                                                        echo '</td>';
                                                        echo '</tr>';
                                                        $no++;
                                                        @$count = 0;
                                                    } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="access_map">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a data-toggle="modal" data-target="#new_access_map" class="btn btn-info"></i>Create New</a>
                                        </div>
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-12">
                                            <table id="example2" class="table table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Access Map</th>
                                                        <th>Parent Map</th>
                                                        <th>Total User</th>
                                                        <th>Create Time</th>
                                                        <th>Last Update</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    @$no = 1;
                                                    foreach ($access_map as $row_access) {
                                                        echo '<tr>';
                                                        echo '<td>' . $no . '</td>';
                                                        echo '<td><b>' . $row_access['access_map'] . '</b></td>';
                                                        echo '<td>' . $row_access['parent_map'] . ' </td>';
                                                        foreach ($count_access_map as $row_count) {
                                                            if ($row_access['access_map'] == $row_count['access_map']) {
                                                                $count++;
                                                            }
                                                        }
                                                        echo '<th>' . $count . '</th>';
                                                        echo '<td>' . $row_access['create_time'] . '</td>';
                                                        echo '<td>' . $row_access['update_time'] . '</td>';

                                                        echo '<td>';
                                                        echo '<a onclick="hapus_access(' . $row_access['id'] . ')" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
                                                        echo '<a data-toggle="modal" data-target="#access_' . $row_access['id'] . '" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
                                                        if ($count != 0) {
                                                            echo '<a href="' . site_url('User_Mapping/Read') . '?id=' . $row_access['id'] . '" class="btn btn-success"><i class="fa fa-search"></i></a>';
                                                        }
                                                        echo '</td>';
                                                        echo '</tr>';
                                                        $no++;
                                                        @$count = 0;
                                                    } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- panel body -->
    </div>
</div><!-- content -->
</div>
</div>
<!--footer-->
<?php
foreach ($parent_map as $row_parent) { ?>
    <div class="modal" id="parent_<?= $row_parent['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Parent Map</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('User_Mapping/Update') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-warning has-feedback">
                                    <label for="inputWarning2" class="control-label">This change will affect the appearance of the application</label>
                                </div>
                                <input type="hidden" class="form-control" required name="id" value="<?= $row_parent['id'] ?>" placeholder="email" autocomplete="off" />
                                <div class="form-group">
                                    <label for="inputWarning2" class="control-label">Parent Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        </div>
                                        <input type="test" class="form-control" required name="parent_map" value="<?= $row_parent['parent_map'] ?>" placeholder="email" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputWarning2" class="control-label">Icon from glyphicon</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        </div>
                                        <input type="text" class="form-control" required name="icon" value="<?= @$row_parent['icon'] ?>" placeholder="Username" autocomplete="off" />
                                        <div class="input-group-addon">
                                            <i class="<?= @$row_parent['icon'] ?>"></i>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn_parent_map" value="TRUE">Save</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-lg btn-danger btn-block" type="button" data-dismiss="modal">Cloe</button>
                </div>

            </div>
        </div>
    </div>
<?php }
foreach ($access_map as $row_access) { ?>
    <div class="modal" id="access_<?= $row_access['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Access Map</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('User_Mapping/Update') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" class="form-control" required name="id" value="<?= $row_access['id'] ?>" placeholder="email" autocomplete="off" />
                                <div class="form-group">
                                    <label for="inputWarning2" class="control-label">Parent Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        </div>
                                        <select name="parent_map_id" required class="form-control" required>
                                            <option value="<?= $row_access['parent_map_id'] ?>" selected><?= $row_access['parent_map'] ?></option>
                                            <option value="" disabled>-Pilihan lainya-</option>
                                            <?php foreach ($parent_map as $row) {
                                                echo '<option value="' . $row['id'] . '">' . $row['parent_map'] . '</option>';
                                            }  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputWarning2" class="control-label">Access Name</label>
                                    <input type="text" class="form-control" required name="access_map" value="<?= @$row_access['access_map'] ?>" placeholder="Username" autocomplete="off" />
                                </div>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn_access_map" value="TRUE">Save</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-lg btn-danger btn-block" type="button" data-dismiss="modal">Cloe</button>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
<div class="modal" id="new_parent_map">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Parent Map</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('User_Mapping/Create') ?>" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputWarning2" class="control-label">Parent Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    </div>
                                    <input type="test" class="form-control" required name="parent_map" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputWarning2" class="control-label">Icon</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    </div>
                                    <input type="text" class="form-control" required name="icon" autocomplete="off" />
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="new_parent_map" value="TRUE">Create</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg btn-danger btn-block" type="button" data-dismiss="modal">Cloe</button>
            </div>

        </div>
    </div>
</div>
<div class="modal" id="new_access_map">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Access Map</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('User_Mapping/Create') ?>" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputWarning2" class="control-label">Parent Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    </div>
                                    <select name="parent_map_id" required class="form-control" required>
                                        <option value="" disabled selected>-Pilih-</option>
                                        <?php foreach ($parent_map as $row) {
                                            echo '<option value="' . $row['id'] . '">' . $row['parent_map'] . '</option>';
                                        }  ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputWarning2" class="control-label">Access Name</label>
                                <input type="text" class="form-control" required name="access_map" autocomplete="off" />
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="new_access_map" value="TRUE">Create</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg btn-danger btn-block" type="button" data-dismiss="modal">Cloe</button>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'pdfHtml5'
            ]
        });
    });
    $(document).ready(function() {
        $('#example2').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>
<script>
    function hapus_parent(uid) {
        console.log(uid);
        swal({
                title: "Are you sure delete this Mapping?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?= site_url('User_Mapping/Delete?parent_map_id='); ?>" + uid;
                } else {
                    swal("Map is safe!");
                }
            });
    }

    function hapus_access(id) {
        console.log(id);
        swal({
                title: "Are you sure delete this Access Map?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?= site_url('User_Mapping/Delete?access_map_id='); ?>" + id;
                } else {
                    swal("Map is safe!");
                }
            });
    }
</script>