<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Settings extends BaseController {
    public function __construct() {
        $this->UserModel = new UserModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
    }

    public function index() {
        $data["title"] = "Settings";

        echo view('templates/header', $data);
        echo view('pages/Settings');
        echo view('templates/Footer');
    }

    public function btnAction() {
        if (isset($_POST['back'])) return redirect()->to(base_url().'/WeekOverview');
        if (isset($_POST['btnCat'])) return redirect()->to(base_url().'/Categories'); # Todo: Must be changed
        
        unset($_SESSION["email"]);
        return redirect()->to(base_url().'/Login');
    }
}        
#echo "<pre>";
#print_r($_SESSION);
#echo "</pre>";