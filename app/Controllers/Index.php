<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Index extends BaseController {

    public function index() {
        $data['title'] = 'Index';

        // false = list modal; true = zoom in modal
        // this logic can be removed once the final modal is decided
        $data['zoom'] = false;

        // header
        echo view('templates/Header', $data);
//         echo view('templates/Header_list', $data);
        // echo view('templates/Header_list_tablet', $data);
//        echo view('templates/header_zoom', $data);
        // echo view('templates/header_zoom_tablet', $data);

        echo view('modals/legend');
        echo view('modals/submit');
        echo view('modals/undo');




        // Main Page
        echo view('pages/Index');

        // the desired modal
        if ($data['zoom']){
            echo view('pages/Modals/Modal_zoom.php');
        } else {
            echo view('pages/Modals/Modal_list.php');
        }

        // JavaScript
        // Touch support for mobile devices
        echo view('scripts/TouchSupport.php');
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