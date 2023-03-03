<?php
session_start();
error_reporting(0);

class Profile extends Controller
{

    public function index()
    {
        if (isset($_SESSION['user'])) :
            $data = [
                'title' => 'Profile',
                'active' => 'Profile',
                'user' => $this->model('user_model')->getByEmail($_SESSION['data'])
            ];

            $this->view('Templates/header', $data);
            $this->view('Profile/index', $data);
            $this->view('Templates/footer');
        else :
            header("Location: ../public");
        endif;
    }

    public function upr()
    {
        if (isset($_SESSION['user'])) :
            if ($this->model('user_model')->update($_POST) > 0) :
                echo "<script>alert('Data Berhasil Diubah!'); document.location.href='../profile'</script>";
            else :
                echo "<script>alert('Data Gagal Diubah!'); document.location.href='../profile'</script>";
            endif;
        else :
            header("Location: ../public");
        endif;
    }

    public function upp()
    {
        if (isset($_SESSION['user'])) :
            if ($this->model('user_model')->updatePassword($_POST) > 0) :
                echo "<script>alert('Password Berhasil Diubah!'); document.location.href='../profile'</script>";
            else :
                echo "<script>alert('Password Gagal Diubah!'); document.location.href='../profile'</script>";
            endif;
        else :
            header("Location: ../public");
        endif;
    }

    public function rem()
    {
        if (!isset($_SESSION['user']) && isset($_POST['username'])) :
            if ($this->model('user_model')->rememberPassword($_POST) > 0) :
                echo "<script>alert('Password Berhasil Dirubah!'); document.location.href='../'</script>";
            else :
                echo "<script>alert('Password Gagal Dirubah!'); document.location.href='../'</script>";
            endif;
        else :
            header("Location: ../");
        endif;
    }
}
