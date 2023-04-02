<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">


	<title>Shopping Portal | Sign-in | Signup</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Customizable CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/green.css">

	<!-- Icons/Glyphs -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">


</head>

<body class="cnt-home">



	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">

		<!-- ============================================== TOP MENU ============================================== -->
		<?php include('includes/top-header.php'); ?>
		<!-- ============================================== TOP MENU : END ============================================== -->
		<?php include('includes/main-header.php'); ?>
		<!-- ============================================== NAVBAR ============================================== -->
		<?php include('includes/menu-bar.php'); ?>
		<!-- ============================================== NAVBAR : END ============================================== -->

	</header>

	<!-- ============================================== HEADER : END ============================================== -->
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="home.html">Home</a></li>
					<li class='active'>Authentication</li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->

	<div class="body-content outer-top-bd">
		<div class="container">
			<div class="sign-in-page inner-bottom-sm">
				<div class="row">
					<!-- Sign-in -->
					<div class="col-md-6 col-sm-6 sign-in">
						<h4 class="">sign in</h4>
						<p class="">Hello, Welcome to your account.</p>
						<form class="register-form outer-top-xs" method="post">
							<span style="color:red;">

							</span>
							<div class="form-group">
								<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
								<input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
							</div>
							<div class="form-group">
								<label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
								<input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1">
							</div>
							<div class="radio outer-xs">
								<a href="#" class="forgot-password pull-right">Forgot your Password?</a>
							</div>
							<button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="login">Login</button>
						</form>
					</div>
					<!-- Sign-in -->

					<!-- create a new account -->
					<div class="col-md-6 col-sm-6 create-new-account">
						<h4 class="checkout-subtitle">create a new account</h4>
						<p class="text title-tag-line">Create your own Shopping account.</p>
						<form class="register-form outer-top-xs" role="form" method="post" name="register" onSubmit="return valid();">
							<div class="form-group">
								<label class="info-title" for="fullname">Full Name <span>*</span></label>
								<input type="text" class="form-control unicase-form-control text-input" id="fullname" name="fullname" required="required">
							</div>


							<div class="form-group">
								<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
								<input type="email" class="form-control unicase-form-control text-input" id="email" onBlur="userAvailability()" name="emailid" required>
								<span id="user-availability-status1" style="font-size:12px;"></span>
							</div>

							<div class="form-group">
								<label class="info-title" for="contactno">Contact No. <span>*</span></label>
								<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" maxlength="10" required>
							</div>

							<div class="form-group">
								<label class="info-title" for="password">Password. <span>*</span></label>
								<input type="password" class="form-control unicase-form-control text-input" id="password" name="password" required>
							</div>

							<div class="form-group">
								<label class="info-title" for="confirmpassword">Confirm Password. <span>*</span></label>
								<input type="password" class="form-control unicase-form-control text-input" id="confirmpassword" name="confirmpassword" required>
							</div>


							<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button" id="submit">Sign Up</button>
						</form>
						<span class="checkout-subtitle outer-top-xs">Sign Up Today And You'll Be Able To : </span>
						<div class="checkbox">
							<label class="checkbox">
								Speed your way through the checkout.
							</label>
							<label class="checkbox">
								Track your orders easily.
							</label>
							<label class="checkbox">
								Keep a record of all your purchases.
							</label>
						</div>
					</div>
					<!-- create a new account -->
				</div><!-- /.row -->
			</div>

		</div>
	</div>
	<?php include('includes/footer.php'); ?>

</body>

</html>