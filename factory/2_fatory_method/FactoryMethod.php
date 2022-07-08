<?php

namespace FactoryMethod;

/**
 * Factory method is a creation pattern
 * that uses factories to instantiate objects
 * without having to specify the exact class of the object that will be created
 */

// abstract product: phone
abstract class AbstractPhone {
    abstract function use();
}

// concrete product: IPhone, Huawei
class IPhone extends AbstractPhone
{
    function use()
    {
        print "Hey, I am using iPhone"."\n";
    }
}
class Huawei extends AbstractPhone
{
    function use()
    {
        print "Hey, I am using Huawei"."\n";
    }
}

// abstract factory: phone factory
abstract class AbstractPhoneFactory
{
    abstract function createPhone(): AbstractPhone;
}

// concrete factory:
// 1. factory to produce iPhone
// 2. factory to produce Huawei
class IPhoneFactory extends AbstractPhoneFactory
{
    function createPhone(): AbstractPhone
    {
        return new IPhone();
    }
}

class HuaweiFactory extends AbstractPhoneFactory
{
    function createPhone(): AbstractPhone
    {
        return new Huawei();
    }
}

//$iPhoneFactory = new IPhoneFactory();
//$iPhoneFactory->createPhone()->use();
//
//$huaweiFactory = new HuaweiFactory();
//$huaweiFactory->createPhone()->use();

function clientCode(AbstractPhoneFactory $factory)
{
    $factory->createPhone()->use();
}

clientCode(new IPhoneFactory);
clientCode(new HuaweiFactory);


