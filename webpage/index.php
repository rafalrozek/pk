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
.dataTables_filter {
display: none;
}
.dataTables_length {
display: none;
}
.dataTables_info {
display: none;
}
</style>
	<script>

$(document).ready(function() {
    $('#filmsTable').DataTable({
    "pagingType": "simple_numbers" // "simple" option for 'Previous' and 'Next' buttons only
  });
} );

</script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Baza filmów</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="films.php">Filmy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Recenzje</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="panel.php">Panel Administratora</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
          <input class="form-control mr-sm-2" type="search" placeholder="Wprowadź tytuł filmu" name="searchedTitle">
          <button class="btn btn-primary" type="submit">Szukaj</button>
        </form>
      </div>
    </nav>
  </header>
<main>
  <div class="container">
    <div class="card mb-3">
    <img class="card-img-top random_movie" src="images/background.jpg" height="400" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><a href="movie.php?id=4">Forrest Gump</a></h5>
      <p class="card-text">Forrest Gump, 1994, 2 godz. 22 min.</p>
    </div>
  </div>
</div>


</main>
</body>

</html>
