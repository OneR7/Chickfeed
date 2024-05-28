<?php
    class Stokpakan extends Controller{
        public function index(){

            $stokpakanmodel = $this->model('M_Stokpakan');
            $data['stok_pakan'] = $stokpakanmodel->getStokPakan();

            $this->view('templates/session',);
            $this->view('templates/header',);
            $this->view('templates/navbar',);
            $this->view('templates/sidebar',);
            $this->view('stokpakan', $data);
            $this->view('templates/footer');
            $this->view('templates/preloader');
        }
        
    }

?>  