<?php
session_start();
error_reporting(0);

class User extends Controller
{
    public function index()
    {
        header("Location: ../public");
    }

    public function manage()
    {
        if (isset($_SESSION['user']) && $_SESSION['type'] == 2) :
            $data = [
                'title' => 'User Manager',
                'active' => '',
                'users' => $this->model('user_model')->getNormalUser(),
                'admins' => $this->model('user_model')->getAdmin(),
                'sadmins' => $this->model('user_model')->getSuperAdmin()
            ];

            $this->view('Templates/header', $data);
            $this->view('Manage/index', $data);
            $this->view('Templates/footer');
        else :
            header("Location: ../");
        endif;
    }

    public function getUpdate()
    {
        echo json_encode($this->model('user_model')->getById($_POST['id']));
    }

    public function Update()
    {
        if ($_POST['id'] != 'id') :
            if ($this->model('user_model')->updateType($_POST) > 0) :
                echo "<script>alert('Otoritas Berhasil Diubah!'); document.location.href='../user/manage'</script>";
            else :
                echo "<script>alert('Otoritas Tidak Berubah!'); document.location.href='../user/manage'</script>";
            endif;
        else :
            echo "<script>document.location.href='../user/manage'</script>";
        endif;
    }
}
