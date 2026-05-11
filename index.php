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
    public float $basePrice = 14.99;


    public function getDiscountedTicketPrice($age): float
    {
        if ($age >= 70) {
            return $this->basePrice * 0.8;
        }
        if ($age <= 16) {
            return $this->basePrice * 0.7;
        }
        return $this->basePrice;
    }
}

trait Rating
{
    public int $stars;

    public function getStarsHtmlRender()
    {
        return str_repeat("⭐", $this->stars);
    }
}


class Movie
{
    use Discountable, Rating;

    public string $title;
    public string $author;
    public int $year;
    public array $genres;


    public function __construct(string $_title, string $_author, int $_year, array $_genres, float $_price = 14.99, int $_stars = 3)
    {
        $this->title = $_title;
        $this->author = $_author;
        $this->year = $_year;
        $this->genres = $_genres;
        $this->basePrice = $_price; // modifica del valore di partenza del prezzo per renderlo dinamico, il metodo del trait rimane
        $this->stars = $_stars;
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
        return "Film: {$this->title}, Regia: {$this->author} ({$this->year}) -> Generi: {$this->getMovieGenresList()} <br>" . "Valutazione : {$this->getStarsHtmlRender()}";
    }
}


//^ DATI DELLE VARIE ISTANZE

$action = new Genre("Azione");
$sciFi = new Genre("Fantascienza");
$comedy = new Genre("Commedia");
$thriller = new Genre("Thriller");


$movie1 = new Movie("Inception", "Christopher Nolan", 2010, [$action, $thriller, $sciFi]);
$movie2 = new Movie("Pulp Fiction", "Quentin Tarantino", 1994, [$action, $thriller]);
$movie3 = new Movie("Ace Ventura: Pet Detective", "Jack Bernstein", 1994, [$comedy], _stars: 4); //oppure potevo fare $movie3->stars -> 4; per sovrascrivere il valore subito dopo


//note FILM CON PREZZO SPECIALE E/O RATING ALTO
$movie4 = new Movie("Dune: Part Two", "D. Villeneuve", 2024, [$sciFi, $action], 25.00, 5);


// metodi in variabile
$prezzoScontatoAnziani = $movie1->getDiscountedTicketPrice(70);
$prezzoScontatoGiovani = $movie1->getDiscountedTicketPrice(16);
$prezzoBase = $movie1->getDiscountedTicketPrice(30);

//^ VARI OUTPUT

echo $movie1->getFullMovieDetails() . "<br>";
echo "Prezzo Intero: " . number_format($movie1->basePrice, 2) . "$ | Sconto Anziani: " . number_format($prezzoScontatoAnziani, 2) . "$ | Sconto Giovani: " . number_format($prezzoScontatoGiovani, 2) . "$<br><br>";
echo $movie2->getFullMovieDetails() . "<br>";
echo "Prezzo Intero: " . number_format($movie2->basePrice, 2) . "$ | Sconto Anziani: " . number_format($prezzoScontatoAnziani, 2) . "$ | Sconto Giovani: " . number_format($prezzoScontatoGiovani, 2) . "$<br><br>";
echo $movie3->getFullMovieDetails() . "<br>";
echo "Prezzo Intero: " . number_format($movie3->basePrice, 2) . "$ | Sconto Anziani: " . number_format($prezzoScontatoAnziani, 2) . "$ | Sconto Giovani: " . number_format($prezzoScontatoGiovani, 2) . "$<br><br>";

echo $movie4->getFullMovieDetails() . "<br>";
echo "Prezzo Intero (Speciale): " . number_format($movie4->basePrice, 2) . "$ | Sconto Anziani: " . number_format($prezzoScontatoAnziani, 2) . "$ | Sconto Giovani: " . number_format($prezzoScontatoGiovani, 2) . "$<br><br>";
