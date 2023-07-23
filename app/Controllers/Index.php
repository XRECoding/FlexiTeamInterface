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

        // warning modals for irreversible actions
        echo view('modals/legend');
        echo view('modals/submit');
        echo view('modals/undo');
        echo view('modals/info');


        // Main Page
        echo view('pages/Index');

        // the desired modal
        if ($data['zoom']){
            echo view('pages/Modals/Modal_zoom.php');
        } else {
            echo view('pages/Modals/Modal_list.php');
        }

        

        // JavaScript
        echo view('scripts/Info.php');

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