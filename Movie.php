<?php
class Movie {
    public $id;
    public $poster;
    public $title;
    public $genre;
    public $releaseDate;
    public $ageRating;
    public $starRating;
    public $runtime;
    public $storyline;
    public $trailer;

    public function save() {
        $params = array(
            'poster' => $this->poster,
            'title' => $this->title,
            'genre' => $this->genre,
            'releaseDate' => $this->releaseDate,
            'ageRating' => $this->ageRating,
            'starRating' => $this->starRating,
            'runtime' => $this->runtime,
            'storyline' => $this->storyline,
            'trailer' => $this->trailer
        );

         echo "saving";

        if ($this->id === NULL) {
            $sql = "INSERT INTO movies(
                        poster, title, genre, releaseDate, ageRating, starRating,
                        runtime, storyline, trailer
                    ) VALUES (
                        :poster, :title, :genre, :releaseDate, :ageRating, :starRating,
                        :runtime, :storyline, :trailer
                    )";
        }
        else if ($this->id !== NULL) {
            $params["id"] = $this->id;

            $sql = "UPDATE movies SET
                        poster = :poster,
                        title = :title,
                        genre = :genre,
                        releaseDate = :releaseDate,
                        ageRating = :ageRating,
                        starRating = :starRating,
                        runtime = :runtime,
                        storyline = :storyline,
                        trailer = :trailer

                        WHERE id = :id";
        }

        $conn = Connection::getInstance();
        $stmt = $conn->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to save movie");
        }
        else {
            $rowCount = $stmt->rowCount();
             echo " row count is " . $rowCount . " ";
            if ($rowCount > 1 && $rowCount < 0) {
                throw new Exception("Error saving movie");
            }
            else if ($this->id === NULL) {
                $this->id = $conn->lastInsertId('Movie');
            }
        }
    }

    public function delete() {
        if (empty($this->id)) {
            throw new Exception("Unsaved movie cannot be deleted");
        }
        $params = array(
            'id' => $this->id
        );
        $sql = 'DELETE FROM movies WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to delete movie");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error deleting movie");
            }
        }
    }

    public static function all() {
        $sql = 'SELECT * FROM movies';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve movies");
        }
        else {
            $movies = $stmt->fetchAll(PDO::FETCH_CLASS, 'Movie');
            return $movies;
        }
    }

    public static function find($id) {
        $params = array(
            'id' => $id
        );
        $sql = 'SELECT * FROM movies WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to retrieve movie");
        }
        else {
            $movie = $stmt->fetchObject('Movie');
            return $movie;
        }
    }
}
?>
