<?php
class user {
	private $errorMessage;
	
	
	//Constructor - körs alltid då ett nytt user-objekt skapas
	public function __construct($pdo){
		$this->db = $pdo;
	}
	
	public function checkUserRegisterInput($uname, $upass, $upassconfirm, $firstname, $lastname, $email, $cond){
		//Initiera variabler som behövs i funktionen
		$error = 0;
		$this->errorMessage = "";
			
		//Kolla om lösenorden inte stämmer överens
		if($upass!=$upassconfirm){
			$this->errorMessage = "Passwords do not match";
			$error=1;
		}
		
		//Kolla att lösenordet inte är under 8 tecken
		if(strlen($upass) < 8){
			$this->errorMessage .= " | Password is too short";
			$error=1;
		}
		
		//Kolla att man inte fyllt i en felaktig e-post
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->errorMessage .= " | Email is not in a valid format";
			$error=1;
		}
	
		if($cond==0){
			//Bygg query som hämtar ut en rad ur databasen ifall användarnamnet finns
			$stmt_checkIfUserExists = $this->db->prepare("SELECT * FROM table_user WHERE u_username = :uname OR u_email = :email");
			$stmt_checkIfUserExists->bindValue(":uname", $uname, PDO::PARAM_STR);
			$stmt_checkIfUserExists->bindValue(":email", $email, PDO::PARAM_STR);
			$stmt_checkIfUserExists->execute();
			//Skapa array av infon som hämtats
			$userNameMatch = $stmt_checkIfUserExists->fetch();
			//Kolla om arrayen innehåller värden. Om SELECT-queryn har hämtat ut något finns användarnamnet redan skapat
			
			if(!empty($userNameMatch)){
				if($userNameMatch['u_username'] == $uname){
					$this->errorMessage .= " | Username is already taken";
					$error=1;
				}
				
				if($userNameMatch['u_email'] == $email){
					$this->errorMessage .= " | Email is already taken";
					$error=1;
				}
			}
		}
		
		if($error == 1){
			return false;
		}
		
		else {
			return true;
		}
	}
	
	public function userRegister($uname, $upass, $upassconfirm, $firstname, $lastname, $email){
		$cryptedPassword = password_hash($upass, PASSWORD_DEFAULT);
		
		$stmt_registerUser = $this->db->prepare("INSERT INTO table_user (u_username, u_firstname, u_lastname, u_email, u_password, u_role) VALUES (:uname, :ufirst, :ulast, :umail, :upass, 1)");
		$stmt_registerUser->bindValue(":uname", $uname, PDO::PARAM_STR);
		$stmt_registerUser->bindValue(":ufirst", $firstname, PDO::PARAM_STR);
		$stmt_registerUser->bindValue(":ulast", $lastname, PDO::PARAM_STR);
		$stmt_registerUser->bindValue(":umail", $email, PDO::PARAM_STR);
		$stmt_registerUser->bindValue(":upass", $cryptedPassword, PDO::PARAM_STR);
		$check = $stmt_registerUser->execute();
		
		if($check){
			return true;
		}
		
		else {
			$this->errorMessage = " | Registration failed";
		}
	}
	
	public function userLogin($uname , $upass) {
		$stmt_loginUser = $this->db->prepare("SELECT * FROM table_user WHERE u_username = :username OR u_email = :email");
		$stmt_loginUser->bindValue(":username", $uname, PDO::PARAM_STR);
		$stmt_loginUser->bindValue(":email", $uname, PDO::PARAM_STR);
		$check = $stmt_loginUser->execute();
		$loginUser = $stmt_loginUser->fetch();
		
		if(!empty($loginUser)){
	
			if(password_verify($upass,$loginUser["u_password"])) {
				$_SESSION['uid'] = $loginUser["u_ID"];
				$_SESSION['uname'] = $loginUser["u_username"];
				$_SESSION['urole'] = $loginUser["u_role"];
				return true;
			}
			else {
				$this->errorMessage = "Wrong password!";
				return false;
			}
		}
		
		else {
			$this->errorMessage = "Invalid username or email!";
				return false;
		}
	}
	
	public function checkLoginStatus(){
		if(isset($_SESSION['uid'])){
			return false;
		}
		else {
			return true;
		}
	}
	
	public function checkUserRole($urole, $req){
		$stmt_selectRoleLevel = $this->db->prepare("SELECT r_level FROM table_roles WHERE r_ID = :rid");
		$stmt_selectRoleLevel->bindValue(":rid", $urole, PDO::PARAM_INT);
		$stmt_selectRoleLevel->execute();
		$roleLevel = $stmt_selectRoleLevel->fetch();
		
		if($roleLevel['r_level'] >= $req){
			return true;
		}
		else {
			return false;
		}
	}
	
	public function userLogout(){
		session_unset();
		session_destroy();
	}
	
	
	public function userRedirect($url){
		header("location:".$url);
	}
	
	public function getErrorMessage(){
		return $this->errorMessage;
	}
	
	public function selectUserInfo($uid){
		$stmt_selectUserInfo = $this->db->prepare("SELECT * FROM table_user WHERE u_ID = :uid");
		$stmt_selectUserInfo->bindValue(":uid", $uid, PDO::PARAM_STR);
		$stmt_selectUserInfo->execute();
		$userInfo = $stmt_selectUserInfo->fetch();
		return $userInfo;
	}
	
	public function userUpdate($uname, $upass, $upassconfirm, $firstname, $lastname, $email, $urole, $uid){
		$cryptedPassword = password_hash($upass, PASSWORD_DEFAULT);
		
		$stmt_updateUser = $this->db->prepare("UPDATE table_user SET u_username=:uname, u_firstname=:ufirst, u_lastname=:ulast, u_email=:umail, u_password=:upass, u_role=:urole WHERE u_ID=:uid");
		$stmt_updateUser->bindValue(":uname", $uname, PDO::PARAM_STR);
		$stmt_updateUser->bindValue(":ufirst", $firstname, PDO::PARAM_STR);
		$stmt_updateUser->bindValue(":ulast", $lastname, PDO::PARAM_STR);
		$stmt_updateUser->bindValue(":umail", $email, PDO::PARAM_STR);
		$stmt_updateUser->bindValue(":upass", $cryptedPassword, PDO::PARAM_STR);
		$stmt_updateUser->bindValue(":urole", $urole, PDO::PARAM_STR);
		$stmt_updateUser->bindValue(":uid", $uid, PDO::PARAM_STR);
		$check = $stmt_updateUser->execute();
		
		
		if($check){
			return true;
		}
		
		else {
			$this->errorMessage = " | Update failed";
		}
		
	}
	
	function searchUsers($userInput){	
		$stmt_searchUsers = $this->db->prepare("SELECT * FROM table_user WHERE u_username LIKE :input");
		$stmt_searchUsers->bindValue(':input', "%$userInput%");
		$stmt_searchUsers->execute();

		
		
		if($stmt_searchUsers){
			return $stmt_searchUsers;
			
		}
		
		else {
			$this->errorMessage = "No users found";
		}
	}
	
}


?>

	