<?php
require_once "Database.php";

class CountryModel extends Database
{
    //functie pt comparison.php
    public function getCountryData($country1, $country2, $year)
    {
        $sql = "SELECT c.name, y.year, y.percentage 
                FROM yearlyData y 
                JOIN country c ON y.country_id = c.id 
                WHERE (c.name = ? OR c.name = ?) AND y.year = ?"; 
                //where... -> Filtrează rezultatele pentru a include doar rândurile unde numele țării este unul dintre cele două nume furnizate și anul este cel specificat. Semnele de întrebare (?) sunt parametri pentru a preveni SQL injection.
        return $this->select($sql, [$country1, $country2, $year]);
    }

    public function getTop10CountriesWithIncreasingObesity()
    {
        //diferenta de procente la obezitate pentru cei mai recenti 2 ani : 2017 si 2022 momentan
        $sql = "SELECT c.name, yd1.year AS last_year, yd2.year AS previous_year, (yd1.percentage - yd2.percentage) AS percentage_difference
            FROM country c
            JOIN yearly_data_obese yd1 ON c.id = yd1.country_id
            JOIN yearly_data_obese yd2 ON c.id = yd2.country_id
            WHERE yd1.year = (SELECT MAX(year) FROM yearly_data_obese WHERE country_id = c.id)
            AND yd2.year = (SELECT MAX(year) FROM yearly_data_obese WHERE country_id = c.id AND year < yd1.year)
            ORDER BY percentage_difference DESC
            LIMIT 10;";

        return $this->select($sql);
    }

    public function getMaxValue()
    {
        //afisare tari cu cea mai mare pondere pt riscul la obezitate -> folosim toate cele 3 tabele pt care afisam valorile + calculam ponderea
        //DOAR PE ANUL 2022
        $sql = "SELECT c.name AS country_name, 022 AS year, 
                   COALESCE(y.percentage, 0) AS Overweight, 
                   COALESCE(po.percentage, 0) AS Pre_Obese, 
                   COALESCE(o.percentage, 0) AS Obese,
                   (COALESCE(y.percentage, 0) * 1 + COALESCE(po.percentage, 0) * 2 + COALESCE(o.percentage, 0) * 3) AS Obesity_Risk_Score
                FROM country c
                LEFT JOIN (SELECT country_id, percentage
                    FROM yearlydata
                    WHERE year = 2022) y ON c.id = y.country_id
                LEFT JOIN (SELECT country_id, percentage
                    FROM yearly_data_pre_obese
                    WHERE year = 2022) po ON c.id = po.country_id
                LEFT JOIN (SELECT country_id, percentage
                    FROM yearly_data_obese
                    WHERE year = 2022) o ON c.id = o.country_id
                WHERE y.country_id IS NOT NULL AND po.country_id IS NOT NULL AND o.country_id IS NOT NULL
                ORDER BY Obesity_Risk_Score DESC
                LIMIT 10";
    
        return $this->select($sql);
    }

    public function getTop10CountriesHighestAveragePreObesity()
    {
        //facem average pt valorile pe toti anii pt fiecare tara DOAR cu tabela Pre-Obese
        $sql = "SELECT c.name AS country_name,
                   IFNULL(MAX(CASE WHEN yearly_data_pre_obese.year = 2008 THEN yearly_data_pre_obese.percentage ELSE NULL END), 'Missing Data') AS year_2008,
                   IFNULL(MAX(CASE WHEN yearly_data_pre_obese.year = 2014 THEN yearly_data_pre_obese.percentage ELSE NULL END), 'Missing Data') AS year_2014,
                   IFNULL(MAX(CASE WHEN yearly_data_pre_obese.year = 2017 THEN yearly_data_pre_obese.percentage ELSE NULL END), 'Missing Data') AS year_2017,
                   IFNULL(MAX(CASE WHEN yearly_data_pre_obese.year = 2019 THEN yearly_data_pre_obese.percentage ELSE NULL END), 'Missing Data') AS year_2019,
                   IFNULL(MAX(CASE WHEN yearly_data_pre_obese.year = 2022 THEN yearly_data_pre_obese.percentage ELSE NULL END), 'Missing Data') AS year_2022,
                   ROUND(AVG(CASE WHEN yearly_data_pre_obese.percentage > 0 THEN yearly_data_pre_obese.percentage ELSE NULL END), 2) AS average_percentage
                FROM country c
                LEFT JOIN ( SELECT country_id, year, percentage FROM yearly_data_pre_obese) yearly_data_pre_obese ON c.id = yearly_data_pre_obese.country_id
                WHERE yearly_data_pre_obese.percentage IS NOT NULL
                GROUP BY c.name
                ORDER BY average_percentage DESC
                LIMIT 10";
        return $this->select($sql);
    }

    public function getSameValue()
    {
        //afisam tarile care au acelasi procentaj in acelasi an -> OVERWEIGHT
        $sql = "SELECT LEAST(yd1.year, yd2.year) AS year,
                   yd1.percentage,
                   GROUP_CONCAT(DISTINCT c1.name ORDER BY c1.name SEPARATOR ', ') AS countries
                FROM yearlyData yd1
                JOIN yearlyData yd2 ON yd1.percentage = yd2.percentage AND yd1.country_id != yd2.country_id
                JOIN country c1 ON yd1.country_id = c1.id
                JOIN country c2 ON yd2.country_id = c2.id
                WHERE yd1.percentage IS NOT NULL 
                AND c1.id <= 35
                GROUP BY LEAST(yd1.year, yd2.year), yd1.percentage
                HAVING COUNT(DISTINCT c1.name) > 1 AND COUNT(DISTINCT c1.name) <= 35
                ORDER BY LEAST(yd1.year, yd2.year), yd1.percentage";

        return $this->select($sql);
    }

}
?>