<?php

class Genre
{
    public string $type;

    public function __construct(string $_type)
    {
        $this->type = $_type;
    }
}

trait Discountable
{
    public $basePrice = 14.99;


    public function getDiscountedTicketPrice($age)
    {
        if ($age >= 70) {
            return $this->basePrice * 0.8;
        }
        if ($age <= 16) {
            return $this->basePrice * 0.7;
        } else {
            return $this->basePrice;
        }
    }
}


class Movie
{
    use Discountable;

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

$prezzoScontatoAnziani = $movie1->getDiscountedTicketPrice(70);
$prezzoScontatoGiovani = $movie1->getDiscountedTicketPrice(16);
$prezzoBase = $movie1->getDiscountedTicketPrice(30);


echo $movie1->getFullMovieDetails() . "<br>";
echo $movie2->getFullMovieDetails() . "<br>";
echo $movie3->getFullMovieDetails() . "<br>";
echo "Prezzo per gli anziani(over 70) = " . number_format($prezzoScontatoAnziani, 2) . "$" . "<br>";
echo "Prezzo per i giovani(under 16) = " . number_format($prezzoScontatoGiovani, 2) . "$" . "<br>";
echo "Prezzo standard = " . number_format($prezzoBase, 2) . "$" . "<br>";
