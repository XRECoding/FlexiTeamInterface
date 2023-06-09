<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Index extends BaseController {

    public function index() {
        $data['title'] = 'Index';

        $data['testA'] = "asdf test";


        if (isset($_POST['testA'])){
            $data['testA'] = $_POST['testA'];
        }

        if (isset($_POST['testB'])){
            $data['testB'] = $_POST['testB'];
        }

        echo view('templates/Header', $data);
        echo view('pages/Index');
        echo view('pages/Modals/Index');
        echo view('scripts/CSVParser');
        echo view('scripts/Generate_Graph.php');
        echo view('modals/legend');
        echo view('templates/Footer');
    }

    function test(){
        return 1;
    }
}