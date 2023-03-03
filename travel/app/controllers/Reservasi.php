<?php

class Reservasi extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Reservasi',
            'active' => '',
        ];

        $this->view('Templates/header', $data);
        // $this->view('Reservasi/index', $data);
        $this->view('Templates/maintenance');
        $this->view('Templates/footer');
    }
}
