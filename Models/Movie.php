<?php

class Movie
{
    use Discountable, Rating;

    public static int $movieCount = 0;

    private string $internalCode;
    protected string $title;
    protected string $author;
    protected int $year;
    protected array $genres;


    public function __construct(string $_title, string $_author, int $_year, array $_genres, float $_price = 14.99, float $_stars = 3)
    {
        $this->title = $_title;
        $this->author = $_author;
        $this->year = $_year;
        $this->genres = $_genres;
        $this->basePrice = $_price; // modifica del valore di partenza del prezzo per renderlo dinamico, il metodo del trait rimane
        $this->stars = $_stars;
        $this->setInternalCode();

        //ogni volta che verrà caricato un film il contatore aumenterà
        self::$movieCount++;
    }

    //metodo statico per accedere al contatore
    public static function getTotalMovies(): string
    {
        return "Al momento sono stati caricati " . self::$movieCount . " film nel catalogo.";
    }

    public function getInternalCode(): string
    {
        return $this->internalCode;
    }

    public function setInternalCode(): void
    {
        $this->internalCode = "MOV-" . $this->year . "-" . uniqid();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    //Setter => riceve un valore e dopo averlo controllato lo riassegna 
    public function setYear(int $_year): void
    {
        if ($_year < 1895 || $_year > 2026) {
            echo "Errore di compilazione: L'anno inserito non è valido";
        } else {
            $this->year = $_year;
        }
    }

    public function getYear(): int
    {
        return $this->year;
    }
    public function getGenres(): array
    {
        return $this->genres;
    }

    public function getMovieGenresList(): string
    {
        $genreNames = [];
        foreach ($this->genres as $genre) {
            $genreNames[] = $genre->getType();
        }
        return implode(", ", $genreNames);
    }


    public function getFullMovieDetails()
    {
        return "Film: {$this->title}, Regia: {$this->author} ({$this->year}) -> Generi: {$this->getMovieGenresList()} <br>" . "Valutazione : {$this->getStarsHtmlRender()}";
    }
}
