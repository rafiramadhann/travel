<?php
session_start();
error_reporting(0);

class Register extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) :
            $data = [
                'title' => 'Register',
                'active' => 'Login',
                'users' => $this->model('user_model')->getData()
            ];

            $this->view('Templates/header', $data);
            $this->view('Register/index', $data);
            $this->view('Templates/footer');
        else :
            header("Location: ../public");
        endif;
    }

    public function cek()
    {
        if (!isset($_SESSION['user'])) :
            if ($this->model('user_model')->signup($_POST) > 0) :
                echo "<script>alert('Account Created! Please Login!'); document.location.href='../login'</script>";
            else :
                echo "<script>alert('Creating Account Failed!'); document.location.href='register'</script>";
            endif;
        else :
            header("Location: ../public");
        endif;
    }
}
