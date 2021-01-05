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

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


</head>
<body>
<?php  include("header.php") ?>
<main>
    <div class="container">

		<?php
			$query = "SELECT * FROM `films_film` WHERE id=(SELECT MAX(id) FROM `films_film`)";
			if ($result = $conn->query($query)) {
				$row = $result->fetch_assoc();
				$last_id = $row['id'];
			}
			$randomFilmId = rand(1, $last_id);
			$query = "SELECT * FROM films_film where id=" . $randomFilmId;
			if ($result = $conn->query($query)) {
				$row = $result->fetch_assoc();
		?>
    <div class="card mb-3">
    <div class="card-img-top random_movie"  style="height: 300px; background-color: lightgray;" alt="Card image cap"></div>
    <div class="card-body">
      <h5 class="card-title"><a href="movie.php?id=<?=$row['id']?>"><?=$row['title']?></a></h5>
      <p class="card-text"><?=$row['release_date']?>, <?=$row['runtime']?> min</p>
    </div>
  </div>
	<?php
		$result->free();
		}
	?>
  <h2>Ostatnio dodane</h2>
  <hr />
    	<?php
$query = "SELECT * FROM films_film ORDER BY id DESC LIMIT 4";

if ($result = $conn->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {

?>
<div class="container border mt-4">
      <div class="row">
		<div>
		<div style="width: 150px; height: 150px; background-color: lightgray; display: block; float: left" class="my-3 m-3"> </div>
		<div class="p-3" style="display: block">
			<h3><a href="movie.php?id=<?=$row['id']?>"><?=$row['title']?></a></h3>
			<hr />
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at nibh blandit, convallis sapien nec, faucibus sapien. Aenean fringilla, est in dignissim facilisis, ipsum neque rhoncus nisi, at dignissim odio metus eget tortor. </p>
			<small>2020, Reż: Gall Anonim, 190 min.</small>
        </div>
		</div>

	 </div>
</div>

<?
    }

    /* free result set */
    $result->free();
}

/* close connection */
$conn->close();

	?>



</div>



</main>
</body>

</html>
