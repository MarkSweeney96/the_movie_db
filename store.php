<?php
require_once 'Connection.php';
require_once 'Movie.php';

try {
    $movie = new Movie();

    // without validation
    // $movie->poster = filter_input(INPUT_POST, 'poster', FILTER_SANITIZE_STRING);
    // $movie->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    // $movie->genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
    // $movie->releaseDate = filter_input(INPUT_POST, 'releaseDate', FILTER_SANITIZE_STRING);
    // $movie->ageRating = filter_input(INPUT_POST, 'ageRating', FILTER_SANITIZE_STRING);
    // $movie->starRating = filter_input(INPUT_POST, 'starRating', FILTER_SANITIZE_STRING);
    // $movie->runtime = filter_input(INPUT_POST, 'runtime', FILTER_SANITIZE_STRING);
    // $movie->storyline = filter_input(INPUT_POST, 'storyline', FILTER_SANITIZE_STRING);
    // $movie->trailer = filter_input(INPUT_POST, 'trailer', FILTER_SANITIZE_STRING);



    //----------------------------------------------------------------------------------------------------------
    // sanitize and validate poster image url
    //----------------------------------------------------------------------------------------------------------
    $movie->poster = filter_input(INPUT_POST, 'poster', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($movie->poster === NULL) {
        $errors['poster'] = 'poster field was missing';
    }
    else if ($movie->poster === FALSE) {
        $errors['poster'] = 'poster field was illegal';
    }
    else {
        //validate poster
        if ($movie->poster === "") {
            $errors['poster'] = 'poster is a required field';
        }
        else {
          $regexp = "/(?:(?:https?:\/\/))[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b(?:[-a-zA-Z0-9@:%_\+.~#?&\/=]*(\.jpg|\.png|\.jpeg))/";

          $options = array(
              "options" => array(
                  "regexp" => $regexp
              )
          );

          $poster_img = filter_var($movie->poster,
                             FILTER_VALIDATE_REGEXP,
                             $options
                            );

          if ($poster_img === FALSE) {
              $errors['poster'] = 'poster must be a valid image url ending with .jpg, .jpeg or .png';
          }

        }
    }
    //----------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------
    // sanitize and validate title
    //----------------------------------------------------------------------------------------------------------

    $movie->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    if ($movie->title === NULL) {
        $errors['title'] = 'title field was missing';
    }
    else if ($movie->title === FALSE) {
        $errors['title'] = 'title field was illegal';
    }
    else {
        //validate title
        if ($movie->title === "") {
            $errors['title'] = 'title is a required field';
        }
        else if (strlen($movie->title) < 2) {
            $errors['title'] = 'title must be at least 2 characters long';
        }
    }

    //----------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------
    // sanitize and validate genre
    //----------------------------------------------------------------------------------------------------------
    $movie->genre = filter_input(INPUT_POST,'genre',FILTER_SANITIZE_STRING);

    if ($movie->genre === NULL) {
    $errors['genre'] = 'genre field was missing';
    }
    else if ($movie->genre === FALSE) {
    $errors['genre'] = 'genre field was illegal';
    }
    else {
    //validate ageRating
    if ($movie->genre === "") {
    $errors['genre'] = 'genre is a required field';
    }
      else if ($movie->genre != 'Action' && $movie->genre != 'Adventure' && $movie->genre != 'Action and Adventure' &&
    $movie->genre != 'Animation' && $movie->genre != 'Anime' && $movie->genre != 'Biography' &&
   $movie->genre != 'Chick Flick' && $movie->genre != 'Comedy' && $movie->genre != 'Cult' && $movie->genre != 'Crime'
   && $movie->genre != 'Drama' && $movie->genre != 'Disaster' && $movie->genre != 'Documentary' && $movie->genre != 'Family'
   && $movie->genre != 'Fantasy' && $movie->genre != 'Fiction' && $movie->genre != 'Historical' && $movie->genre != 'Historical Period Drama'
   && $movie->genre != 'Historical Fiction' && $movie->genre != 'Horror' && $movie->genre != 'Mystery' && $movie->genre != 'Musical'
   && $movie->genre != 'Music' && $movie->genre != 'Political' && $movie->genre != 'Parody' && $movie->genre != 'Romance'
   && $movie->genre != 'Romantic Comedy' && $movie->genre != 'Rom-Com' && $movie->genre != 'Sci-Fi' && $movie->genre != 'Science Fiction'
   && $movie->genre != 'Superhero Movie' && $movie->genre != 'Thriller'
   && $movie->genre != 'War' && $movie->genre != 'Western'){
        $errors['genre'] = 'invalid genre. please choose one from the dropdown list or type a valid genre (case sensetive)';
      }

    }
    //----------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------
    // sanitize and validate date
    //----------------------------------------------------------------------------------------------------------
    $movie->releaseDate = filter_input(INPUT_POST, 'releaseDate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($movie->releaseDate === NULL) {
        $errors['releaseDate'] = 'release date field was missing';
    }
    else if ($movie->releaseDate === FALSE) {
        $errors['releaseDate'] = 'release date field was illegal';
    }
    else {
        //validate date
        if ($movie->releaseDate === "") {
            $errors['releaseDate'] = 'release date is a required field';
        }
        else {
          $regexp = "/^(19|20)([0-9]{2}-((0[13-9]|1[0-2])-(0[1-9]|[12][0-9]|30)|(0[13578]|1[02])-31|02-(0[1-9]|1[0-9]|2[0-8]))|([2468]0|[02468][48]|[13579][26])-02-29)$/";

          $options = array(
              "options" => array(
                  "regexp" => $regexp
              )
          );

          $date = filter_var($movie->releaseDate,
                             FILTER_VALIDATE_REGEXP,
                             $options
                            );

          if ($date === FALSE) {
              $errors['releaseDate'] = 'release date must be a valid date and in date format: yyyy-mm-dd';
          }

        }
    }

    //----------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------
    // sanitize and validate age rating
    //----------------------------------------------------------------------------------------------------------
    $movie->ageRating = filter_input(INPUT_POST,'ageRating',FILTER_SANITIZE_STRING );

    if ($movie->ageRating === NULL) {
    $errors['title'] = 'age rating field was missing';
    }
    else if ($movie->ageRating === FALSE) {
    $errors['ageRating'] = 'age rating field was illegal';
    }
    else {
    //validate ageRating
    if ($movie->ageRating === "") {
    $errors['ageRating'] = 'age rating is a required field';
    }
      else if ($movie->ageRating != 'G' && $movie->ageRating != 'PG'
              && $movie->ageRating != '12A' && $movie->ageRating != '15A'
              && $movie->ageRating != '16' && $movie->ageRating != '18'){
        $errors['ageRating'] = 'age rating must be one of the following values: G, PG, 12A, 15A, 16 or 18';
      }

    }


    //----------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------
    // sanitize and validate star rating
    //----------------------------------------------------------------------------------------------------------
    $movie->starRating = filter_input(INPUT_POST, 'starRating', FILTER_SANITIZE_STRING);
    if ($movie->starRating === NULL) {
        $errors['starRating'] = 'star rating field was missing';
    }
    else if ($movie->starRating === FALSE) {
        $errors['starRating'] = 'star rating field was illegal';
    }
    else {
        //validate star rating
        if ($movie->starRating === "") {
            $errors['starRating'] = 'star rating is a required field';
        }
        else {
          $starRating = filter_var($movie->starRating, FILTER_VALIDATE_INT);
          if ($starRating === FALSE) {
              $errors['starRating'] = 'star rating must be a real number';
          }
          else if ($starRating < 0) {
              $errors['starRating'] = 'star rating must be a non-negative number';
          }
          else if ($starRating >5) {
              $errors['starRating'] = 'star rating must be between 1 and 5 stars';
          }
          else if ($starRating <1) {
              $errors['starRating'] = 'star rating must be between 1 and 5 stars';
          }
          else {
              $movie->starRating = $starRating;
          }

        }
    }

    //----------------------------------------------------------------------------------------------------------


    //----------------------------------------------------------------------------------------------------------
    // sanitize and validate runtime
    //----------------------------------------------------------------------------------------------------------
    $movie->runtime = filter_input(INPUT_POST, 'runtime', FILTER_SANITIZE_STRING);
    if ($movie->runtime === NULL) {
        $errors['runtime'] = 'runtime field was missing';
    }
    else if ($movie->runtime === FALSE) {
        $errors['runtime'] = 'runtime field was illegal';
    }
    else {
        //validate runtime
        if ($movie->runtime === "") {
            $errors['runtime'] = 'runtime is a required field';
        }
        else {
          $runtime = filter_var($movie->runtime, FILTER_VALIDATE_INT);
          if ($runtime === FALSE) {
              $errors['runtime'] = 'runtime must be a real number';
          }
          else if ($runtime < 0) {
              $errors['runtime'] = 'runtime must be a non-negative number';
          }
          else if ($runtime >200) {
              $errors['runtime'] = 'runtime must be between 1 and 200 mins';
          }
          else if ($runtime <1) {
              $errors['runtime'] = 'runtime must be between 1 and 200 mins';
          }
          else {
              $movie->runtime = $runtime;
          }

        }
    }

    //----------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------
    // sanitize and validate storyline
    //----------------------------------------------------------------------------------------------------------
    $movie->storyline = filter_input(INPUT_POST, 'storyline', FILTER_SANITIZE_STRING);
    if ($movie->storyline === NULL) {
        $errors['storyline'] = 'storyline field was missing';
    }
    else if ($movie->storyline === FALSE) {
        $errors['storyline'] = 'storyline field was illegal';
    }
    else {
        //validate title
        if ($movie->storyline === "") {
            $errors['storyline'] = 'storyline is a required field';
        }
        else if (strlen($movie->storyline) < 20) {
            $errors['storyline'] = 'storyline must be at least 20 characters long';
        }
        else if (strlen($movie->storyline) > 1000) {
            $errors['storyline'] = 'storyline must not exceed 1000 characters in length';
        }

    }

    //----------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------
    // sanitize and validate poster youtube trailer url
    //----------------------------------------------------------------------------------------------------------
    $movie->trailer = filter_input(INPUT_POST, 'trailer', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($movie->trailer === NULL) {
        $errors['trailer'] = 'trailer field was missing';
    }
    else if ($movie->trailer === FALSE) {
        $errors['trailer'] = 'trailer field was illegal';
    }
    else {
        //validate trailer
        if ($movie->poster === "") {
            $errors['trailer'] = 'trailer is a required field';
        }
        else {
          $regexp = "/(?:(http|https):\/\/)?w{0,3}\.?youtu\.?be(?:(?:[^' '\n\r]+v=)|(?:[^' '\n\r&#]*\/))([^' '\n\r&#]+)(?:&[^' '\n\r]+)?/";

          $options = array(
              "options" => array(
                  "regexp" => $regexp
              )
          );

          $youtube_vid = filter_var($movie->trailer,
                             FILTER_VALIDATE_REGEXP,
                             $options
                            );

          if ($youtube_vid === FALSE) {
              $errors['trailer'] = 'trailer must be a valid YouTube video url. example - https://www.youtube.com/watch?v=cSp1dM2Vj48';
          }

        }
    }

    //----------------------------------------------------------------------------------------------------------

    // echo '<pre>';
    // print_r($movie);
    // echo '</pre>';


    //----------------------------------------------------------------------------------------------------------
    // check if there was any errors
    //----------------------------------------------------------------------------------------------------------
    if (empty($errors)) {
      $movie->save();
        // echo $movie->title;
        header("Location: index.php");
    }
    else {
        //echo $errors['title'];
        require 'create.php';
    }


    //
}
catch (Exception $e) {
    die("Exception: " . $e->getMessage());



}

?>
