## Factory Pattern
### Simple factory pattern: 

**Definition:** returns a specific set of data or a specific class based on its input.

- Only one abstract product class (can be: interface, abstract class, common class), can derive multiple concrete product classes.

- Only one single concrete factory class. 

- The only one concrete factory class can only create one instance of the concrete product class.

### Factory method pattern:

**Definition:** is a creation pattern that uses factories to instantiate objects without having to specify the exact class of the object that will be created

- Only one abstract product class (can be: interface, abstract class, common class), can derive multiple concrete product classes.

- Only one abstract factory class (can be: interface, abstract class), can derive multiple concrete factory classes.

- Each concrete factory class can only create one instance of the concrete product class.

### Abstract Factory Pattern:

**Definition:**  is a creation design pattern that lets you produce families of related objects without specifying their concrete classes.

- Multiple abstract product classes (can be: interface, abstract class, common class), each abstract product class can derive multiple concrete product classes.

- An abstract factory class (can be: interface, abstract class), can derive multiple concrete factory classes.

- Each concrete factory class can create multiple instances of the concrete product class.

### Difference:
- The **_Simple Factory Pattern_** has only one abstract product class and only one concrete factory class. 
- The **_Factory Method Pattern_** has only one abstract product class, while the **_Abstract Factory Pattern_** has multiple abstract product classes. 
- The concrete factory class of the **_factory method pattern_** can only create one instance of the concrete product class, while the **_Abstract Factory Pattern_** can create multiple instances of the concrete product class.