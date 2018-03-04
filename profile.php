<?php 
	include 'lib/User.php';
	include 'inc/header.php';
	seSsion::checkSession();
 ?>
 <?php 
 	if (isset($_GET['id'])) {
 		$userid = (int)$_GET['id'];
 	}
 	$user = new User();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
 		$updateusr =$user->updateUserData($id, $_POST);
 	}
  ?>
	<div class="main-body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>User Profile<span class="pull-right"><a class="btn btn-primary" href="index.php">Back</a></span></h2>
						</div>
						<div class="panel-body">
							<div style="max-width: 600px;margin: 0 auto;">
							<?php 
								if (isset($updateusr)) {
									echo $updateusr;
								}
							 ?>
							<?php 
								$userdata = $user->getUserById($userid);
								if ($userdata) {
								
							 ?>
								<form action="" method="POST">
									<div class="form-group">
										<label for="name">Full Name:</label>
										<input type="text" name="name" id="name" class="form-control" value="<?php echo $userdata->name; ?>">
									</div>
									<div class="form-group">
										<label for="username">User Name:</label>
										<input type="text" name="username" id="username" class="form-control" value="<?php echo $userdata->username; ?>">
									</div>
									<div class="form-group">
										<label for="email">Email Address:</label>
										<input type="email" name="email" id="email" class="form-control" value="<?php echo $userdata->email; ?>">
									</div>
									<?php 
										$sessid = seSsion::get('id');
										if ($userid == $sessid) {

									 ?>
									<button class="btn btn-success" name="update" type="submit">Update</button>
									<a class="btn btn-info" href="changepass.php?id=<?php echo $userid; ?>">Change Password</a>
									<?php } ?>
								</form>
							<?php } ?>	
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
