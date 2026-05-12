<?php
trait Discountable
{
    protected float $basePrice = 14.99;


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

    public function setBasePrice(float $_price): void
    {
        if ($_price > 0) {
            $this->basePrice = $_price;
        }
    }
    public function getBasePrice(): float
    {
        return $this->basePrice;
    }
}
