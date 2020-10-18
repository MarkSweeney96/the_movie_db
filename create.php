<?php

function error($key) {
    global $errors;

    if (isset($errors) && key_exists($key, $errors)) {
        echo $errors[$key];
    }
}

// saves old form data with errors
function old($key) {
    global $movie;

    if (isset($movie) && key_exists($key, $movie)) {
        echo $movie->$key;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Movies</title>
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
                    <h1 class="mdb"> <img src="images/movie.png"> add new movie</h1>
                    <form method="POST" action="store.php">
                        <div class="form-group">
                            <label class="field_name" for="poster">Poster</label>
                            <input type="text" id="poster" name="poster" value="<?php old('poster'); ?>" class="form-control">
                            <small id="poster-error" class="form-text form-muted err"><?php error('poster');?></small>
                        </div>
                        <div class="form-group">
                            <label class="field_name" for="title">Title</label>
                            <input type="text" id="title" name="title" value="<?php old('title'); ?>" class="form-control">
                            <small id="title-error" class="form-text form-muted err"><?php error('title');?></small>
                        </div>

                        <div class="form-group">
                            <label class="field_name" for="genre">Genre</label>
                              <input type="text" list="genres" id="genre" name="genre" value="<?php old('genre'); ?>" class="form-control">
                              <datalist id="genres">
                                <option value="Action">
                                <option value="Adventure">
                                <option value="Action and Adventure">
                                <option value="Animation">
                                <option value="Anime">
                                <option value="Biography">
                                <option value="Chick Flick">
                                <option value="Comedy">
                                <option value="Cult">
                                <option value="Crime">
                                <option value="Drama">
                                <option value="Disaster">
                                <option value="Documentary">
                                <option value="Family">
                                <option value="Fantasy">
                                <option value="Fiction">
                                <option value="Historical">
                                <option value="Historical Period Drama">
                                <option value="Historical Fiction">
                                <option value="Horror">
                                <option value="Mystery">
                                <option value="Musical">
                                <option value="Music">
                                <option value="Political">
                                <option value="Parody">
                                <option value="Romance">
                                <option value="Romantic Comedy">
                                <option value="Rom-Com">
                                <option value="Sci-Fi">
                                <option value="Science Fiction">
                                <option value="Superhero Movie">
                                <option value="Thriller">
                                <option value="War">
                                <option value="Western">
                                </datalist>
                              </datalist>
                            <small id="genre-error" class="form-text form-muted err"><?php error('genre');?></small>
                        </div>

                        <div class="form-group">
                            <label class="field_name" for="releaseDate">Release Date (YYYY-MM-DD)</label>
                            <input type="text" id="releaseDate" name="releaseDate" value="<?php old('releaseDate'); ?>" class="form-control">
                            <small id="releaseDate-error" class="form-text form-muted err"><?php error('releaseDate');?></small>
                        </div>
                        <div class="form-group">
                            <label class="field_name" for="ageRating">Age Rating</label>
                              <input type="text" id="ageRating" name="ageRating" value="<?php old('ageRating'); ?>" class="form-control">
                            <small id="ageRating-error" class="form-text form-muted err"><?php error('ageRating');?></small>
                        </div>

                            <div class="form-group">
                                <label class="field_name" for="starRating">Star Rating (1-5)</label>
                                <input type="text" id="starRating" name="starRating" value="<?php old('starRating'); ?>" class="form-control">
                                       <small id="starRating-error" class="form-text form-muted err"><?php error('starRating');?></small>
                            </div>
                        <div class="form-group">
                            <label class="field_name" for="runtime">Runtime (mins)</label>
                            <input type="text" id="runtime" name="runtime" value="<?php old('runtime'); ?>" class="form-control">
                            <small id="runtime-error" class="form-text form-muted err"><?php error('runtime');?></small>
                        </div>
                        <div class="form-group">
                            <label class="field_name" for="storyline">Storyline</label>
                            <input type="text" id="storyline" name="storyline" value="<?php old('storyline'); ?>" class="form-control">
                            <small id="storyline-error" class="form-text form-muted err"><?php error('storyline');?></small>
                        </div>
                        <div class="form-group">
                            <label class="field_name" for="trailer">YouTube Video Trailer</label>
                            <input type="text" id="trailer" name="trailer" value="<?php old('trailer'); ?>" class="form-control">
                            <small id="trailer-error" class="form-text form-muted err"><?php error('trailer');?></small>
                        </div>
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <h6 class="cr">&copy; 2018 the movie db</h6>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
