
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
       echo "persona added successfully";
   }
   else{
       echo "Something went wrong, card not added";
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
        <h1 class='header-text'>Create Employee info card</h1>
    </div>

    <div id='navigation'>
        <a href="index.php">tillbaka till hemsida</a>
    </div>
    

<h1></h1>
<p>.</p>

<div id='content'>
    <div class="content-inner">
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="namn">namn:</label><br>
            <input id="namn" name="namn" type="text"><br>
            <label for="efternamn">content:</label><br>
            <input id="efternamn" name="efternamn" type="text"><br>
            <label for="jobbtitel">content:</label><br>
            <input id="jobbtitel" name="jobbtitel" type="text"><br>
            <label for="telefonnummer">telefonnummer:</label><br>
            <input id="telefonnummer" name="telefonnummer" type="text"><br>
            <label for="epost">epost:</label><br>
            <input id="epost" name="epost" type="text"><br>
             <label for="personalbild">bild:</label><br>
            <input id="personalbild" name="prrsonalbild" type="file"><br>
            
            <?php
                if(isset($_POST['submit-article-button'])){
                    $namn =$_POST['namn'];
                    $efternamn =$_POST['efternamn'];
                    $jobbtitel =$_POST['jobbtitel'];
                    $telefonnummer =$_POST['telefonnummer'];
                    $epost =$_POST['epost'];
                    $personalbild =$_FILES['personalbild'];
                    
                
                
                    
                    
                    
                    
                    $stmt_addAnstald = $pdo->prepare("INSERT INTO anstalda (namn, efternamn, jobbtitel, telefonnummer, epost, personalbild) VALUES (:namn, :efternamn, :jobbtitel, :telefonnummer, :epost, :personalbild,)");
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
