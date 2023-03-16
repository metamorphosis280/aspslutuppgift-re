<?php
	include_once "includes/class-user.php";
	include_once "includes/config.php";
	
	//TODO checkLoginStatus och redirect till home ifall användaren redan är inloggad
	//Kolla om användaren är inloggad
	if(!$user->checkLoginStatus()){
	$user->userRedirect("home.php?loginattempt=1");
	}

	if(isset($_POST['login-submit'])){
		
		if($user->userLogin($_POST['username'], $_POST['password'])){
			$user->userRedirect('index.php');
		}
		else{
			$errorMessage = $user->getErrorMessage();
		}
	}
	
	include_once "header.php";
?>



<div id="content">
	
		<?php if(isset($_GET["registrationsuccessful"])){
			echo '<div class="success-message">';
			echo "<p>You have been successfully registered - Please log in below</p>";
			echo '</div>';
		}
		if(isset($errorMessage)){
			echo '<div class="error-message">';
			echo "<p>".$errorMessage."</p>";
			echo '</div>';
		}
		?>
	
	<div class="content-inner">
		<div class="wrapper fadeInDown">
			<div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
				<div class="fadeIn first">
				  <i class="fas fa-house-user login-icon"></i>
				  <h2>Log in</h2>
				</div>

				<!-- Login Form -->
				<form method="POST" id="login-form">
				  <input type="text" id="username" class="fadeIn second" name="username" placeholder="User name or e-mail">
				  <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
				  <input type="submit" name="login-submit" class="fadeIn fourth" value="Log In">
				</form>

				<!-- Remind Passowrd -->
				<div id="formFooter">
				  <span>Not a user? </span><a class="underlineHover" href="register.php">Register here!</a>
				</div>

			</div>
		</div>
	</div>
</div>
<?php
include_once "footer.php";
?>