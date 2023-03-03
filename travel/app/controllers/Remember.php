<?php
error_reporting(0);

class Remember extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Forgot Password",
            'active' => "Login",
            'user' => $this->model('user_model')->getByEmail($_POST)
        ];

        $this->view('Templates/header', $data);
        $this->view('Remember/index', $data);
        $this->view('Templates/footer');
    }

    public function up()
    {
        if ($this->model('user_model')->rememberPassword($_POST) > 0) :
            echo "<script>alert('Password Berhasil Dirubah!'); document.location.href='../'</script>";
        else :
            echo "<script>alert('Password Gagal Dirubah!'); document.location.href='../'</script>";
        endif;
    }
}
