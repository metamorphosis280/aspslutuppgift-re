<?php
	include_once "includes/class-user.php";
	include_once "includes/config.php";
	include_once "includes/functions.php";

	

	include_once "header.php";


    $ID = $_GET['ID'];

    $stmt_selectProject = $pdo->prepare("SELECT * from books WHERE b_ID = :ID");
		$stmt_selectProject->bindValue(":ID", $ID, PDO::PARAM_INT);
		$stmt_selectProject->execute();
		$row = $stmt_selectProject->fetch(PDO::FETCH_ASSOC);


		
?>




<div id="content">
	<div class="content-inner">



	

<!--if($user->checkUserRole($_SESSION['urole'], 50)){
    echo '<a href="editcard.php?ID='.$row['ID'].'" class="btn btn-primary">edit employee info</a>';  
}-->
<?php




echo
	
	
	'<div class="project-container">
	<div class="card-body">
	<img src="img/'.$row["bcover"].'" class="card-img-top" alt="...">
	<h5 class="card-title">title: "'.$row["b_title"].'"</h5>
	  <p class="card-text">"'.$row["b_descr"].'"</p>
	  <p class="card-text">author:"'.$row["b_author_FK"].'"</p>
	  <p class="card-text">illustrator:"'.$row["b_illustrator"].'"</p>
	  <p class="card-text">age recommendation"'.$row["b_age"].'"</p>
	  <p class="card-text">category:"'.$row["b_category_FK"].'"</p>
	  <p class="card-text">genre:"'.$row["b_genre_FK"].'"</p>
	  <p class="card-text">language:"'.$row["b_language_FK"].'"</p>
	  <p class="card-text">release date:"'.$row["b_release"].'"</p>
	  <p class="card-text">publisher:"'.$row["b_publisher"].'"</p>
	  <p class="card-text">page amount:"'.$row["b_pagecount"].'"</p>
	  <p class="card-text">price:"'.$row["b_price"].'"</p>
	  
	</div>
	 </div>';

	 

	 if($user->checkLoginStatus()){
		echo "";
	}
	else{
		
		echo '<a href="editcard.php?ID='.$row['b_ID'].'" class="btn btn-primary">edit book</a>'; 
	}
     ?>

</div>


	</div>
</div>

<<?php
include_once "includes/footer.php";
?>

</body>
</html> 