<?php

namespace SimpleFactory;

/**
 *
 * The Simple Factory pattern returns a specific set of data or a specific class based on its input.
 *
 * The idea is to abstract the details happening in each of the conditionals into their own class
 * thus making it much easier to maintain and keeping the code much leaner
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

// concrete factory: a factory for producing phone
class PhoneFactory {
    function createPhone(string $brand)
    {
        if ($brand == "iPhone") {
            return new IPhone();
        } else if ($brand == "huawei") {
            return new Huawei();
        } else {
            print "Can not produce this brand!";
            return null;
        }
    }
}

/* -----Test----- */
// new factory
$factory = new PhoneFactory();

$iPhone = $factory->createPhone("iPhone");
$iPhone->use();

$huawei = $factory->createPhone("huawei");
$huawei->use();



