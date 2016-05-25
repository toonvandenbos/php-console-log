<?php

/**
 * PHP Console loging examples
 * 
 * If you're looking for source code, please take a look at
 * ../php-console-log.php and ../src/
 *
 * No specific extensions or browsers are required, since
 * this library only generates javascript code that will
 * execute the wanted console.log().
 *
 * @see https://github.com/nyratas/php-console-log
 * @version 1.0
 * @author Toon Van den Bos https://be.linkedin.com/in/toon-van-den-bos-40461264
 */


require_once(__DIR__ . '/../php-console-log.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>PHP console.log() examples</title>
      <link rel="stylesheet" href="style.css">
</head>
<body>

      <header class="main-head">
            <h1 class="main-head__title">Examples - PHP console.log()</h1>
            <a href="https://github.com/nyratas/php-console-log" class="main-head__cta">Back to GitHub</a>
      </header>

      <section class="example">
            <h2 class="example__title">#1 - Basic PHP console.log()</h2>
            <div class="example__text">
                  <p>Start by <strong>requiring</strong> the library.</p>
            </div>
            <div class="example__code">
                  <pre class="example__format">
// require the library

require_once(__DIR__ . '/../php-console-log.php');</pre>
            </div>
            <div class="example__text">
                  <p>Next, you should <strong>define a place where the library should output</strong> the console logs:</p>
            </div>
            <div class="example__code">
                  <pre class="example__format">
&lt;!-- [...] some templating code --&gt;

&lt;?php <strong>execConsoleLogs();</strong> ?&gt;

&lt;!-- [...] some other templating code --&gt;</pre>
            </div>
            <div class="example__text">
                  <p>Good. We're now all set. You can start using the consoleLog() everywhere, as long as it is <strong>called before an <em>execConsoleLogs()</em></strong> call.</p>
            </div>
            <div class="example__code">
                  <pre class="example__format">
// [...] some templating/PHP code

function handleSomeVar( $data ){
      // ... do stuff.
      <strong>consoleLog($data);</strong>
      // ... do some other stuff
}

// [...] some templating/PHP code</pre>
            </div>
            <div class="example__text">
                  <p>Take a look at your console, you should see what this basic consoleLog outputed on this page!</p>
            </div>
            <?php 
                  // Output a simple var in the browser's console :
                  $myVar = '#1 - Hello! This is example n.1 - How are you? :)';
                  consoleLog( $myVar );
            ?>
      </section>

      <footer class="main-footer">
            <p class="main-footer__author">By <a href="https://be.linkedin.com/in/toon-van-den-bos-40461264" target="_blank">Toon Van den Bos</a></p>
            <p class="main-footer__created">Project started: may 2016</p>
      </footer>
      <?php execConsoleLogs(); ?>
</body>
</html>