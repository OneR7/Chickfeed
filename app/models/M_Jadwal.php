<?php
class M_Jadwal
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllJadwal()
    {
        $sql = "SELECT * FROM jadwal ";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function tambahJadwal($waktu, $id_peternak)
    {
        try {
            $sql = "INSERT INTO jadwal (waktu, id_peternak) VALUES (:waktu, :id_peternak)";
            $this->db->query($sql);
            $this->db->bind(':waktu', $waktu);
            $this->db->bind(':id_peternak', $id_peternak);

            // Eksekusi query
            $this->db->execute();

            return true; // Kembalikan true jika berhasil
        } catch (PDOException $e) {
            // Log error atau handle error lainnya
            return false; // Kembalikan false jika gagal
        }
    }

    public function hapusJadwal($id_jadwal, $id_peternak)
    {
        try {
            $sql = "DELETE FROM jadwal WHERE id_jadwal = :id_jadwal AND id_peternak = :id_peternak";
            $this->db->query($sql);
            $this->db->bind(':id_jadwal', $id_jadwal);
            $this->db->bind(':id_peternak', $id_peternak);

            // Eksekusi query
            $this->db->execute();

            return true; // Kembalikan true jika berhasil
        } catch (PDOException $e) {
            // Log error atau handle error lainnya
            return false; // Kembalikan false jika gagal
        }
    }
}
?>
?>