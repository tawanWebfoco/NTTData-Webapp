<?php
$validation = isset($_GET['wbp']) ? $_GET['wbp'] : null;
$authentication = isset($_GET['authentication']) ? $_GET['authentication'] : null;

if($validation != 'dashboard' || $authentication != 'nttdata') die;

Country::updateEngagament();
$percentCountries = Country::getPercentEngagement();
$pointsCountries = Country::getPointsForCountry();
$top10Countries = Country::getTop10ForCountry();
$peopleForCountry = Country::getRegisterPeople();
$exception = null;
$dataCountries = [];
foreach ($pointsCountries as $key => $country) {
   $dataCountries[$key] = [
      'id_country' => $country['id_country'],
      'score' => $country['score'],
      'percent' => $percentCountries[$key],
      'people' => $peopleForCountry[$key]['people'],
      'top10' => $top10Countries[$key]['topList'],
   ];
   # code...
}


loadView('dashboard/dashboard', ['exception' => $exception, 'dataCountries' => $dataCountries ]);