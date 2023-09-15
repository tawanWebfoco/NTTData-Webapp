<?php
$validation = isset($_GET['wbp']) ? $_GET['wbp'] : null;
$authentication = isset($_GET['authentication']) ? $_GET['authentication'] : null;
$exception = null;

if($validation != 'dashboard' || $authentication != 'nttdata') die;

Country::updateEngagament();

// CAPTURA DADOS GERAIS
$allPoints = Country::getAllPoints();
$countRegister = Country::getCountRegister();
$countRegisterEngaged = Country::getCountRegisterEngaged();
$countGuest = Country::getCountGuest();
$countPub = Country::getCountPub();
$countComment = Country::getCountComment();
$totalPeople = Country::getTotalPeople();

$proportionTotal = Country::getProportionRegisters();

$generalData = [
   'points' => $allPoints,
   'register' => $countRegister,
   'registerEngaged' => $countRegisterEngaged,
   'proportionTotal' => $proportionTotal,
   'totalPeople' => $totalPeople,
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
$totalPeopleForCountry = Country::getTotalPeopleForCountry();




$dataCountries = [];
foreach ($pointsCountries as $key => $country) {
   $proportionRegisterTotalPeople = ceil(($peopleForCountry[$key]['people'] * 100) / $totalPeopleForCountry[$key]['total_people']);

   $dataCountries[$key] = [
      'id_country' => $country['id_country'],
      'score' => $country['score'],
      'percent' => $percentCountries[$key]['engagement'],
      'people' => $peopleForCountry[$key]['people'],
      'peopleEngaged' => $peopleForCountryEngaged[$key]['people'],
      'totalPeople' => $totalPeopleForCountry[$key]['total_people'],
      'proportion' => $proportionRegisterTotalPeople,
      'pub' => $pubCountries[$key]['pub'],
      'comment' => $commentCountries[$key]['comment'],
      'top10' => $top10Countries[$key]['topList'],
   ];
   # code...
}


loadView('dashboard/dashboard', ['exception' => $exception, 'dataCountries' => $dataCountries, 'generalData' => $generalData ]);