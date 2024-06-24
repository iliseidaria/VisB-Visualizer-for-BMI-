<?php
require_once __DIR__ . '/../Model/Database.php';
require_once __DIR__ . '/../Model/CountryModel.php'; 

class ModifyDataController
{

    public function index() {
        
        require_once BASE_PATH . '/View/modifyData.php';
    }

   
}
?>
