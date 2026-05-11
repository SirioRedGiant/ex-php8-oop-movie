<?php
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
