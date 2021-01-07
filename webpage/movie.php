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
  <div class="container bg-white mb-4" style="min-height: 800px">
	
  	<?php
	//nowy komentarz
	if (!empty($_POST["nazwa"])) {
		$id = $_GET["id"];
		$nazwa = $_POST["nazwa"];
		$komentarz = $_POST["komentarz"];
		$sql = "INSERT INTO comments (filmid, author, comment) VALUES ($id,'$nazwa','$komentarz')";

		if ($conn->query($sql) === TRUE) {
			echo "<div class='alert alert-success' role='alert'>Dodano komentarz!</div>";
		}
		else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
$query = "SELECT * FROM films_film JOIN directors ON films_film.directorId = directors.directorId where films_film.id= ".$_GET['id']." LIMIT 1";

if ($result = $conn->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
?>
 <h2><?= $row['title']?></h2>
  <hr />
<div class="container border mt-4">
      <div class="row">
		<div>
		<div style="width: 150px; height: 150px; background-color: lightgray; display: block; float: left" class="my-3 m-3"> </div>
		<div class="p-3" style="display: block">
			<p><?=$row['description']?></p>
			<p>Reż: <?=$row['name']?></p>
			<small><?=$row['release_date']?>, <?=$row['runtime']?> min, średnia ocen: <?=$row['reviews']/10 ?></small>
			<div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
			</div>
        </div>
		</div>
	 </div>
</div>
<h3 class="mt-4">Komentarze</h3>
<hr />
<?php
    }

    /* free result set */
    $result->free();
}

/* close connection */


$query = "SELECT * FROM comments WHERE filmId=".$_GET['id']." ORDER BY date DESC";
if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
?>
	
<div class="mx-4 bg-light p-3 my-3">
<p class="my-0"><u><?=$row['author']?></u></p>
<p class="small" style=""><?=$row['date']?></p>
<p><?=$row['comment']?></p>
</div>

<?
	}
}
?>

<div class="mx-4 bg-light p-3 my-3">
<p class="my-0"><u>Rafał</u></p>
<p class="small" style="">2021-01-07</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at dictum justo, sit amet aliquam elit. Donec imperdiet dictum fringilla. Aliquam libero libero, tempus et tellus ut, fringilla efficitur libero</p>
</div>

<h5 class="mt-4 text-center">Dodaj komentarz</h5>
<form class="mt-2" method="POST" action="">
	<div class="form-group mx-5">
	<input type="text" class="form-control" id="nazwa" placeholder="Nazwa" name="nazwa"/>
	<textarea  class="form-control mt-1" id="komentarz" name="komentarz" placeholder="Komentarz" rows="3"></textarea>
	<button class="btn btn-light d-block mx-auto mt-1" type="submit">Wyślij</button>
	</div>

</form>


</div>
</div>
</main>
</body>

</html>
