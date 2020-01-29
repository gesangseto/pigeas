<script src="https://unpkg.com/sweetalert/asset_app/sweetalert.min.js"></script>
<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Permission / View</h3>
    </div>
    <div class="panel-body">
      <div class="content-row">

        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>ID : <?= $user_info[0]['id'] ?></b>
            </div>
            <div class="panel-options">
              <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
              <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
              <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
            </div>
          </div>

          <div class="panel-body">
            <form novalidate="" role="form" class="form-horizontal">
              <div class="form-group">
                <label class="col-md-2 control-label">Username</label>
                <div class="col-md-10">
                  <input type="text" readonly value="<?= $user_info[0]['username'] ?>" id="title" class="form-control" name="title">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Email</label>
                <div class="col-md-10">
                  <input type="text" readonly value="<?= $user_info[0]['email'] ?>" id="subject" class="form-control" name="title">
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <a data-toggle="modal" data-target="#create_permission" class="btn btn-info"></i>Give Permission</a>
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
            <table id="example" class="table table-hover" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Access Map</th>
                  <th>Parent Map</th>
                  <th>create</th>
                  <th>read</th>
                  <th>update</th>
                  <th>delete</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                @$no = 1;
                foreach ($User_Permission as $row) {
                ?>
                  <tr>
                    <td><?= @$no ?></td>
                    <td><?= @$row['access_map'] ?></td>
                    <td><b><?= @$row['parent_map'] ?></b></td>
                    <td>
                      <?php if (@$row['create'] == 1) {
                        echo '<input type="checkbox" checked disabled>';
                      } else {
                        echo '<input type="checkbox" disabled>';
                      } ?>
                    </td>
                    <td>
                      <?php if (@$row['read'] == 1) {
                        echo '<input type="checkbox" checked disabled>';
                      } else {
                        echo '<input type="checkbox" disabled>';
                      } ?>
                    </td>
                    <td>
                      <?php if (@$row['update'] == 1) {
                        echo '<input type="checkbox" checked disabled>';
                      } else {
                        echo '<input type="checkbox" disabled>';
                      } ?>
                    </td>
                    <td>
                      <?php if (@$row['delete'] == 1) {
                        echo '<input type="checkbox" checked disabled>';
                      } else {
                        echo '<input type="checkbox" disabled>';
                      } ?>
                    </td>
                    <td>
                      <button onclick="hapus(<?= @$row['role_id']; ?>)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                      <a data-toggle="modal" data-target="#role_<?= @$row['role_id']; ?>" class="btn btn-warning"></i>manage permission</a>
                    </td>
                  </tr>
                <?php
                  $no++;
                } ?>
            </table>
          </div>
        </div>
      </div>
    </div><!-- panel body -->
  </div>
</div><!-- content -->
</div>
</div>


<?php
foreach ($User_Permission as $row_role) { ?>
  <div class="modal" id="role_<?= $row_role['role_id'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit permission
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="<?= site_url('User_Permission/Update') ?>" method="POST">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group has-warning has-feedback">
                  <label for="inputWarning2" class="control-label">This change will affect the access user to the application</label>
                  <input type="text" name="role_id" hidden value="<?= $row_role['role_id'] ?>">
                  <input type="text" name="user_id" hidden value="<?= $user_info[0]['id'] ?>">
                </div>
                <div class="form-group ">
                  <table class="" style="width:100%">
                    <thead>
                      <tr>
                        <td width="25%"></td>
                        <td width="5%"></td>
                        <td width="75%"></td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><b>Access Map </b></td>
                        <td><b>:</b></td>
                        <td><b><?= $row_role['access_map'] ?></b> </td>
                      </tr>
                      <tr>
                        <td><b>Parent Map</b></td>
                        <td><b>:</b></td>
                        <td><b><?= $row_role['parent_map'] ?></b> </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <input type="hidden" class="form-control" required name="id" value="<?= $row_role['role_id'] ?>" placeholder="email" autocomplete="off" />
                <div class="form-group">
                  <div row>
                    <div class="col-md-12">
                      <table class="" style="width:100%">
                        <thead>
                          <tr>
                            <th width="25%">create</th>
                            <th width="25%">read</th>
                            <th width="25%">update</th>
                            <th width="25%">delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="danger">
                            <td>
                              <div class="checkbox">
                                <?php if ($row_role['create'] == 1) {
                                  echo '<input type="checkbox" name="create" checked >';
                                } else {
                                  echo '<input type="checkbox" name="create">';
                                } ?>
                              </div>
                            </td>
                            <td>
                              <div class="checkbox">
                                <?php if ($row_role['read'] == 1) {
                                  echo '<input type="checkbox" name="read" checked >';
                                } else {
                                  echo '<input type="checkbox" name="read">';
                                } ?>
                              </div>
                            </td>
                            <td>
                              <div class="checkbox">
                                <?php if ($row_role['update'] == 1) {
                                  echo '<input type="checkbox" name="update" checked >';
                                } else {
                                  echo '<input type="checkbox" name="update" >';
                                } ?>
                              </div>
                            </td>
                            <td>
                              <div class="checkbox">
                                <?php if ($row_role['delete'] == 1) {
                                  echo '<input type="checkbox" name="delete" checked >';
                                } else {
                                  echo '<input type="checkbox" name="delete" >';
                                } ?>
                              </div>
                            </td>
                          </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="change_permission" value="TRUE">Save</button>
              </div>
              <div class="clearfix"></div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-lg btn-danger btn-block" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php }
?>
<div class="modal" id="create_permission">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create Permission</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('User_Permission/Create') ?>" method="POST">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" name="user_id" hidden value="<?= $user_info[0]['id'] ?>">
                <label for="inputWarning2" class="control-label">Access</label>
                <div class="input-group">
                  <div class="input-group-addon">
                  </div>
                  <select name="access_map_id" required class="form-control" required>
                    <option value="" disabled selected>-Pilih-</option>
                    <?php
                    foreach ($parent_map as $row_parent) {
                      echo '<optgroup label="' . $row_parent['parent_map'] . '">';
                      foreach ($access_map as $row_access) {
                        if ($row_parent['parent_map'] == $row_access["parent_map"]) {
                          echo '<option value="' . $row_access['id'] . '">' . $row_access['access_map'] . '</option>';
                        }
                      }
                      echo '</li>';
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">

                <table class="table" style="width:100%">
                  <thead>
                    <tr>
                      <th width="25%">create</th>
                      <th width="25%">read</th>
                      <th width="25%">update</th>
                      <th width="25%">delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="danger">
                      <td>
                        <div class="checkbox">
                          <input type="checkbox" name="create">
                        </div>
                      </td>
                      <td>
                        <div class="checkbox">
                          <input type="checkbox" name="read">
                        </div>
                      </td>
                      <td>
                        <div class="checkbox">
                          <input type="checkbox" name="update">
                        </div>
                      </td>
                      <td>
                        <div class="checkbox">
                          <input type="checkbox" name="delete">
                        </div>
                      </td>
                    </tr>
                </table>
              </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="create_permission" value="TRUE">Create</button>
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
  function hapus(uid) {
    swal({
        title: "Are you sure delete this role permission?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = "<?= site_url('User_Permission/Delete?role_id='); ?>" + uid + "&&user_id=<?= $user_info[0]['id'] ?>";
        } else {
          swal("User is safe!");
        }
      });
  }
</script>