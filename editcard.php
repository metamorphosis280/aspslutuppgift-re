
<!--if($user->checkLoginStatus()){
	$user->userRedirect("index.php");
	}-->
<?php
	include_once "includes/class-user.php";
	include_once "includes/config.php";
	include_once "includes/upload.php";
	include_once "includes/functions.php";





 // test

    $ID = $_GET['ID'];

	
    $stmt_selectProject = $pdo->prepare("SELECT * from anstalda WHERE a_ID = :ID");
		$stmt_selectProject->bindValue(":ID", $ID, PDO::PARAM_INT);
		$stmt_selectProject->execute();
		$row = $stmt_selectProject->fetch(PDO::FETCH_ASSOC);
	
	if(isset($_POST['submit-article-button'])){
		$namn =$_POST['namn'];
		$efternamn =$_POST['efternamn'];
		$jobbtitel =$_POST['jobbtitel'];
		$telefonnummer =$_POST['telefonnummer'];
		$epost =$_POST['epost'];
		$personalbild =$_FILES['personalbild'];
		
	
	
		
		
		
		
		$stmt_addAnstald = $pdo->prepare("UPDATE anstalda SET namn=:namn, efternamn=:efternamn, jobbtitel=:jobbtitel, telefonnummer=:telefonnummer, epost=:epost, personalbild=:personalbild WHERE a_ID = :ID");
		$stmt_addAnstald->bindValue(":namn", $namn, PDO::PARAM_STR);
		$stmt_addAnstald->bindValue(":efternamn", $efternamn, PDO::PARAM_STR);
		$stmt_addAnstald->bindValue(":jobbtitel", $jobbtitel, PDO::PARAM_STR);
		$stmt_addAnstald->bindValue(":telefonnummer", $telefonnummer, PDO::PARAM_STR);
		$stmt_addAnstald->bindValue(":epost", $epost, PDO::PARAM_STR);
		$stmt_addAnstald->bindValue(":personalbild", $personalbild, PDO::PARAM_STR);
		$stmt_addAnstald->bindValue(":ID", $ID, PDO::PARAM_STR);
		$stmt_addAnstald->execute();


	}
 

	
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Min första webbsida :D</title> <!-- Titel som syns uppe i "tabben" -->
<link rel="stylesheet" href="css/style.css"> <!-- Länka in CSS-filen -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400&display=swap" rel="stylesheet">
<meta charset="UTF-8"> <!-- Välj teckenuppsättning som innehåller ÅÄÖ -->
<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- välj viewport för responsivitet i olika skärmar -->
<script src="js/script.js"></script> 
<script src="tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>
      tinymce.init({
        selector: '#game-description',
		plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'table emoticons template paste help'
    ],
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | link image | print preview media fullpage | ' +
      'forecolor backcolor emoticons | help',
    menu: {
      favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table help',
    content_css: 'css/content.css'
      });
    </script>


</head>
<body>

<div id="header">
  <h1 class="header-text">edit projects</h1>
</div>

<div id="navigation"> 
  <a href="index.php">Till framsidan</a>
</div>

<div id="content">
	<div class="content-inner">
		<form method="POST" action="" enctype="multipart/form-data">
			

			<label for="namn">namn:</label><br>
			<input id="namn" name="namn" type="text" value="<?php echo $row['namn'] ?>"><br>

			<label for="efternamn">efternamn:</label><br>
			<input id="efternamn" name="efternamn" type="text" value="<?php echo $row['efternamn'] ?>"><br>

			<label for="jobbtitel">category number:</label><br>
			<input id="jobbtitel" name="jobbtitel" type="text" value="<?php echo $row['jobbtitel'] ?>"><br>

			<label for="telefonnummer">telefon:</label><br>
			<input id="telefonnummer" name="telefonnummer" type="text" value="<?php echo $row['telefonnummer'] ?>"><br>

			<label for="epost">epost:</label><br>
			<input id="epost" name="epost" type="text" value="<?php echo $row['epost'] ?>"><br>

			<label for="personalbild">personalbild:</label><br>
			<input id="personalbild" name="personalbild" type="file" value="<?php echo $row['personalbild'] ?>"><br>

			<input type="submit" name="submit-article-button" value="Create">	
		
		</form>

		<form action="" method="POST">
			<input type= "hidden" name="anstald-delete" value="<?php echo $row['a_ID'] ?>">
			<input type="submit" name="delete-anstald" value="Delete">	
			</form>
	</div>
</div>

<?php 
include_once "includes/footer.php";
?>

</body>
</html> 