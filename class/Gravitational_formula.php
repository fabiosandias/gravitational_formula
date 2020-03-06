<?php

class Gravitational_formula
{
    private $meterPerSecond;

    public function __construct($meterPerSecond)
    {
        $this->meterPerSecond = $meterPerSecond;
    }

    public function calculateSpeed($dp)
    {
        return (($dp['STRIDE_LENGTH'] / $dp['LEG_LENGTH']) - 1) * sqrt($dp['LEG_LENGTH'] * $this->g());
    }

    private function g()
    {
        return pow($this->meterPerSecond, 2);
    }
}