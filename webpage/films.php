<?php require_once("config.php") ?>
<!doctype html>

<html lang="pl">
<head>
  <meta charset="utf-8">

  <title>Baza filmów</title>
  <meta name="description" content="Description">
  <meta name="author" content="Author">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<style>
.dataTables_length {
display: none;
}
.dataTables_info {
display: none;
}
.dataTables_filter {
text-align: left !important;
}

label {
display: block;
float: left;
width: 100%;
}


</style>
<script>

$(document).ready(function() {
    $('#filmsTable').DataTable({
		"dom": '<"top"f>rt<"bottom"p><"clear">',
    "pagingType": "simple_numbers", // "simple" option for 'Previous' and 'Next' buttons only
	"pageLength": 20,

	"oLanguage": {

		"sSearch": "Wyszukaj",
		"sZeroRecords": "Brak wyników :(",

		"oPaginate":{
			"sNext": "Następna",
			"sPrevious" : "Poprzednia"
		}


}
  });


}

);

</script>
</head>

<body>
<?php  include("header.php") ?>
<main style="min-height: 900px">

  <div class="container bg-white">
    <h2>
		Lista filmów
    </h2>
    <hr class="col-xs-12">
    <div class="row">

	<table id="filmsTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Tytuł</th>
      <th class="th-sm">Reżyseria</th>
      <th class="th-sm">Długość (minuty)</th>
      <th class="th-sm">Średnia ocen</th>
    </tr>
  </thead>
  <tbody>
  	<?php
$query = "SELECT * FROM films_film, directors where films_film.directorId = directors.directorId";

if ($result = $conn->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
		echo "<tr class='hov'>";
		echo "<td class='p-3 py-4'><a href='movie.php?id=".$row['id']."'>".$row['title']."</a></td>";
		echo "<td class='p-3 py-4'>".$row['name']."</td>";
		echo "<td class='p-3 py-4'>".$row['runtime']."</td>";
		echo "<td class='p-3 py-4'>".($row['reviews']/10)."</td>";
		echo "</tr>";
    }

    /* free result set */
    $result->free();
}

/* close connection */
$conn->close();

	?>


  </tbody>
</table>
    </div>
  </div>


</main>
</body>

</html>
