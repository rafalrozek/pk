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

	<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<link rel="manifest" href="favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


</head>
<body>
<?php  include("header.php") ?>
<main>
  <div class="container bg-white">
  <h2 class="m-2">Top 10 najlepszych filmów</h2>
  <hr />

    	<?php
$query = "SELECT * FROM films_film JOIN directors ON films_film.directorId = directors.directorId ORDER BY reviews DESC LIMIT 10";
$i = 1;
if ($result = $conn->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
?>

<div class="container border mt-4 bg-white">
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
			<p><?=$row['description']?> </p>
			<small><?=$row['release_date']?>, <?=$row['runtime']?> min, <?=$row['name']?>, średnia ocen: <?=$row['reviews']/10 ?></small>
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
