<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>KSU-PAC</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="bookmark" href="favicon_16.ico" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('') ?>asset_app/favicon.ico" />

    <!-- site css -->
    <link rel="stylesheet" href="<?= base_url('') ?>asset_app/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?= base_url('') ?>asset_app/js/site.min.js"></script>

</head>

<body>
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Application</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <?= $_SESSION['email']; ?>
                            <b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu">
                            <!-- <li><a href="#">Profile</a></li> -->
                            <li><a href="<?= site_url('Area-Admin/Logout') ?>">Signout</a></li>
                        </ul>
                    </li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
                <ul class="list-group panel">
                    <li>
                        <a href="<?= site_url('Dashboard') ?>" class="list-group-item ">
                            <i class="glyphicon glyphicon-home"></i>
                            <b>Dashboard</b>
                        </a>
                    </li>
                    <?php
                    if ($data == NULL) {
                        die;
                    }
                    $access_map = $data;
                    $array = array_column($access_map, 'parent_map');
                    $array = array_unique($array);
                    $parent = array_filter($access_map, function ($key, $value) use ($array) {
                        return in_array($value, array_keys($array));
                    }, ARRAY_FILTER_USE_BOTH);
                    foreach ($parent as $row_parent) {
                        echo '<li>';
                        echo '<a href="#' . $row_parent['parent_map'] . '" class="list-group-item " data-toggle="collapse">';
                        echo '<i class="' . $row_parent['icon'] . '"> </i>';
                        echo '<b>' . $field = str_replace('_', ' ', $row_parent['parent_map']) . '</b>';
                        echo '<span class="glyphicon glyphicon-chevron-right"></span>';
                        echo '</a>';
                        echo '</li>';
                        echo '<li class="collapse" id="' . $row_parent['parent_map'] . '">';
                        foreach ($access_map as $row_access) {
                            if ($row_parent['parent_map'] == $row_access["parent_map"]) {
                                echo '<a href="' . site_url($row_access["access_map"]) . '" class="list-group-item">' .  $field = str_replace('_', ' ', $row_access["access_map"])  . ' </a>';
                            }
                        }
                        echo '</li>';
                    }


                    ?>
                </ul>
            </div>