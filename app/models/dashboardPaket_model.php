<?php

class dashboardPaket_model
{
    private
        $db,
        $table = 'tb_paket';

    public function __construct()
    {
        $this->db = new Database;
    }

    
}
