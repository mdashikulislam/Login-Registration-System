<?php 
	include 'lib/User.php';
	include 'inc/header.php';
	seSsion::checkSession();
	$user = new User();
 ?>
	<div class="main-body">
		<div class="container">
		<?php 
			$loginmsg = seSsion::get("loginmsg");
				if (isset($loginmsg)) {
					echo $loginmsg;
				seSsion::set("loginmsg", NULL);
			}
		?>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>User List<span class="pull-right">WelCome!<strong> 
							<?php 
								$name = seSsion::get('username');
								if (isset($name)) {
									echo $name;
								}
							 ?>
							</strong></span></h2>
						</div>
						<div class="panel-body">
							<table class="table table-striped">
								<tr>
									<th width="20%">Serial</th>
									<th width="20%">Name</th>
									<th width="20%">Username</th>
									<th width="20%">Email Address</th>
									<th width="20%">Action</th>
								</tr>
								<?php 
									$user = new User();
									$userdata = $user->getUserdata();
									if ($userdata) {
										$i = 0;
										foreach ($userdata as $sdata) {
											$i++;
								 ?>		
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $sdata['name']; ?></td>
									<td><?php echo $sdata['username']; ?></td>
									<td><?php echo $sdata['email']; ?></td>
									<td>
										<a class="btn btn-primary" href="profile.php?id=<?php echo $sdata['id']; ?>">view</a>
									</td>
								</tr>
								<?php } }else{ ?>
									<tr><td colspan="5"><h2>No User Data Found!</h2></td></tr>
								<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
	include 'inc/footer.php';
 ?>