<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Index extends BaseController {

    public function index() {
        $data['title'] = 'Index';


        echo view('templates/Header2', $data);
        echo view('pages/Index');
//        echo view('scripts/test2');
//        echo view('pages/Modals/Index');
        echo view('pages/Modals/Neu.php');
        echo view('scripts/CSVParser');
        echo view('scripts/index.php');

        echo view('scripts/Generate_Graph.php');
        echo view('scripts/Generate_Subgraph.php');

        
        echo view('scripts/CSVWriter.php');
        echo view('modals/legend');
        echo view('templates/Footer');


    }

    function writeCSV(){
        if (isset($_POST['string']) && isset($_POST['filename'])){

            try{
                $file = fopen($_POST['filename'], "w");
                fwrite($file, $_POST['string']);
                fclose($file);
            }catch (Exception $e){
                return $e;
            }


//            file_put_contents($_POST['path'], $_POST['string']);

            return $_POST['filename'];
        }
    }
}