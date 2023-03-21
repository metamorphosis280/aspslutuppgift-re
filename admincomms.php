<?php
	include_once "includes/class-user.php";
	include_once "includes/config.php";
	include_once "includes/functions.php";
	include_once "header.php";
	
		
	
?>
<form method="POST" action="" enctype="multipart/form-data">
            <label for="lname">language name:</label><br>
            <input id="lname" name="lname" type="text"><br>
<?php
	if(isset($_POST['submit-article-button'])){
	  $lname =$_POST['lname'];
	  
   
                   $stmt_addlanguage = $pdo->prepare("INSERT INTO table_language (lname) VALUES (:lname)");
                    $stmt_addlanguage ->bindValue(":lname", $lname, PDO::PARAM_STR);
                    $stmt_addlanguage ->bindValue(":ID", $ID, PDO::PARAM_STR);
                    $stmt_addlanguage ->execute();
            
            
                }
            ?>
 <input type="submit" name="submit-article-button" value="skapa artikel">
           </form>
<?php
include_once "includes/footer.php";
?>
