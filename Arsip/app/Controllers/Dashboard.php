<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    private $logModel;
    private $db;

    public function __construct()
    {
        $this->logModel = new \App\Models\LogModel();
        $this->db = \Config\Database::connect();
    }

    public function logout() {
        $this->logModel->where('id_log', session()->get('id_log'))->delete();

        if ($this->db->affectedRows()) {
            session()->destroy();
            return redirect()->to('/');
        }
    }
}
