<?php

// Behavioral - > Command pattern

/**
 * The command pattern is a behavioral design pattern
 * in which an object is used to represent and encapsulate all the information needed to call a method at a later time.
 * This information includes the method name, the object that owns the method and values for the method parameters.
 */

/**
 * Step1
 *      Declare the command interface with a single execution method.
 * The Command interface declares a method for executing a command.
 */
interface RadioCommand {
    public function execute();
}

/**
 * Step2
 *  Start extracting requests into concrete command classes that implement the command interface.
 *  Each class must have a set of fields for storing the request arguments along with a reference to the actual receiver object.
 *  All these values must be initialized via the command’s constructor.
 */
class TurnOnRadio implements RadioCommand {
    private $radioControl;
    public function __construct(RadioControl $radioControl) {
        $this->radioControl = $radioControl;
    }
    public function execute() {
        $this->radioControl->turnOn();
    }
}

class TurnOffRadio implements RadioCommand {
    private $radioControl;
    public function __construct(RadioControl $radioControl) {
        $this->radioControl = $radioControl;
    }
    public function execute() {
        $this->radioControl->turnOff();
    }
}

/**
 * Receiver.
 * The Receiver classes contain some important business logic.
 * They know how to perform all kinds of operations, associated with carrying out a request.
 * In fact, any class may serve as a Receiver.
 */
class RadioControl {
    public function turnOn() {
        // Turning On Radio
        echo "Turning On Radio";
    }
    public function turnOff() {
        // Turning Off Radio
        echo "Turning Off Radio";
    }
}

// Client
// Its job is to determine which command to execute, without knowing who will execute it and how it will be executed.
$in = 'TurnOffRadio';

// Invoker
// It triggers that command instead of sending the request directly to the receiver.
// It isn’t responsible for creating the command object. Usually, it gets a pre-created command from the client via the constructor.
if (class_exists ( $in )) {
    $command = new $in ( new RadioControl() );
} else {
    throw new Exception( '..Command Not Found..' );
}

$command->execute();

