<?php require_once("config.php") ?>
<!doctype html>

<html lang="pl">
<head>
	<meta charset="utf-8">

	<title>Baza filmów</title>
	<meta name="description" content="Description">
	<meta name="author" content="Author">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/style.css">


	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


</head>
<body>
<?php  include("header.php") ?>
<main>
  <div class="container">
  <h2>10 najlepszych filmów według ocen</h2>
  <hr />
  
    	<?php
$query = "SELECT * FROM films_film ORDER BY reviews DESC LIMIT 10 ";
$i = 1;
if ($result = $conn->query($query)) {
	
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
?>

<div class="container border mt-4">
      <div class="row">
	  <?php if($i == 1) echo '<img height="60px" src="images/gold-medal.png" style="position: absolute; margin-top: -10px; margin-left: -10px"/>';
			elseif($i == 2) echo '<img height="60px" src="images/silver-medal.png" style="position: absolute; margin-top: -10px; margin-left: -10px"/>';
			elseif($i == 3) echo '<img height="60px" src="images/bronze-medal.png" style="position: absolute; margin-top: -10px; margin-left: -10px"/>';
			else echo '<h3 style="position: absolute; margin-top: -10px; margin-left: 10px"> '.$i.'.</h3>';
	  ?>
		<div>
		
		<div style="width: 150px; height: 150px; background-color: lightgray; display: block; float: left" class="my-3 m-3"> </div>
		<div class="p-3" style="display: block">
			<h3><a href="movie.php?id=<?=$row['id']?>"><?=$row['title']?></a></h3>
			<hr />
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at nibh blandit, convallis sapien nec, faucibus sapien. Aenean fringilla, est in dignissim facilisis, ipsum neque rhoncus nisi, at dignissim odio metus eget tortor. </p>
			<small>2020, Reż: Gall Anonim, 190 min, Średnia ocen: <?=$row['reviews']/10 ?></small>
        </div>
		</div>
       
	 </div>
</div>


<?
$i += 1;
    }

    /* free result set */
    $result->free();
}

/* close connection */
$conn->close();

	?>


</div>
  

  </div>
  


</main>
</body>

</html>
