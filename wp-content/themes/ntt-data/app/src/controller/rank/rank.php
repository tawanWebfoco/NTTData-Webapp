<?php 

$user = User::getOne(['id_user' => $user->id_user]);

$RankTopUser = User::get([],'full_name, score','DESC','',10);
$RankTopUser = array_reverse($RankTopUser);

loadTempalteView($page,  ['user' => $user, 'RankTopUser' => $RankTopUser]);