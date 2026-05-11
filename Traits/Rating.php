<?php
trait Rating
{
    public int $stars;

    public function getStarsHtmlRender()
    {
        return str_repeat("⭐", $this->stars);
    }
}
