<?php

function Delete($id, $pdo){
    $stmt_deleteCard =$pdo->prepare("DELETE FROM anstalda WHERE ID =:id");
    $stmt_deleteCard->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt_deleteCard->execute();
	return true;
}


	function selectPersonal($pdo, $cat, $limit){
		$stmt_selectPersonal = $pdo->prepare("SELECT * FROM anstalda WHERE pCat_fk = :cat LIMIT :limit");
		$stmt_selectPersonal->bindValue(":cat", $cat, PDO::PARAM_INT);
		$stmt_selectPersonal->bindValue(":limit", $limit, PDO::PARAM_INT);
		$stmt_selectPersonal->execute();

		return $stmt_selectPersonal;
	}

	
	function addBook($pdo){
		$title =$_POST['title'];
        $desc =$_POST['descr'];
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
		}
		
	

	function searchUsers($pdo){
		$stmt_searchemployee = $pdo->prepare("SELECT * FROM anstalda WHERE namn=:searchTerm");
		$stmt_searchemployee->bindValue(":searchTerm", $_GET['searchparam'], PDO::PARAM_STR);
		$stmt_searchemployee->execute();

		return $stmt_searchemployee;
		}

	
	

?>

<!--function javeteit(){
		//INSERT INTO articles (article_heading) VALUES ($articleHeading)
		$stmt_addPersonal = $pdo->prepare(" INSERT INTO anstalda (namn, efternamn, jobbtitel, avdelning_FK, ort_FK, telefonnummer, epost, personalbild, title_FK) VALUES (:namn, :efternamn, :jobbtitel, :avdelning_FK, :ort_FK, :telefonnummer, :epost, :personalbild, :title_FK)");
		$stmt_addPersonal->bindValue(":namn", $title, PDO::PARAM_STR);
		$stmt_addPersonal->bindValue(":efternamn", $content, PDO::PARAM_STR);
		$stmt_addPersonal->bindValue(":jobbtitel", $projectimage, PDO::PARAM_STR);
		$stmt_addPersonal->bindValue(":avdelning_FK", $pCat_fk, PDO::PARAM_STR);
		$stmt_addPersonal->bindValue(":ort_FK", $pCat_fk, PDO::PARAM_STR);
		$stmt_addPersonal->bindValue(":telefonnummer", $pCat_fk, PDO::PARAM_STR);
		$stmt_addPersonal->bindValue(":epost", $pCat_fk, PDO::PARAM_STR);
		$stmt_addPersonal->bindValue(":personalbild", $pCat_fk, PDO::PARAM_STR);
		$stmt_addPersonal->bindValue(":title_FK", $pCat_fk, PDO::PARAM_STR);
		$stmt_addPersonal->execute();

		return true;
	} -->