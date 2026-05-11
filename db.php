<?php

//note l'ordine è importante -> I Traits devono essere dichiarati prima della classe che li utilizza
require_once "./Models/Genre.php";
require_once "./Traits/Discountable.php";
require_once "./Traits/Rating.php";
require_once "./Models/Movie.php";

//^ DATI DELLE VARIE ISTANZE

$action = new Genre("Azione");
$sciFi = new Genre("Fantascienza");
$comedy = new Genre("Commedia");
$thriller = new Genre("Thriller");

$movieList = [
    new Movie("Inception", "Christopher Nolan", 2010, [$action, $thriller, $sciFi]),
    new Movie("Pulp Fiction", "Quentin Tarantino", 1994, [$action, $thriller]),
    new Movie("Ace Ventura: Pet Detective", "Jack Bernstein", 1994, [$comedy], _stars: 4), // NAMED ARGOUMENT -> oppure potevo fare $movie3->stars -> 4; per sovrascrivere il valore subito dopo
    new Movie("Dune: Part Two", "D. Villeneuve", 2024, [$sciFi, $action], 25.00, 5)
];

//note FILM CON PREZZO SPECIALE E/O RATING ALTO


// //^ metodi in variabile
// $prezzoScontatoAnziani = $movie1->getDiscountedTicketPrice(70);
// $prezzoScontatoGiovani = $movie1->getDiscountedTicketPrice(16);
// $prezzoBase = $movie1->getDiscountedTicketPrice(30);

// //^ VARI OUTPUT

// echo $movie1->getFullMovieDetails() . "<br>";
// echo "Prezzo Intero: " . number_format($movie1->basePrice, 2) . "$ | Sconto Anziani: " . number_format($prezzoScontatoAnziani, 2) . "$ | Sconto Giovani: " . number_format($prezzoScontatoGiovani, 2) . "$<br><br>";
// echo $movie2->getFullMovieDetails() . "<br>";
// echo "Prezzo Intero: " . number_format($movie2->basePrice, 2) . "$ | Sconto Anziani: " . number_format($prezzoScontatoAnziani, 2) . "$ | Sconto Giovani: " . number_format($prezzoScontatoGiovani, 2) . "$<br><br>";
// echo $movie3->getFullMovieDetails() . "<br>";
// echo "Prezzo Intero: " . number_format($movie3->basePrice, 2) . "$ | Sconto Anziani: " . number_format($prezzoScontatoAnziani, 2) . "$ | Sconto Giovani: " . number_format($prezzoScontatoGiovani, 2) . "$<br><br>";

// echo $movie4->getFullMovieDetails() . "<br>";
// echo "Prezzo Intero (Speciale): " . number_format($movie4->basePrice, 2) . "$ | Sconto Anziani: " . number_format($prezzoScontatoAnziani, 2) . "$ | Sconto Giovani: " . number_format($prezzoScontatoGiovani, 2) . "$<br><br>";
