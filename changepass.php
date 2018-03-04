<?php 
	include 'lib/User.php';
	include 'inc/header.php';
	seSsion::checkSession();
 ?>
 <?php 
 	if (isset($_GET['id'])) {
 		$userid = (int)$_GET['id'];
 		$sessid = seSsion::get('id');
		if ($userid != $sessid){
			header("Location:index.php");
		}
 	}
 	$user = new User();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatepass'])) {
 		$updatepass =$user->updatePassword($id, $_POST);
 	}
  ?>
	<div class="main-body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Change Password<span class="pull-right"><a class="btn btn-primary" href="profile.php?id=<?php echo $userid; ?>">Back</a></span></h2>
						</div>
						<div class="panel-body">
							<div style="max-width: 600px;margin: 0 auto;">
							<?php 
								if (isset($updatepass)) {
									echo $updatepass;
								}
							 ?>
								<form action="" method="POST">
									<div class="form-group">
										<label for="old_password">Old Password:</label>
										<input type="password" name="old_password" id="old_password" class="form-control">
									</div>
									<div class="form-group">
										<label for="password">New Password:</label>
										<input type="password" name="password" id="password" class="form-control">
									</div>
									<button class="btn btn-success" name="updatepass" type="submit">UpdatePassword</button>
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
