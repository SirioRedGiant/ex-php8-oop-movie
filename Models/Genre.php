<?php

class Genre
{
    protected string $type;

    public function __construct(string $_type)
    {
        $this->type = $_type;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
