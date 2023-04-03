

<?php
	include_once "includes/class-user.php";
	include_once "includes/config.php";
	include_once "includes/upload.php";
	include_once "includes/functions.php";

	if($user->checkLoginStatus()){
		$user->userRedirect("index.php");
		}

		if(isset($_POST['delete-book'])){
			$bookToDelete =$_POST['book-delete'];
			if(Delete($bookToDelete, $pdo)){
				$user->userRedirect("index.php");
			}
		}


 // test

    $ID = $_GET['ID'];

	
    $stmt_selectBook = $pdo->prepare("SELECT * from books WHERE b_ID = :ID");
		$stmt_selectBook->bindValue(":ID", $ID, PDO::PARAM_INT);
		$stmt_selectBook->execute();
		$row = $stmt_selectBook->fetch(PDO::FETCH_ASSOC);
	
		if(isset($_POST['submit-article-button'])){
			$title =$_POST['b_title'];
			$descr =$_POST['b_descr'];
			$author =$_POST['b_author_FK'];
			$illustrator =$_POST['b_illustrator'];
			$age =$_POST['b_age'];
			$category =$_POST['b_category_FK'];
			$genre =$_POST['b_genre_FK'];
			$language =$_POST['b_language_FK'];
			$release =$_POST['b_release'];
			$publisher =$_POST['b_publisher'];
			$pageamount =$_POST['b_pagecount'];
			$price =$_POST['b_price'];
			$bcover =$_FILES ['bcover']['name'];
		
	
	
		
		
		
		
		$stmt_addBook = $pdo->prepare("UPDATE books SET b_title=:b_title, b_descr=:b_descr, b_author_FK=:b_author_FK, b_illustrator=:b_illustrator, b_age=:b_age, b_category_FK=:b_category_FK, b_genre_FK=:b_genre_FK, b_language_FK=:b_language_FK, b_release=:b_release, b_publisher=:b_publisher, b_pagecount=:b_pagecount, b_price=:b_price, bcover=:bcover WHERE b_ID =:ID");
                    $stmt_addBook ->bindValue(":b_title", $title, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_descr", $descr, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_author_FK", $author, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_illustrator", $illustrator, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_age", $age, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_category_FK", $category, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_genre_FK", $genre, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_language_FK", $language, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_release", $release, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_publisher", $publisher, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_pagecount", $pageamount, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_price", $price, PDO::PARAM_STR);
					$stmt_addBook ->bindValue(":bcover", $bcover, PDO::PARAM_STR);
					$stmt_addBook->bindValue(":ID", $ID, PDO::PARAM_INT);
                    $stmt_addBook ->execute();
            


            
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
  <h1 class="header-text">edit books</h1>
</div>

<div id="navigation"> 
  <a href="index.php">Till framsidan</a>
</div>

<div id="content">
	<div class="content-inner">
		<form method="POST" action="" enctype="multipart/form-data">
			

			<label for="b_title">book title:</label><br>
			<input id="b_title" name="b_title" type="text" value="<?php echo $row['b_title'] ?>"><br>

			<label for="b_descr">description:</label><br>
			<input id="b_descr" name="b_descr" type="text" value="<?php echo $row['b_descr'] ?>"><br>

			<label for="b_author_FK">Author name:</label><br>
			<input id="b_author_FK" name="b_author_FK" type="text" value="<?php echo $row['b_author_FK'] ?>"><br>

			<label for="b_illustrator">illustrator:</label><br>
			<input id="b_illustrator" name="b_illustrator" type="text" value="<?php echo $row['b_illustrator'] ?>"><br>

			<label for="b_age">age rec:</label><br>
			<input id="b_age" name="b_age" type="text" value="<?php echo $row['b_age'] ?>"><br>

			<label for="b_category_FK">category:</label><br>
			<input id="b_category_FK" name="b_category_FK" type="text" value="<?php echo $row['b_category_FK'] ?>"><br>
	  	

			<label for="b_genre_FK">genre:</label><br>
			<input id="b_genre_FK" name="b_genre_FK" type="text" value="<?php echo $row['b_genre_FK'] ?>"><br>

			<label for="b_language_FK">language:</label><br>
			<input id="b_language_FK" name="b_language_FK" type="text" value="<?php echo $row['b_language_FK'] ?>"><br>

			<label for="b_release">release date:</label><br>
			<input id="b_release" name="b_release" type="text" value="<?php echo $row['b_release'] ?>"><br>

			<label for="b_publisher">book publisher:</label><br>
			<input id="b_publisher" name="b_publisher" type="text" value="<?php echo $row['b_publisher'] ?>"><br>

			<label for="b_pagecount">page count:</label><br>
			<input id="b_pagecount" name="b_pagecount" type="text" value="<?php echo $row['b_pagecount'] ?>"><br>

			<label for="b_price">price:</label><br>
			<input id="b_price" name="b_price" type="text" value="<?php echo $row['b_price'] ?>"><br>

			<label for="bcover">book cover:</label><br>
			<input id="bcover" name="bcover" type="file" value="<?php echo $row['bcover'] ?>"><br>

			<input type="submit" name="submit-article-button" value="Create">	
		
		</form>

		<form action="" method="POST">
			<input type= "hidden" name="book-delete" value="<?php echo $row['b_ID'] ?>">
			<input type="submit" name="delete-book" value="Delete">	
			</form>
	</div>
</div>

<?php 
include_once "includes/footer.php";
?>

</body>
</html> 