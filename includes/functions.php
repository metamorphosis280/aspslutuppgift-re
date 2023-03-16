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

	
	function addPersonalCard($pdo){
		$namn = $_POST['namn'];
		$efternamn = $_POST['efternamn'];
		$jobbtitel = $_POST['jobbtitel'];
		$avdelning_FK = $_POST['avdelning_FK'];
		$ort_FK = $_POST['ort_FK'];
		$telefonnummer = $_POST['telefonnummer'];
		$epost = $_POST['epost'];
		$personalbild = $_FILES['personalbild']['name'];
		$title_FK = $_POST['title_FK'];
		}
		
	function javeteit(){
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
	}

	function searchUsers($pdo){
		$stmt_searchemployee = $pdo->prepare("SELECT * FROM anstalda WHERE namn=:searchTerm");
		$stmt_searchemployee->bindValue(":searchTerm", $_GET['searchparam'], PDO::PARAM_STR);
		$stmt_searchemployee->execute();

		return $stmt_searchemployee;
		}

	
	

?>