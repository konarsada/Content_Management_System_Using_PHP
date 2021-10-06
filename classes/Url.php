<?php

/**
 * URL
 * 
 * Response methods
 */
class Url {
    /**
     * Redirect to another URL on the same site
     * @param string $path The path to redirect to
     * 
     * @return void
     */
    public static function redirect($path) {
        header("Location:" . $path);
        exit;
    }
}