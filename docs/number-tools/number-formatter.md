Number formatter
================

## Features
- Convert cardinal number (like 17) to ordinal number (like 17th).

## Requirements
- PHP 5.4 or greater.

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
echo $numFormatter->getOrdinal(17); // Output: 17th
```
You could also get multiple ordinals at once:
```php
$nums = [1, '2', 6, 11, 14, 16, 0];
echo implode(', ', $numFormatter->getOrdinals($nums));
/*
Output:
1st, 2nd, 6th, 11th, 14th, 16th, 0th
*/
```
