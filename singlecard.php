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

<h1>Employees</h1>

	

<!--if($user->checkUserRole($_SESSION['urole'], 50)){
    echo '<a href="editcard.php?ID='.$row['ID'].'" class="btn btn-primary">edit employee info</a>';  
}-->
<?php




echo
	
	
	'<div class="project-container">
	<div class="card-body">
	<h5 class="card-title"> "'.$row["b_title"].'"</h5>
	  <p class="card-text">"'.$row["b_descr"].'"</p>
	  <p class="card-text">"'.$row["b_author_FK"].'"</p>
	  <p class="card-text">"'.$row["b_illustrator"].'"</p>
	  <a href="editcard.php?ID='.$row['b_ID'].'" class="btn btn-primary">edit employee info</a>
	</div>
	 </div>';

	 
     ?>

</div>


	</div>
</div>

<<?php
include_once "includes/footer.php";
?>

</body>
</html> 