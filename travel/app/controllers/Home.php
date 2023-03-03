<?php
session_start();
error_reporting(0);

class Home extends Controller
{
    public function Index()
    {
        $data = [
            'title' => 'Home',
            'active' => 'Home',
            'daerah' => $this->model('paket_model')->getAllDaerah()
        ];

        $this->view('Templates/header', $data);
        $this->view('Templates/hero');
        $this->view('Home/index', $data);
        $this->view('Templates/footer');
    }
}
