<?php
class Country extends Model
{
    protected static $tableName = 'wp_app_country';
    protected static $columns = ['name', 'all_score', 'date_data', 'engagement'];
    protected static $idTable = 'id_country';
    protected static $projectStartDate = '2023-09-04';
    protected static $countries = [];


    public static function updateEngagament()
    {
        $countries = self::getEngagement();
        foreach ($countries as $key => $country) {
            $engagement = $country['engagement'];
            $date_data = $country['date_data'];
            $id_country = $country['id_country'];

            $sql = "UPDATE `wp_app_country` SET `date_data` = '$date_data',`engagement`='$engagement' WHERE id_country = $id_country";

            Database::executeSQL($sql);
        }
        
    }
    public static function getPercentEngagement(){
        $projectDays = self::getCountDaysStartProject();

        $countries = self::get();
        $percentCountries = [];
        foreach ($countries as $key => $country) {
            $engagement = 0;
                print_r(($country->count_people * $projectDays));
                print_r(($country->engagement * 100));
                $engagement =  ($country->engagement * 100) / ($country->count_people * $projectDays);
                $engagement = intval($engagement);
            $percentCountries[$country->name] = $engagement    ;
        }

        return $percentCountries;

    }
    public static function getCountDaysStartProject(){
        date_default_timezone_set('America/Sao_Paulo');
        $currentDate = date('Y-m-d');

        $startProject = new DateTime(self::$projectStartDate);
        $currentDate = new DateTime($currentDate);

        // Calcula a diferença em dias
        $difference = $startProject->diff($currentDate);

        // Obtém o número de dias
        $countDays = $difference->days;

        return $countDays;

    }

    public static function getEngagement(){
        $countries = self::get();
        $objects = [];

        foreach ($countries as $key => $country) {
            $sql = "SELECT COUNT(*) as engagement FROM (SELECT DISTINCT id_user, DATE(date) as data FROM wp_app_engaged WHERE country = '$country->name')subquery";
            $result = Database::getResultFromQuery($sql);

            if ($result) {
                date_default_timezone_set('America/Sao_Paulo');
                $date = str_replace('=', 'T', date('Y-m-d=H:i:s'));
                while ($row = $result->fetch_assoc()) {
                    $objects[$country->name] = [
                        'id_country' => $country->id_country,
                        'engagement' => $row['engagement'],
                        'date_data' => $date,
                    ];
                }
            }

            // return $objects;
        }
        return($objects);
    }
}
