<?php

class Genre
{
    public string $type;

    public function __construct(string $_type)
    {
        $this->type = $_type;
    }
}


class Movie
{

    public string $title;
    public string $author;
    public int $year;
    public array $genres;


    public function __construct(string $_title, string $_author, int $_year, array $_genres)
    {
        $this->title = $_title;
        $this->author = $_author;
        $this->year = $_year;
        $this->genres = $_genres;
    }

    public function getMovieGenresList(): string
    {
        $genreNames = [];
        foreach ($this->genres as $genre) {
            $genreNames[] = $genre->type;
        }
        return implode(", ", $genreNames);
    }


    public function getFullMovieDetails()
    {
        return "Film: {$this->title}, Regia: {$this->author} ({$this->year}) -> Generi: {$this->getMovieGenresList()}";
    }
}


$action = new Genre("Azione");
$sciFi = new Genre("Fantascienza");
$comedy = new Genre("Commedia");
$thriller = new Genre("Thriller");


$movie1 = new Movie("Inception", "Christopher Nolan", 2010, [$action, $thriller, $sciFi]);
$movie2 = new Movie("Pulp Fiction", "Quentin Tarantino", 1994, [$action, $thriller]);
$movie3 = new Movie("Ace Ventura: Pet Detective", "Jack Bernstein", 1994, [$comedy]);


echo $movie1->getFullMovieDetails() . "<br>";
echo $movie2->getFullMovieDetails() . "<br>";
echo $movie3->getFullMovieDetails() . "<br>";
