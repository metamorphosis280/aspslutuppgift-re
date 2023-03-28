
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
            
            <?php $stmt_selectAuthor = $pdo->query("SELECT * from table_author");?>
            <label for="author">author:</label><br>
            <select id="author" name="author" type="text"><br>
			<?php
            foreach($stmt_selectAuthor as $author){
                echo "<option value='{$author['au_ID']}'>{$author['au_name']}</option>";
            }
            
            
			?>
            </select><br>
            
            <label for="illustrator">illustrator:</label><br>
            <input id="illustrator" name="illustrator" type="text"><br>
            
            <label for="age">age rec:</label><br>
            <input id="age" name="age" type="text"><br>
            
            <?php $stmt_selectCategory = $pdo->query("SELECT * from table_category");?>
            <label for="category">category:</label><br>
            <select id="category" name="category" type="text"><br>
			<?php
            foreach($stmt_selectCategory as $category){
                echo "<option value='{$category['c_ID']}'>{$category['c_name']}</option>";
            }
            
            
			?>
	  		</select><br>
            
              <?php $stmt_selectGenre = $pdo->query("SELECT * from table_genres");?>
            <label for="genre">genre:</label><br>
            <select id="genre" name="genre" type="text"><br>
			<?php
            foreach($stmt_selectGenre as $genre){
                echo "<option value='{$genre['g_ID']}'>{$genre['g_name']}</option>";
            }
            
            
			?>
	  		</select><br>

              </select><br>
            
            <?php $stmt_selectLanguage = $pdo->query("SELECT * from table_language");?>
          <label for="language">language:</label><br>
          <select id="language" name="language" type="text"><br>
          <?php
          foreach($stmt_selectLanguage as $language){
              echo "<option value='{$language['l_ID']}'>{$language['lname']}</option>";
          }
          
          
          ?>
	  		</select><br>

            
            <label for="release">release:</label><br>
            <input id="release" name="release" type="text"><br>
            
            <label for="publisher">publisher:</label><br>
            <input id="publisher" name="publisher" type="text"><br>
            
            <label for="pagecount">pageamount:</label><br>
            <input id="pagecount" name="pagecount" type="text"><br>
            
            <label for="price">price:</label><br>
            <input id="price" name="price" type="text"><br>
            
            <label for="bcover">cover:</label><br>
            <input id="bcover" name="bcover" type="file"><br>

            <input type="submit" name="submit-article-button" value="create new book">
           </form>
            
            <?php
                if(isset($_POST['submit-article-button'])){
                    $title =$_POST['title'];
                    $descr =$_POST['descr'];
                    $author =$_POST['author'];
                    $illustrator =$_POST['illustrator'];
                    $age =$_POST['age'];
                    $category =$_POST['category'];
                    $genre =$_POST['genre'];
                    $language =$_POST['language'];
                    $release =$_POST['release'];
                    $publisher =$_POST['publisher'];
                    $pagecount =$_POST['pagecount'];
                    $price =$_POST['price'];
                    $bcover =$_FILES['bcover']['name'];

                    
                
                
                    
                    
                    
                    
                    $stmt_addBook = $pdo->prepare("INSERT INTO books (b_title, b_descr, b_author_FK, b_illustrator, b_age, b_category_FK, b_genre_FK, b_language_FK, b_release, b_publisher, b_pagecount, b_price, bcover) VALUES (:b_title, :b_descr, :b_author_FK, :b_illustrator, :b_age, :b_category_FK, :b_genre_FK, :b_language_FK, :b_release, :b_publisher, :b_pagecount, :b_price, :bcover)");
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
                    $stmt_addBook ->bindValue(":b_pagecount", $pagecount, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":b_price", $price, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":bcover", $bcover, PDO::PARAM_STR);
                     $stmt_addBook ->execute();
            
            
                }
            ?>
            

</div>
<?php
include_once "includes/footer.php";
?>
</div>

</body>
</html>
