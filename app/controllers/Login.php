<?php
session_start();
error_reporting(0);


class Login extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) :
            $data = [
                'title' => 'Login',
                'active' => 'Login'
            ];

            $this->view('Templates/header', $data);
            $this->view('login/index', $data);
            $this->view('Templates/footer');
        else :
            header("Location: ../public");
        endif;
    }

    public function auth()
    {
        if (!isset($_SESSION['user'])) :
            if ($this->model('user_model')->signin($_POST) > 0) :
                echo "<script>alert('Login Berhasil');document.location.href='../'</script>";
            else :
                echo "<script>alert('Login Gagal');document.location.href='../login'</script>";
            endif;
        else :
            header("Location: ../public");
        endif;
    }
}
