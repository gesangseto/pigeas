<div class="col-xs-12 col-sm-9 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="javascript:void(0);" class="toggle-sidebar">
                    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
                </a> Administrator / Edit System Admin
            </h3>
        </div>
        <div class="panel-body">
            <div class="content-row">
                <div class="row">
                    <div class="col-md-4">
                        <a href="javascript:window.history.go(-1);" class="btn btn-primary glyphicon glyphicon-arrow-left"></a>
                    </div>
                    <div class="col-md-4 form-signin">
                        <?php
                        if (isset($message)) {
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
                </div>
                <form action="<?= site_url('User_Admin/Update') ?>" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <h4 class="form-signin-heading">Edit System Admin</h4>
                            <input type="hidden" class="form-control" required name="id" value="<?= @$user_info[0]['id'] ?>" placeholder="email" autocomplete="off" />
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-envelope"></i>
                                    </div>
                                    <input type="email" class="form-control" required name="email" value="<?= $user_info[0]['email'] ?>" placeholder="email" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class=" glyphicon glyphicon-user "></i>
                                    </div>
                                    <input type="text" class="form-control" required name="username" value="<?= @$user_info[0]['username'] ?>" placeholder="Username" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group has-warning has-feedback">
                                <label for="inputWarning2" class="control-label">Leave blank if not changed the password</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class=" glyphicon glyphicon-lock "></i>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" />
                                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group has-warning has-feedback">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class=" glyphicon glyphicon-lock "></i>
                                    </div>
                                    <input type="password" class="form-control" name="re_password" id="re_password" placeholder="Re-enter Password" autocomplete="off" />
                                    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div><!-- panel body -->
    </div>
</div><!-- content -->
</div>
</div>

<!--footer-->