<?php


class Documentary extends Movie
{

    protected string $narrator;

    public function __construct(string $_title, string $_author, int $_year, array $_genres, string $_narrator, float $_price = 9.99, float $_stars = 4.5)
    {

        //parent::__construct --> per richiamare il costruttore della classe Movie che è il genitore
        parent::__construct($_title, $_author, $_year, $_genres, $_price, $_stars);


        $this->narrator = $_narrator;
    }

    public function getNarrator(): string
    {
        return $this->narrator;
    }

    //^ OVERRIDE del metodo getFullMovieDetails()
    #[Override]
    public function getFullMovieDetails()
    {
        return parent::getFullMovieDetails() . " | Narrato da: <strong>{$this->narrator}</strong>";
    }
}
