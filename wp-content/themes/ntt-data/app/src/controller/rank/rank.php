<?php 

$user = User::getOne(['id_user' => $user->id_user]);

$RankTopUser = User::get([],'full_name, score','score DESC','',10);
$percentCountries = Country::getPercentEngagement();

loadTempalteView($page,  ['user' => $user, 'RankTopUser' => $RankTopUser, 'percentCountries' => $percentCountries]);