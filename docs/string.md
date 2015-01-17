# String

## Features
- Lowercasing
    - Everything
- Uppercasing
    - Everything
    - First letter
    - Every word's first letter
- String limiting
    - In character length.
- Static and object calls.
- Chainable methods.

## Requirements
- PHP 5.4 or greater.

## Installation
1. [Download all libraries](https://github.com/pedzed/libs/archive/master.zip) 
   or [specifically download this one](https://raw.githubusercontent.com/pedzed/libs/master/src/pedzed/libs/String.php).
2. Move the file(s) to your server.
3. Include the file(s). *It's recommended to autoload them.*

## Examples
For the examples, the following string will be used:
```php
$str = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nulla, 
rerum ut vitae suscipit odit iure voluptas expedita nemo nihil quis et laborum 
quibusdam deserunt facere placeat quaerat, temporibus molestiae.';
```

### String limiting
#### In character length
```php
echo pedzed\libs\String::limitChars($str, 20);

// or

$str = new pedzed\libs\String($str);
echo $str->limitChars(20);

/* OUTPUT:
Lorem ipsum dolor si&hellip;
*/
```

### Lowercasing
#### Everything
```php
echo pedzed\libs\String::lowercase($str);
```

### Uppercasing
#### Everything
```php
echo pedzed\libs\String::uppercase($str);
```

#### First letter
```php
echo pedzed\libs\String::uppercaseFirst($str);
```

#### Every word's first letter
```php
echo pedzed\libs\String::uppercaseWords($str);

// or

$str = new pedzed\libs\String($str);
echo $str->uppercaseWords();

/* OUTPUT:
Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Magnam Nulla, Rerum 
Ut Vitae Suscipit Odit Iure Voluptas Expedita Nemo Nihil Quis Et Laborum 
Quibusdam Deserunt Facere Placeat Quaerat, Temporibus Molestiae.
*/
```

### Method chaining
You can chain methods as well.
```php
echo pedzed\libs\String::limitChars($str, 17, '')->uppercaseWords();

// or

$str = new pedzed\libs\String($str);
echo $str->limitChars($str, 17, '')->uppercaseWords();
/* OUTPUT:
Lorem Ipsum Dolor
*/
```
