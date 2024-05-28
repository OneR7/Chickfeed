<?php
class Jadwal extends Controller
{

    public function tambah_jadwal()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $waktu = $_POST['waktu'];
            $id_peternak = $_SESSION['id_peternak']; // Pastikan sesi ini sudah di-set

            $jadwalmodel = $this->model('M_Jadwal');
            if ($jadwalmodel->tambahJadwal($waktu, $id_peternak)) {
                header('Location: ' . BASEURL . '/?controller=jadwal');
            } else {
                echo "Gagal menambahkan data ke database.";
            }
        }
    }

    public function hapus_jadwal($id_jadwal, $id_peternak)
    {
        $jadwalmodel = $this->model('M_Jadwal');
        if ($jadwalmodel->hapusJadwal($id_jadwal, $id_peternak)) {
            header('Location: ' . BASEURL . '/?controller=jadwal');
        } else {
            echo "Gagal menghapus data dari database.";
        }
    }

    public function index()
    {

        $jadwalmodel = $this->model('M_Jadwal');
        $data['alljadwal'] = $jadwalmodel->getAllJadwal();

        $this->view('templates/session');
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('templates/sidebar');
        $this->view('jadwal', $data);
        $this->view('templates/footer');
        $this->view('templates/preloader');
    }

}
?>