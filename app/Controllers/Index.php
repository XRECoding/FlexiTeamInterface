<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Index extends BaseController {

    public function index() {
        $data['title'] = 'Index';

        echo view('templates/Header', $data);
        echo view('pages/Index');
        echo view('scripts/Index');
        echo view('scripts/XMLParser');
        //echo view('pages/Test');
        echo view('templates/Footer');
    }
}