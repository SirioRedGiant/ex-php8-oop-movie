<?php
trait Rating
{
    protected float $stars;

    public function getStarsHtmlRender()
    {
        return str_repeat("⭐", $this->stars);
    }

    public function setStars(float $_stars): void
    {
        // le stelle devono essere comprese tra 1 e 5
        if ($_stars >= 1 && $_stars <= 5) {
            $this->stars = $_stars;
        }
    }
}
