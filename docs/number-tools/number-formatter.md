Number formatter
================

## Features
- Convert cardinal numbers (like 17) to ordinal numbers (like 17th).

## Requirements
- PHP 5.4 or greater.

## Installation
1. [Download all libraries](https://github.com/pedzed/libs/archive/master.zip) 
   or [specifically download this one](https://raw.githubusercontent.com/pedzed/libs/master/src/pedzed/libs/number_tools/NumberFormatter.php).
2. Move the file(s) to your server.
3. Include the file(s). *It's recommended to autoload them.*

## Usage
All you have to do is instantiate the class.
```php
$numFormatter = new pedzed\libs\number_tools\NumberFormatter();
$numFormatter = new pedzed\libs\number_tools\NumberFormatter('en_US');
$numFormatter = new pedzed\libs\number_tools\NumberFormatter('nl_NL');
```
From there, you could make use of the functionalities this class provides.

### Cardinal number to ordinal number
To change a cardinal number like "17" to an ordinal number like "17th", you have 
to pass the number as an argument to the `getOrdinal` method.
```php
echo $numFormatter->getOrdinal(17); // OUTPUT: 17th
```
You could also get multiple ordinals at once:
```php
$nums = [1, '2', 6, 11, 14, 16, 0];
echo implode(', ', $numFormatter->getOrdinals($nums));
/* OUTPUT:
1st, 2nd, 6th, 11th, 14th, 16th, 0th
*/
```
