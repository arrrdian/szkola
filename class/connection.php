<?php
class Database {
    private $conn;

    protected function db_conn(): void {
        $connection = mysqli_connect("localhost", "root", "zaq1@WSX", "pilkanozna");
        if(!$connection) {
            echo "Błąd połączania";
            exit();
        }
        $this->conn = $connection;
    }

    protected function db_exit(): void {
        mysqli_close($this->conn);
    }

    protected function db_query(string $query) {
        $question = mysqli_query($this->conn, $query);
        return $question;
    }
}
?>