<?php

class CarServices
{
    protected $costs = 15;

    public function getCosts()
    {
        return $this->costs;
    }

    public function withOilChange()
    {
        $this->costs += 25;
    }

    public function withTireRotation()
    {
        $this->costs += 30;
    }
}

$service = new CarServices();
print $service->getCosts() . "\n";

$service->withOilChange();
print  $service->getCosts() . "\n";