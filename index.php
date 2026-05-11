<?php


class Movie
{

    public string $title;
    public string $author;
    public int $year;


    public function __construct(string $_title, string $_author, int $_year)
    {
        $this->title = $_title;
        $this->author = $_author;
        $this->year = $_year;
    }


    public function getFullMovieDetails()
    {
        return "Film: {$this->title}, Regia: {$this->author} ({$this->year})";
    }
}


$movie1 = new Movie("Inception", "Christopher Nolan", 2010);
$movie2 = new Movie("Pulp Fiction", "Quentin Tarantino", 1994);
$movie3 = new Movie("Ace Ventura: Pet Detective", "Jack Bernstein", 1994);


echo $movie1->getFullMovieDetails() . "<br>";
echo $movie2->getFullMovieDetails() . "<br>";
echo $movie3->getFullMovieDetails() . "<br>";
