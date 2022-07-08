<?php

/**
 * Observer is a behavioral design pattern
 * that lets you define a subscription mechanism to notify multiple objects about any events that happen to the object they’re observing.
 */

/**
 * Look over your business logic and try to break it down into two parts:
 * the core functionality, independent from other code, will act as the publisher;
 * the rest will turn into a set of subscriber classes.
 */

// Publisher
interface Subject
{
    public function attach($observable);
    public function detach($index);
    public function notify();
}

// Subscriber
interface Observer
{
    public function handle();
}

class Login implements Subject
{
    protected $observers = [];

    public function attach($observable)
    {
        if (is_array($observable))
        {
            return $this->attachObservers($observable);
        }


        $this->observers[] = $observable;
        return $this;
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->handle();
        }
    }

    private function attachObservers($observable)
    {
        foreach($observable as $observer)
        {
            if(!$observer instanceof Observer)
                throw new Exception;

            $this->attach($observer);
        }
    }

    public function fire()
    {
        $this->notify();
    }
}

class LogHandler implements Observer
{
    public function handle()
    {
        var_dump("log something important.");
    }
}

class EmailNotifier implements Observer
{
    public function handle()
    {
        var_dump("fire off an email.");
    }
}

$login = new Login();
$login->attach([
    new LogHandler,
    new EmailNotifier
]);

$login->fire();

$login->detach(1);
$login->fire();