<link href="<?php echo base_url('asset_app/datatables/datatables/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<script src="<?= base_url('asset_app/datatables/jquery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?= base_url('asset_app/datatables/datatables/js/jquery.dataTables.min.js') ?>"></script>
<!-- SWAL Fire -->
<script src="https://unpkg.com/sweetalert/asset_app/sweetalert.min.js"></script>
<!-- Body Here -->
<div class="col-xs-12 col-sm-9 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="javascript:void(0);" class="toggle-sidebar">
                    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
                </a>
                Administrator / User Admin
            </h3>
        </div>
        <div class="panel-body">
            <div class="content-row">
                <div class="row">
                    <div class="col-md-4">
                        <a class="btn btn-primary" href="<?= site_url('User_Admin/Create') ?>">Add Admin</a>
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
                        <table id="table" class="display table table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Create Time</th>
                                    <th>Update Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- panel body -->
    </div>
</div><!-- content -->
</div>
</div>
<!--footer-->
<script type="text/javascript">
    var table;
    $(document).ready(function() {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('Ajax_Datatables/get_data_user_admin') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });

    });
</script>
<script>
    function hapus(uid) {
        swal({
                title: "Are you sure delete this user?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?= site_url('User_Admin/Delete?id='); ?>" + uid;
                } else {
                    swal("User is safe!");
                }
            });
    }
</script>