<?php
require_once __DIR__ . '/../db/connect.php';

class User {
    private $conn;

    public function __construct($conn) { 
        $this->conn = $conn;
    }

    public function findUser($username, $password) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = odbc_prepare($this->conn, $query);
        odbc_execute($stmt, [$username]);
        $user = odbc_fetch_array($stmt);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return null;
    }


    public function logout() {
        session_start();
        $_SESSION = [];

        
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }        
        session_destroy();
        
        header("Location: login.php"); 
        exit();
    }
}
?>
