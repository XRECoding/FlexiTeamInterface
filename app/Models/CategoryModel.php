<?php namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model {

    public function selectCategory() {
        $this->session = \Config\Services::session();

        return $this->db->
        table('categories')->
        where('categoryID', $_POST['categoryID'])->
        where('userID', $this->session->get('userID'))->
        get()->getRowArray();
    }

    public function selectCategories() {
        $this->session = \Config\Services::session();
        
        return $this->db->
        table('categories')->
        where('userID', $this->session->get('userID'))->
        orderby('order', 'ASC')->
        get()->getResultArray();
    }

    public function updateCategory() {
        $this->session = \Config\Services::session();
        
        $this->db->
        table('categories')->
        where('categoryID', $_POST['categoryID'])->
        where('userID', $this->session->get('userID'))->
        update(array(
            'designation' => $_POST['designation']
        ));
    }

    public function insertCategory() {
        $this->session = \Config\Services::session();

        $this->db->
        table('categories')->
        insert(array(
            'userID' => $this->session->get('userID'),
            'designation' => $_POST['designation'],
            'order' => $_POST['order']
        ));

        return $this->db->insertID();
    }

    public function deleteCategory() {
        $this->session = \Config\Services::session();

        $this->db->
        table('categories')->
        where('categoryID', $_POST['categoryID'])->
        where('userID', $this->session->get('userID'))->
        delete();
    }


    public function updateOrder() {
        $this->session = \Config\Services::session();

        $this->db->
        table('categories')->
        where('categoryID', $_POST['categoryID'])->
        where('userID', $this->session->get('userID'))->
        update(array(
            'order' => $_POST['order']
        ));
    }

    public function selectOrder() {
        $this->session = \Config\Services::session();
        
        return $this->db->
        table('categories')->
        select('order')->
        where('userID', $this->session->get('userID'))->
        orderby('order', 'ASC')->
        get()->getRowArray();
    }

}