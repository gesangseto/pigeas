<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Administrator / View</h3>
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
              <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                  <a href="<?= site_url('User_Permission/Read') ?>?id=<?= $user_info[0]['id'] ?>" class="btn btn-info">
                    <i class="fa fa-lock"></i>&nbsp; View Permission</a>
                </div>
            </form>
          </div>
        </div>

      </div>

    </div><!-- panel body -->
  </div>
</div><!-- content -->
</div>
</div>