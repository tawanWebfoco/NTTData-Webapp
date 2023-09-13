<?php
$validation = isset($_GET['wbp']) ? $_GET['wbp'] : null;
$authentication = isset($_GET['authentication']) ? $_GET['authentication'] : null;
$exception = null;

if($validation != 'dashboard' || $authentication != 'nttdata') die;

Country::updateEngagament();

// CAPTURA DADOS GERAIS
$allPoints = Country::getAllPoints();
$countRegister = Country::getCountRegister();
$countGuest = Country::getCountGuest();
$countPub = Country::getCountPub();
$countComment = Country::getCountComment();

$generalData = [
   'points' => $allPoints,
   'register' => $countRegister,
   'guest' => $countGuest,
   'pub' => $countPub,
   'comment' => $countComment,

];


// CAPTURA DADOS DOS PAISES
$percentCountries = Country::getPercentEngagement();
$pointsCountries = Country::getPointsForCountry();
$pubCountries = Country::getPubForCountry();
$commentCountries = Country::getCommentForCountry();
$top10Countries = Country::getTop10ForCountry();
$peopleForCountry = Country::getRegisterPeople();
$peopleForCountryEngaged = Country::getRegisterPeopleEngaged();
$totalPeople = Country::getTotalPeople();




$dataCountries = [];
foreach ($pointsCountries as $key => $country) {
   $proportionRegisterTotalPeople = ceil(($peopleForCountryEngaged[$key]['people'] * 100) / $totalPeople[$key]['total_people']);

   $dataCountries[$key] = [
      'id_country' => $country['id_country'],
      'score' => $country['score'],
      'percent' => $percentCountries[$key],
      'people' => $peopleForCountry[$key]['people'],
      'peopleEngaged' => $peopleForCountryEngaged[$key]['people'],
      'totalPeople' => $totalPeople[$key]['total_people'],
      'proportion' => $proportionRegisterTotalPeople,
      'pub' => $pubCountries[$key]['pub'],
      'comment' => $commentCountries[$key]['comment'],
      'top10' => $top10Countries[$key]['topList'],
   ];
   # code...
}


loadView('dashboard/dashboard', ['exception' => $exception, 'dataCountries' => $dataCountries, 'generalData' => $generalData ]);