<?php

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
