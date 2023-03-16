<?php
include_once "includes/class-user.php";
include "includes/config.php";

if($user->checkLoginStatus()){
    $user->userRedirect("index.php");
}

include_once "header.php";
?>
<div id="content">
<div class= "error-section">
<?php

 if (isset($_GET["loginattempt"])){
    echo'<div class="error-message">';
    echo"<p> you are already logged in - please log out</p>";
    echo '</div>';
  }

  if (isset($_GET["registerattempt"])){
    echo'<div class="error-message">';
    echo"<p> you cannot register a new user you are already logged in - please log out to register new user</p>";
    echo '</div>';
  }



echo $_SESSION['uid'];
echo $_SESSION['test'];






if($user->checkUserRole( $_SESSION['urole'], 50)){
    echo '<div><a href="edituserinfo.php"> editera uppgifter</a></div>';
}

?>
</div>
<div class="content inner">
    <?php echo "<h2>Välkommen" . $_SESSION["uname"] . "</h2>"; ?>
</div>
</div>





<?php
include_once "footer.php";
?>