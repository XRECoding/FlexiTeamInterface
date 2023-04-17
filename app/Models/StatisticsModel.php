<?php namespace App\Models;
use CodeIgniter\Model;

class StatisticsModel extends Model {

    /**
     * This function retrieves all the todos of a user
     * @return array       The result array
     */
    public function getDailyCategories($date) {
        $this->session = \Config\Services::session();

        return $this->db->
        table('entries')->
        select('designation')->
        where('userID', $this->session->get('userID'))->
        where('date', $date) ->
        orderby('order', 'ASC')->
        distinct()->
        get()->getResultArray();
    }

    /**
     * This function retrieves all the time spent for a specific to-do on a specific day
     * @param $category             The name of the to-do
     * @param $date                 The date of the to-do
     * @return array|mixed|null     The result array
     * @throws \Exception
     */
    public function getDailyTimeByCategory($category, $date) {
        // TODO make prepared statements to avoid SQL Injection
        $this->session = \Config\Services::session();

        $user = $this->session->get('userID');

        $result = $this->db->query("
        SELECT sum(completed-started) as '$category'
        FROM entries
        WHERE designation = '$category' and userID = $user and date = '$date' and length(completed) != 0 and length(started) != 0");

        return $result->getRowArray();
    }

    /**
     * This function retrieves the sum of all the time spent on the specific date
     * @param $date                 The wanted date
     * @return array|mixed|null     The result array
     * @throws \Exception
     */
    public function getDailyTimeSum($date){
        $this->session = \Config\Services::session();

        $user = $this->session->get('userID');

        $result = $this->db->query("
        SELECT sum(completed-started) as '$date'
        FROM entries
        WHERE userID = $user and date = '$date' and length(completed) != 0 and length(started) != 0");

        return $result->getRowArray();
    }
}