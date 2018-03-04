<?php 
	include 'inc/header.php';
	include 'lib/User.php';
	seSsion::checkLogin();
 ?>
 <?php 
 	$user = new User();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
 		$usrLogin =$user->userLogin($_POST);
 	}
  ?>
	<div class="main-body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>User Login</h2>
						</div>
						<div class="panel-body">
							<div style="max-width: 600px;margin: 0 auto;">
							<?php 
								if (isset($usrLogin)) {
									echo $usrLogin;
								}
							 ?>
								<form action="" method="POST">
									<div class="form-group">
										<label for="email">Email Address:</label>
										<input type="email" name="email" id="email" class="form-control">
									</div>
									<div class="form-group">
										<label for="password">Password:</label>
										<input type="password" name="password" id="password" class="form-control">
									</div>
									<button class="btn btn-success" name="login" type="submit">LogIn</button>
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