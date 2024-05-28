<?php
class M_Beranda{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    
    public function getDetailById($id_peternak)
    {
        try {
            $this->db->query("SELECT * FROM peternak WHERE id_peternak = :id_peternak");
            $this->db->bind(':id_peternak', $id_peternak);
            return $this->db->single();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getJumlahJadwal()
    {
        $sql = "SELECT count(id_jadwal) as jwd FROM jadwal";
        $this->db->query($sql);
        $result = $this->db->single(); 
        return $result['jwd']; 
    }

    public function getStokPakan()
    {
        $sql = "SELECT * FROM stok_pakan ORDER BY id_stok_pakan DESC LIMIT 1;";
        $this->db->query($sql);
        $result = $this->db->single();
        return $result['stok_pakan']; 
    }
}
?>


