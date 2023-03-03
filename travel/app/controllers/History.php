<?php

class History extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'History',
            'active' => '',
        ];

        $this->view('Templates/header', $data);
        // $this->view('History/index', $data);
        $this->view('Templates/maintenance');
        $this->view('Templates/footer');
    }
}
