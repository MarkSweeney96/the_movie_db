<?php
require_once 'Connection.php';
require_once 'Movie.php';

try {
    $movie = Movie::all();
}
catch (Exception $e) {
    die("Exception: " . $e->getMessage());
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>the movie db</title>
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
                    <div class="col-md-12">
                        <h1 class="mdb"> <img src="images/movie.png"> the movie db</h1>
                        <table  id="example" class="table table-striped">
                            <thead>
                                <tr class="table_top">
                                    <th>Title</th>
                                    <th>Genre</th>
                                    <th>Date</th>
                                    <th>Runtime</th>
                                    <th>Rating</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($movie as $m) { ?>
                                    <tr>
                                        <td><?= $m->title; ?></td>
                                        <td><?= $m->genre; ?></td>
                                        <td>
                                          <?php echo substr("$m->releaseDate",8,10) .
                                          "/" . substr("$m->releaseDate",5,2) .
                                          "/" . substr("$m->releaseDate",2,2); ?>
                                        </td>
                                        <td><?= $m->runtime; ?> mins</td>
                                        <td><?= $m->ageRating; ?></td>
                                        <td>
                                            <a href="view.php?id=<?= $m->id; ?>" class="btn btn-info">View</a>
                                            <a href="edit.php?id=<?= $m->id; ?>" class="btn btn-warning">Edit</a>
                                            <a href="delete.php?id=<?= $m->id; ?>" onclick="deleteButton()" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="create.php" class="btn btn-primary">Add</a>
                        <h6 class="cr">&copy; 2018 the movie db</h6>
                    </div>
                </div>
            </div>
        </div>

        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script>
        $(document).ready(function() {
          $('#example').DataTable();
        } );
      </script>

    </body>
</html>
