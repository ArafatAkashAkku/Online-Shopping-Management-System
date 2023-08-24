<?php
session_start();
error_reporting(0);
include("include/config.php");
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$ret = mysqli_query($con, "SELECT * FROM seller WHERE username='$username' and password='$password'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$extra = "insert-product.php"; //
		$_SESSION['alogin'] = $_POST['username'];
		$_SESSION['id'] = $num['id'];
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	} else {
		$_SESSION['errmsg'] = "Invalid username or password";
		$extra = "index.php";
		$host  = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping Portal | Seller login</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<!-- manifest link  -->
	<link rel="manifest" href="manifest.webmanifest">
</head>
<style>
	/* pwa update message start */

	#snackbar {
		display: none;
		justify-content: center;
		position: fixed;
		width: 100%;
		z-index: 1;
		bottom: 30px;
	}

	#snackbar.show {
		display: block;
	}

	#snackbar p {
		background-color: #333;
		color: #fff;
		text-align: center;
		border-radius: 2px;
		padding: 16px;
	}

	#reload {
		font-size: 20px;
		cursor: pointer;
	}

	/* pwa update message end */
</style>

<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

				<a class="brand" href="index.html">
					Seller Login
				</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">

					<ul class="nav pull-right">

						<li><a href="http://localhost/ecommerce/">
								Back to Portal

							</a></li>




					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" method="post">
						<div class="module-head">
							<h3>Sign In</h3>
						</div>
						<span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg'] = ""); ?></span>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="inputEmail" name="username" placeholder="Username">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" id="inputPassword" name="password" placeholder="Password">
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right" name="submit">Login</button>

								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">


			<b class="copyright">&copy; 2023 Shopping Portal </b> All rights reserved.
		</div>
	</div>
	<!-- pwa update message start  -->
	<section>
		<div id="snackbar">
			<p><a id="reload">A new version of this app is available. Click here to update.</a></p>
		</div>
	</section>
	<!-- pwa update message end  -->
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script>
		// pwa installation updation 
		// https://codyanhorn.tech/blog/pwa-reload-page-on-application-update
		// every update requires the changes in cache name in sw.js file 
		(function() {
			// Track an updated flag and an activated flag.
			// When both of these are flagged true the service worker was updated and activated.
			let updated = false;
			let activated = false;
			navigator.serviceWorker.register('/Ecommerce/seller/sw.js').then(regitration => {
				regitration.addEventListener("updatefound", () => {
					const worker = regitration.installing;
					worker.addEventListener('statechange', () => {
						if (worker.state === "activated") {
							// Here is when the activated state was triggered from the lifecycle of the service worker.
							// This will trigger on the first install and any updates.
							activated = true;
							checkUpdate();
						}
					});
				});
			});

			navigator.serviceWorker.addEventListener('controllerchange', () => {
				// This will be triggered when the service worker is replaced with a new one.
				// It does not just reload the page right away, so to make sure it is fully activated using the checkUpdate function.
				updated = true;
				checkUpdate();
			});

			function checkUpdate() {
				let snackbar = document.getElementById('snackbar');
				if (activated && updated) {
					snackbar.classList.add('show');
					document.getElementById('reload').addEventListener('click', function() {
						window.location.reload();
					});
				}
			}
		})();
	</script>
</body>