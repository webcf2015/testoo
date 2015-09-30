<?php

class Session {

    public function __construct() {

        if (session_status() !== PHP_SESSION_ACTIVE)
            session_start();
    }

    public function read($key) {
        return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : null;
    }

    public function write($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function deconnectSession() {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }

// Finalement, on détruit la session.
        session_destroy();
    }

}
