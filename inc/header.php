<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'../../lib/seSsion.php';
	seSsion::init();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login/Registration System</title>
	<link rel="shortcut icon" type="image/x-icon" href="inc/favicon.ico">
	<link rel="stylesheet" href="inc/bootstrap.min.css">
	<link rel="stylesheet" href="inc/bootstrap-theme.min.css">
</head>
<body>

	<?php 
		if (isset($_GET['action']) && $_GET['action'] == "logout") {
			seSsion::destory();
		}
	 ?>

	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-default">
						<div class="navbar-header">
							<a href="index.php" class="navbar-brand">PHP Login Registration System</a>
						</div>
						<div class="navbar-body">
							<ul class="nav navbar-nav pull-right">

								<?php 
									$id = seSsion::get("id");
									$userlogin = seSsion::get("login");
									if ($userlogin == true) {
								 ?>
								 <li><a href="index.php">Home</a></li>
								<li><a href="profile.php?id=<?php echo $id; ?>">Profile</a></li>
								<li><a href="?action=logout">Logout</a></li>
								<?php }else{ ?>
								<li><a href="login.php">Login</a></li>
								<li><a href="register.php">Register</a></li>
								<?php } ?>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>