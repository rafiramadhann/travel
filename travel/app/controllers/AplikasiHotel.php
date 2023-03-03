<?php
session_start();
error_reporting(0);


class AplikasiHotel extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Contact Us',
            'active' => 'Contact Us',
            // 'daerah' => $this->model('paket_model')->getAllDaerah(),
            // 'sadmin' => $this->model('user_model')->getSuperAdmin()
        ];

        $this->view('Templates/header', $data);
        $this->view('AplikasiHotel/sidebar', $data);
        // $this->view('Templates/footer');
    }
}
