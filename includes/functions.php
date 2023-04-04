
<!--functions -->

<?php



function Delete($ID, $pdo){
    $stmt_deleteBook =$pdo->prepare("DELETE FROM books WHERE b_ID =:ID");
    $stmt_deleteBook->bindValue(":ID", $ID, PDO::PARAM_INT);
    $stmt_deleteBook->execute();
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
        $language =$_POST['language'];
        $release =$_POST['release'];
        $publisher =$_POST['publisher'];
         $pageamount =$_POST['pagecount'];
        $price =$_POST['price'];
        $bcover =$_FILES['bcover'];
		}
		
	

	function searchUsers($pdo){
		$stmt_searchemployee = $pdo->prepare("SELECT * FROM books WHERE b_title =:searchTerm");
		$stmt_searchemployee->bindValue(":searchTerm", $_GET['searchparam'], PDO::PARAM_STR);
		$stmt_searchemployee->execute();

		return $stmt_searchemployee;
		}

	

	
	

?>

