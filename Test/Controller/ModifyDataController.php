<?php
require_once __DIR__ . '/../Model/DataBase.php';
require_once __DIR__ . '/../Model/CountryModel.php';

class ModifyDataController
{
    private $model;

    public function __construct() {
        $this->model = new CountryModel();
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'];
            switch ($action) {
                case 'create':
                    $response = $this->insertYearlyData();
                    break;
                case 'update':
                    $response = $this->updateYearlyData();
                    break;
                case 'delete':
                    $response = $this->deleteYearlyData();
                    break;
                default:
                    $response = 'Invalid action';
                    break;
            }

            echo $response; // Return the response back to AJAX call
            exit; // Ensure no further output
        }
        require_once BASE_PATH . '/View/modifyData.php';
    }

    public function insertYearlyData() {
        $country_id = $_POST['id_country'];
        $year = $_POST['year'];
        $percentage = $_POST['percentage'];

        try {
            $this->model->createYearlyData($country_id, $year, $percentage);
            return "Data successfully created!";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function updateYearlyData() {
        $country_id = $_POST['id_country'];
        $year = $_POST['year'];
        $percentage = $_POST['percentage'];

        try {
            $this->model->updateYearlyData($country_id, $year, $percentage);
            return "Data successfully updated!";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function deleteYearlyData() {
        $country_id = $_POST['id_country'];
        $year = $_POST['year'];

        try {
            $this->model->deleteYearlyData($country_id, $year);
            return "Data successfully deleted!";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>
