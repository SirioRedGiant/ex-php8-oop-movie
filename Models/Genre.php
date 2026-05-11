<?php

class Genre
{
    public string $type;

    public function __construct(string $_type)
    {
        $this->type = $_type;
    }
}
