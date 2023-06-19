<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Index extends BaseController {

    public function index() {
        $data['title'] = 'Index';

        // header
        // echo view('templates/Header_list', $data);
        // echo view('templates/Header_list_tablet', $data);
        // echo view('templates/header_zoom', $data);
        echo view('templates/header_zoom_tablet', $data);



        // Main Page
        echo view('pages/Index');

        // the desired modal
        // echo view('pages/Modals/Modal_list.php');
        echo view('pages/Modals/Modal_zoom.php');

        // JavaScript
        // CSV Parser
        echo view('scripts/CSVParser');
        // general JS for the page
        echo view('scripts/index.php');
        // JS for Graph Generation
        echo view('scripts/Generate_Graph.php');
        echo view('scripts/Generate_Subgraph.php');
        // CSV Writer
        echo view('scripts/CSVWriter.php');

        // the modal for the graph legend
        echo view('modals/legend');

        // footer
        echo view('templates/Footer');
    }

    // called via Ajax request
    function writeCSV(){
        if (isset($_POST['string']) && isset($_POST['filename'])){

            try{
                // open filestream
                $file = fopen($_POST['filename'], "w");
                // write
                fwrite($file, $_POST['string']);
                // close filestream
                fclose($file);
            }catch (Exception $e){
                return $e;
            }

            return $_POST['filename'];
        }
    }
}