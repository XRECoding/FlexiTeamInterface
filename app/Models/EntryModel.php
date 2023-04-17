<?php namespace App\Models;
use CodeIgniter\Model;

class EntryModel extends Model {

    public function selectEntries() {
        $this->session = \Config\Services::session();
        
        return $this->db->
        table('entries')->
        where('userID', $this->session->get('userID'))->
        where('date', $this->session->get('selectedDate'))->
        orderby('order', 'ASC')->
        get()->getResultArray();
    }

    public function selectEntry() {
        $this->session = \Config\Services::session();

        return $this->db->
        table(array('entries', 'categories'))->
        select(array(
            "entries.entryID as entryID",
            "categories.designation as category",
            "entries.designation as designation",
            "entries.description as description",
            "entries.started as started",
            "entries.completed as completed"
        ))->
        where("categories.categoryID = entries.categoryID")->
        where('entryID', $_POST['entryID'])->
        where('entries.userID', $this->session->get('userID'))->
        get()->getRowArray();
    }

    public function updateEntry() {
        $this->session = \Config\Services::session();

        $this->db->
        table('entries')->
        where('entryID', $_POST['entryID'])->
        where('userID', $this->session->get('userID'))->
        update(array(
            'categoryID'    => $_POST['categoryID'],
            'designation'   => $_POST['designation'],
            'description'   => $_POST['description'],
            'started'       => $_POST['started'],
            'completed'     => $_POST['completed']
        ));
    }

    public function insertEntry() {
        $this->session = \Config\Services::session();

        $this->db->
        table('entries')->
        insert(array(
            'userID'        => $this->session->get('userID'),
            'categoryID'    => $_POST['categoryID'],
            'designation'   => $_POST['designation'],
            'description'   => $_POST['description'],
            'started'       => $_POST['started'],
            'completed'     => $_POST['completed'],
            'order'         => $_POST['order'],
            'date'          => $this->session->get('selectedDate')
        ));

        return $this->db->insertID();
    }

    public function deleteEntry() {
        $this->session = \Config\Services::session();

        $this->db->
        table('entries')->
        where('entryID', $_POST['entryID'])->
        where('userID', $this->session->get('userID'))->
        delete();
    }

    public function updateOrder() {
        $this->session = \Config\Services::session();
        
        $this->db->
        table('entries')->
        where('entryID', $_POST['entryID'])->
        where('userID', $this->session->get('userID'))->
        update(array(
            'order' => $_POST['order']
        ));
    }

}