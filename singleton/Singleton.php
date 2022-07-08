<?php
/**
 * Singleton Pattern: ensure that a class has only one instance, while providing a global access point to this instance.
 * Problem:
 *      1.Ensure that a class has just a single instance.
 *      2.Provide a global access point to that instance.
 * Solution provided as following:
 */

class Amadeus
{
    private string $token;
    public Shopping $shopping;

    public function __construct()
    {
        $this->token = bin2hex(random_bytes(10));
        $this->shopping = new Shopping();
    }

    public function getToken()
    {
        return $this->token;
    }

}

class Shopping {}

class SingletonCase
{
    public static $instance;
    private Amadeus $amadeus;

    /**
     * Step1
     *      Make the default constructor private,
     *      to prevent other objects from using the new operator with the Singleton class.
     */
    private function __construct()
    {
        $this->amadeus = new Amadeus();
    }

    /**
     * Step2
     *      Create a static creation method that acts as a constructor.
     *      Under the hood, this method calls the private constructor to create an object and saves it in a static field.
     *      All following calls to this method return the cached object.
     */
    public static function getInstance()
    {
        if (!isset(SingletonCase::$instance))
            SingletonCase::$instance = new SingletonCase();

        return SingletonCase::$instance;
    }
}

/**
 * If your code has access to the Singleton class,
 * then it’s able to call the Singleton’s static method.
 * So whenever that method is called, the same object is always returned.
 */
$client1 = SingletonCase::getInstance();
$client2 = SingletonCase::getInstance();
$client3 = SingletonCase::getInstance();
//$client4 = new SingletonCase();
//$client5 = new SingletonCase();


var_dump($client1);
var_dump($client2);
var_dump($client3);
//var_dump($client4);
//var_dump($client5);
