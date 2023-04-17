<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends BaseController {
    public function __construct() {
        $this->UserModel = new UserModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
    }

    public function index() {
        helper("form");
        $data['title'] = 'Login';

        if (isset($_POST['signin'])) {
            $_POST["correct"] = $this->verifyer();

            if ($this->validation->run($_POST, 'login')) {
                $this->session->set($this->UserModel->selectUser());
                return redirect()->to(base_url().'/WeekOverview');
            } else {
                $data['error'] = $this->validation->getErrors();
            }
        } else if (isset($_POST['signup'])) {
            return redirect()->to(base_url().'/Registration');
        }
        
        echo view('templates/header', $data);
        echo view('pages/Login');
        echo view('templates/Footer');
    }


    public function verifyer() {
        $currUser = $this->UserModel->selectUser();

        if ($currUser == null) return "false";
        if (password_verify($_POST['password'], $currUser["password"])) 
            return $_POST['password'];
        return "false";
    }
}