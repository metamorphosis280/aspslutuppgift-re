<?php
	include_once "includes/class-user.php";
	include_once "includes/config.php";
	include_once "includes/functions.php";
	include_once "header.php";
	
	if(isset($_GET['search-submit'])){
		$searchResult = searchUsers($pdo);
		
	}
?>

<?php
				if (isset($_POST['submit-search'])) {
					$searchResult = $_POST['search'];
					$stmt_selectBooks = $pdo->query("SELECT books.b_title, books.b_descr, books.b_author_FK, books.b_illustrator, books.b_age, books.b_category_FK, books.b_genre_FK, books.b_language_FK, books.b_release, books.b_publisher, books.b_pagecount, books.b_price, books.bcover, table_author.au_name, table_category.c_name, table_language.lname FROM books 
					INNER JOIN table_author ON books.b_author_FK = table_author.au_ID
					INNER JOIN table_category ON books.b_category_FK = table_category.c_ID
					INNER JOIN table_language ON books.b_language_FK = table_language.l_ID
					INNER JOIN table_genres ON books.b_genre_FK = table_genres.g_ID
					WHERE books.b_title LIKE '%$searchResult%' OR table_author.au_name LIKE '%$searchResult%' OR books.b_illustrator LIKE '%$searchResult%' OR books.b_age LIKE '%$searchResult%' OR table_category.c_name LIKE '%$searchResult%' OR table_genres.g_name LIKE '%$searchResult%' OR table_language.lname LIKE '%$searchResult%';");
					$stmt_selectBooks ->execute();
				/*	foreach ($stmt_selectBooks as $row)
			{
				echo '
						<div class="justify-content-center col-lg-3 d-flex align-items-stretch" id="masthead">
						<img class="bcover" src="img/'.$row["bcover"].'">
			
									<div class="textContainer">
			
										<h2>'.$row["b_title"].'</h2>
										<p>'.$row["b_descr"].'</p>
										<p>'.$row["au_name"].'</p>
										<p>'.$row["b_illustrator"].'</p>
										<p>'.$row["b_age"].'</p>
										<p>'.$row["c_name"].'</p>
										<p>'.$row["l_name"].'</p>
										<p>'.$row["b_release"].'</p>
										<p>'.$row["b_publisher"].'</p>
										<p>'.$row["b_pagecount"].'</p>
										<p>'.$row["b_price"].'</p>
										
			
									</div>
			
								</div>
							</div>
			
						</div>';

						
			}*/
			
				}
				
				else{
					$stmt_selectBooks = $pdo->prepare ("SELECT * FROM books ORDER BY b_ID DESC LIMIT 20 ");
 $stmt_selectBooks ->execute();
/*foreach($stmt_showBook as $row){
	echo 
	
	
	'<div>
	<div class="card">
	<div class="card-body d-flex flex-column justify-content-center col-lg-3 d-flex align-items-stretch">
	<img src="img/'.$row["bcover"].'" class="card-img-top" alt="...">
	  <h5 class="card-title"> "'.$row["b_title"].'"</h5>
	  <p class="card-text">"'.$row["b_descr"].'"</p>
	  <p class="card-text">"'.$row["b_author_FK"].'"</p>
	  <p class="card-text">"'.$row["b_illustrator"].'"</p>
	  
	  <a href="singlecard.php?ID='.$row['b_ID'].'" class="btn btn-primary mt-auto align-self-start">mera info</a>
	   
	</div>
	 </div>
	 </div>';
}*/

				}

				
		?>



<div id="content">
	<div class="container mb-5">
		<div class="row">
			<div class="col">
				<h2 class="text-center my-5">Boksökning</h2>
			</div>
		</div>
		<div class="row">
			<div class="col">
			<form method="GET" action="">
  			<input type="text" id="searchparam" name="searchparam" placeholder="Input search parameter here"><br>
 			<input type="submit" value="Submit" name="search-submit">
			</form> 
			</div>
		</div>

		
		<div class="search search-bar-container">
            <form action="index.php" method="POST">
                <i class="fa fa-search"></i>
                <input type="text" class="form-control" name="search" placeholder="Search book">
                <div class="searchBarButton"><button class="btn btn-primary" name="submit-search" type="submit">Search</button></div>
            </form>

		
			<?php 
			foreach ($stmt_selectBooks as $row)
			{
				
			
				
				
				echo

			'<div>
	<div class="card">
	<div class="card-body d-flex flex-column justify-content-center col-lg-3 d-flex align-items-stretch">
	<img src="img/'.$row["bcover"].'" class="card-img-top" alt="...">
	  <h5 class="card-title"> "'.$row["b_title"].'"</h5>
	  <p class="card-text">"'.$row["b_descr"].'"</p>
	  <p class="card-text">"'.$row["b_author_FK"].'"</p>
	  <p class="card-text">"'.$row["b_illustrator"].'"</p>
	  
	  <a href="singlecard.php?ID='.$row['b_ID'].'" class="btn btn-primary mt-auto align-self-start">mera info</a>
	   
	</div>
	 </div>
	 </div>';
			}
			?>
		</div>
		


	</div>
</div>



<?php
include_once "includes/footer.php";
?>


'<!--<div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch">
				<div class="card">
				<img src="img/'.$row["personalbild"].'" class="card-img-top" alt="...">
				<div class="card-body d-flex flex-column">
				  <h5 class="card-title"> "'.$row["namn"].'"</h5>
				  <h5 class="card-title"> "'.$row["efternamn"].'"</h5>
				  <p class="card-text">"'.$row["jobbtitel"].'"</p>
				  <p class="card-text">"'.$row[""].'"</p>
				   <a href="singleproject.php?ID='.$row['ID'].'" class="btn btn-primary mt-auto align-self-start">Learn more</a>
				</div>
				 </div>
				 </div>' -->