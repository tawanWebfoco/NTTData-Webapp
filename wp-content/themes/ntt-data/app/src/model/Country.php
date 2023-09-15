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
        $peopleForCountry = self::getRegisterPeople();
        $peopleForCountryEngaged = self::getRegisterPeopleEngaged();

        foreach ($countries as $key => $country) {
            $engagement = $country['engagement'];
            $date_data = $country['date_data'];
            $id_country = $country['id_country'];
            $register_people = $peopleForCountry[$key]['people'];
            $people_engaged = $peopleForCountryEngaged[$key]['people'];

            $sql = "UPDATE `wp_app_country` SET `people_engaged` = $people_engaged, `date_data` = '$date_data',`engagement`='$engagement',`register_people` = $register_people WHERE id_country = $id_country";

            Database::executeSQL($sql);
        }
    }
    public static function getPercentEngagement()
    {
       

        $projectDays = self::getCountDaysStartProject(self::$projectStartDate);

        $countries = self::get();
        $dateStartProject = new DateTime(static::$projectStartDate);
        $percentCountries = [];
        $objects = [];
        foreach ($countries as $key => $country) {
            $currentDate = new DateTime();
            $dateLastWeek = $currentDate->modify("-7 day")->format("Y-m-d");
            $dateLastWeekObj = new DateTime($dateLastWeek);
            $daysLastWeek = self::getCountDaysStartProject($dateLastWeek);
            $engagement = 0;

            $engajamentoCumulativo = 0;

            // Loop para calcular o engajamento diário cumulativo
            for ($i = 0; $i <= $daysLastWeek; $i++) {

                $dataConsulta = $dateLastWeekObj->modify("+1 day")->format("Y-m-d");

                // Consulta SQL para obter o número de usuários cadastrados com pontuação maior que zero para o dia atual
                $sql = "SELECT COUNT(*) AS registers FROM wp_app_user WHERE DATE(date) < '$dataConsulta' AND `score` > 0 AND `country` = '$country->name'";
                
                $result = Database::getResultFromQuery($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $registers = $row["registers"];

                    // Adicionar o número de usuários do dia ao engajamento cumulativo
                    $engajamentoCumulativo += $registers;
                }
            }


            // $engagement =  ($country->engagement * 100) / ($country->total_people * $projectDays);
            if (($country->people_engaged * $projectDays) > 0) {

                $engagement =  ($country->engagement * 100) / $engajamentoCumulativo;
                // $engagement =  ($country->engagement * 100) / ($country->people_engaged * $projectDays);
            }
            $engagement = ceil($engagement);
            $percentCountries[$country->name]['engagement'] = $engagement;
            $proportionRegister = static::getProportionRegisters($country->name);

            $rank = ceil(($proportionRegister + $engagement) / 2);
            $percentCountries[$country->name]['rank'] = $rank;
        }

        return $percentCountries;
    }
   
    public static function getProportionRegisters($country = null){
       
        $peopleRegister = static::getCountRegisterEngaged($country);
        $totalPeople = static::getTotalPeople($country);
        
        $proportionTotal = ceil(($peopleRegister * 100) / $totalPeople);

        return $proportionTotal;
    }
        
    public static function getCountDaysStartProject($date)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $currentDate = date('Y-m-d');

        $startProject = new DateTime($date);
        $currentDate = new DateTime($currentDate);

        // Calcula a diferença em dias
        $difference = $startProject->diff($currentDate);

        // Obtém o número de dias
        $countDays = $difference->days;

        return $countDays;
    }
    public static function getRegisterPeople()
    {
        $countries = self::get();
        $objects = [];
        foreach ($countries as $key => $country) {
            $sql = "SELECT COUNT(*) AS people
            FROM wp_app_user
            WHERE country = '$country->name'";
            $result = Database::getResultFromQuery($sql);

            if ($result->num_rows > 0) {
                while ($people = $result->fetch_assoc()) {
                    $objects[$country->name] = [
                        'id_country' => $country->id_country,
                        'people' => $people['people'],
                    ];
                }
            }
        }
        return ($objects);
    }
    public static function getRegisterPeopleEngaged()
    {
        $countries = self::get();
        $objects = [];
        foreach ($countries as $key => $country) {
            $sql = "SELECT COUNT(*) AS people
            FROM wp_app_user
            WHERE country = '$country->name' AND `score` > 0";
            $result = Database::getResultFromQuery($sql);

            if ($result->num_rows > 0) {
                while ($people = $result->fetch_assoc()) {
                    $objects[$country->name] = [
                        'id_country' => $country->id_country,
                        'people' => $people['people'],
                    ];
                }
            }
        }
        return ($objects);
    }
    public static function getEngagement()
    {
        $countries = self::get();
        $objects = [];

        foreach ($countries as $key => $country) {
            $sql = "SELECT COUNT(*) as engagement FROM (SELECT DISTINCT id_user, DATE(date) as data FROM wp_app_engaged WHERE country = '$country->name')subquery";
            $result = Database::getResultFromQuery($sql);

            if ($result && $result->num_rows > 0) {
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
        }
        return ($objects);
    }

    public static function getPointsForCountry()
    {
        $countries = self::get();
        $objects = [];

        foreach ($countries as $key => $country) {
            $sql = "SELECT SUM(score) as score FROM wp_app_user WHERE country = '$country->name'";
            $result = Database::getResultFromQuery($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $objects[$country->name] = [
                        'id_country' => $country->id_country,
                        'score' => $row['score'],
                    ];
                }
            }
        }
        return ($objects);
    }
    public static function getPubForCountry()
    {
        $countries = self::get();
        $objects = [];

        foreach ($countries as $key => $country) {
            $sql = "SELECT count(*) as pub FROM wp_app_engaged WHERE country = '$country->name' AND `type` = 'pub'";
            $result = Database::getResultFromQuery($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $objects[$country->name] = [
                        'id_country' => $country->id_country,
                        'pub' => $row['pub'],
                    ];
                }
            }
        }
        return ($objects);
    }
    public static function getCommentForCountry()
    {
        $countries = self::get();
        $objects = [];

        foreach ($countries as $key => $country) {
            $sql = "SELECT count(*) as comment FROM wp_app_engaged WHERE country = '$country->name' AND `type` = 'comment'";
            $result = Database::getResultFromQuery($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $objects[$country->name] = [
                        'id_country' => $country->id_country,
                        'comment' => $row['comment'],
                    ];
                }
            }
        }
        return ($objects);
    }
    public static function getTop10ForCountry()
    {
        $countries = self::get();
        $objects = [];

        foreach ($countries as $key => $country) {
            $sql = "SELECT full_name,score FROM wp_app_user WHERE country = '$country->name' ORDER BY score DESC
            LIMIT 10;";
            $result = Database::getResultFromQuery($sql);
            if ($result->num_rows > 0) {
                $topList = [];
                while ($row = $result->fetch_assoc()) {
                    array_push($topList, $row);
                    $objects[$country->name] = [
                        'id_country' => $country->id_country,
                        'topList' => $topList
                    ];
                }
            } else {
                $objects[$country->name] = [
                    'id_country' => $country->id_country,
                    'topList' => []
                ];
            }
        }
        return ($objects);
    }
    public static function getAllPoints()
    {
        $sql = "SELECT SUM(score) as score FROM wp_app_user WHERE 1 = 1";
        $result = Database::getResultFromQuery($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc()['score'];
        }
        return ($row);
    }
    public static function getCountRegister($country = null)
    {
        $sql = "SELECT count(*) as records FROM wp_app_user WHERE 1 = 1";
        if($country != null)  $sql = "SELECT count(*) as records FROM wp_app_user WHERE `country` = '$country'";

        $result = Database::getResultFromQuery($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc()['records'];
        }
        return ($row);
    }
    public static function getCountRegisterEngaged($country = null)
    {
        $sql = "SELECT count(*) as records FROM wp_app_user WHERE 1 = 1 AND `score` > 0";
        if($country != null)  $sql = "SELECT count(*) as records FROM wp_app_user WHERE `country` = '$country' AND `score` > 0";

        $result = Database::getResultFromQuery($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc()['records'];
        }
        return ($row);
    }
    public static function getCountGuest()
    {
        $sql = "SELECT count(*) as records FROM wp_app_guest WHERE 1 = 1";
        $result = Database::getResultFromQuery($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc()['records'];
        }
        return ($row);
    }
    public static function getCountPub()
    {
        $sql = "SELECT count(*) as pub  FROM wp_app_pub WHERE 1 = 1";
        $result = Database::getResultFromQuery($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc()['pub'];
        }
        return ($row);
    }
    public static function getCountComment()
    {
        $sql = "SELECT count(*) as comment FROM wp_app_comment WHERE 1 = 1";
        $result = Database::getResultFromQuery($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc()['comment'];
        }
        return ($row);
    }
    public static function getTotalPeople($country = null)
    {
        $sql = "SELECT SUM(total_people) as total_people FROM wp_app_country WHERE 1 = 1";
        if($country != null)  $sql = "SELECT SUM(total_people) as total_people FROM wp_app_country WHERE `name` = '$country'";
        
        
        $result = Database::getResultFromQuery($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc()['total_people'];
        }
        return ($row);
    }


    public static function getTotalPeopleForCountry()
    {
        $countries = self::get();
        $objects = [];

        foreach ($countries as $key => $country) {
            $sql = "SELECT total_people FROM wp_app_country WHERE `name` = '$country->name'";
            $result = Database::getResultFromQuery($sql);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $objects[$country->name] = [
                        'id_country' => $country->id_country,
                        'total_people' => $row['total_people'],
                    ];
                }
            }
        }
        return ($objects);
    }
}
