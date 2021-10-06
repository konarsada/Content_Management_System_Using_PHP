<?php

/**
 * Initialization
 * 
 * Register an autoloader, start or resume the session
 */

spl_autoload_register(function($class) {
    require dirname(__DIR__) . "/classes/{$class}.php";
});

session_start();

require dirname(__DIR__) . "/config.php";

function errorHandler($level, $message, $file, $line) {
    throw new ErrorException($message, 0, $level, $file, $line);
}
function exceptionHandler($exception) {
    if(SHOW_ERROR_DETAIL) {
        echo "<h1>An error occured</h1>";
        echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
        echo "<p>" . $exception->getMessage() . "</p>";
        echo "<p>Stack trace: <pre>" . $exception->getTraceAsString() . "</pre></p>";
        echo "<p>In file '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
    }
    else {
        echo "<h1>An error has occured</h1>";
        echo "<p>Please try again later</p>";
    }
    exit();
}
set_error_handler("errorHandler");
set_exception_handler("exceptionHandler");