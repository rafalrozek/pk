
<?php
session_start();
?>

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
<?php
if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: panel.php");
}
    
if($_SESSION["loggedin"] == true){
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-light from-wrapper">
            <div class="container block-center">
                <p class="text-center h1">Dodaj film.</p>
                [<a href="?logout" class="text-center">
                 Wyloguj się.
                </a>]
                            <form class="mt-4" method="post" action="panel.php">
                                <h5>Film</h5>
                                <hr class="m-0" />
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                    <small class="form-text text-muted">Tytuł</small>
                                    <input type="text" class="form-control" name="title" id="title" value="" placeholder="Tytuł">
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                    <small class="form-text text-muted">Opis</small>
                                    <textarea class="form-control" name="password" id="password" value="" >  </textarea>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                    <small class="form-text text-muted">Długość (minuty)</small>
                                    <input type="number" class="form-control" name="title" id="title" value="" placeholder="60">
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                    <small class="form-text text-muted">Reżyser</small>
                                    <input type="text" class="form-control" name="title" id="title" value="" placeholder="Reżyser">
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                    <small class="form-text text-muted">Kategoria</small>
                                    <input type="text" class="form-control" name="title" id="title" value="" placeholder="Kategoria">
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary d-block mx-auto px-4">Dodaj</button>
                            </form> 
            </div>
        </div>
    </div>
</div>
<?php
exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["login"]) && isset($_POST["password"])){
        if($_POST['login'] == 'admin' && $_POST['password'] == 'admin'){
            //correct login
            unset($_POST);
            $_SESSION["loggedin"] = true;
            header("Location: panel.php");
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-light from-wrapper">
            <div class="container block-center">
                <p class="text-center h1">Zaloguj się.</p>
                [<a href="index.php" class="text-center">
                 Wróć.
                </a>]
                            <form class="mt-4" method="post" action="panel.php">
                                <h5>Logowanie</h5>
                                <hr class="m-0" />
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                    <small class="form-text text-muted"></small>
                                    <input type="text" class="form-control" name="login" id="login" value="" placeholder="Login">
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                    <small class="form-text text-muted"></small>
                                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Hasło">
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary d-block mx-auto px-4">Zaloguj</button>
                            </form> 
            </div>
        </div>
    </div>
</div>
</body>
</html>
    