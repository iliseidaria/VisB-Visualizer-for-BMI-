<?php

class CalculatorBMI
{
    public function MetricBMI($weight, $height)
    {
        $bmi=$weight/(($height/100)*($height/100));
        return $bmi; 
    }

    public function UsBMI($weight_us, $height_us)
    {
        $bmi_us = ($weight_us / ($height_us * $height_us)) * 703;
        return $bmi_us;
    }

    public function generateBMIIndicator($bmi, $weight, $height, $unit) {
        $bmi_categories = [
            ['min' => 0,    'max' => 18.5, 'color' => '#FFD700', 'label' => 'Underweight'],
            ['min' => 18.5, 'max' => 24.9, 'color' => '#ADFF2F', 'label' => 'Normal weight'],
            ['min' => 24.9, 'max' => 29.9, 'color' => '#FF6347', 'label' => 'Overweight'],
            ['min' => 29.9, 'max' => 100,  'color' => '#7a0d17', 'label' => 'Obese'],
        ];

        $category = '';
        $color = '';
        $min_weight_healthy = 0;
        $max_weight_healthy = 0;

        if ($unit == 'us') {
            $min_weight_healthy = 18.5 * pow($height, 2) / 703; 
            $max_weight_healthy = 24.9 * pow($height, 2) / 703; 
        } else {
            $height_m = $height / 100; // cm to m
            $min_weight_healthy = 18.5 * pow($height_m, 2); 
            $max_weight_healthy = 24.9 * pow($height_m, 2); 
        }
        
        foreach ($bmi_categories as $item) {
            if ($bmi >= $item['min'] && $bmi <= $item['max']) {
                $category = $item['label'];
                $color = $item['color'];
                break;
            }
        }

        if ($category && $color) {
            echo '<div class="bmi-indicator" style="background-color: ' . $color . ';">';
            echo '<span>BMI=' . round($bmi, 1) . ' kg/m² (' . $category . ')</span>';
            echo '</div>';
        }
        echo '<div class="bmi-info">';
            echo '<ul>';
            echo '<li>Healthy BMI range: 18.5 kg/m² - 25 kg/m²</li>';
            echo '<li>Your BMI is in the \'' . $category . '\' range: ' . $item['min'] . ' - ' . $item['max'] . '</li>';
            echo '<li>Healthy weight for the height: ' . round($min_weight_healthy, 1) . ' lbs - ' . round($max_weight_healthy, 1) . ' lbs</li>';
            
            if ($category == 'Underweight') {
                $weight_to_gain = $min_weight_healthy - $weight;
                echo '<li>Gain ' . round($weight_to_gain, 1) . ' lbs to reach a BMI of 18.5 kg/m².</li>';
            } elseif ($category == 'Overweight' || $category == 'Obese') {
                $weight_to_lose = $weight - $max_weight_healthy;
                echo '<li>Lose ' . round($weight_to_lose, 1) . ' lbs to reach a BMI of 25 kg/m².</li>';
            }
            echo '</ul>';
            echo '</div>';
    }
}
?>