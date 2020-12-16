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


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
<main>

  <div class="container">
    <h2>
		Lista filmów
    </h2>
    <hr class="col-xs-12">
    <div class="row">

	<table id="filmsTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Tytuł</th>
      <th class="th-sm">Długość (minuty)</th>
      <th class="th-sm">Średnia ocen</th>
    </tr>
  </thead>
  <tbody>
  	<?php
$query = "SELECT * FROM films_film ";

if ($result = $conn->query($query)) {
	
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td><a href='movie.php?id=".$row['id']."'>".$row['title']."</a></td>";
		echo "<td>".$row['runtime']."</td>";
		echo "<td>".($row['reviews']/10)."</td>";
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
