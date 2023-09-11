<?php
$validation = isset($_GET['wbp']) ? $_GET['wbp'] : null;
$authentication = isset($_GET['authentication']) ? $_GET['authentication'] : null;
$exception = null;

// if($validation != 'dashboard' || $authentication != 'nttdata') die;

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



// fputcsv($file, $generalData, ';');
// fclose($file);


// CAPTURA DADOS DOS PAISES
$percentCountries = Country::getPercentEngagement();
$pointsCountries = Country::getPointsForCountry();
$pubCountries = Country::getPubForCountry();
$commentCountries = Country::getCommentForCountry();
$top10Countries = Country::getTop10ForCountry();
$peopleForCountry = Country::getRegisterPeople();




$dataCountries = [];
foreach ($pointsCountries as $key => $country) {
   $dataCountries[$key] = [
      'id_country' => $country['id_country'],
      'score' => $country['score'],
      'percent' => $percentCountries[$key],
      'people' => $peopleForCountry[$key]['people'],
      'pub' => $pubCountries[$key]['pub'],
      'comment' => $commentCountries[$key]['comment'],
      'top10' => $top10Countries[$key]['topList'],
   ];
   # code...
}

$_SESSION['dataCountries'] = serialize($dataCountries);
$_SESSION['generalData'] = serialize($generalData);

loadView('dashboard/dashboard', ['exception' => $exception, 'dataCountries' => $dataCountries, 'generalData' => $generalData ]);