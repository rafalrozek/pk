<?php require_once 'config.php'; ?>

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
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
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
            <a class="nav-link" href="#">Filmy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Recenzje</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="account.php">Konto</a>
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

  <div class="container">
    <h3 class="display-5">
      Najnowsze filmy
    </h3>
    <hr class="col-xs-12">
    <div class="row">
      <?php
        $sql = "SELECT movie_id, title, poster, release_date FROM movie ORDER BY release_date DESC LIMIT 4";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
      ?>
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="card">
              <img class="card-img-top" src=<?php echo $row["poster"]; ?> alt="Card image cap">
              <div class="card-body">
                <p class="card-text"><a href=movie.php?id=<?php echo $row["movie_id"]; ?>><?php echo $row["title"]; ?></a> <?php echo date('Y', strtotime($row["release_date"])); ?></p>
              </div>
            </div>
          </div>
      <?php
          }
        }
      ?>
    </div>
  </div>

  <div class="container">
    <h3 class="display-5">
      Ostatnio dodane filmy
    </h3>
    <hr class="col-xs-12">
    <div class="row">
      <?php
        $sql = "SELECT movie_id, title, poster, release_date FROM movie ORDER BY added DESC LIMIT 4";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
      ?>
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="card">
              <img class="card-img-top" src=<?php echo $row["poster"]; ?> alt="Card image cap">
              <div class="card-body">
                <p class="card-text"><a href=movie.php?id=<?php echo $row["movie_id"]; ?>><?php echo $row["title"]; ?></a> <?php echo date('Y', strtotime($row["release_date"])); ?></p>
              </div>
            </div>
          </div>
      <?php
          }
        }
      ?>
    </div>
  </div>


  <div class="container">
    <h3 class="display-5">
      Najpopularniejsze filmy
      <small class="text-muted">według naszych użytkowników</small>
    </h3>
    <hr class="col-xs-12">
    <div class="row">
      <?php
        $sql = "SELECT movie_id, title, poster, release_date FROM movie LIMIT 4"; //todo sortowanie na podstawie recenzji użytkowników
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
      ?>
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="card">
              <img class="card-img-top" src=<?php echo $row["poster"]; ?> alt="Card image cap">
              <div class="card-body">
                <p class="card-text"><a href=movie.php?id=<?php echo $row["movie_id"]; ?>><?php echo $row["title"]; ?></a> <?php echo date('Y', strtotime($row["release_date"])); ?></p>
              </div>
            </div>
          </div>
      <?php
          }
        }
      ?>
    </div>
  </div>

</main>
</body>
</html>
