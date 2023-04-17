<?php namespace App\Controllers;
use Cassandra\Date;
use CodeIgniter\Controller;

class WeekOverview extends BaseController {

    public function __construct() {
        $this->session = \Config\Services::session();
    }

    public function index() {
        $data['title'] = 'WeekOverview';

        $data['week'] = date("W"); //  calender week

        $_SESSION['selectedDate'] = date('d.m.Y', strtotime("today"));  // defaults to today

        // calculates the date for the individual days of the week
        $data['monday'] = date('d.m.Y', strtotime("this week monday"));
        $data['tuesday'] = date('d.m.Y', strtotime("this week tuesday"));
        $data['wednesday'] = date('d.m.Y', strtotime("this week wednesday"));
        $data['thursday'] = date('d.m.Y', strtotime("this week thursday"));
        $data['friday'] = date('d.m.Y', strtotime("this week friday"));
        $data['saturday'] = date('d.m.Y', strtotime("this week saturday"));
        $data['sunday'] = date('d.m.Y', strtotime("this week sunday"));
        $data['my-input'] = date('d.m.Y', strtotime("this week sunday"));

        echo view('templates/header', $data);
        echo view('scripts/weekoverview');
        echo view('pages/WeekOverview', $data);
        echo view('templates/Footer');
    }

    /**
     * This method redirects the user to the day specific to-do-list.
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function button_filter(){
        if (isset($_POST['settings'])) return redirect()->to(base_url() . '/index.php/settings');

        if (isset($_POST['monday'])){
            $_SESSION['selectedDate'] = $_POST['monday'];
            $_SESSION['wochentag'] = 'Montag';
            return redirect()->to(base_url() . '/index.php/DailyTodos');  // TODO set correct link once page is created

        }

        if (isset($_POST['tuesday'])){
            $_SESSION['selectedDate'] = $_POST['tuesday'];
            $_SESSION['wochentag'] = 'Dienstag';
            return redirect()->to(base_url() . '/index.php/DailyTodos');  // TODO set correct link once page is created

        }

        if (isset($_POST['wednesday'])){
            $_SESSION['selectedDate'] = $_POST['wednesday'];
            $_SESSION['wochentag'] = 'Mittwoch';
            return redirect()->to(base_url() . '/index.php/DailyTodos');  // TODO set correct link once page is created

        }

        if (isset($_POST['thursday'])){
            $_SESSION['selectedDate'] = $_POST['thursday'];
            $_SESSION['wochentag'] = 'Donnerstag';
            return redirect()->to(base_url() . '/index.php/DailyTodos');  // TODO set correct link once page is created

        }

        if (isset($_POST['friday'])){
            $_SESSION['selectedDate'] = $_POST['friday'];
            $_SESSION['wochentag'] = 'Freitag';
            return redirect()->to(base_url() . '/index.php/DailyTodos');  // TODO set correct link once page is created
        }

        if (isset($_POST['saturday'])){
            $_SESSION['selectedDate'] = $_POST['saturday'];
            $_SESSION['wochentag'] = 'Samstag';
            return redirect()->to(base_url() . '/index.php/DailyTodos');  // TODO set correct link once page is created

        }

        if (isset($_POST['sunday'])){
            $_SESSION['selectedDate'] = $_POST['sunday'];
            $_SESSION['wochentag'] = 'Sonntag';
            return redirect()->to(base_url() . '/index.php/DailyTodos');  // TODO set correct link once page is created
        }
    }

    /**
     * This method calculates and shows the new dates of the week, once a date has been
     * selected and confirmed in the modal dialog.
     * @throws \Exception
     */
    public function pickDate(){
        $data['title'] = 'WeekOverview';

        // putting the selected date into the session, overwriting the default date of today
        $_SESSION['selectedDate'] = date('d.m.Y', strtotime($_POST["dateInput"]));

        // calculating new calendar week
        $date = new \DateTime(date('d.m.Y', strtotime($_POST["dateInput"])));
        $data['week'] = $date->format("W");

        // calculates the date for the individual days of the week
        $DateTime = new \DateTime();
        $DateTime -> setISODate(date('Y', strtotime($_POST["dateInput"])), $data['week']);

        $data['monday'] = $DateTime -> format('d.m.Y');
        $DateTime -> modify('+1 Day');
        $data['tuesday'] = $DateTime -> format('d.m.Y');
        $DateTime -> modify('+1 Day');
        $data['wednesday'] = $DateTime -> format('d.m.Y');
        $DateTime -> modify('+1 Day');
        $data['thursday'] = $DateTime -> format('d.m.Y');
        $DateTime -> modify('+1 Day');
        $data['friday'] = $DateTime -> format('d.m.Y');
        $DateTime -> modify('+1 Day');
        $data['saturday'] = $DateTime -> format('d.m.Y');
        $DateTime -> modify('+1 Day');
        $data['sunday'] = $DateTime -> format('d.m.Y');
        $DateTime -> modify('+1 Day');
        $data['my-input'] = $DateTime -> format('d.m.Y');

        echo view('templates/header', $data);
        echo view('scripts/weekoverview');
        echo view('pages/WeekOverview', $data);
        echo view('templates/Footer');
    }

    /**
     * This method redirects the user to the statistics or settings page.
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function redirect_filter(){
        if (isset($_POST['statistics'])){
            return redirect()->to(base_url() . '/index.php/statistics');
        }

        if (isset($_POST['categories'])){
            return redirect()->to(base_url() . '/index.php/categories');
        }
    }
}