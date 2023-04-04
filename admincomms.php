<?php
	include_once "includes/class-user.php";
	include_once "includes/config.php";
	include_once "includes/functions.php";
	include_once "header.php";
	
  if($user->checkLoginStatus()){
    $user->userRedirect("index.php");
    }
	
?>

<div id='content'>
    <div class="content-inner">

    
<form method="POST" action="" enctype="multipart/form-data">
            <label for="lname">add new language:</label><br>
            <input id="lname" name="lname" type="text"><br>
<?php
	if(isset($_POST['submit-language-button'])){
	  $lname =$_POST['lname'];
	  
   
                   $stmt_addlanguage = $pdo->prepare("INSERT INTO table_language (lname) VALUES (:lname)");
                    $stmt_addlanguage ->bindValue(":lname", $lname, PDO::PARAM_STR);
                    $stmt_addlanguage ->execute();
            
            
                }
              

  
            ?>

<!--admin creation tools start here -->

<input type="submit" name="submit-language-button" value="create language"><br>



<form method="POST" action="" enctype="multipart/form-data">
<label for="c_name">add new category:</label><br>
<input id="c_name" name="c_name" type="text"><br>
<?php

if(isset($_POST['submit-category-button'])){
  $c_name =$_POST['c_name'];
                    
                   
   $stmt_addlanguage = $pdo->prepare("INSERT INTO table_category (c_name) VALUES (:c_name)");
    $stmt_addlanguage ->bindValue(":c_name", $c_name, PDO::PARAM_STR);
     $stmt_addlanguage ->execute();
                            
                            
                                }
?>
<input type="submit" name="submit-category-button" value="create category"><br>

<form method="POST" action="" enctype="multipart/form-data">
<label for="au_name">add new author:</label><br>
<input id="au_name" name="au_name" type="text"><br>
<?php

if(isset($_POST['submit-author-button'])){
  $au_name =$_POST['au_name'];
                    
                   
   $stmt_addauthor = $pdo->prepare("INSERT INTO table_author (au_name) VALUES (:au_name)");
    $stmt_addauthor ->bindValue(":au_name", $au_name, PDO::PARAM_STR);
     $stmt_addauthor ->execute();
                            
                            
                                }
?>
 <input type="submit" name="submit-author-button" value="create author"><br>



 <form method="POST" action="" enctype="multipart/form-data">
<label for="g_name">add new genre:</label><br>
<input id="g_name" name="g_name" type="text"><br>
<?php

if(isset($_POST['submit-genre-button'])){
  $g_name =$_POST['g_name'];
                    
                   
   $stmt_addgenre = $pdo->prepare("INSERT INTO table_genres (g_name) VALUES (:g_name)");
    $stmt_addgenre ->bindValue(":g_name", $g_name, PDO::PARAM_STR);
     $stmt_addgenre ->execute();
                            
                            
                                }
?>
<input type="submit" name="submit-genre-button" value="create genre"><br>
           </form>


           <a href="createcard.php">create new Book</a><br>
           <a href="index.php">check main page</a>
           
          </div>
           </div>
           <!--admin creation tools end here -->
<?php



include_once "includes/footer.php";
?>
