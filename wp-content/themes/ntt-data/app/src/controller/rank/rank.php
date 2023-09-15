<?php 

if(get_class($user) === 'Guest')$user = Guest::getOne(['id_user' => $user->id_user]);
if(get_class($user) === 'User')$user = User::getOne(['id_user' => $user->id_user]);

$RankTopUser = User::get([],'full_name, score','score DESC','',10);
$percentCountries = Country::getPercentEngagement();



loadTempalteView($page,  ['user' => $user, 'RankTopUser' => $RankTopUser, 'percentCountries' => $percentCountries]);