<?php
require_once "../Model/DataBase.php";

// Create a new instance of the Database class
$db = new Database();

$format = $_GET['format'] ?? null;

if ($format) {
    switch ($format) {
        case 'csv':
            export_csv($db);
            break;
        case 'webp':
            export_webp($db);
            break;
        case 'svg':
            export_svg($db);
            break;
        default:
            http_response_code(400);
            echo "Invalid format: $format";
            break;
    }
} else {
    http_response_code(400);
    echo "No format specified";
}

function export_csv($db) {
    try {
        // Fetch your data from the database
        $data = $db->select("SELECT c.name as country, y.year, y.percentage 
                             FROM country c 
                             JOIN yearlyData y ON c.id = y.country_id");

        // Call your function to export the data as CSV
        export_data_as_csv($data);
    } catch (Exception $e) {
        http_response_code(500);
        echo "Error exporting CSV: " . $e->getMessage();
    }
}

function export_webp($db) {
    try {
        // Fetch your data from the database
        $data = $db->select("SELECT c.name as country, y.year, y.percentage 
                             FROM country c 
                             JOIN yearlyData y ON c.id = y.country_id");

        // Call your function to export the data as WebP
        export_data_as_webp($data);
    } catch (Exception $e) {
        http_response_code(500);
        echo "Error exporting WebP: " . $e->getMessage();
    }
}

function export_svg($db) {
    try {
        // Fetch your data from the database
        $data = $db->select("SELECT c.name as country, y.year, y.percentage 
                             FROM country c 
                             JOIN yearlyData y ON c.id = y.country_id");

        // Call your function to export the data as SVG
        export_data_as_svg($data);
    } catch (Exception $e) {
        http_response_code(500);
        echo "Error exporting SVG: " . $e->getMessage();
    }
}

function export_data_as_csv($data) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="data.csv"');

    $output = fopen('php://output', 'w');
    fputcsv($output, ['Country', 'Year', 'Percentage']); // Header row

    foreach ($data as $row) {
        fputcsv($output, $row);
    }
    fclose($output);
    exit;
}

function export_data_as_webp($data) {
    header('Content-Type: image/webp');
    header('Content-Disposition: attachment;filename="data.webp"');

    $width = 800;
    $height = 600;
    $image = imagecreatetruecolor($width, $height);
    $background_color = imagecolorallocate($image, 255, 255, 255);
    imagefill($image, 0, 0, $background_color);

    // Example text output on the image
    $text_color = imagecolorallocate($image, 0, 0, 0);
    imagestring($image, 5, 50, 50, 'Example WebP Export', $text_color);

    // Save the image as WebP and output it
    imagewebp($image);
    imagedestroy($image);
    exit;
}

function export_data_as_svg($data) {
    header('Content-Type: image/svg+xml');
    header('Content-Disposition: attachment;filename="data.svg"');

    $svg = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>';
    $svg .= '<svg width="800" height="600" xmlns="http://www.w3.org/2000/svg">';
    $svg .= '<rect width="100%" height="100%" fill="white"/>';
    $svg .= '<text x="50%" y="50%" font-family="Arial" font-size="20" fill="black" text-anchor="middle">Example SVG Export</text>';
    $svg .= '</svg>';

    echo $svg;
    exit;
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
