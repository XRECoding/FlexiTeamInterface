<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\EntryModel;
use App\Models\CategoryModel;

class DailyTodos extends BaseController {
    public function __construct() {
        $this->EntryModel = new EntryModel();
        $this->CategoryModel = new CategoryModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
    }

    public function index() {
        $data['title'] = 'DailyTodos';

        $data['entries'] = $this->EntryModel->selectEntries();
        $data['categories'] = $this->CategoryModel->selectCategories();
        $data['selectedDate'] = session()->get('selectedDate');
        $data['wochentag'] = session()->get('wochentag');

        if (isset($_POST['back'])) return redirect()->to(base_url().'/WeekOverview');

        echo view('templates/header', $data);
        echo view('pages/DailyTodos');
        echo view('modals/DailyTodos', $data);
        echo view('scripts/DailyTodos');
        echo view('templates/Footer');
    }

    // TODO: Is not finished
    public function insertEntry() {
        if (!$this->validation->run($_POST, 'entry')) {
            return json_encode($this->validation->getErrors());
        }

        
        return json_encode($this->EntryModel->insertEntry());
    }

    public function selectEntry() {
        return json_encode($this->EntryModel->selectEntry());
    }

    public function updateEntry() {
        if (!$this->validation->run($_POST, 'entry')) {
            return json_encode($this->validation->getErrors());
        }

        $this->EntryModel->updateEntry();
        return json_encode(null);
    }

    public function deleteEntry() {
        $this->EntryModel->deleteEntry();
    }

    public function updateOrder() {
        $this->EntryModel->updateOrder();
    }   
}