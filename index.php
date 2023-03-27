<?php
	include_once "includes/class-user.php";
	include_once "includes/config.php";
	include_once "includes/functions.php";
	include_once "header.php";
	
?>

<?php
				if (isset($_POST['submit-search'])) {
					$searchResult = $_POST['search'];
					$stmt_selectBooks = $pdo->query("SELECT books.b_title, books.b_desc, books.b_author_FK, books.b_illustrator, books.b_age, books.b_category_FK, books.b_language_FK, books.b_release, books.b_publisher, books.b_pagecount, books.b_price FROM books 
					INNER JOIN table_category ON books.b_category_FK = table_category.c_ID
					INNER JOIN table_language ON books.b_language_FK = table_language.l_ID
					INNER JOIN table_author ON books.b_author_FK = table_author.au_ID
					INNER JOIN table_genre ON books.b_genre_FK = table_genre.g_ID
					WHERE books.b_title LIKE '%$searchResult%' 
					OR books.b_author_FK, LIKE '%$searchResult%' OR books.b_illustrator LIKE '%$searchResult%' OR books.b_age LIKE '%$searchResult%' OR books.b_category_FK LIKE '%$searchResult%' OR books.b_language_FK LIKE '%$searchResult%';");
			
					foreach ($stmt_selectBooks as $row)
			{
				echo '
						<div class="justify-content-center col-lg-3 d-flex align-items-stretch" id="masthead">
			
							<div class="card my-2 cardBody" style="width:25rem">
			
								<div class="card-body d-flex flex-column">
			
									<img class="bcover" src="img/'.$row["bcover"].'">
			
									<div class="textContainer">
			
										<h2>'.$row["b_title"].'</h2>
										<p>'.$row["b_desc"].'</p>
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
			}
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
                <div class="searchBarButton"><button class="btn btn-primary" name="submit-search" type="submit">Sök</button></div>
            </form>

		
			<?php 
			foreach ($searchResult as $row)
			{
				
			
				
				
				echo

			'<div>
	<div class="card">
	<div class="card-body d-flex flex-column">
	<img src="img/'.$row["personalbild"].'" class="card-img-top" alt="...">
	  <h5 class="card-title"> "'.$row[""].'"</h5>
	  <p class="card-text">"'.$row[""].'"</p>
	  <p class="card-text">"'.$row[""].'"</p>
	  <p class="card-text">"'.$row[""].'"</p>
	  
	  <a href="singlecard.php?ID='.$row['a_ID'].'" class="btn btn-primary mt-auto align-self-start">mera info</a>
	   
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