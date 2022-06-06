<?php

/**
 * Decorator is a structural design pattern
 *  that lets you attach new behaviors to objects
 *      by placing these objects inside special wrapper objects that contain the behaviors.
 */

interface CarService
{
    public function getCost();
    public function getDescription();
}

class BasicInspection implements CarService
{
    public function getCost()
    {
        return 15;
    }

    public function getDescription()
    {
        return "Basic inspection";
    }
}

class OilChange implements CarService
{
    protected $carService;

    function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 25 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ", and a oil change";
    }
}

class TireRotation implements CarService
{
    protected $carService;

    function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 30 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ", and a tire rotation";
    }
}

print (new BasicInspection())->getCost() . "\n";
print (new OilChange(new BasicInspection()))->getCost() . "\n";
print (new TireRotation(new BasicInspection()))->getCost() . "\n";
print (new TireRotation(new OilChange(new BasicInspection())))->getCost() . "\n";

print (new BasicInspection())->getDescription() . "\n";
print (new OilChange(new BasicInspection()))->getDescription() . "\n";
print (new TireRotation(new BasicInspection()))->getDescription() . "\n";
print (new TireRotation(new OilChange(new BasicInspection())))->getDescription() . "\n";

