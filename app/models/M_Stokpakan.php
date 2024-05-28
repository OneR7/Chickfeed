<?php
class M_Stokpakan{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getStokPakan()
    {
        $sql = "SELECT stok_pakan FROM stok_pakan ORDER BY id_stok_pakan DESC LIMIT 1;";
        $this->db->query($sql);
        return $this->db->resultSet(); // Mengembalikan array hasil query
    }
    
    
}
?>
