<?php

/**
 * Authentication
 * 
 * Login and logout
 */
class Auth {
    
    /**
     * Return the user authentication status
     * 
     * @return boolean True if user is logged in, false otherwise
     */
    public static function isLoggedIn() {
        return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
    }
    
    /**
     * Require the user to be logged in, stopping with an unauthorised message if not
     * 
     * @return void
     */
    public static function requireLogin() {
        if(!self::isLoggedIn()) {
            die("Unauthorized");
        }
    }

    /**
     * Log in using the session
     * 
     * @return void
     */
    public static function login() {
        // To prevent session fixation attacks
        session_regenerate_id(true);
        $_SESSION["is_logged_in"] = true;
    }

    /**
     * Log out using the session
     * 
     * @return void
     */
    public static function logout() {
        // Unset all of the session variables.
        $_SESSION = [];

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
    }
}