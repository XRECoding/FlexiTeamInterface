<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Index extends BaseController {

    public function index() {
        $data['title'] = 'Index';

        echo view('templates/Header', $data);
        echo view('pages/Index');
        echo view('pages/Modals/Index');
        echo view('scripts/CSVParser');
        echo view('scripts/Generate_Graph.php');
        echo view('modals/legend');
        echo view('templates/Footer');
    }
}