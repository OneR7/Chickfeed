<?php
    class Beranda extends Controller{
        public function index(){

            if (!isset($_SESSION['id_peternak'])) {
                // Jika tidak ada session ID pemilik, redirect ke halaman login
                header('location: ' . BASEURL . '/?controller=login');
                exit();
            }
    
            // Ambil session ID pemilik
            $id_peternak = $_SESSION['id_peternak'];

            $berandamodel = $this->model('M_Beranda');
            $data['detail'] = $berandamodel->getDetailById($id_peternak);
            $data['jadwal'] = $berandamodel->getJumlahJadwal();
            $data['stokpakan'] = $berandamodel->getStokPakan();


            $this->view('templates/header',);
            $this->view('templates/navbar',);
            $this->view('templates/sidebar',$data);
            $this->view('beranda', $data);
            $this->view('templates/footer');
            $this->view('templates/preloader');
        }
        
    }
?>
?>