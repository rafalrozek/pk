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


  	<?php
$query = "SELECT * FROM films_film WHERE id = ".$_GET['id']." LIMIT 1";

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
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at nibh blandit, convallis sapien nec, faucibus sapien. Aenean fringilla, est in dignissim facilisis, ipsum neque rhoncus nisi, at dignissim odio metus eget tortor. </p>
			<small>2020, Reż: Gall Anonim, 190 min.</small>
			<div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
			</div>
        </div>
		</div>
       
	 </div>
</div>

<?php
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
