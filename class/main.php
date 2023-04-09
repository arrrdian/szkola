<?php
require_once 'class/connection.php';
require_once 'class/structure.php';
require_once 'class/queries.php';
require_once 'class/transmition.php';

class Main extends Database {
    public function __construct() {
        $this->db_conn();

        $this->id = Transmition::fetchGET();
    }

    private function show(): void {
        $query = $this->db_query(
            Queries::show()
        );
 
        if($query->num_rows > 0) 
            while ($row = $query->fetch_array()) Structure::showform($row);
        else echo "Brak Pilkarzy";
    }

    private function delete(): void {
        $this->db_query(
            Queries::disableKey()
        );
        $this->db_query(
            Queries::deletePilkarz()
        );
        $this->db_query(
            Queries::enableKey()            
        );
    }

    private function edit(): void {
        $query = $this->db_query(
            Queries::editPilkarz($this->id)
        );

        while ($row = (array) $query->fetch_assoc()) {
            Structure::editform($row, "?action=save&id=$this->id");
        }
    }

    public function navigation(): void {
        $choice = isset($_GET['action']) ? $_GET['action']  : 'show';

        switch($choice) {
            case 'show': $this->show(); break;
        
            case 'delete': $this->delete(); $this->show(); break;

            case 'update': $this->edit(); break;
        
            default: $this->show(); break;
        }
    }

    public function __destruct() {
        $this->db_exit();
    }
}
?>