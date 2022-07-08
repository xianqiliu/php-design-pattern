<?php

/**
 * Abstract Factory is a creation design pattern
 * that lets you produce families of related objects without specifying their concrete classes.
 */

// abstract product: phone = standard + mini + plus
abstract class AbstractPhone {
    abstract function use();
}

// concrete abstract product: mini + plus
abstract class AbstractMiniPhone extends AbstractPhone { }
abstract class AbstractPlusPhone extends AbstractPhone { }

// concrete product:
// iPhone standard, huawei standard
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
// iPhone mini, huawei mini
class IPhoneMini extends AbstractMiniPhone
{
    function use()
    {
        print "Hey, I am using iPhone mini"."\n";
    }
}
class HuaweiMini extends AbstractMiniPhone
{
    function use()
    {
        print "Hey, I am using huawei mini"."\n";
    }
}
// iPhone plus, huawei plus
class IPhonePlus extends AbstractPlusPhone
{
    function use()
    {
        print "Hey, I am using iPhone plus"."\n";
    }
}
class HuaweiPlus extends AbstractPlusPhone
{
    function use()
    {
        print "Hey, I am using huawei plus"."\n";
    }
}

// abstract factory: phone factory
abstract class AbstractPhoneFactory
{
    abstract function createPhone(): AbstractPhone;
    abstract function createMiniPhone(): AbstractPhone;
    abstract function createPlusPhone(): AbstractPhone;
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

    function createMiniPhone(): AbstractPhone
    {
        return new IPhoneMini();
    }

    function createPlusPhone(): AbstractPhone
    {
        return new IPhonePlus();
    }
}

class HuaweiFactory extends AbstractPhoneFactory
{
    function createPhone(): AbstractPhone
    {
        return new Huawei();
    }

    function createMiniPhone(): AbstractPhone
    {
        return new HuaweiMini();
    }

    function createPlusPhone(): AbstractPhone
    {
        return new HuaweiPlus();
    }
}

//$iPhoneFactory = new IPhoneFactory();
//$iPhoneFactory->createPhone()->use();
//$iPhoneFactory->createMiniPhone()->use();
//$iPhoneFactory->createPlusPhone()->use();
//
//$huaweiFactory = new HuaweiFactory();
//$huaweiFactory->createPhone()->use();
//$huaweiFactory->createMiniPhone()->use();
//$huaweiFactory->createPlusPhone()->use();

function clientCode(AbstractPhoneFactory $factory)
{
    $factory->createPhone()->use();
    $factory->createMiniPhone()->use();
    $factory->createPlusPhone()->use();
}

clientCode(new IPhoneFactory);
clientCode(new HuaweiFactory);