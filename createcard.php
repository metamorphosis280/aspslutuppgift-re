
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
   if(addProject($pdo)){
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
        <a href="index.php">tillbaka till hemsida</a>
    </div>
    

<h1></h1>
<p>.</p>

<div id='content'>
    <div class="content-inner">
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="title">title:</label><br>
            <input id="title" name="title" type="text"><br>
            <label for="desc">description:</label><br>
            <input id="desc" name="desc" type="text"><br>
            <label for="author">author:</label><br>
            <input id="author" name="author" type="text"><br>
            <label for="illustrator">illustrator:</label><br>
            <input id="illustrator" name="illustrator" type="text"><br>
            <label for="age">age rec:</label><br>
            <input id="age" name="age" type="text"><br>
             <label for="category">category:</label><br>
            <input id="category" name="category" type="text"><br>
            <label for="genre">genre:</label><br>
            <input id="genre" name="genre" type="text"><br>
            <label for="language">language:</label><br>
            <input id="language" name="language" type="text"><br>
            <label for="release">release:</label><br>
            <input id="release" name="release" type="text"><br>
            <label for="publisher">publisher:</label><br>
            <input id="publisher" name="publisher" type="text"><br>
            <label for="pagecount">pagecount:</label><br>
            <input id="pagecount" name="pagecount" type="text"><br>
            <label for="price">price:</label><br>
            <input id="price" name="price" type="text"><br>
            
            <?php
                if(isset($_POST['submit-article-button'])){
                    $title =$_POST['title'];
                    $desc =$_POST['desc'];
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

                    
                
                
                    
                    
                    
                    
                    $stmt_addBook = $pdo->prepare("INSERT INTO anstalda (namn, efternamn, jobbtitel, telefonnummer, epost, personalbild) VALUES (:namn, :efternamn, :jobbtitel, :telefonnummer, :epost, :personalbild,)");
                    $stmt_addBook ->bindValue(":title", $title, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":desc", $desc, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":author", $author, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":illustrator", $illustrator, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":age", $age, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":category", $category, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":genre", $genre, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":language", $language, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":release", $release, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":publisher", $publisher, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":pagecount", $pagecount, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":price", $price, PDO::PARAM_STR);
                    $stmt_addBook ->bindValue(":ID", $ID, PDO::PARAM_STR);
                    $stmt_addBook ->execute();
            
            
                }
            ?>
            </select>

            

            <input type="submit" name="submit-article-button" value="skapa artikel">
           </form>

</div>
<?php
include_once "includes/footer.php";
?>
</div>

</body>
</html>
