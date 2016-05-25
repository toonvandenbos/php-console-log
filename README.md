# PHP console.log()

PHP console.log() allows you to dump PHP variables in the browser's console. It is an easy-to-use and lightweight PHP library.

## Installation

Currently, it is not possible to require this library with composer.

Just download/clone this repository and `require` the front PHP-file :

```php
require_once(__DIR__ . '/php-console-log.php');
```

## Usage

More detailed working examples can be found in the `./examples/` directory.

### Basic PHP console.log()

Define a place where the library should output the console logs:

```php
<?php execConsoleLogs(); ?>
```

You can now use the `consoleLog()` function everywhere, as long as it is called before an `execConsoleLogs()` call.

```php
<?php 

$myArray = ['one','two','three'];

consoleLog($myArray);

?>
```

You can use `consoleLog()` with any type of variable. If you want to output an PHP array or object, the library will show a JavaScript Array or Object in the browser's console. A boolean will remain a boolean, an integer will remain an integer, a string remain a string, and so on.

### Edit the `<script>` tag

All this library does is generating a `<script>` where you asked it (using `the execConsoleLogs()` function).

This tag contains the required JavaScript logic in order to output the requested data in the browser's console. There is not much you could do on the generated JavaScript code, but you can add an attribute on the `<script>` tag.

By default, the library generates the following HTML markup:

```html
<script type="text/javascript" data-php-console-log="true">
      [...]
</script>
```
You can remove or modify the `data-php-console-log` attribute by setting it as follows:

```php
/*
 * Remove the attribute :
 */

$PHPConsoleLog->setAttribute();
      // or
$PHPConsoleLog->setAttribute(false);


/*
 * Edit the attribute :
 */

      // simple attribute
$PHPConsoleLog->setAttribute('data-my-attribute');
      // attribute with value
$PHPConsoleLog->setAttribute('data-my-attribute', 'attribute-value');
```

## Wordpress tip

Do you want to use this library on a wordpress theme ? Just add the following line in your `functions.php` file and start `consoleLog()`ing right now !

```php
add_action( 'wp_footer', 'execConsoleLogs', 100 );
```

## What now ?

Well, I wrote this library in a hurry, so there's probably a lot to change/add. Feel free to contribute or to request some changes.

Enjoy!