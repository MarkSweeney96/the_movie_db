<?php
require_once 'Connection.php';
require_once 'Movie.php';

try {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($id === FALSE || $id === NULL) {
        throw new Exception("Invalid movie id");
    }
    $movie = Movie::find($id);
    if ($course === FALSE) {
        throw new Exception("Movie not found");
    }

    $movie->delete();

    header("Location: index.php");
}
catch (Exception $e) {
    die("Exception: " . $e->getMessage());
}
?>
