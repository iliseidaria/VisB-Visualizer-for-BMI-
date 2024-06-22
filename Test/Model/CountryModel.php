<?php
require_once "Database.php";

class CountryModel extends Database
{
    //functie pt comparison.php : 2 tari + 1 an 
    public function getCountryData($country1, $country2, $year)
    {
        $sql = "SELECT c.name, y.year, y.percentage 
                FROM yearlyData y 
                JOIN country c ON y.country_id = c.id 
                WHERE (c.name = ? OR c.name = ?) AND y.year = ?"; 
                //where... -> Filtrează rezultatele pentru a include doar rândurile unde numele țării este unul dintre cele două nume furnizate și anul este cel specificat. Semnele de întrebare (?) sunt parametri pentru a preveni SQL injection.
        return $this->select($sql, [$country1, $country2, $year]);
    }

    public function getCountries()
    {
        $sql = "SELECT name FROM country";
        return $this->select($sql);
    }

    public function getMaxValue()
    {
        $sql = "SELECT c.name, y.year, y.percentage 
                FROM yearlyData y 
                JOIN country c ON y.country_id = c.id 
                ORDER BY percentage DESC 
                LIMIT 1";
        return $this->select($sql);
    }

    public function getMinValue()
{
    $sql = "SELECT c.name, y.year, y.percentage 
            FROM yearlyData y 
            JOIN country c ON y.country_id = c.id
            WHERE percentage IS NOT NULL
            ORDER BY percentage ASC 
            LIMIT 1";
    return $this->select($sql);
}

/*

public function getMaxValue()
    {
        $sql = "SELECT year, percentage 
                FROM yearlyData 
                ORDER BY percentage DESC 
                LIMIT 10";
        return $this->select($sql);
    }

public function getMinValues()
{
    $sql = "SELECT year, percentage 
            FROM yearlyData 
            WHERE percentage IS NOT NULL
            ORDER BY percentage ASC
            LIMIT 10";
    return $this->select($sql);
}
*/

    public function getSameValue()
{
    $sql = "SELECT yd1.year, yd1.percentage, c1.name
            FROM yearlyData yd1
            JOIN yearlyData yd2 ON yd1.percentage = yd2.percentage AND yd1.country_id != yd2.country_id
            JOIN country c1 ON yd1.country_id = c1.id
            WHERE yd1.percentage IS NOT NULL
            ORDER BY yd1.percentage, yd1.year";
    return $this->select($sql);
}

    public function averagePerCountry()
    {
        $sql="SELECT c.id, c.name, AVG(yd.percentage) AS average_percentage
        FROM country c
        JOIN yearlyData yd ON c.id = yd.country_id
        WHERE yd.year IN (2008, 2014, 2017, 2019, 2022)
        GROUP BY c.id, c.name
        LIMIT 0, 25";
        return $this->select($sql);
    }
}
?>