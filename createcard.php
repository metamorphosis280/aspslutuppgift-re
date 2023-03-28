
<!--//Check if user is not logged in and redirect to homepage
if($user->checkLoginStatus()!=false){
    $user->userRedirect("index.php");
}

if(!$user->checkUserRole($_SESSION['urole'], 50)){
    $user->userRedirect("index.php");
    
}-->

<?php
include_once "includes/config.php";
include_once "includes/upload.php";
include_once "includes/functions.php";





if(isset($_POST['submit-article-button'])){
   if(addBook($pdo)){
       echo "book added successfully";
   }
   else{
       echo "Something went wrong, book not added";
   }

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Min första webbsida :D</title>
<link rel="stylesheet" href="css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
<meta charset="UTF-8"> <!--css/style.css-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/style.js"></script>
</head>
<body>

    <div id='header'>
        <h1 class='header-text'>Create New Book</h1>
    </div>

    <div id='navigation'>
        <a href="admincomms.php">back to admin site</a>
    </div>
    

<h1></h1>
<p>.</p>

<div id='content'>
    <div class="content-inner">
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="title">title:</label><br>
            <input id="title" name="title" type="text"><br>
            
            <label for="descr">description:</label><br>
            <input id="descr" name="descr" type="text"><br>
            
            <label for="author">author:</label><br>
            <select id="author" name="author" type="text"><br>
			<option value="author 1">author 1</option>
			<option value="author 2">author 2</option>
			<option value="author 3">author 3</option>
            </select><br>
            
            <label for="illustrator">illustrator:</label><br>
            <input id="illustrator" name="illustrator" type="text"><br>
            
            <label for="age">age rec:</label><br>
            <input id="age" name="age" type="text"><br>
            
            <label for="category">category:</label><br>
            <select id="category" name="category" type="text"><br>
			<option value="fantasy">fantasy</option>
			<option value="romance">romance</option>
			<option value="history">history</option>
            <option value="art">art</option>
	  		</select><br>
            
              <label for="genre">genre:</label><br>
            <select id="genre" name="genre" type="text"><br>
			<option value="test genre">test genre</option>
			<option value=""></option>
			<option value=""></option>
            <option value=""></option>
	  		</select><br>

            <label for="languages">languages:</label><br>
            <select id="languages" name="languages" type="text"><br>
			<option value="finnish">Finnish</option>
			<option value="swedish">swedish</option>
			<option value="english">english</option>
	  		</select><br>

            
            <label for="release">release:</label><br>
            <input id="release" name="release" type="text"><br>
            
            <label for="publisher">publisher:</label><br>
            <input id="publisher" name="publisher" type="text"><br>
            
            <label for="pageamount">pageamount:</label><br>
            <input id="pageamount" name="pageamount" type="text"><br>
            
            <label for="price">price:</label><br>
            <input id="price" name="price" type="text"><br>
            
            <label for="bcover">cover:</label><br>
            <input id="bcover" name="bcover" type="file"><br>
            
            <?php
                if(isset($_POST['submit-article-button'])){
                    $title =$_POST['title'];
                    $descr =$_POST['descr'];
                    $author =$_POST['author'];
                    $illustrator =$_POST['illustrator'];
                    $age =$_POST['age'];
                    $category =$_POST['category'];
                    $genre =$_POST['genre'];
                    $language =$_POST['languages'];
                    $release =$_POST['release'];
                    $publisher =$_POST['publisher'];
                    $pageamount =$_POST['pageamount'];
                    $price =$_POST['price'];
                    $bcover =$_FILES['bcover'];

                    
                
                
                    
                    
                    
                    
                    $stmt_addBook = $pdo->prepare("INSERT INTO books (b_title, b_descr, b_author_FK, b_illustrator, b_age, b_category_FK, b_genre_FK, b_languages_FK, b_release, b_publisher, b_pageamount, b_price, b_bcover) VALUES (:b_title, :b_descr, :b_author_FK, :b_illustrator, :b_age, :b_category_FK, :b_genre_FK, :b_languages_FK, :b_release :b_publisher, :b_pageamount, :b_price, :b_bcover)");
                    $stmt_addBook ->bindValue(":b_title", $title, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_descr", $descr, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_author_FK", $author, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_illustrator", $illustrator, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_age", $age, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_category_FK", $category, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_genre_FK", $genre, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_languages_FK", $languages, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_release", $release, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_publisher", $publisher, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_pageamount", $pageamount, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_price", $price, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_bcover", $bcover, PDO::PARAM_STR);
                     $stmt_addBook ->execute();
            
            
                }
            ?>
            </select>

            

            <input type="submit" name="submit-article-button" value="create new book">
           </form>

</div>
<?php
include_once "includes/footer.php";
?>
</div>

</body>
</html>
