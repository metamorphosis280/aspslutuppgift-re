<?php
	include_once "includes/class-user.php";
	include_once "includes/config.php";
	include_once "includes/upload.php";
	
		//Kolla om användaren är inloggad
	if(!$user->checkLoginStatus()){
	$user->userRedirect("index.php?registerattempt=1");
	}
	
	if(isset($_POST['submit_register'])){
		
		if($user->checkUserRegisterInput($_POST['username'], $_POST['password'], $_POST['password_confirm'],$_POST['firstname'],$_POST['lastname'], $_POST['email-field'],0)){
			
			if($user->userRegister($_POST['username'], $_POST['password'], $_POST['password_confirm'],$_POST['firstname'],$_POST['lastname'], $_POST['email-field'])){
				$user->userRedirect("index.php?registrationsuccessful=1");
			}
			else {
				echo $user->getErrorMessage();
			}
			
		}
		else {
			echo $user->getErrorMessage();
		}
		
		
	}

	include_once "header.php";
?>

<div id="content">
	<div class="content-inner">
		<div class="wrapper fadeInDown">
			<div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
				<div class="fadeIn first">
				  <i class="fas fa-house-user login-icon"></i>
				  <h2> Register </h2>
				</div>

				<!-- Login Form -->
				<form method="POST" action="">
				  <input type="text" id="username" class="fadeIn second" name="username" placeholder="Enter desired user name">
				  <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter password - minimum 8 characters long">
				  <input type="password" id="password-repeat" class="fadeIn third" name="password_confirm" placeholder="Confirm password">
				  <input type="text" id="firstname" class="fadeIn second" name="firstname" placeholder="First name">
				  <input type="text" id="lastname" class="fadeIn second" name="lastname" placeholder="Last name">
				  <input type="text" id="email-field" class="fadeIn second" name="email-field" placeholder="Email address">
				  <input type="submit" class="fadeIn fourth" name="submit_register" value="Register">
				</form>

			
				<div id="formFooter">
				  <span>Already a user? </span><a class="underlineHover" href="index.php">Login here!</a>
				</div>

			</div>
		</div>
	</div>
</div>

<?php
include_once "footer.php";
?> 