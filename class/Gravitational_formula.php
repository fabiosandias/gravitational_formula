<?php

class Gravitational_formula
{
    private $meterPerSecond;

    public function __construct($meterPerSecond)
    {
        $this->meterPerSecond = $meterPerSecond;
    }

    public function calculateSpeed($leg_length, $stride_length)
    {
        return (($stride_length / $leg_length) - 1) * sqrt($leg_length * $this->g());
    }

    private function g()
    {
        return pow($this->meterPerSecond, 2);
    }
}