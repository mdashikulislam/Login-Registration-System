<?php 
	include_once 'seSsion.php';
	include 'dataBase.php';
	class User{
		
		private $db;	
		function __construct(){
			$this->db = new dataBase();	
		}
		public function updateUserData($id, $data){
			$name = $data['name'];
			$username = $data['username'];
			$email = $data['email'];

			if ($name == "" | $username ==""| $email == "") {
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Feild Must Not be Empty</div>";
				return $msg;
			}
			if (strlen($username) < 5) {
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Username Must be 6-32 Character</div>";
				return $msg;
			}elseif(preg_match('/[^a-z0-9_-]+/i', $username)){
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>username Must be contain numerical alphabet, dashes, number and Underscore</div>";
			}
			if (filter_var($email, FILTER_VALIDATE_EMAIL)== false) {
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Email Address Not Valid</div>";
				return $msg;
			}
			$sql = "UPDATE tb_user SET
				name 	 =:name,
				username =:username,
				email 	 =:email
				WHERE id =:id";

			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':name',$name);
			$query->bindValue(':username',$username);
			$query->bindValue(':email',$email);
			$query->bindValue(':id',$id);
			$result = $query->execute();
			if ($result) {
				$msg = "<div class='alert alert-success'><strong>Sucess ! </strong>Your Details Update.</div>";
				return $msg;
			}
			else{
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>There has been problem to Update your details.</div>";
				return $msg;
			}
		}
		private function Checkpass($old_pass,$id){
			$password = $old_pass;
			$sql = "SELECT password FROM tb_user WHERE id = :id  AND password = :password";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id',$id);
			$query->bindValue(':password',$password);
			$query->execute();
			if ($query->rowCount() > 0) {
				return true;
			}
			else{
				return false;
			}
		}
		public function updatePassword($id, $data){
			$old_pass= $data['old_password'];
			$new_pass= $data['password'];
			if ($old_pass == "" | $new_pass == "") {
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Feild Must Not be Empty!</div>";
				return $msg;
			}
			$chk_pass = $this->Checkpass($old_pass,$id);
			if ($chk_pass == false) {
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Old Password Not Exist!</div>";
				return $msg;
			}
			if (strlen($new_pass) < 5) {
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Password Too Short!</div>";
				return $msg;
			}
			$new_password = $new_pass;

			$sql = "UPDATE tb_user SET
				password 	 =:password
				WHERE id =:id";

			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':password',$new_password);
			$query->bindValue(':id',$id);
			$result = $query->execute();
			if ($result) {
				$msg = "<div class='alert alert-success'><strong>Sucess ! </strong>Password Updated Succesfully.</div>";
				return $msg;
			}
			else{
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Password Not update.</div>";
				return $msg;
			}

		}
		public function userRegistration($data)
		{ 
			$name = $data['name'];
			$username = $data['username'];
			$email = $data['email'];
			$password = $data['password'];
			$chk_email = $this->emailCheck($email);

			if ($name == "" | $username ==""| $email == "" | $password =="") {
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Feild Must Not be Empty</div>";
				return $msg;
			}
			if (strlen($username) < 5) {
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Username Must be 6-32 Character</div>";
				return $msg;
			}elseif(preg_match('/[^a-z0-9_-]+/i', $username)){
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>username Must be contain numerical alphabet, dashes, number and Underscore</div>";
			}
			if (filter_var($email, FILTER_VALIDATE_EMAIL)== false) {
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Email Address Not Valid</div>";
				return $msg;
			}
			if ($chk_email == true) {
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Email Address Already Exist</div>";
				return $msg;
			}


			$sql = "INSERT INTO tb_user(name, username, email, password) VALUES(:name, :username, :email, :password)";

			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':name',$name);
			$query->bindValue(':username',$username);
			$query->bindValue(':email',$email);
			$query->bindValue(':password',$password);
			$result = $query->execute();
			if ($result) {
				$msg = "<div class='alert alert-success'><strong>Sucess ! </strong>You Have been registred.</div>";
				return $msg;
			}
			else{
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>There has been problem to insert your details.</div>";
				return $msg;
			}
		}
		public function emailCheck($email){
			$sql = "SELECT email FROM tb_user WHERE email = :email";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email',$email);
			$query->execute();
			if ($query->rowCount() > 0) {
				return true;
			}
			else{
				return false;
			}
		}
		public function getLoginUser($email, $password){
			$sql = "SELECT * FROM tb_user WHERE email = :email AND password =:password LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email',$email);
			$query->bindValue(':password',$password);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;
		}
		public function userLogin($data){
			$email = $data['email'];
			$password =$data['password'];
			$chk_email = $this->emailCheck($email);

			if ($email == "" | $password == "") {
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Feild Must Not be Empty</div>";
				return $msg;
			}

			if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Email Address Not Valid</div>";
				return $msg;
			}
			if ($chk_email == false) {
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Email Address Not Match!</div>";
				return $msg;
			}

			$result = $this->getLoginUser($email, $password);

			if ($result) {
				seSsion::init();
				seSsion::set("login", true);
				seSsion::set("id", $result->id);
				seSsion::set("name", $result->name);
				seSsion::set("username", $result->username);
				seSsion::set("loginmsg", $msg = "<div class='alert alert-success'><strong>Success ! </strong>You are Looged In!</div>");
				header("Location: index.php");
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Data Not Found!</div>";
				return $msg;
			}
		}
		public function getUserdata(){
			$sql = "SELECT * FROM tb_user ORDER BY id DESC";
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$result = $query->fetchAll();
			return $result;
		}
		public function getUserById($id){
			$sql = "SELECT * FROM tb_user WHERE id = :id LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id',$id);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;
		}
	}
 ?>