<?php
require_once 'Connection.php';
require_once 'Movie.php';

try {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($id === FALSE || $id === NULL) {
        throw new Exception("Invalid movie id");
    }

    $movie = Movie::find($id);
    if ($movie === FALSE) {
        throw new Exception("Movie not found");
    }
}
catch (Exception $e) {
    die("Exception: " . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <title><?= $movie->title; ?> <?php echo "(" . substr("$movie->releaseDate",0,4) .")" ?></title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.css">
       <link rel="stylesheet" href="css/mystyle.css">
        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <div class="container">
                <div class="row">

                        <!-- <h1 class="mdb"> <img src="images/movie.png"> <?= $movie->title . " (" . substr("$movie->releaseDate",0,4) .")"; ?></h1> -->
                        <table class="table table-hover">
                            <tbody>
                              <div class="col-md-3 view_mov">
                                    <img src="<?= $movie->poster; ?>" class="poster" alt="<?= $movie->title; ?> Poster NOT FOUND">
                              </div>

                              <div class="col-md-9 view_mov">

                                    <!-- <td class="field_name">Title</td> -->
                                    <h1 class="mov_title"><?= $movie->title . " (" . substr("$movie->releaseDate",0,4) .")"; ?></h1>
                                  Genre: <text class="b"><?= $movie->genre; ?></text>
                                  <br>
                                  Released on <text class="b"><?php echo substr("$movie->releaseDate",8,10) . "/" . substr("$movie->releaseDate",5,2) . "/" . substr("$movie->releaseDate",2,2); ?></text>
                                  <?php
                                  $day = substr("$movie->releaseDate",8,10);
                                  $day = $day+0;
                                  $year = substr("$movie->releaseDate",0,4);

                                  $month = substr("$movie->releaseDate",5,2);
                                  $month = $month+0;
                                  $month_name;
                                  // echo("month is: ".$month);
                                  if ($month == 1){$month_name="January";}
                                  else if ($month == 2){$month_name="February";}
                                  else if ($month == 3){$month_name="March";}
                                  else if ($month == 4){$month_name="April";}
                                  else if ($month == 5){$month_name="May";}
                                  else if ($month == 6){$month_name="June";}
                                  else if ($month == 7){$month_name="July";}
                                  else if ($month == 8){$month_name="August";}
                                  else if ($month == 9){$month_name="September";}
                                  else if ($month == 10){$month_name="October";}
                                  else if ($month == 11){$month_name="November";}
                                  else if ($month == 12){$month_name="December";}
                                  else echo("N/A");
                                  $day1;
                                  if ($day == 1 || $day == 21 || $day == 31){$day1="st";}
                                  else if ($day == 2 || $day == 22){$day1="nd";}
                                  else if ($day == 3 || $day == 23){$day1="rd";}
                                  else{$day1="th";}
                                  echo ("(" . $day . $day1 . " " . $month_name . " " . $year . ")");
                                   ?>
                                  <br>
                                  Rated <text class="b"><?= $movie->ageRating; ?></text>
                                  <br>
                                  Runtime <text class="b"><?= $movie->runtime; ?> mins</text>
                                  <?php

                                  $total = $movie->runtime;
                                  $total=   $total +0;
                                  $hrs=0;
                                  $mins=0;
                                  if($total / 60 <2 ){$hrs=1;}
                                  else if($total / 60 <3 ){$hrs=2;}
                                  else if($total / 60 <4 ){$hrs=3;}
                                  $hours = floor($hrs);
                                  $hrs_to_mins=$hours*60;
                                  $mins = ($total - $hrs_to_mins);
                                  if($hours>1){echo("(" . $hours . " hrs " . $mins . " mins)");}
                                  else {echo("(" . $hours . " hr " . $mins . " mins)");}
                                  ?>
                                  <br>
                                  <text class="stars">
                                  <?php
                                  if($movie->starRating == 5){
                                    echo("★★★★★");
                                  } else if($movie->starRating == 4){
                                    echo("★★★★");
                                  } else if($movie->starRating == 3){
                                    echo("★★★");
                                  } else if($movie->starRating == 2){
                                    echo("★★");
                                  } else if($movie->starRating == 1){
                                    echo("★");
                                  } else {
                                    echo("Star Rating N/A");
                                  }
                                  ?>
                                </text>
                                  <br><br>
                                  <?= $movie->storyline; ?>
                              <div class="col-md-12">
                                <tr>
                                    <!-- <td class="field_name">Trailer</td> -->
                                   <td class="yt_trailer">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($movie->trailer, 32); ?>" frameborder="0" allowfullscreen></iframe>
                                       </td>
                                </tr>
                              </div>
                            </tbody>
                        </table>
                        <div class=btns>
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                        <a href="edit.php?id=<?= $movie->id; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?= $movie->id; ?>" class="btn btn-danger">Delete</a>
                        <div>
                        <h6 class="cr">&copy; 2018 the movie db</h6>

                </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
