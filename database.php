<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'educ';
    private $username = 'root'; // Remplace par ton nom d'utilisateur
    private $password = ''; // Remplace par ton mot de passe
    public $conn;

    public function getConn() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }
        return $this->conn;
    }
}
