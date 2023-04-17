<?php namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\StatisticsModel;
use CodeIgniter\Controller;
use Cassandra\Date;
include (APPPATH . 'Libraries/lib/inc/chartphp_dist.php');

class Statistics extends BaseController {

    public function __construct() {
        $this->StatisticsModel = new StatisticsModel();
        $this->session = \Config\Services::session();
    }

    public function index() {
        $data['title'] = 'Statistics';

        //$data['today'] = date('d.m.Y');
        $data['statisticsHeader'] = $_SESSION['selectedDate'];

        // creating array with all categories of the user
        $data['categories'] = array();
        foreach ($this->StatisticsModel->getDailyCategories($_SESSION['selectedDate']) as $rowArray){
            foreach ($rowArray as $category) {
                array_push($data['categories'], $category);
            }
        }

        // get the time spent for each category
        $data['timeSpent'] = array();
        foreach ($data['categories'] as $category){
           array_push($data['timeSpent'], $this->StatisticsModel->getDailyTimeByCategory($category, $_SESSION['selectedDate']));
        }

        // creating data points for the bar chart
        $data['dataPoints'] = array();

        foreach ($data['timeSpent'] as $entry){
            foreach ($entry as $designation=>$timeSpent){
                array_push($data['dataPoints'], array("y" => $timeSpent, "label" => $designation));
            }
        }

        $this->showDay();
    }

    /**
     * This function filters the different buttons in the header. Depending on the button it does the following:
     * 1. Redirects to the Settings page
     * 2. swaps between daily / weekly / monthly / yearly statistic
     * 3. modifies the selected date and shows the statistic for the new date
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function button_filter(){
        if (isset($_POST['back'])) return redirect()->to(base_url().'/WeekOverview');

        if (isset($_POST['dayStatistics'])) $this->showDay();

        if (isset($_POST['weekStatistics'])) $this->showWeek();

        if (isset($_POST['monthStatistics'])) $this->showMonth();

        if (isset($_POST['yearStatistics'])) $this->showYear();

        if (isset($_POST['dayPrev'])){
            $DateTime = new \DateTime($_SESSION['selectedDate']);
            $DateTime -> modify('-1 Day');
            $_SESSION['selectedDate'] = $DateTime->format("d.m.Y");

            $this->showDay();
        }

        if (isset($_POST['dayNext'])){
            $DateTime = new \DateTime($_SESSION['selectedDate']);
            $DateTime -> modify('+1 Day');
            $_SESSION['selectedDate'] = $DateTime->format("d.m.Y");

            $this->showDay();
        }

        if (isset($_POST['weekPrev'])){
            $DateTime = new \DateTime($_SESSION['selectedDate']);
            $DateTime -> modify('-7 Days');
            $_SESSION['selectedDate'] = $DateTime->format("d.m.Y");

            $this->showWeek();
        }

        if (isset($_POST['weekNext'])){
            $DateTime = new \DateTime($_SESSION['selectedDate']);
            $DateTime -> modify('+7 Days');
            $_SESSION['selectedDate'] = $DateTime->format("d.m.Y");

            $this->showWeek();
        }

        if (isset($_POST['monthPrev'])){
            $DateTime = new \DateTime($_SESSION['selectedDate']);
            $day = $DateTime->format('j');
            $DateTime->modify('first day of -1 month');
            $DateTime->modify('+' . (min($day, $DateTime->format('t')) - 1) . ' days');
            $_SESSION['selectedDate'] = $DateTime->format("d.m.Y");

            $this->showMonth();
        }

        if (isset($_POST['monthNext'])){
            $DateTime = new \DateTime($_SESSION['selectedDate']);
            $day = $DateTime->format('j');
            $DateTime->modify('first day of +1 month');
            $DateTime->modify('+' . (min($day, $DateTime->format('t')) - 1) . ' days');
            $_SESSION['selectedDate'] = $DateTime->format("d.m.Y");

            $this->showMonth();
        }

        if (isset($_POST['yearPrev'])){
            $DateTime = new \DateTime($_SESSION['selectedDate']);
            $day = $DateTime->format('j');
            $DateTime->modify('first day of -1 year');
            $DateTime->modify('+' . (min($day, $DateTime->format('t')) - 1) . ' days');
            $_SESSION['selectedDate'] = $DateTime->format("d.m.Y");

            $this->showYear();
        }

        if (isset($_POST['yearNext'])){
            $DateTime = new \DateTime($_SESSION['selectedDate']);
            $day = $DateTime->format('j');
            $DateTime->modify('first day of +1 year');
            $DateTime->modify('+' . (min($day, $DateTime->format('t')) - 1) . ' days');
            $_SESSION['selectedDate'] = $DateTime->format("d.m.Y");

            $this->showYear();
        }
    }


    /**
     * This function shows the statistic for the specific day.
     * The bar chart shows how much time was spent for each activity on that day.
     */
    public function showDay(){
        $data['title'] = 'Statistics';
        $data['statisticsHeader'] = $_SESSION['selectedDate'];

        // creating array with all categories of the user
        $data['categories'] = array();
        foreach ($this->StatisticsModel->getDailyCategories($_SESSION['selectedDate']) as $rowArray){
            foreach ($rowArray as $category) {
                array_push($data['categories'], $category);
            }
        }

        // get the time spent for each category
        $data['timeSpent'] = array();
        foreach ($data['categories'] as $category){
            array_push($data['timeSpent'], $this->StatisticsModel->getDailyTimeByCategory($category, $_SESSION['selectedDate']));
        }

        // creating data points for the bar chart
        $data['dataPoints'] = array();

        foreach ($data['timeSpent'] as $entry){
            foreach ($entry as $designation=>$timeSpent){
                array_push($data['dataPoints'], array("y" => $timeSpent, "label" => $designation));
            }
        }

        echo view('templates/header', $data);
        echo view('scripts/statistics');
        echo view('pages/statistics/dayHeader', $data);
        echo view('pages/statistics/body', $data);
        echo view('templates/Footer');
    }

    /**
     * This function shows the statistic for the specific week.
     * The bar chart shows how much time was spent on each day of that week.
     */
    public function showWeek(){
        $data['title'] = 'Statistics';
        $date = new \DateTime(date('d.m.Y', strtotime($_SESSION['selectedDate'])));
        $data['statisticsHeader'] = $date->format("W") . 'te Kalenderwoche';

        // generating an array with all the dates of the week
        $DateTime = new \DateTime();
        $DateTime -> setISODate(date('Y', strtotime($_SESSION['selectedDate'])), $date->format("W"));

        $weekDays = array();
        for ($i = 0; $i < 7; $i++) {
            array_push($weekDays, $DateTime -> format('d.m.Y'));
            $DateTime -> modify('+1 Day');
        }

        // retrieving the sum of the time spent per day
        $timePerDay = array();
        foreach ($weekDays as $day){
            foreach ($this->StatisticsModel->getDailyTimeSum($day) as $time){
                array_push($timePerDay, $time);
            }
        }

        // creating data points for the bar chart
        $data['dataPoints'] = array();

        for ($i = 6; $i > -1; $i--){        // iterating back to front so the first date is placed at the top of the chart
            array_push($data['dataPoints'], array("y" => $timePerDay[$i], "label" => $weekDays[$i]));
        }

        echo view('templates/header', $data);
        echo view('scripts/statistics');
        echo view('pages/statistics/weekHeader', $data);
        echo view('pages/statistics/body', $data);
        echo view('templates/Footer');
    }

    /**
     * This function shows the statistic for the specific month.
     * The bar chart shows how much time was spent on each day of that month.
     */
    public function showMonth(){
        $data['title'] = 'Statistics';
        $date = new \DateTime(date('d.m.Y', strtotime($_SESSION['selectedDate'])));
        $data['statisticsHeader'] = $date->format("F");

        // generating an array with all the dates of the month
        $DateTime = new \DateTime();
        $DateTime -> setISODate(date('Y', strtotime($_SESSION['selectedDate'])), $date->format("W"));

        $month = $DateTime->format('m');
        $year = $DateTime->format('Y');
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $monthDays = array();
        for($d = 1; $d <= $daysInMonth; $d++) {
            $time = mktime(12, 0, 0, $month, $d, $year);
            if (date('m', $time) == $month) {
                $monthDays[] = date('d.m.Y', $time);
            }
        }

        // retrieving the sum of the time spent per day
        $timePerDay = array();
        foreach ($monthDays as $day){
            foreach ($this->StatisticsModel->getDailyTimeSum($day) as $time){
                array_push($timePerDay, $time);
            }
        }

        // creating data points for the bar chart
        $data['dataPoints'] = array();

        for ($i = $daysInMonth-1; $i > -1; $i--){        // iterating back to front so the first date is placed at the top of the chart
            array_push($data['dataPoints'], array("y" => $timePerDay[$i], "label" => $monthDays[$i]));
        }

        echo view('templates/header', $data);
        echo view('scripts/statistics');
        echo view('pages/statistics/monthHeader', $data);
        echo view('pages/statistics/body', $data);
        echo view('templates/Footer');
    }

    /**
     * This function shows the statistic for the specific year.
     * The bar chart shows how much time was spent in each month of that year.
     */
    public function showYear(){
        $data['title'] = 'Statistics';
        $date = new \DateTime(date('d.m.Y', strtotime($_SESSION['selectedDate'])));
        $data['statisticsHeader'] = $date->format("Y");

        /* This is a better solution if the datatype of the date column gets changed to date
         *
         *
        $data['dataPoints'] = array();
        $date = new \DateTime(date('d.m.Y', strtotime('01.01.' . $date->format("Y"))));
        $start = $date->modify('first day of this month')->format('d.m.Y');
        $end = $date->modify('last day of this month')->format('d.m.Y');

        for ($i = 0; $i < 12; $i++){
            echo $start . "\n";
            echo $end . "\n";

            $temp = $this->StatisticsModel->getMonthlyTimeSum($start, $end);
            foreach ($temp as $entry){
                array_push($data['dataPoints'], array("y" => $entry, "label" => $date->format("F")));
            }
            $start = $date->modify('first day of +1 month')->format('d.m.Y');
            $end= $date->modify('last day of this month')->format('d.m.Y');
        }
        */

        $date = new \DateTime(date('d.m.Y', strtotime('01.12.' . $date->format("Y"))));
        $month = $date->format('m');
        $year = $date->format('Y');

        $data['dataPoints'] = array();
        for ($i = 0; $i < 12; $i++){
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

            $monthDays = array();
            for($d = 1; $d <= $daysInMonth; $d++) {
                $time = mktime(12, 0, 0, $month, $d, $year);
                if (date('m', $time) == $month) {
                    $monthDays[] = date('d.m.Y', $time);
                }
            }

            // retrieving the sum of the time spent per day
            $timePerDay = array();
            foreach ($monthDays as $day){
                foreach ($this->StatisticsModel->getDailyTimeSum($day) as $time){
                    array_push($timePerDay, $time);
                }
            }

            $totalTimeSpent = 0;
            foreach ($timePerDay as $entry){
                $totalTimeSpent += $entry;
            }

            array_push($data['dataPoints'], array("y" => $totalTimeSpent, "label" => $date->format("F")));
            $date->modify('-1 month');
            $month = $date->format('m');
            $year = $date->format('Y');
        }

        echo view('templates/header', $data);
        echo view('scripts/statistics');
        echo view('pages/statistics/yearHeader', $data);
        echo view('pages/statistics/body', $data);
        echo view('templates/Footer');
    }
}