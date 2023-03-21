<?php
if(isset($_POST['logout-button'])){
  $user->userLogout();
  $user->userRedirect("login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Min första webbsida :D</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/style.js"></script>
</head>
<body>

<div id="header">
  <h1 class="header-text">Bibliotek</h1>
</div>

<div id="navigation">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
         
          
        
          <?php
          if($user->checkLoginStatus()){
    echo '<li class="nav-item"><a href="login.php" class="btn btn-primary">Login</a></li>';  
}
else {
  echo '<li class="nav-item"><form method="POST" class="m-0" action=""><input id="login-logout-button" type="submit" class="m-0 p-0" name="logout-button" value="Log Out"></form></li>';

}
?>

        </ul>
      </div>
    </div>
  </nav>
</div>