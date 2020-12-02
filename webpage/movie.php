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
      <?php
        $id = intval($_GET['id']);
        $sql = "SELECT movie_id, title, original_title, genre, description, poster, release_date, duration, added FROM movie WHERE movie_id = " . $id;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
      ?>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4"><?php echo $row["title"] ?></h1>
          <p class="lead"><?php echo $row["original_title"] . ",\t" . date('Y', strtotime($row["release_date"])) . ",\t" . floor($row["duration"] / 60) . " godz. " . $row["duration"] % 60 . " min."; ?></p>
        </div>
      </div>
      <div class="container">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="<?php echo $row["poster"] ?>" class="card-img" alt="poster">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <p class="card-text"><?php echo $row["description"] ?></p>
                <p class="font-weight-light">Gatunek: <b><?php echo $row["genre"] ?></b></p>
                <p class="font-weight-light">Premiera: <b><?php echo $row["release_date"] ?></b></p>
                <p class="card-text"><small class="text-muted">Dodano: <?php echo $row["added"] ?></small></p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>
  </body>

</html>
