Text
====

## Features
- Uppercase every word's first letter.
- Limit a string in character length.
- Static and object calls.
- Chainable methods.

## Requirements
- PHP 5.4 or greater.

## Installation
1. [Download all libraries](https://github.com/pedzed/libs/archive/master.zip) 
   or [specifically download this one](https://raw.githubusercontent.com/pedzed/libs/master/src/pedzed/libs/Text.php).
2. Move the file(s) to your server.
3. Include the file(s). *It's recommended to autoload them.*

## Examples
For the examples, the following string will be used:
```php
$str = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nulla, 
rerum ut vitae suscipit odit iure voluptas expedita nemo nihil quis et laborum 
quibusdam deserunt facere placeat quaerat, temporibus molestiae.';
```

### Limit characters
```php
echo pedzed\libs\Text::limitChars($str, 20);

// or

$text = new pedzed\libs\Text($str);
echo $text->limitChars(20);

/*
OUTPUT:
Lorem ipsum dolor si&hellip;
*/
```

### Uppercase words
```php
echo pedzed\libs\Text::uppercaseWords($str);

// or

$text = new pedzed\libs\Text($str);
echo $text->uppercaseWords();

/*
OUTPUT:
Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Magnam Nulla, Rerum 
Ut Vitae Suscipit Odit Iure Voluptas Expedita Nemo Nihil Quis Et Laborum 
Quibusdam Deserunt Facere Placeat Quaerat, Temporibus Molestiae.
*/
```

### Method chaining
You can chain methods as well.
```php
echo pedzed\libs\Text::limitChars($str, 17, '')->uppercaseWords();

// or

$text = new pedzed\libs\Text($str);
echo $text->limitChars($str, 17, '')->uppercaseWords();
/*
OUTPUT:
Lorem Ipsum Dolor
*/
```
