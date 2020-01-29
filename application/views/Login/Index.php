<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Bootflat-Admin Template</title>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="shortcut icon" href="favicon_16.ico" />
	<link rel="bookmark" href="favicon_16.ico" />
	<!-- site css -->
	<link rel="stylesheet" href="<?= base_url('') ?>asset_app/css/site.min.css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?= base_url('') ?>asset_app/js/site.min.js"></script>
	<style>
		body {
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #303641;
			color: #C1C3C6
		}
	</style>
</head>

<body>
	<div class="container">
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
		<form class="form-signin" action="<?= site_url('Area-Admin') ?>" method="POST">
			<h4 class="form-signin-heading">Login</h4>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="glyphicon glyphicon-user"></i>
					</div>
					<input type="text" class="form-control" required name="username" id="username" placeholder="Username" autocomplete="off" />
				</div>
			</div>

			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<i class=" glyphicon glyphicon-lock "></i>
					</div>
					<input type="password" class="form-control" required name="password" id="password" placeholder="Password" autocomplete="off" />
				</div>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</form>

	</div>
	<div class="clearfix"></div>
	<br><br>
	<!--footer-->
	<div class="site-footer login-footer">
		<div class="container">
			<div class="copyright clearfix text-center">
				<p><b>Pigeas Construction</b></p>
				<p>Code licensed under <a href="http://opensource.org/licenses/mit-license.html" target="_blank" rel="external nofollow">MIT License</a>, documentation under <a href="http://creativecommons.org/licenses/by/3.0/" rel="external nofollow">CC BY 3.0</a>.</p>
			</div>
		</div>
	</div>
</body>

</html>