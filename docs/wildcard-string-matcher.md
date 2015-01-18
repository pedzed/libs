# Wildcard string matcher

## Requirements
- PHP 5.4 or greater (recommended).

## Installation
1. [Download all libraries](https://github.com/pedzed/libs/archive/master.zip) 
   or [specifically download this one](https://raw.githubusercontent.com/pedzed/libs/master/src/pedzed/libs/WildcardStringMatcher.php).
2. Move the file(s) to your server.
3. Include the file(s). *It's recommended to autoload them.*

## Examples
```php
$strList = [
    '*',
    '*.ipsum',
    'lorem.ipsum.dolor',
    'lorem.ipsum.sit.amet',
    'lorem.*.amet',
    'lorem.*'
];

$match = 'lorem.ipsum.sit.amet';

echo $match.'<br /><br />';

foreach($strList as $str){
    echo 'String: '.$str.':<br />';
    
    var_dump(WildcardStringMatcher::match($str, $match));
}

/* OUTPUT:
lorem.ipsum.sit.amet

String: *:
boolean true
String: *.ipsum:
boolean false
String: lorem.ipsum.dolor:
boolean false
String: lorem.ipsum.sit.amet:
boolean true
String: lorem.*.amet:
boolean true
String: lorem.*:
boolean true
*/
```
Case-sensitivity is supported. On default, it is disabled. To enable 
case-sensitivity, pass a third parameter.
```php
WildcardStringMatcher::match($str1, $str2, true);
```
