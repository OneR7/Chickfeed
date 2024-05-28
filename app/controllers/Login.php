<?php

class Login extends Controller
{
    public function index(){
        
            if (isset($_POST['login'])) {
            // Ambil data dari form
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Panggil model User
                $userModel = $this->model('M_Login');

                // Panggil method CheckUserLogin untuk memeriksa login pengguna
                $user = $userModel->CheckUserLogin($username, $password);

                // Jika login berhasil, redirect ke halaman dashboard atau halaman yang sesuai
                if ($user) {
                    // Sesuaikan nama session dengan session yang digunakan di view
                    $_SESSION['id_peternak'] = $user['id_peternak'];
                    $_SESSION['username'] = $user['username'];
                    header('Location: ' . BASEURL . '/?controller=beranda');
                    exit(); 
                } else {
                    $data['loginError'] = 'Username atau Password yang Anda masukkan salah';
                }
            }
        $this->view('login');
    }
    
}


?>
?>