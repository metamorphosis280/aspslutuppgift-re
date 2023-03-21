<?php
	include_once "includes/class-user.php";
	include_once "includes/config.php";
	include_once "includes/functions.php";
	include_once "header.php";
	if(isset($_GET['search-submit'])){
		$searchResult = searchUsers($pdo);
		
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