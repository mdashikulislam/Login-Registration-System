<?php 
	include 'inc/header.php';
	include 'lib/User.php';
	seSsion::checkLogin();
 ?>
 <?php 
 	$user = new User();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
 		$usrRegi =$user->userRegistration($_POST);
 	}
  ?>
	<div class="main-body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>User Registration</h2>
						</div>
						<div class="panel-body">
							<div style="max-width: 600px;margin: 0 auto;">
							<?php 
								if (isset($usrRegi)) {
									echo $usrRegi;
								}
							 ?>
								<form action="" method="POST">
									<div class="form-group">
										<label for="name">Full Name:</label>
										<input type="text" name="name" id="name" class="form-control">
									</div>
									<div class="form-group">
										<label for="username">User Name:</label>
										<input type="text" name="username" id="username" class="form-control">
									</div>
									<div class="form-group">
										<label for="email">Email Address:</label>
										<input type="email" name="email" id="email" class="form-control">
									</div>
									<div class="form-group">
										<label for="password">Password:</label>
										<input type="password" name="password" id="password" class="form-control">
									</div>
									<button class="btn btn-success" name="register" type="submit">Submit</button>
								</form>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
<?php 
	include 'inc/footer.php';
 ?>