<?php
require_once __DIR__ . '/../db/connect.php';

class User {
    private $conn;

    public function __construct() {
        global $conn; // Usar la conexión ODBC global
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
}
?>
